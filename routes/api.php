<?php

use App\Http\Controllers\API\{AnggotaController, LoginController, UserController, ProductController, ScanController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('logon/security', [LoginController::class, 'LogonCodeSecurity']);
        Route::post('list/anggota', [AnggotaController::class, 'list']);
        Route::get('user/profile', [UserController::class, 'profile']);
        Route::post('product/detail', [ProductController::class, 'productDetail']);
        Route::post('scan/history', [ScanController::class, 'scanHistory']);
    });
});
