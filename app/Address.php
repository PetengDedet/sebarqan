<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $fillable = [
        'jalan',
        'user_id',
        'alamat',
        'kota',
        'zip_code'
    ];

    public function user() {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
