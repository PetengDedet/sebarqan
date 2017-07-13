<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'category_product';

    public function category() {
        return $this->belongsTo('\App\Category', 'category_id');
    }

    public function product() {
        return $this->belongsTo('\App\Product', 'product_id');
    }
}
