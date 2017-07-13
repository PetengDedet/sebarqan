<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\User;


class AuthController extends Controller
{
    //

    public function register(Request $register)
    {
        dd($request);
        $validation = Validator::make($request->All(), [
            'name' => 'required|min:1|max:255',
            'email' => 'required|min:5|max:255|unique:users,email',
            'password' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
    }
}
