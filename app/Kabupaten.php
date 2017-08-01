<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kab';

    public function provinsi() {
        return $this->belongsTo('\App\Provinsi', 'id_prov');
    }

    public function kecamatan() {
        return $this->hasMany('\App\Kecamatan', 'id_kab');
    }
}
