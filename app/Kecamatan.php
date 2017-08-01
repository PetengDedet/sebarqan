<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kec';

    public function kabupaten() {
        return $this->belongsTo('\App\Kabupaten', 'id_kab');
    }

    public function kelurahan() {
        return $this->hasMany('\App\Kelurahan', 'id_kec');
    }
}
