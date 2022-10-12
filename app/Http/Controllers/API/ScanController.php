<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ScanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ScanController extends BaseController
{
    public function scanHistory(Request $request)
    {
        try {

            $scan_detail = [];

            $scan_history = ScanHistory::where('id',$request->id)->where('status',$request->status);

            if ($scan_history->count() > 0) {
                foreach ($scan_history->get() as $key  => $list_scan) {
                    $status = '';

                    if($list_scan->status == 1){
                        $status = 'Verified';
                    }else{
                        $status = 'Unverified';
                    }

                    $scan_detail[] = [
                        'id' => $list_scan->id,
                        'name' => $list_scan->getProduct['name'],
                        'desc' => $list_scan->getProduct['desc'],
                        'status' => $status,
                        'exp_date' => $list_scan->getProductDetail['exp_date'],
                        'created_at' => date('Y-m-d',strtotime($list_scan->created_at))
                    ];

                }
            }

            return $this->successResponse($scan_detail, 'Successfully found data product');
        } catch (\Throwable $th) {
            return $this->errorResponse($th, [], 500);
        }
    }
}
