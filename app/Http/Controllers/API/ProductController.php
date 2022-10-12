<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ProductController extends BaseController
{
    public function productDetail(Request $request)
    {
        try {
            $products = [];
            $products_detail = [];

            $list_products = Product::where('id',$request->id);

            if ($list_products->count() > 0) {
                foreach ($list_products->get() as $key  => $list_prod) {
                    $status = '';

                    if($list_prod->status == 1){
                        $status = 'Active';
                    }else{
                        $status = 'Non Active';
                    }

                    $products_detail[] = [
                        'id' => $list_prod->id,
                        'name' => $list_prod->name,
                        'desc' => $list_prod->desc,
                        'status' => $status,
                        'active_date' => $list_prod->active_date,
                        'principle' => $list_prod->getProductDetail['principle'],
                        'type' => $list_prod->getProductDetail['type'],
                        'category' => $list_prod->getProductDetail['category'],
                        'code_production' => $list_prod->getProductDetail['code_production'],
                        'exp_date' => $list_prod->getProductDetail['exp_date']
                    ];

                }
            }else{
                
            }

            return $this->successResponse($products_detail, 'Successfully found data product');
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
    }
}
