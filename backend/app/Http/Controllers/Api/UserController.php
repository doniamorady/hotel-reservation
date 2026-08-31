<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function createAdmin(CreateUserRequest $request)
    {
        $inputs = $request->validated();
        if (isset($inputs['password']))
            $inputs['password'] = Hash::make($inputs['password']);
        $newUser = User::create($inputs);
        $newUser->assignRole('admin');
        return new UserResource($newUser);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $inputs = $request->validated();
        $user->update($inputs);
        return new UserResource($user);
    }

    public function changeRole(Request $request, User $user)
    {
        $data = $request->validate(['roles' => ['required', 'exists:roles,name']]);
        $user->syncRoles($data);
        return response()->json([
            'message' => 'update role successfully',
            'user' => new UserResource($user)
        ]);
    }
}
