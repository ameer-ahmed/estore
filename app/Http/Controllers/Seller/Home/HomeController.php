<?php

namespace App\Http\Controllers\Seller\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:seller');
    }

    public function _home() {
        return view('seller.home.index');
    }
}
