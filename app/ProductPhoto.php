<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    //
    protected $fillable = ['product_id', 'path', 'thumbnail_path', 'alt', 'is_featured'];
}
