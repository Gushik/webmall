<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {

        //$users = User::all();

        $categories = $category->getCategoriesBySearch($request)->get();

        return view('product.catalog', compact('categories'));
    }
}
