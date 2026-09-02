<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    //----------------------------------------------------------------------------

    public function login(LoginRequest $request)
    {

        $inputs = $request->validated();

        if (Auth::attempt($inputs)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['login_error'=> 'ایمیل یا رمز عبور اشتباه است.']);
    }

    //----------------------------------------------------------------------------


    public function logout(Request $request)
    {

        //session is valid but user not login
        Auth::logout();

        //delete current session
        $request->session()->invalidate();

        //create new session for guest user
        $request->session()->regenerate();

        return redirect()->route('admin.login-form');
    }
}
