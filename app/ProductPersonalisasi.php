<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPersonalisasi extends Model
{
    //
    protected $table = 'product_personalisasi';
    protected $fillable = [
        'product_id', 'personalisasi_id'
    ];
}
