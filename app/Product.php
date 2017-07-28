<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'url',
        'brand',
        'weight',
        'width',
        'length',
        'height',
        'tags',
        'page_title',
        'meta_description',
        'meta_keywords',
        'featured',
        'new',
        'hot_deal',
        'allow_pre_order',
        'ignore_stock',
        'published',
        'description'
    ];

    public function category() {
        return $this->hasMany('App\CategoryProduct', 'product_id');
    }

    public function variant() {
        return $this->hasMany('\App\ProductVariant', 'product_id');
    }

    public function photo() {
        return $this->hasMany('\App\ProductPhoto', 'product_id');
    }

    public function rating() {
        return $this->hasMany('\App\ProductRating', 'product_id');
    }

    public function related() {
        return $this->hasMany('\App\ProductRelation', 'product_id');
    }

    public function getRateAttribute() {
        $rate = 0;
        $productRating = ProductRating::where('product_id', $this->attributes['id'])
            ->avg('rate');

        $rate += $productRating;
        return $rate;
    }

    public function getPrimePhotoAttribute() {
        $primePhoto = asset('assets/images/' . config('admin.default_blank_product', 'zonk_box.png'));

        $prime = ProductPhoto::where('product_id', $this->attributes['id'])
            ->get();

        if (count($prime) > 0) {
            foreach ($prime as $k => $v) {
                if ($v->is_featured == 1 OR $k == 0) {
                    $primePhoto = asset('storage/product_photo/' . $v->path);
                }
            }
        }

        return $primePhoto;
    }
}
