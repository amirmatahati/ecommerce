<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\StringClass;
use App\Classes\ProductClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->products       = new ProductClass;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product        = $this->products->Product(3);

        return view('home');
    }
    public function GetProduct()
    {
        $product        = $this->products->Product(3);

        return response()->json($product);
    }
    public function CategoryProduct($alias)
    {
        $cats           = $this->products->ProductCatByAlias($alias);
        $name_cat       = $this->products->NameByAlias($alias);

        $data   = [
            'cats'      => $cats,
            'name_cat'  => $name_cat
        ];

        return response()->json($data);
    }
}