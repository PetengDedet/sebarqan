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

        $category = new Category();
        $category->name = $request->category_name;
        $category->slug = str_slug($request->category_name);
        $category->description = $request->category_description;

        if ($category->save()) {
            return redirect()->back()->with('msg', '<div class="alert alert-success">Berhasil menyimpan kategori</div>');
        }
    }
}
