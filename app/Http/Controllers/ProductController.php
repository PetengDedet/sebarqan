<?php

namespace App\Http\Controllers;

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
        $validator = Validator::make($request->All(), [
            'product_name' => 'required|max:255',
            'product_price' => 'required|integer|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_sku' => 'required|unique:product_variant,code',
            'product_category' => 'required',
            'product_picture.*' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        //Product
        $product = new Product();
        $product->name = $request->product_name;
        $product->slug = str_slug($request->product_name);
        $product->description = $request->product_description;
        $product->save();

        //Category
        $categoryProduct = new CategoryProduct();
        $categoryProduct->product_id = $product->id;
        $categoryProduct->category_id = $request->product_category;
        $categoryProduct->save();

        //Varian
        $productVarian = new ProductVariant();
        $productVarian->product_id = $product->id;
        $productVarian->variant_name = Hashids::encode($product->id);
        $productVarian->qty = $request->product_stock;
        $productVarian->price = $request->product_price;
        $productVarian->code = $request->product_sku;
        $productVarian->save();

        //Upload Foto
        foreach ($request->product_picture as $k => $picture) {
            $filename = $picture->store('product_photo');

            ProductPhoto::create([
                'product_id' => $product->id,
                'path' => $filename,
                'thumbnail_path' => $filename,
                'alt' => $product->slug,
                'is_featured' => ($k == 0) ? 1 : 0,
            ]);
        }
    }
}
