<?php
/**
 * Created by PhpStorm.
 * User: glam/ ikhwan.post@gmail.com
 * Date: 7/21/17
 * Time: 09:05
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Configuration
    |--------------------------------------------------------------------------
    |
    |Used for any default value in admin behavior
    |
    */

    'recommended_product_num' => env('RECOMMENDED_PRODUCT_NUM', 6),
    'hot_deal_num' => env('HOT_DEAL_NUM', 3),
    'under_price' => [
        'limit' => env('UNDER_PRICE', 20000),
        'num' => env('UNDER_PRICE_NUM', 3)
    ],
    'new_product_num' => env('NEW_PRODUCT_NUM', 2),
    'best_seller_num' => env('BEST_SELLER_NUM', 3),
    'default_blank_product' => env('DEFAULT_BLANK_PHOTO', 'zonk_box.png'),
    'app' => [
        'facebook' => [
            'id' => env('FACEBOOK_APP_ID', '')
        ],
    ],
];