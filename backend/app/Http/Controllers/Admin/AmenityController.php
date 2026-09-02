<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityRequest;
use App\Models\Amenity;
use App\Http\Services\imageService\ImageService;
use Exception;
use Illuminate\Http\Request;

class AmenityController extends Controller
{

    public function index()
    {
        $amenities = Amenity::orderBy('created_at', 'desc')->get();
        return view('admin.amenity.amenities', compact('amenities'));
    }

    //---------------------------------------------------------------------------------------------------------

    public function create()
    {
        return view('admin.amenity.add-amenity');
    }

    //---------------------------------------------------------------------------------------------------------


    public function store(AmenityRequest $request, ImageService $imageService)
    {
        try {
            $inputs = $request->validated();

            if ($request->hasFile('icon')) {

                $path = $imageService->uploadImage($request->file('icon'), "images/icons");
                $inputs['icon'] = $path;
            }

            Amenity::create($inputs);
            return redirect()->route('admin.amenity.index')->with('toast-success', 'امکان رفاهی با موفقیت اضافه شد');

        } catch (Exception $e) {
            return redirect()->route('admin.amenity.index')->with('toast-error', 'امکان رفاهی با خطا مواجه شد');
        }
    }

    //---------------------------------------------------------------------------------------------------------



    function edit(Amenity $amenity)
    {
        return view('admin.amenity.edit', compact('amenity'));
    }

    //---------------------------------------------------------------------------------------------------------


    public function update(AmenityRequest $request, Amenity $amenity, ImageService $imageService)
    {

        try {

            $inputs = $request->validated();

            if ($request->file('icon')) {

                if (!empty($amenity->icon)) {
                    $imageService->removeImage($amenity->icon);
                }

                $path = $imageService->uploadImage($request->file('icon'), "images/icons");
                $inputs['icon'] = $path;
            }

            $amenity->update($inputs);

            return redirect()->route('admin.amenity.index')->with('toast-success', 'ویرایش امکانات رفاهی با موفقیت انجام شد');
        } catch (Exception $e) {

            return redirect()->route('admin.amenity.index')->with('toast-error', 'ویرایش امکانات رفاهی با خطا مواجه شد');
        }
    }

    //---------------------------------------------------------------------------------------------------------

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return back();
    }
}
