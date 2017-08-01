<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Mockery\Exception;
use Session;
use Validator;
use Auth;
use Cart;
use DB;
use Hashids;

use App\OrderItem;
use App\Order;
use App\ProductVariant;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;

class OrderController extends Controller
{
    public function incrementIsiKeranjang(Request $request) {
        //$request->session()->flush();
        //return 'sa';

        $response = [
            'status' => false,
            'data' => '',
            'message' => ''
        ];

        $validator = Validator::make($request->All(), [
            'variant_id' => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['variant_id dan qty tidak boleh kosong'], 200);
        }

        $variant = ProductVariant::findOrFail($request->variant_id);

        //Produk yang dikirim tidak valid
        if ($variant->product->published != 1) {
            $response['message'] = 'Produk tidak valid p';
            return response()->json($response, 400);
        }

        //Produk stock tidak mencukupi
        if ($variant->qty < $request->qty AND $variant->product->allow_pre_order != 1) {
            $response['message'] = 'Stok tidak mencuaskupi';
            return response()->json($response, 400);
        }


        if ($variant->qty < $request->qty) {

            $response['message'] = 'Maaf, Stok tidak mencukupi';
            return response()->json($response, 200);
        }


        //Cart
        if( null == Cart::get($variant->id)) {

            //Buat cart baru
            try {
                Cart::add([
                    'id' => $variant->id,
                    'name' => $variant->product->name . ' - ' . $variant->variant_name,
                    'price' => $variant->price,
                    'quantity' => $request->qty
                ]);

                $newCart = Cart::get($variant->id);

                $response['status'] = true;
                $response['data'] = $newCart;

            }catch(Exception $e) {
                $response['status'] = true;
                $response['message'] = 'Gagal membuat cart';
                return response()->json($response, 200);
            }

        }else{
            
            $currentQty = (int) Cart::get($variant->id)['quantity'];
            
            //Stok tidak mencukupi jika ditambah dengan qty yang baru
            if ($variant->qty < ($currentQty + $request->qty)) {
                $response['message'] = 'Stok tidak mencukupi';
                return response()->json($response, 200);
            }
            

            try {
                //Update cart
                Cart::update($variant->id,
                    [
                       'quantity' => [
                           'relative' => false,
                           'value' => $currentQty + $request->qty
                       ]
                    ]
                );

                $response['status'] = true;
                $updatedCart = Cart::get($variant->id);
                $response['data'] = $updatedCart;

            }catch(Exception $e) {

                $response['message'] = 'Gagal mengupdate cart';
                return response()->json($response, 200);
            }
        }

        //Final data
        return response()->json($response, 200);
    }

    public function cart(Request $request) {
        $cartCollection = Cart::getContent();
        return view('cart', compact('cartCollection'));
    }

    public function checkout(Request $request) {
        if (Cart::isEmpty()) {
            return redirect(url('cart'));
        }

        $provinsi = Provinsi::all();

        $cart = Cart::getContent();
        $user = Auth::user();
        return view('checkout', compact('cart', 'provinsi', 'user'));
    }

    public function transactionHistory(Request $request) {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->id)
                ->orderBy('updated_at', 'DESC')
                ->paginate(2);

