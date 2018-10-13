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
    public function Product($cat,$limit)
    {
        $product        = MProduct::join('category_product', 'product.produc_category', 'category_product.id')
                        ->where(function($query) use ($cat){
                            $query->where('category_product.parent_id', $cat);
                        })
                        ->where(function($query){
                            $query->where('product.status', 1);
                        })
                        ->select('product.id', 'product.product_title', 'product.product_alias', 'product.price', 'product.img_product1', 'category_product.category_alias');

        if(!empty($limit)){
            return $product->orderBy('product.id', 'DESC')->limit($limit)->get();
        }
    }
    public function ProductCatByAlias($alias)
    {
        $cat          = MProduct::join('category_product', 'product.produc_category', 'category_product.id')
                      ->where('category_product.category_alias', $alias)
                      ->select('category_product.id as id_cat', 'category_product.category_name', 'product.id', 'product.price', 'product.product_title', 'product.img_product1', 'product.product_alias')
                      ->paginate(10);
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
    public function CatNameByID($id)
    {
        $cat        = MCategoryProduct::where('id', $id)->first();

        if(!empty($cat)){
            return $cat->category_name;
        }
    }
}
