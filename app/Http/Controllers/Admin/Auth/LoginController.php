<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin')
            ->only(['logout']);

        $this->middleware('guest:admin')
            ->only(['login', '_login']);
    }

    public function login(LoginRequest $request) {
        if($this->attempt($request)) {
            $request->session()->regenerate();
            return redirect()->route('admin-dashboard');
        }
        return redirect()->route('admin-login')->with(['auth_error' => 'Wrong username or password.']);
    }

    private function attempt(LoginRequest $request) {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' ;
        $rememberMe = $request->has('remember_me');
        return auth()->guard('admin')->attempt([
            $fieldType => $request->input('username'),
            'password' => $request->input('password'),
        ], $rememberMe);
    }

    public function _login() {
        return view('admin.auth.login');
    }

    public function logout() {
        $guard = auth()->guard('admin');
        if($guard->check()) {
            $guard->logout();
            return redirect()->route('admin-login');
        }
    }

}
