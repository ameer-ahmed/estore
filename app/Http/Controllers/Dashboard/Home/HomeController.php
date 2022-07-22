<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function _home() {
        return view('admin.home.index');
    }
}
