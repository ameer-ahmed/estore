<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function _home() {
        return view('admin.home.index');
    }
}
