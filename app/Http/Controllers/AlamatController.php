<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;

class AlamatController extends Controller
{
    public function getAllProvince(Request $request) {
        $response = [
            'status' => true,
            'data' => [],
            'message' => ''
        ];

        $response['data'] = Provinsi::all();

        return response()->json($response, 200);
    }

    public function getProvince(Request $request) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $data = Provinsi::with('kabupaten')->findOrFail($request->id);
        $response['status'] = true;
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function getKab(Request $request) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $data = Kabupaten::with('kecamatan')->findOrFail($request->id);
        $response['status'] = true;
        $response['data'] = $data;

        return response()->json($response, 200);
    }

    public function getKec(Request $request) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $data = Kecamatan::with('kelurahan')->findOrFail($request->id);
        $response['status'] = true;
        $response['data'] = $data;

        return response()->json($response, 200);
    }


    public function getKel(Request $request) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $data = Kelurahan::findOrFail($request->id);
        $response['status'] = true;
        $response['data'] = $data;

        return response()->json($response, 200);
    }
}
