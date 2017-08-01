<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Validator;
use Session;
use Auth;

use App\User;
use App\AdminSetting;
use App\Order;
use App\OrderItem;

class AdmController extends Controller
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
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function bank(Request $request) {
        $bank = AdminSetting::where('kunci', 'bank')->get();
        return view('admin.pengaturan.bank', compact('bank'));
    }

    public function simpanBank(Request $request) {
        $validator = Validator::make($request->All(), [
            'nama_bank' => 'required|max:255',
            'nomor_rekening' => 'required|max:255',
            'logo' => 'required|image'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }


        $logoName = '';

        try {

            $extension = $request->file('logo')->extension();
            $directory = storage_path('app/bank');

            $filename = sha1(time().time()).".{$extension}";
            $path = $request->file('logo')->storeAs('bank', $filename, 'public');

            /*
            if ($path) {
                return response()->json(['status' => 'success', 'data' => explode('/', $path)[1]], 200);
            } else {
                return response()->json(['status' => 'error', 'data' => null], 400);
            }
            */

            $logoName = explode('/', $path)[1];

        }catch (Exception $e) {
            return redirect()->back()->with('msg', '<div class="alert alert-danger">Gagal menyimpan logo bank</div>');
        }

        try {
            $data = [
                'slug' => str_slug($request->nama_bank),
                'bank_name' => $request->nama_bank,
                'bank_account' => $request->nomor_rekening,
                'logo' => $logoName
            ];

            $data = json_encode($data);

            AdminSetting::create([
                'kunci' => 'bank',
                'isi' => $data,
                'is_active' => 1
            ]);

        }catch (Exception $e) {
            return redirect()->back()->with('msg', '<div class="alert alert-danger">Gagal menyimpan data bank</div>');
        }

        return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil menyimpan data bank</div>');

    }

    public function orders(Request $request) {
        $orders = Order::OrderBy('updated_at', 'DESC')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
}
