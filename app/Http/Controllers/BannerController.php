<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //

    public function index(Request $request) {
        return view('admin.banner.index');
    }
}
