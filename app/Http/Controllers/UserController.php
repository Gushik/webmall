<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductLaptopFilter;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;

use App\User;
use Illuminate\Http\Request;
use App\Category;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//
//        $authorize = User::session(auth()->id())->getContent();
//
//
//        return view('my_account', compact('authorize'));
//    }



}
