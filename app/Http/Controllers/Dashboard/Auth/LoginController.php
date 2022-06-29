<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        $remember_me = $request->has('remember_me');
        if(auth()->guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ], $remember_me)) {
            $request->session()->regenerate();
            return redirect()->route('admin-dashboard');
        }
//        return $request->messages();
        return redirect()->route('admin-login');
    }

    public function _login() {
        return view('dashboard.auth.login');
    }

}
