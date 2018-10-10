<?php

namespace App\Classes;

use Illuminate\Http\Request;

use Auth;

use App\Models\MProduct;
use App\Models\MCategoryProduct;

use App\Classes\StringClass;


use DB;
use Carbon;

class ProductClass {
    public function Product($limit)
    {
        $product      = MProduct::where('status', 1);

        if(!empty($limit)){
            return $product->orderBy('id', 'DESC')->limit($limit)->get();
        }
    }
    public function ProductCatByAlias($alias)
    {
        $cat          = MProduct::join('category_product', 'product.produc_category', 'category_product.id')
                      ->where('category_product.category_alias', $alias)
                      ->select('category_product.id as id_cat', 'category_product.category_name', 'product.id', 'product.price', 'product.product_title', 'product.img_product1', 'product.product_alias')
                      ->paginate(1);
      if(!empty($cat)){
          return $cat;
      }
    }
    public function NameByAlias($alias)
    {
        $name_cat     = MCategoryProduct::where('category_alias', $alias)->first();

        if(!empty($name_cat)){
            return $name_cat->category_name;
        }
    }
    public function GetProductByPAlias($alias)
    {
        $product      = MProduct::where('product_alias', $alias)->get();

        if(!empty($product)){
            return $product;
        }
    }
    public function GetiDbyAlias($alias)
    {
        $product      = MProduct::where('product_alias', $alias)->first();

        if(!empty($product)){
            return $product->id;
        }
    }
    public function GetProduk($id)
    {
        $product      = MProduct::find($id);
        if(!empty($product)){
            return $product;
        }
    }
}
