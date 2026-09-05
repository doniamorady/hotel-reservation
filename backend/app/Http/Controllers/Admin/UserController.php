<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.users');
    }

    public function create()
    {
        return view('admin.user.add-user');
    }

    public function adminStore(CreateUserRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        //all mobile numbers are on format 9** *** ***
        $data['phone'] = preg_replace("/^(\+98|98)/", '0', $data['phone']);

        $data['password'] = Hash::make($data['password']);
        unset($data['password']);

        $user = User::create($data);
        $user->assignRole('admin');
        return redirect()->route('admin.user.index')->with('toast-success', 'کاربر با موفقیت اضافه شد');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact(['user', 'roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        
        $user->syncRoles($data['roles']);
        unset($data['roles']);
        
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar))
                Storage::disk('public')->delete($user->avatar);

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('admin.user.index')->with('toast-success', 'کاربر با موفقیت ویرایش شد');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('toast-success', 'کاربر حذف شد');
    }
}
