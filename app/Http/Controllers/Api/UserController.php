<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function store(CreateUserRequest $request)
    {
        $inputs = $request->validated();
        if (isset($inputs['password']))
            $inputs['password'] = Hash::make($inputs['password']);
        $newUser = User::create($inputs);
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
    
    
}
