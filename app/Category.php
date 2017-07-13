<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    public function product() {
        return $this->hasMany('\App\CategoryProduct', 'category_id');
    }

}
