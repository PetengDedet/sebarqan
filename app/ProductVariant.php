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


    public function getDiscountAttribute() {
        $discount = 0;

        $selisih = $this->attributes['price'] - $this->attributes['sale_price'];

        if($selisih > 0){
            $discount = $selisih / $this->attributes['price'] * 100;
        }

        return $discount;
    }
}
