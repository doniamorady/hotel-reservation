<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return new UserResource($user);
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        $user->update($data);
        return new UserResource($user);
    }
}
