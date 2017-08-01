<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $fillable = ['name', 'slug', 'description', 'parent_id'];

    public function productCat() {
        return $this->hasMany('\App\CategoryProduct', 'category_id');
    }

    public function parent() {
        return $this->belongsTo('\App\Category', 'parent_id');
    }

    public function children() {
        return $this->hasMany('\App\Category', 'parent_id');
    }
}
