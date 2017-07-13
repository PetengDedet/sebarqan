<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);

Route::get('login', ['as' => 'login', 'uses' => 'HomeController@login']);
Route::get('register', ['as' => 'register', 'uses' => 'HomeController@login']);
Route::post('register', ['as' => 'register.post', 'uses' => 'HomeController@registerPost']);
Route::post('login-check', ['as' => 'login-check', 'uses' => 'HomeController@loginCheck']);

Route::group(['middleware' => 'auth'], function (){
    Route::post('logout', ['as' => 'loout', 'uses' => 'HomeController@logout']);
    Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
    Route::post('profile', ['as' => 'profile.post', 'uses' => 'UserController@updateProfile']);

});
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdmController@dashboard']);

    //Product
    Route::get('product', ['as' => 'product', 'uses' => 'ProductController@index']);
    Route::get('new-product', ['as' => 'new-product', 'uses' => 'ProductController@create']);
    Route::post('new-product', ['as' => 'new-product.post', 'uses' => 'ProductController@store']);

    //Category
    Route::get('category', ['as' => 'category', 'uses' => 'CategoryController@index']);
    Route::post('category', ['as' => 'category.post', 'uses' => 'CategoryController@store']);
});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
