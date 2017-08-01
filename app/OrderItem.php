<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'qty'
    ];

    public function order() {
        return $this->belongsTo('\App\Order', 'order_id');
    }

    public function variant() {
        return $this->belongsTo('\App\ProductVariant', 'variant_id');
    }
}
