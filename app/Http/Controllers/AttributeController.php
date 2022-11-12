<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class  AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::take(5)->get();

        return view('product._single_product', ['allAttribute' => $attributes]);
    }
}
