<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function successResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function notFoundResponse($message)
    {
        $response = [
            'success' => true,
            'data'    => [],
            'message' => $message,
        ];

        return response()->json($response, 404);
    }

    public function authorizeResponse($error, $errorMessages = [], $code = 401)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function errorResponse($error, $errorMessages = [], $code = 500)
    {

        $response = [
            'success' => false,
            'message' => $error->getMessage() . ' on the line ' . $error->getLine(),
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
