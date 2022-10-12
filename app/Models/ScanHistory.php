<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanHistory extends Model
{
    use HasFactory;
    protected $table    = 'scan_history';
    
    public function getProduct()
    {
        return $this->belongsTo('App\Models\Product','id');
    }

    public function getProductDetail()
    {
        return $this->belongsTo('App\Models\ProductDetail','id_product');
    }

}