        return view('user.transaction-history', compact('user', 'orders'));
    }

    public function checkoutPost(Request $request) {
        $validator = Validator::make($request->All(), [
            'courier' => 'required',
            'courier_type' => 'required',
            'payment_bank' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }


        $items = Cart::getContent();

        $provinsi_id = Auth::user()->alamat['provinsi']['id'];
        $provinsi_nama = Auth::user()->alamat['provinsi']['nama'];
        $kabupaten_id = Auth::user()->alamat['kabupaten']['id'];
        $kabupaten_nama = Auth::user()->alamat['kabupaten']['nama'];
        $kecamatan_id = Auth::user()->alamat['kecamatan']['id'];
        $kecamatan_nama = Auth::user()->alamat['kecamatan']['nama'];
        $kelurahan_id = Auth::user()->alamat['kelurahan']['id'];
        $kelurahan_nama = Auth::user()->alamat['kelurahan']['nama'];
        $kelurahan_nama = Auth::user()->alamat['kelurahan']['nama'];
        $alamat = Auth::user()->alamat['alamat'];
        $kode_pos = Auth::user()->alamat['kode_pos'];
        $phone = Auth::user()->phone;

        $alamat_pengiriman = Auth::user()->full_name . '<br>' .
                                $alamat . '<br>' .
                                $kelurahan_nama . ' - ' . $kecamatan_nama . ' - ' . $kabupaten_nama . '<br>' .
                                strtoupper($provinsi_nama) . ' ' . $kode_pos . '<br>' .
                                $phone;

        $alamat_penagihan = $alamat_pengiriman;

        if(null != $request->alamat_pengiriman) {
            $provinsi_id = $request->provinsi_id;
            $provinsi_nama = $request->provinsi_nama;
            $kabupaten_id = $request->provinsi_;
            $kabupaten_nama = $request->provinsi_id;
            $kecamatan_id = $request->provinsi_id;
            $kecamatan_nama = $request->provinsi_id;
            $kelurahan_id = $request->provinsi_id;
            $kelurahan_nama = $request->provinsi_id;
            $kelurahan_nama = $request->provinsi_id;
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'customer_id' => Auth::user()->id,
                'status' => 0,
                'alamat_pengiriman' => $alamat_pengiriman,
                'alamat_penagihan' => $alamat_penagihan,
                'catatan' => $request->catatan,
                'jasa_pengiriman' => $request->courier,
                'paket_pengiriman' => $request->courier_type,
                'metode_pembayaran' => 'transfer',
                'bank_tujuan' => $request->payment_bank,
                'kupon_id' => null,
                'jenis_kupon' => null,
            ]);
        }catch (Exception $e) {
            DB::rollback();
            return 'Error';
        }


        //Order Item
        foreach ($items as $k => $v) {
            $variant = ProductVariant::find($v->id);

            try {
                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $variant->product->id,
                    'variant_id' => $variant->id,
                    'qty' => $v->quantity
                ]);
            }catch (Exception $e) {
                DB::rollback();
                return 'Gagal menyimpan item';
            }

            try {
                $variant->qty = $variant->qty - $v->quantity;
                $variant->save();
            }catch (Exception $e) {
                DB::rollback();
                return 'Gagal mengurangi stok';
            }
        }

        try {
            Cart::clear();
        }catch (Exception $e) {
            DB::rollback();
            return 'Error mengosongkan cart';
        }

        DB::commit();

        return redirect(url('transaction-history'))->with('msg', '<div class="alert alert-success">Transaksi Berhasil. Silahkan Melakukan pembayaran order anda.</div>');
    }

    public function details(Request $request) {
        $hashid = Hashids::connection('order')->decode($request->hashid);
        if (count($hashid) == 0) {
            abort(404);
        }

        $order = Order::with('item')->findOrFail($hashid[0]);

        return response()->json($order, 200);
    }

//    public function incrementIsiKeranjangOld(Request $request){
////        $request->session()->forget('keranjang');
////        dd(! is_array($request->session()->get('keranjang')));
//        $response = [
//            'status' => false,
//            'data' => '',
//            'message' => ''
//        ];
//
//        $validator = Validator::make($request->All(), [
//            'variant_id' => 'required',
//            'qty' => 'required'
//        ]);
//
//        if ($validator->fails()){
//            return response()->json(['variant_id dan qty tidak boleh kosong'], 200);
//        }
//
//        $variant = ProductVariant::findOrFail($request->variant_id);
//
//        //Produk yang dikirim tidak valid
//        if ($variant->product->published != 1) {
//            $response['message'] = 'Produk tidak valid p';
//            return response()->json($response, 400);
//        }
//
//        //Produk stock tidak mencukupi
//        if ($variant->qty < $request->qty AND $variant->product->allow_pre_order != 1) {
//            $response['message'] = 'Stok tidak mencuaskupi';
//            return response()->json($response, 400);
//        }
//
//
//        //Set Session
//        if (! is_array($request->session()->get('keranjang'))) {
//            //Set new Session
//            $request->session()->put([
//                'keranjang' => [
//                    [
//                        'id' => $variant->id,
//                        'variant_name' => $variant->variant_name,
//                        'product_name' => $variant->product->name,
//                        'qty' => $request->qty
//                    ]
//                ]
//            ]);
//        }else{
//            dd($request->session()->get('keranjang'));
//                foreach ($request->session()->get('keranjang') as $k => $v) {
//                    dd($v['id'] . ' ' . $request->variant_id);
//                    //Variant udah ada di dalam cart
//                    if ($v['id'] == $request->variant_id){
//
////                        dd($request->session()->get('keranjang'));
//
//                        //Kalau stock masih cukup, tambah.
//                        //Kalau tidak cukup, gagal
//                        if ($variant->qty < ($v['qty'] + $request->qty)){
//                            dd( 'stock' . $variant->qty . 'req:' . ($v['qty'] + $request->qty) . ' vqty:' . $v['qty']);
//                            $response['message'] = 'Stok tidak mencukupisss';
//                            return response()->json($response, 400);
//                        }else{
//                            $existing = $v['qty'];
//                            $request->session()->pull('keranjang.' . $k);
//                            $request->session()->push('keranjang', [
//                                'id' => $variant->id,
//                                'variant_name' => $variant->variant_name,
//                                'product_name' => $variant->product->name,
//                                'qty' =>  $existing + $request->qty
//                            ]);
//                        }
//                    }
//                }
//        }
//
//        dd($request->session()->get('keranjang'));
//    }


}
