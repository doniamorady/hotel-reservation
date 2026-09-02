<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Bed\BedUpdateRequest;
use App\Http\Requests\Api\Bed\CreateRequest;
use App\Models\Bed;
use Illuminate\Http\Request;

class BedController extends Controller
{

    public function index()
    {
        return view('admin.bed.beds');
    }

    //-------------------------------------------------------------------
    public function create()
    {
        return view('admin.bed.add-bed');
    }

    //-------------------------------------------------------------------

    public function store(CreateRequest $request)
    {
        $input = $request->validated();
        // dd($input);
        Bed::create($input);
        return redirect()->route('admin.bed.index')->with('toast-success', 'تخت با موفقیت اضافه شد.');
    }

    //-------------------------------------------------------------------

    public function edit(Bed $bed)
    {
        return view('admin.bed.edit', compact('bed'));
    }
  
    //-------------------------------------------------------------------

    public function update(BedUpdateRequest $request, Bed $bed)
    {
        $input = $request->validated();
        $bed->update($input);
        return redirect()->route('admin.bed.index')->with('toast-success', 'تخت با موفقیت ویرایش شد.');
    }

    //-------------------------------------------------------------------

    public function destroy(Bed $bed)
    {
        $bed->delete();
        return redirect()->route('admin.bed.index')->with('toast-success', 'تخت با موفقیت حذف شد.');
    }
}




 
