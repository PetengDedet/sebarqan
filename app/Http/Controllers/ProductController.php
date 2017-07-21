<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use Hash;
use Hashids;
use Image;
use Illuminate\Support\Facades\Input;
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
        $product = Product::orderBy('updated_at', 'DESC')->get();
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
            'product_picture.*' => 'required|image',
            'product_description' => 'max:9000',
            'product_slug' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $existing_slug = Product::where('url', str_slug($request->product_name))->count();
        if ($existing_slug > 0) {
            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Produk dengan url yang sama telah ada.</div>');
        }

        //Product
        $product = new Product();
        $product->name = $request->product_name;
        $product->slug = $request->product_slug;
        $product->url = str_slug($request->product_name);
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

        //Foto
        foreach ($request->pictures as $k => $v) {
            if (Storage::disk('public')->exists('product_photo/' . $v)) {
                $extension = explode('.', $v);
                $newName = str_slug($product->name) . '_' . str_random(4) . '.' . $extension[count($extension)-1];
                Storage::disk('public')->move('product_photo/' . $v, 'product_photo/' . $newName);
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'path' => $newName,
                    'thumbnail_path' => $newName,
                    'alt' => $product->slug,
                    'is_featured' => ($k == 0) ? 1 : 0,
                ]);
            }
        }

        return redirect(url('admin/product'))->with('msg', '<div class="alert alert-success">Berhasil menambah product baru</div>');

    }

    public function uploadProductPict(Request $request) {



        foreach ($request->product_picture as $k => $v) {
            $extension = $v->extension();
            $directory = storage_path('app/product_photo');
            $filename = sha1(time().time()).".{$extension}";

            //TODO:upload
            //$upload_success = Input::upload('file', $directory, $filename);
            $path = $v->storeAs('product_photo', $filename, 'public');

            if( $path) {
                return response()->json(['status' => 'success', 'data' => explode('/', $path)[1]], 200);
            } else {
                return response()->json(['status' => 'error', 'data' => null], 400);
            }
        }

    }

    public function detail(Request $request) {
        $product = Product::with('category.category')->with('variant')->with('photo')->findOrFail($request->id);

        return view('admin.product.single', compact('product'));
    }

    public function showPublic(Request $request)
    {
        $product = Product::where('slug', $request->slug)->first();
        if (count($product) == 0) {
            abort(404);
        }

        return view('product.single', compact('product'));
    }

    public function getNewProduct(Request $request) {

        $response = [
            'status' => false,
            'data' => '',
            'message' => ''
        ];

        $take = (null != $request->take) ? $request->take : 0;
        $skip = (null != $request->skip) ? $request->skip : 0;

        //Product Baru
        $product_baru = Product::with('category.category')
            ->with('variant')
            ->with('photo')
            ->where('published', 1)
            ->where('new', 1)
            ->orderBy('updated_at', 'DESC')
            ->take($take)
            ->skip($skip)
            ->get();

        if (count($product_baru) > 0) {
            $response['status'] = true;
            $response['data'] = $product_baru;

            foreach ($product_baru as $k => $v) {
                $response['data'][$k]['rate'] = $v->rate;
                $response['data'][$k]['discount'] = number_format($v->discount, 0, '.', '.');
                $response['data'][$k]['primePhoto'] = $v->primePhoto;
            }

        }

        return response()->json($response, 200);
    }
}
