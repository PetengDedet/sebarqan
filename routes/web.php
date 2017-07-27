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

//Produk

Route::get('test', function (){
    return str_slug('Invisible Dry Deodorant Spray');
});

Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);

Route::get('login', ['as' => 'login', 'uses' => 'HomeController@login']);
Route::get('register', ['as' => 'register', 'uses' => 'HomeController@login']);
Route::post('register', ['as' => 'register.post', 'uses' => 'HomeController@registerPost']);
Route::post('login-check', ['as' => 'login-check', 'uses' => 'HomeController@loginCheck']);

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
| Only for authenticated user
|
*/

Route::group(['middleware' => 'auth'], function (){
    Route::post('logout', ['as' => 'loout', 'uses' => 'HomeController@logout']);
    Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
    Route::post('profile', ['as' => 'profile.post', 'uses' => 'UserController@updateProfile']);
});

/*
|--------------------------------------------------------------------------
| ADMIN prefix and middleware
|--------------------------------------------------------------------------
| Only for authenticated admin and route with 'admin' prefix
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdmController@dashboard']);

    //Product
    Route::get('product', ['as' => 'product', 'uses' => 'ProductController@index']);
    Route::get('new-product', ['as' => 'new-product', 'uses' => 'ProductController@create']);
    Route::post('new-product', ['as' => 'new-product.post', 'uses' => 'ProductController@store']);
    Route::post('upload-product-picture', ['as' => 'upload-product-picture', 'uses' => 'ProductController@uploadProductPict']);
    Route::get('product/detail/{id}', ['as' => 'product.detail', 'uses' => 'ProductController@detail']);
    Route::post('publish-product', ['as' => 'publish-product', 'uses' => 'ProductController@publish']);
    Route::post('unpublish-product', ['as' => 'unpublish-product', 'uses' => 'ProductController@unpublish']);
    Route::get('product/add-varian/{id}', ['as' => 'product.add-varian', 'uses' => 'ProductController@addVarian']);
    Route::post('product/add-varian/{id}', ['as' => 'product.add-varian.post', 'uses' => 'ProductController@addVarianSave']);

    //Category
    Route::get('category', ['as' => 'category', 'uses' => 'CategoryController@index']);
    Route::post('category', ['as' => 'category.post', 'uses' => 'CategoryController@store']);

    //Members
    Route::get('members', ['as' => 'members', 'uses' => 'UserController@adminIndex']);

    //Personalisasi
    Route::get('personalisasi', ['as' => 'personalisasi.index', 'uses' => 'PersonalisasiController@index']);
    Route::post('personalisasi', ['as' => 'personalisasi.post', 'uses' => 'PersonalisasiController@store']);

    //Banner
    Route::get('banner', ['as' => 'banner.index', 'uses' => 'BannerController@index']);

    //Email Template
    Route::get('email-template', ['as' => 'email-template.index', 'uses' => 'EmailTemplateController@index']);

    //Kupon
    Route::get('kupon', ['as' => 'kupon.index', 'uses' => 'KuponController@index']);
    Route::get('kupon/tambah-per-produk', ['as' => 'kupon.tambah-per-produk', 'uses' => 'KuponController@tambahPerProduk']);
    Route::get('kupon/tambah-per-paket', ['as' => 'kupon.tambah-per-paket', 'uses' => 'KuponController@tambahPerPaket']);
    Route::get('kupon/tambah-per-kategori', ['as' => 'kupon.tambah-per-kategori', 'uses' => 'KuponController@tambahPerKategori']);
    Route::get('kupon/tambah-per-user', ['as' => 'kupon.tambah-per-user', 'uses' => 'KuponController@tambahPerUser']);
    Route::get('kupon/tambah-ongkir', ['as' => 'kupon.tambah-ongkir', 'uses' => 'KuponController@tambahOngkir']);
    //KuponPost
    Route::post('kupon/tambah-per-produk', ['as' => 'kupon.tambah-per-produk.post', 'uses' => 'KuponController@simpanPerProduk']);

});
//Auth::routes();

//JSON
Route::get('get-new-product/{take?}/{skip?}', ['as' => 'get-new-product.paginate', 'uses' => 'ProductController@getNewProduct']);

Route::get('/home', 'HomeController@index')->name('home');

//Order
Route::post('increment-isi-keranjang', ['as' => 'increment-isi-keranjang.post', 'uses' => 'OrderController@incrementIsiKeranjang']);

//Cart
Route::get('cart', ['as' => 'cart', 'uses' => 'OrderController@cart']);

//New Produk
Route::get('new-product', ['as' => 'new-product', 'uses' => 'ProductController@newProduct']);

//Category
Route::get('category/{slug}', 'CategoryController@singleCategory')->where('slug', '[A-Za-z0-9\_-]+');

//Product Single
Route::get('/{slug}', 'ProductController@showPublic')->where('slug', '[A-Za-z0-9\_-]+');

