<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(AdminAuthRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return back()->withErrors(['password' => 'شماره تلفن یا رمز وارد شده اشتباه است']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }
}
