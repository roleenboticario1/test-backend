<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::all();

        return response()->json([
            "message" => "Customer Lists",
            "customers" => $customers
        ], 200);

    }
}
