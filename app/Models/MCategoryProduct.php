<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCategoryProduct extends Model
{
    protected $table = 'category_product';
    protected $fillable = ['id', 'category_name', 'category_alias', 'parent_id', 'category_status', 'created_at', 'updated_at'];
}
