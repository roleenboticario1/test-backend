<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Http\Requests\Order\OrderRequest;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order(Request $request){

        $validator = Validator::make($request->all(), [
            'customer_id'=> 'required',
            'product_id'=> 'required',
            'quantity' => 'required',
       ]);

       if($validator->fails())
       {
           return response()->json([
               'status' => 422,
               'validation_errors'=>$validator->messages()
           ]);

       }else{

            $product_id = $request->product_id;
            $quantity = $request->quantity;
            $customer_id = $request->customer_id;
    
            $order = new Order;
            $order->customer_code = $customer_id;
            $order->order_number = 'order'.random_int(1000, 9999);
            $order->status = 'Created';
            $order->save();
    
            $products = Product::where('id', $product_id)->get();
    
            $orderitems = [];
    
            foreach($products as $item){
            $gross_sales =  $item->product_price * $quantity;
            $orderitems[] = [
                'product_code' => $product_id,
                'quantity' => $quantity,
                'gross_sales' => $gross_sales,
            ];
            }
    
            $order->order_details()->createMany($orderitems);
    
            return response()->json([
            'message' => "Order Placed Successfully",
            ],201);
       }
    }

    public function customer_order(){
        
        $orders = Order::with(['customers','order_details'])->get();

        return response()->json([
            'message' => 'Order Details',
            'data' => $orders,
        ], 200);
    }

    public function cancel_order($id){

        $cancel = Order::find($id);
        $cancel->status = 'Cancel';
        $cancel->save();

        return response()->json([
            'message' => 'Order Cancel Sucessfully',
        ], 200);
    }

    public function update_order(Request $request){
        $order_number = $request->order_number;
        $quantity = $request->quantity;

        $product_code = OrderDetail::where('order_number', $order_number)->first();
        
        $product = Product::where('id', $product_code->product_code)->first();

        $gross_sales = $product->product_price * $request->quantity;

        OrderDetail::where('id', $product_code->id)
          ->update([
             "quantity" => $quantity,
             "gross_sales" => $gross_sales
        ]);

        return response()->json([
            'message' => 'Order Cancel Updated',
        ], 200);

    }
}
