<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Customer\CustomerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('order', [OrderController::class, 'order']);
Route::get('customers', [CustomerController::class, 'index']);
Route::get('order-details', [ProductController::class, 'order_list']);
Route::get('customer-order', [OrderController::class, 'customer_order']);
Route::get('order/cancel/{id}', [OrderController::class, 'cancel_order']);
Route::post('order/update', [OrderController::class, 'update_order']);


