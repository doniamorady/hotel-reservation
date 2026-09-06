<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.user.profile.show-profile', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $data = $request->validated();        
        $user = auth()->user();
        
        if($request->hasFile('avatar') ){
            if($user->avatar && Storage::disk('public')->exists($user->avatar))
                Storage::disk('public')->delete($user->avatar);
            $data['avatar']= $request->file('avatar')->store('avatar', 'public');
        }
        
        $user->update($data);
        return back()->with('toast-success', 'اطلاعات با موفقیت ویرایش شد');
    }
}
