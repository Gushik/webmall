<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductLaptopFilter;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('shop.owner')->take(30)->paginate(15);

        $categories = Category::with('children.children')->whereNull('parent_id')->get();

        return view('home', ['allProducts' => $products,'categories'=>$categories]);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * @return mixed
     */
    public function __invoke(ProductsFilterRequest $request)
    {
        $date = $request->validated();
        $filter =app(ProductLaptopFilter::class,['queryParams'=> array_filter($date)]);
        $product = Product::filter($filter)->get();
        return  view ('product.catalog', compact('product'));
    }
    public function my_account()
    {
        return view('my_account');
    }
    public function productCard()
    {
        return view('product-card');
    }

}
