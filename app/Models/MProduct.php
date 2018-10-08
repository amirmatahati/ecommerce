<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    protected $table    = 'product';
    protected $fillable = ['id', 'product_title', 'description1', 'description2', 'img_product1', 'img_product2', 'img_product3', 'produc_category', 'status', 'created_at', 'updated_at', 'price', 'garansi', 'payment', 'product_alias'];
}
