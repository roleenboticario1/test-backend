<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();

        return response()->json([
            "message" => "Product Lists",
            "products" => $products
        ], 200);

    }

    public function show($id){

        $products = Product::find($id);

        return response()->json([
            "message" => "Product",
            "products" => $products
        ], 200);
    }

    public function order_list(){

        $product_order_details = OrderDetail::with(['products'])->get();
        
        $arr = [];
        foreach($product_order_details as $products){
            array_push($arr, $products);
        }

        $sum = OrderDetail::sum('gross_sales');

        return response()->json([
            'message' => 'Product Order Details',
            'data' => $arr,
            'total' => $sum
        ], 200);
    }

    
}
