<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRelation extends Model
{
    //
    protected $table = 'product_relation';
    protected $fillable = [
        'product_id',
        'relation_id'
    ];

    public function product() {
        return $this->belongsTo('\App\Product', 'product_id');
    }

    public function related_product() {
        return $this->belongsTo('\App\Product', 'relation_id');
    }
}
