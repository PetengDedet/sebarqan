<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personalisasi extends Model
{
    //
    protected $table = 'personalisasi';
    protected $fillable = [
        'jenis', 'name', 'slug', 'description'
    ];
}
