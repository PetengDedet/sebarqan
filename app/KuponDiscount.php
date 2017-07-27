<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuponDiscount extends Model
{
    //
    protected $table = 'kupon_discount';
    protected $fillable = [
        'kupon_id', 'type', 'amount', 'max'
    ];
}
