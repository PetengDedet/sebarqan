<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id', 'variant_name', 'qty',
        'price', 'sale_price', 'sale_price_start',
        'sale_price_end', 'size', 'color',
        'code', 'weight', 'height', 'length', 'width'
    ];

    public function product() {
        return $this->belongsTo('\App\Product', 'product_id');
    }

    public function getDiscountAttribute() {
        $discount = 0;

        $selisih = $this->attributes['price'] - $this->attributes['sale_price'];

        return ($selisih / $this->attributes['price']) * 100;
//        if($selisih > 0){
//            $discount = $selisih / $this->attributes['price'] * 100;
//        }
//
//        return $discount;
    }
}
