<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response($categories,200);

    }
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response($category,200);
    }

    public function show(Category $category)
    {
        return response($category,200);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response($category,200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response($category,200);
    }
}
