<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    //
    public function index(Request $request) {
        return view('admin.email.index');
    }
}
