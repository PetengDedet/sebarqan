<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $fillable = ['name', 'slug', 'description'];

    public function productCat() {
        return $this->hasMany('\App\CategoryProduct', 'category_id');
    }
}
