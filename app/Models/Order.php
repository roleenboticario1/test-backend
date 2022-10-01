<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table =  'orders';

    protected $fillable = ['customer_code','status','order_number'];

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_number', 'id');
    }

    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_code','id');
    }
}
