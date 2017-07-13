<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //
    protected $table = 'product_variant';

    public function product() {
        return $this->belongsTo('\App\Product', 'product_id');
    }
}
