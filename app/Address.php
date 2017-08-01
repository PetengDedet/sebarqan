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
        'zip_code',
        'propinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'nama_depan',
        'nama_belakang',
        'no_hp',
    ];

    public function user() {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
