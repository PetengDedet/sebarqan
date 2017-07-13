<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use Hash;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
        //return view('home');
    }

    public function login(Request $request) {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.register');
    }

    public function loginCheck(Request $request) {

        $validator = Validator::make($request->All(), [
           'email' => 'required|max:255',
           'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            if (Auth::user()->level == 'admin') {
                return redirect()->intended('admin/dashboard');
            }

            return redirect('/');
        }

        return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Incorrect username or password</div>');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->All(), [
           'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'email' => 'required|max:255|email|unique:users',
           'password' => 'required|max:255|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->with('err', $validator->errors()->all());
        }

        if (null != $request->subscribe) {
            //TODO:subscribe newsletter
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->level = 'user';

        if ($user->save()) {
            Auth::login($user);

            return redirect(url('/'));
        }

        return redirect()->back()
                ->withInput()
                ->with('err', $validator->errors()->all());
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
