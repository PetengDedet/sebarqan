<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use Mockery\Exception;
use Validator;
use Session;
use Auth;
use Hash;
use Hashids;
use Image;
use DB;

use App\Product;
use App\Category;
use App\ProductVariant;
use App\CategoryProduct;
use App\ProductPhoto;
use App\ProductRelation;
use App\ProductPersonalisasi;
use App\Personalisasi;


class ProductController extends Controller
{
    public function index(Request $request) {
        $product = Product::orderBy('updated_at', 'DESC')->get();
        return view('admin.product.index', compact('product'));
    }

    public function create(Request $request) {
        $category = Category::all();
        $product = Product::all();
        $personalisasi = Personalisasi::orderBy('jenis', 'DESC')->get();

        return view('admin.product.create', compact('category', 'product', 'personalisasi'));
    }

    public function store(Request $request) {

//        dd($request->weight);

        $validator = Validator::make($request->All(), [
            'product_name' => 'required|max:255',
            'product_price' => 'required|integer|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_sku' => 'required|unique:product_variant,code',
            'product_category' => 'required',
            'product_picture.*' => 'required|image',
            'product_description' => 'max:9000',
            // 'product_slug' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $existing_slug = Product::where('url', str_slug($request->product_name))->count();
        if ($existing_slug > 0) {
            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Produk dengan url yang sama telah ada.</div>');
        }

        DB::beginTransaction();

        //Product
        try {
            $product = Product::create([
                'name' => $request->product_name,
                'slug' => str_slug($request->product_name),
                'url' => str_slug($request->product_name),
                'brand' => $request->product_brand,
                'weight' => $request->product_weight,
                'width' => $request->product_width,
                'length' => $request->product_length,
                'height' => $request->product_height,
                'tags' => $request->product_tags,
                'page_title' => $request->product_page_title,
                'meta_description' => $request->product_meta_description,
                'meta_keywords' => $request->product_meta_keywords,

                'featured' => $request->product_featured,
                'new' => $request->product_new,
                'hot_deal' => $request->hot_deal,
                'allow_pre_order' => $request->product_allow_pre_order,
                'ignore_stock' => $request->product_ignore_stock,
                'published' => $request->product_published,

                'description' => $request->product_description,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Gagal menyimpan produk</div>');
        }

        //Category
        try {
            if (is_array($request->product_category)) {
                foreach ($request->product_category as $k => $v) {
                    if ($v !== null AND strlen($v) > 0) {
                        $categoryProduct = new CategoryProduct();
                        $categoryProduct->product_id = $product->id;
                        $categoryProduct->category_id = $v;
                        $categoryProduct->save();
                    }
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Gagal menyimpan kategori produk</div>');
        }

        //dd($request);

        //Varian
        try {
            $start = null;
            $end = null;
            if (null != $request->product_sale_period) {
                $start = Carbon::parse(trim(explode('-', $request->product_sale_period, 10)[0], ' '));

                if (strlen($start) > 0) {
                    $end = Carbon::parse(trim(explode('-', $request->product_sale_period, 10)[1], ' '));
                }
            }

            $productVarian = ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => 'Original',
                'qty' => $request->product_stock,
                'price' => $request->product_price,
                'sale_price' => ($request->product_sale_price != null AND $request->product_sale_price > 0) ? $request->product_sale_price : null,
                'sale_price_start' => $start,
                'sale_price_end' => $end,
                'size' => $request->product_size,
                'color' => $request->product_color,
                'code' => $request->product_sku,
                'weight' => $request->product_weight,
                'height' => $request->product_height,
                'length' => $request->product_length,
                'width' => $request->product_width,
            ]);

        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Gagal menyimpan produk v</div>');
        }

        DB::commit();

        //Foto
        try {
            if (is_array($request->pictures)) {
                foreach ($request->pictures as $k => $v) {
                    if (Storage::disk('public')->exists('product_photo/' . $v)) {
                        $extension = explode('.', $v);
                        $newName = str_slug($product->name) . '_' . str_random(4) . '.' . $extension[count($extension) - 1];
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
            }
        }catch (Exception $e) {
            DB::commit();
        }

        if (is_array($request->related_product)) {
            foreach ($request->related_product as $k => $v) {
                try {
                    ProductRelation::updateOrCreate(
                        [
                            'product_id' => $product->id
                        ],
                        [
                            'relation_id' => $v
                        ]
                    );
                }catch (Exception $e) {
                    DB::commit();
                }
            }
        }

        if (is_array($request->product_personalisasi)) {
            foreach ($request->product_personalisasi as $k => $v) {
                try {
                    ProductPersonalisasi::updateOrCreate(
                        [
                            'product_id' => $product->id
                        ],
                        [
                            'personalisasi_id' => $v
                        ]
                    );
                }catch (Exception $e) {
                    DB::commit();
                }
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
        if (count($product) == 0 OR $product->published != 1) {
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
                $response['data'][$k]['rateCount'] = $v->rating->count();
                $response['data'][$k]['discount'] = number_format($v->discount, 0, '.', '.');
                $response['data'][$k]['primePhoto'] = $v->primePhoto;
            }

        }

        return response()->json($response, 200);
    }

    public function newProduct(Request $request) {
        $newProduct = Product::where('published', 1)
            ->where('new', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(1)
            ->get();

        $title = 'Produk Baru';

        return view('product.list', compact('newProduct', 'title'));
    }

    public function publish(Request $request) {
        $validator = Validator::make($request->All(), [
            'id' => 'required'
        ]);

        $product = Product::findOrFail($request->id);
        if ($product->published == 1) {
            return redirect()->back()->with('msg', '<div class="alert alert-danger">Product sudah terpublish</div>');
        }

        $product->published = 1;
        $product->save();

        return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil mempublish <strong>' . title_case($product->name) . '</strong></div>');

    }

    public function unpublish(Request $request) {
        $validator = Validator::make($request->All(), [
            'id' => 'required'
        ]);

        $product = Product::findOrFail($request->id);
        if ($product->published != 1) {
            return redirect()->back()->with('msg', '<div class="alert alert-danger">Product sedang tidak terpublish</div>');
        }

        $product->published = null;
        $product->save();

        return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil mem-unpublish <strong>' . title_case($product->name) . '</strong></div>');
    }

    public function addVarian(Request $request) {
        $product = Product::findOrFail($request->id);

        return view('admin.product.add_varian', compact('product'));
    }
    public function addVarianSave(Request $request) {
        $validator = Validator::make($request->All(), [
            'id' => 'required|integer',
            'variant_name' => 'required|max:255',
            'variant_code' => 'required|max:255|unique:product_variant,code',
//            'variant_color' => 'sometimes|max:255',
            'variant_price' => 'required|integer|min:0',
//            'variant_sale_price' => 'sometimes|integer|min:0',
            'variant_stock' => 'required|integer|min:0',
//            'variant_weight' => 'sometimes|min:0',
//            'variant_height' => 'sometimes|min:0',
//            'variant_width' => 'sometimes|min:0',
//            'variant_length' => 'sometimes|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        DB::beginTransaction();

        $start = Carbon::now();
        $end = Carbon::now();
        if (null != $request->variant_sale_period) {
            $start = Carbon::parse(trim(explode('-', $request->variant_sale_period, 10)[0], ' '));

            if (strlen($start) > 0) {
                $productVarian->sale_price_start = $start;
                $end = Carbon::parse(trim(explode('-', $request->variant_sale_period, 10)[1], ' '));
                $productVarian->sale_price_end = $end;
            }
        }

        //Varian
        try {
            $productVarian = ProductVariant::updateOrCreate(
                ['product_id' => $request->id, 'code' => $request->variant_code],
                [
                    'variant_name' => $request->variant_name,
                    'qty' => $request->variant_stock,
                    'price' => $request->variant_price,
                    'weight' => $request->variant_weight,
                    'width' => $request->variant_width,
                    'length' => $request->variant_length,
                    'height' => $request->variant_height,
                    'sale_price' => ($request->variant_sale_price != null AND $request->variant_sale_price > 0) ? $request->variant_sale_price : null,
                    'sale_price_start' => $start,
                    'sale_price_end' => $end
                ]
            );
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Gagal menyimpan produk Varian baru</div>');
        }

        DB::commit();

        return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil menambah variant baru</div>');
    }
}
