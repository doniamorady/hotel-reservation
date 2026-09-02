<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use App\Models\Bed;
use App\Models\Room;
use App\Http\Services\imageService\ImageService;
use App\Models\Amenity;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::orderBy('created_at', 'desc')->get();
        return view('admin.room.rooms', compact(['rooms']));
    }

    //----------------------------------------------------------------------------------

    public function create()
    {
        $beds = Bed::all();
        $amenities = Amenity::orderBy('created_at', 'desc')->get();
        return view('admin.room.add-room', compact('beds', 'amenities'));
    }

    //----------------------------------------------------------------------------------

    public function store(RoomRequest $request, ImageService $imageService)
    {
        $beds = array_map('intval', $request->beds);
        $arrBeds = [];

        foreach ($beds as $key => $value) {
            $bed = Bed::find($key)->name;
            if ($value > 0) {
                $arrBeds[$bed] = $value;
            }
        }

        $inputs = $request->validated();
        $path = '';


        //image upload 
        if ($request->hasFile('cover_image')) {
            $path = $imageService->uploadImage($request->file('cover_image'), 'images/rooms');
        }

        $newRoom = Room::create([
            "name" => $inputs['name'],
            "description" => $inputs['description'],
            "cover_image" => $path,
            "price_per_night" => $inputs['price_per_night'],
            "capacity" => $inputs['capacity'],
            "beds" => $arrBeds
        ]);

        if (!empty($inputs['amenities'])) {
            foreach ($inputs['amenities'] as $amenity) {
                $newRoom->amenities()->attach($amenity);
            }
        }


        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $gallery_image) {
                $galleryPath = $imageService->uploadImage($gallery_image, 'images/rooms/gallery');

                $newRoom->images()->create([
                    "path" => $galleryPath
                ]);
            }
        }

        return redirect()->route('admin.room.index')->with('toast-success', 'اتاق جدید با موفقیت اضافه شد');
    }
    //----------------------------------------------------------------------------------

    public function edit(Room $room)
    {
        $gallery = $room->images;
        $beds = Bed::orderBy('created_at', 'desc')->get();
        $amenities = Amenity::orderBy('created_at', 'desc')->get();
        return view('admin.room.edit', compact(['room', 'gallery', 'beds', 'amenities']));
    }


    //----------------------------------------------------------------------------------

    public function update(RoomRequest $request, Room $room, ImageService $imageService)
    {
        $inputs = $request->validated();
        $beds = array_map('intval', $request->beds);
        $arrBeds = [];

        foreach ($beds as $key => $value) {
            $bed = Bed::find($key)->name;
            if ($value >= 1) {
                $arrBeds[$bed] = $value;
            }
        }

        if ($request->hasFile('cover_image')) {

            if (!empty($room->cover_image)) {
                $imageService->removeImage($room->cover_image);
            }

            $path = $imageService->uploadImage($inputs['cover_image'], "images/rooms");
            $room->cover_image = $path;
        }

        //remove image from room gallery
        if (isset($request->delete_gallery_images)) {
            foreach ($request->delete_gallery_images as $delete) {
                $image = $room->images()->findOrFail($delete);
                if ($image) {
                    $imageService->removeImage($image->path);
                    $image->delete();
                }
            }
        }

        //add new image to room gallery
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $gallery) {
                $path = $imageService->uploadImage($gallery, "images/rooms/gallery");
                $room->images()->create([
                    'path' => $path
                ]);
            }
        }

        $room->update([
            "name" => $inputs['name'],
            "description" => $inputs['description'],
            "price_per_night" => $inputs['price_per_night'],
            "capacity" => $inputs['capacity'],
            "beds" => $arrBeds,
        ]);
        $room->save();
        $room->amenities()->sync($inputs['amenities']);

        return redirect()->route('admin.room.index')->with('toast-success', 'اتاق با موفقیت ویرایش شد');
    }


    //----------------------------------------------------------------------------------

    public function destroy(Room $room)
    {
        $room->delete();
        return back();
    }
}
