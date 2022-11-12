<?php

namespace App\Http\Controllers;

class MainController extends Controller

{
//    public function index(ProductsFilterRequest $request)
//{
//    $skusQuery = Sku::with(['product', 'product.category']);
//
//    if ($request->filled('price_from')) {
//        $skusQuery->where('price', '>=', $request->price_from);
//    }
//
//    if ($request->filled('price_to')) {
//        $skusQuery->where('price', '<=', $request->price_to);
//    }
//
//    foreach (['hit', 'new', 'recommend'] as $field) {
//        if ($request->has($field)) {
//            $skusQuery->whereHas('product', function ($query) use ($field) {
//                $query->$field();
//            });
//        }
//    }
//
//    $skus = $skusQuery->paginate(6)->withPath("?".$request->getQueryString());
//
//    return view('index', compact('skus'));
//}
}
