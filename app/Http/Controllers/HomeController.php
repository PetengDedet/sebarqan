<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use Hash;

use App\User;
use App\Product;
use App\ProductVariant;

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
        //Recommended Product Slider
        //Personalized
        $recommended = Product::where('published', 1)
            //->where('recommended', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(config('admin.recommended_product_num'))
            ->get();

        //Hot Deals Slider
        $hot_deal = Product::where('published', 1)
            ->where('hot_deal', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(config('admin.hot_deal_num'))
            ->get();

        $under_price = ProductVariant::with(['product' => function($q){
                $q->where('published', 1);
            }])
            ->where('price', '<', config('admin.under_price.limit'))
            ->orderBy('updated_at', 'DESC')
            ->distinct('product_id')
            ->take(config('admin.under_price.num'))
            ->get();

        //Product Baru
        $product_baru = Product::where('published', 1)
            ->where('new', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(config('admin.new_product_num'))
            ->get();

        return view('home', compact('recommended', 'hot_deal', 'under_price', 'product_baru'));
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
