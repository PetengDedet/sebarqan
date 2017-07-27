<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuponPerProduk extends Model
{
    //
    protected $table = 'kupon_per_produk';
    protected $fillable = [
        'kupon_id', 'product_id'
    ];
}
