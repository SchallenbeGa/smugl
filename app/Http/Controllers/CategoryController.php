<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    { 
        $products = \App\Models\Product::where('category_id',$category->id)->get();
        return view('category.show', compact('category', 'products'));
    }
    public function create(){
        return view('category.create');
    }
    public function store(){
        return request()->all();
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }
    public function update($id){
        $category = Category::findOrFail($id);
        $category->name = request('name');
        $category->save();
        return redirect('/categories');
    }
    public function delete($id){
        Category::find($id)->delete();
    }
}
