<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'status',
        'alamat_pengiriman',
        'alamat_penagihan',
        'catatan',
        'jasa_pengiriman',
        'paket_pengiriman',
        'metode_pembayaran',
        'bank_tujuan',
        'kupon_id',
        'jenis_kupon',
    ];

    public function getHashidAttribute() {
        return Hashids::connection('order')->encode($this->attributes['id']);
    }


    public function user() {
        return $this->belongsTo('\App\User', 'customer_id');
    }

    public function item(){
        return $this->hasMany('\App\OrderItem', 'order_id');
    }

    public function getGrandTotalAttribute() {
        $grandTotal = 0;
        foreach ($this->item as $k => $v) {
            $grandTotal += $v->qty * $v->variant->sale_price;
        }

        return $grandTotal;
    }
}
