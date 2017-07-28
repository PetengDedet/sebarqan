<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhistList extends Model
{
    //
    protected $table = 'whist_list';
    protected $fillable = [
        'user_id',
        'variant_id'
    ];

    public function variant() {
        return $this->belongsTo('\App\ProductVariant', 'variant_id');
    }

    public function user() {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
