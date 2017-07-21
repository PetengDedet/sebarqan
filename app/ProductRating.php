<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    //
    protected $table = 'product_rating';

    public function product() {
        return $this->belongsTo('\App\Product', 'product_id');
    }
}
