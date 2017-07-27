<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    //
    protected $table = 'kupon';
    protected $fillable = [
        'kode',
        'slug',
        'gambar',
        'description',
        'type',
        'status',
        'start',
        'end'
    ];
}
