<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Validator;

use App\Personalisasi;

class PersonalisasiController extends Controller
{
    //
    public function index(Request $request) {
        $personalisasi = Personalisasi::all();
        return view('admin.personalisasi.index', compact('personalisasi'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->All(), [
            'jenis' => 'required|in:Jenis Kulit,Jenis Rambut,Kebutuhan Kulit,Kebutuhan Rambut',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        $exist = Personalisasi::where('slug', str_slug($request->name))->first();

        if (count($exist) > 0) {
            return redirect()->back()
                ->withInput()
                ->with('msg', '<div class="alert alert-danger">Nama sudah ada di dalam database</div>');
        }

        try{
            Personalisasi::create([
                'jenis' => $request->jenis,
                'name' => $request->name,
                'slug' => str_slug($request->jenis . ' ' . $request->name),
                'description' => $request->description
            ]);

        }catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('msg', '<div class="alert alert-danger">Gagal menyimpan</div>');
        }

        return redirect()->back()
            ->with('msg', '<div class="alert alert-success">Berhasil menambah personalisasi</div>');
    }
}
