<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use Hash;
use Hashids;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Category;
use App\ProductVariant;
use App\CategoryProduct;
use App\ProductPhoto;

class ProductController extends Controller
{
    public function index(Request $request) {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function create(Request $request) {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request) {
//        dd(Carbon::parse(trim(explode('-', $request->product_sale_period, 10)[0], ' ')));
        $validator = Validator::make($request->All(), [
            'product_name' => 'required|max:255',
            'product_price' => 'required|integer|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_sku' => 'required|unique:product_variant,code',
            'product_category' => 'required',
            'product_picture.*' => 'required|image',
            'product_description' => 'max:9000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        //Product
        $product = new Product();
        $product->name = $request->product_name;
        $product->slug = $request->product_slug;
        $product->brand = $request->product_brand;
        $product->weight = $request->product_weight;
        $product->width = $request->product_width;
        $product->length = $request->product_length;
        $product->height = $request->product_height;
        $product->tags = $request->product_tags;
        $product->page_title = $request->product_page_title;
        $product->meta_description = $request->product_meta_description;
        $product->meta_keywords = $request->product_meta_keywords;
        $product->featured = $request->product_featured;
        $product->new = $request->product_new;
        $product->allow_pre_order = $request->product_allow_pre_order;
        $product->ignore_stock = $request->product_ignore_stock;
        $product->published = $request->product_published;

        $product->description = $request->product_description;
        $product->save();

        //Category
        if (is_array($request->product_category)) {
            foreach ($request->product_category as $k => $v) {
                if($v !== null AND strlen($v) > 0) {
                    $categoryProduct = new CategoryProduct();
                    $categoryProduct->product_id = $product->id;
                    $categoryProduct->category_id = $v;
                    $categoryProduct->save();
                }
            }
        }
        //dd($request);

        //Varian
        $productVarian = new ProductVariant();
        $productVarian->product_id = $product->id;
        $productVarian->variant_name = Hashids::encode($product->id);
        $productVarian->qty = $request->product_stock;
        $productVarian->price = $request->product_price;
        $productVarian->sale_price = $request->product_sale_price;

        if (null != $request->product_sale_period) {
            $start = Carbon::parse(trim(explode('-', $request->product_sale_period, 10)[0], ' '));

            if (strlen($start) > 0) {
                $productVarian->sale_price_start = $start;
                $end = Carbon::parse(trim(explode('-', $request->product_sale_period, 10)[1], ' '));
                $productVarian->sale_price_end = $end;
            }
        }

        $productVarian->code = $request->product_sku;
        $productVarian->save();

        return redirect(url('admin/product'))->with('msg', '<div class="alert alert-success">Berhasil menambah product baru</div>');
        //dd($request);

        //Upload Foto
//        foreach ($request->product_picture as $k => $picture) {
//            $filename = $picture->store('product_photo');
//
//            ProductPhoto::create([
//                'product_id' => $product->id,
//                'path' => $filename,
//                'thumbnail_path' => $filename,
//                'alt' => $product->slug,
//                'is_featured' => ($k == 0) ? 1 : 0,
//            ]);
//        }
    }
}
