<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Room\CreateRoomRequest;
use App\Http\Requests\Api\Room\UpdateRoomRequest;
use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function index()
    {
        return view('admin.room.rooms');
    }

    //----------------------------------------------------------------------------------

    public function create()
    {
        $beds = Bed::all();
        return view('admin.room.add-room', compact('beds'));
    }

    //----------------------------------------------------------------------------------

    public function store(CreateRoomRequest $request)
    {

        $inputs = $request->validated();
        $path = null;

        //image upload 
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('rooms/covers', 'public');
        }
        $capacity = Bed::whereIn('id', $inputs['beds'])->sum('capacity');

        $newRoom = Room::create([
            "name" => $inputs['name'],
            "description" => $inputs['description'],
            "cover_image" => $path,
            "price" => $inputs['price'],
            "capacity" => (int) $capacity,
        ]);

        $newRoom->beds()->sync($inputs['beds']);


        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $gallery_image) {
                $galleryPath = $gallery_image->store('rooms/gallery', 'public');

                $newRoom->gallery()->create(['path' => $galleryPath]);
            }
        }

        return redirect()->route('admin.room.index')->with('toast-success', 'اتاق جدید با موفقیت اضافه شد');
    }
    //----------------------------------------------------------------------------------

    public function edit(Room $room)
    {
        $beds = Bed::orderBy('created_at', 'desc')->get();
        return view('admin.room.edit', compact(['room', 'beds']));
    }


    //----------------------------------------------------------------------------------

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $inputs = $request->validated();
        // dd($inputs);
        $capacity = (int) Bed::whereIn('id', $inputs['beds'])->sum('capacity');

        // cover image
        if ($request->hasFile('cover_image')) {
            if (!empty($room->cover_image) && Storage::disk('public')->exists($room->cover_image)) {
                Storage::disk('public')->delete($room->cover_image);
            }

            $path = $request->file('cover_image')->store('rooms/covers', 'public');
            $room->cover_image = $path;
        }

        // handle retention/deletion of existing gallery images
        $keepIds = [];

        if ($request->filled('old_gallery_images')) {
            $keepIds = array_filter(explode(',', $request->input('old_gallery_images')));
        }

        $existingIds = $room->gallery->pluck('id')->toArray();
        $toDelete = array_diff($existingIds, $keepIds);

        if (!empty($toDelete)) {
            $imagesToDelete = $room->gallery()->whereIn('id', $toDelete)->get();
            foreach ($imagesToDelete as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
                $image->delete();
            }
        }

        // add newly uploaded gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $gallery) {
                $galleryPath = $gallery->store('rooms/gallery', 'public');
                $room->gallery()->create(['path' => $galleryPath]);
            }
        }

        // update main room fields
        $room->update([
            "name" => $inputs['name'],
            "description" => $inputs['description'],
            "price" => $inputs['price'],
            "capacity" => $capacity,
            'area' => $inputs['area'],
            'bedrooms' => $inputs['bedrooms'],
        ]);

        if (!empty($inputs['beds'])) {
            $room->beds()->sync($inputs['beds']);
        }

        return redirect()->route('admin.room.index')->with('toast-success', 'اتاق با موفقیت ویرایش شد');
    }

    public function changeStatus(Room $room)
    {
        $room->update(['status' => !$room->status]);
        return redirect()->back();
    }


    //----------------------------------------------------------------------------------

    public function destroy(Room $room)
    {
        $room->delete();
        return back();
    }
}
