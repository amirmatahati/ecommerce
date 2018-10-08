<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\MProduct;
use App\Models\MCategoryProduct;

use App\Classes\StringClass;

use DB;
use Carbon;
use File;
use Storage;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    return view('admin/home');
  }
  public function createProduct()
  {
    $cat            = MCategoryProduct::all();

    return response()->json($cat);
  }
  public function IndexProduct(Request $request)
  {
      $data                 = MProduct::paginate(10);

      return response()->json($data);
  }
  public function storeProduct(Request $request)
  {
    $strings                = new StringClass();

    $now = \Carbon\Carbon::now();
    $year = date('Y', strtotime($now));
    $month = date('m', strtotime($now));
    $days = date('d', strtotime($now));

    if($request->get('img_product1')) {
      $image1 = $request->get('img_product1');
      $name = time().'.' . explode('/', explode(':', substr($image1, 0, strpos($image1, ';')))[1])[1];
      $path = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path)){
          File::makeDirectory($path, 0777, true, true);
      }else{
          \Image::make($request->img_product1)->save($path .'/'.$name);
      }
      $img_p_1					= $db .'/'.$name;
    }

    if($request->get('img_product2')) {
      $image2 = $request->get('img_product1');
      $name2 = time().'.' . explode('/', explode(':', substr($image2, 0, strpos($image2, ';')))[1])[1];
      $path2 = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db2   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path2)){
          File::makeDirectory($path2, 0777, true, true);
      }else{
          \Image::make($request->img_product2)->save($path2 .'/'.$name2);
      }
      $img_p_2					= $db2 .'/'.$name2;
    }
    if($request->get('img_product3')) {
      $image3 = $request->get('img_product3');
      $name3 = time().'.' . explode('/', explode(':', substr($image3, 0, strpos($image3, ';')))[1])[1];
      $path3 = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db3   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path3)){
          File::makeDirectory($path3, 0777, true, true);
      }else{
          \Image::make($request->img_product3)->save($path3 .'/'.$name3);
      }
      $img_p_3					= $db3 .'/'.$name3;
    }


      $product      = new MProduct;

      $product->product_title         = $request->product_name;
      $product->description1          = $request->description1;
      $product->description2          = $request->description2;
      $product->img_product1          = $img_p_1;
      $product->img_product2          = $img_p_2;
      $product->img_product3          = $img_p_3;
      $product->produc_category       = $request->produc_category;
      $product->status                = 1;
      $product->price                 = $request->price;
      $product->garansi               = $request->garansi;
      $product->payment               = $request->payment;
      $product->product_alias         = $strings->str2alias($request->product_name);

      $product->save();

      return response()->json($product);
  }
  public function EditProduct(Request $request, $id)
  {
      $product                        = MProduct::find($id);
      $cat                            = MCategoryProduct::all();


      return response()->json($product);
  }
  public function UpdateProduct(Request $request, $id)
  {
    $strings                = new StringClass();

    $now = \Carbon\Carbon::now();
    $year = date('Y', strtotime($now));
    $month = date('m', strtotime($now));
    $days = date('d', strtotime($now));

    if($request->get('img_product1s')) {
      $image1 = $request->get('img_product1s');
      $name = time().'.' . explode('/', explode(':', substr($image1, 0, strpos($image1, ';')))[1])[1];
      $path = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path)){
          File::makeDirectory($path, 0777, true, true);
      }else{
          \Image::make($request->img_product1s)->save($path .'/'.$name);
      }
      $img_p_1					= $db .'/'.$name;
    }else{
        $img_p_1               = $request->img_product1 ;
    }

    if($request->get('img_product2s')) {
      $image2 = $request->get('img_product2s');
      $name2 = time().'.' . explode('/', explode(':', substr($image2, 0, strpos($image2, ';')))[1])[1];
      $path2 = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db2   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path2)){
          File::makeDirectory($path2, 0777, true, true);
      }else{
          \Image::make($request->img_product2s)->save($path2 .'/'.$name2);
      }
      $img_p_2					= $db2 .'/'.$name2;
    }else{
        $img_p_2               = $request->img_product2  ;
    }
    if($request->get('img_product3s')) {
      $image3 = $request->get('img_product3s');
      $name3 = time().'.' . explode('/', explode(':', substr($image3, 0, strpos($image3, ';')))[1])[1];
      $path3 = public_path().'/images/'.$year. '/'.$month.'/'. $days;
      $db3   = 'images/'.$year. '/'.$month.'/'. $days;
      if(!File::exists($path3)){
          File::makeDirectory($path3, 0777, true, true);
      }else{
          \Image::make($request->img_product3s)->save($path3 .'/'.$name3);
      }
      $img_p_3					= $db3 .'/'.$name3;
    }else{
        $img_p_3               = $request->img_product3  ;
    }


      $product                        = MProduct::find($id);

      $product->product_title         = $request->product_name;
      $product->description1          = $request->description1;
      $product->description2          = $request->description2;
      $product->img_product1          = $img_p_1;
      $product->img_product2          = $img_p_2;
      $product->img_product3          = $img_p_3;
      $product->produc_category       = $request->produc_category;
      $product->status                = 1;
      $product->price                 = $request->price;
      $product->garansi               = $request->garansi;
      $product->payment               = $request->payment;
      $product->product_alias         = $strings->str2alias($request->product_name);

      $product->save();

      return response()->json($product);
  }
}
