<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    protected $table = 'provinsi';
    protected $primaryKey = 'id_prov';

    public function kabupaten() {
        return $this->hasMany('\App\Kabupaten', 'id_prov');
    }
}
