<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'id';

    public function category() {
        return $this->hasMany('App\CategoryProduct', 'product_id');
    }

    public function variant() {
        return $this->hasMany('\App\ProductVariant', 'product_id');
    }
}
