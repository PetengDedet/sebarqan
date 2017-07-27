<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

use App\Kupon;
use App\User;
use App\Product;

class KuponController extends Controller
{
    //
    public function index(Request $request) {

        $kupon = Kupon::orderBy('updated_at', 'DESC')->get();
        return view('admin.kupon.index', compact('kupon'));
    }

    public function tambahPerProduk(Request $request) {
        $produk = Product::all();
        return view('admin.kupon.tambah-per-produk', compact('produk'));
    }

    public function tambahPerPaket(Request $request) {

        return view('admin.kupon.tambah-per-paket');
    }

    public function tambahPerKategori(Request $request) {

        return view('admin.kupon.tambah-per-kategori');
    }

    public function tambahPerUser(Request $request) {

        return view('admin.kupon.tambah-per-user');
    }

    public function tambahOngkir(Request $request) {

        return view('admin.kupon.tambah-ongkir');
    }

    public function simpanPerProduk(Request $request) {
        $validator = Validator::make($request->All(), [
            'code' => 'required|max:255|unique:kupon,kode',
            'gambar' => 'sometimes|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


    }
}
