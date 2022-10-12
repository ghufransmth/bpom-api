<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table    = 'product';

    public function getProductDetail()
    {
        return $this->hasOne('App\Models\ProductDetail','id_product','id');
    }
    
}
