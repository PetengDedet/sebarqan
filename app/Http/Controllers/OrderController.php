<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;

use App\OrderItem;
use App\Order;
use App\ProductVariant;
use Cart;

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
//        dd(Cart::getSubTotal());
        $cartCollection = Cart::getContent();
        return view('cart', compact('cartCollection'));
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
