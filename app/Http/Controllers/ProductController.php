<?php

namespace App\Http\Controllers;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\ProductLaptopFilter;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId) {
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);

            $products = $category->allProducts();
        }else{
            $products = Product::take(30)->get();
        }

        return view('product.index', compact('products', 'categoryName'));
    }

    public function search(Request $request)
    {

        $query = $request->input('query', 'query');

        $products = Product::where('price','LIKE',"%$query%")->paginate(10);


        return view('product.catalog',compact('products'));
    }

    public function filter(ProductsFilterRequest $request)
    {
        $date = $request->validated();
        $filter =app(AbstractFilter::class,['queryParams'=> array_filter($date)]);
        $product = Product::filter($filter)->get();

    return  view ('product.catalog', compact('product'));
    }

    public function show(Product $products)
    {

        return view('product.show', compact('products'));

    }


}
