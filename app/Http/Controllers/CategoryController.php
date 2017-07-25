<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(Request $request) {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->All(), [
            'category_name' => 'required|max:255',
            'category_description' => 'max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $existingSlug = Category::where('slug', str_slug($request->category_name))->count();
        if ($existingSlug > 0) {
            return redirect()->back()->withInput()->with('msg', '<div class="alert alert-danger">Kategori <strong><em>"' . $request->category_name . '"</em></strong> sudah ada</div>');
        }

        $category = new Category();
        $category->name = $request->category_name;
        $category->slug = str_slug($request->category_name);
        $category->description = $request->category_description;

        if ($category->save()) {
            return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil menyimpan kategori</div>');
        }
    }

    public function singleCategory(Request $request) {

        if ($request->slug == 'produk-baru') {
            return redirect(url('new-product'));
        }

        $category = Category::where('slug', $request->slug)->first();
        if (count($category) == 0) {
            abort(404);
        }

        return view('category.list', compact('category'));
    }
}
