<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function _login() {
        return view('seller.auth.login');
    }

    public function login(LoginRequest $request) {
        if($this->attempt($request)) {
            $request->session()->regenerate();
            return redirect()->route('seller-dashboard');
//            return auth()->guard('seller')->user();
        }
        return redirect()->route('seller-login')->with(['auth_error' => 'Wrong username or password.']);
    }

    private function attempt(LoginRequest $request) {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $rememberMe = $request->has('remember_me');
        return auth()->guard('seller')->attempt([
            $fieldType => $request->username,
            'password' => $request->password,
        ], $rememberMe);
    }

    public function logout() {
        $guard = auth()->guard('seller');
        if($guard->check()) {
            $guard->logout();
            return redirect()->route('seller-login');
        }
    }
}
