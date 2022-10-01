<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table =  'order_details';

    protected $fillable = ['product_code','order_number','quantity','gross_sales'];

    public function products(){
        return $this->belongsTo(Product::class, 'product_code', 'id');
    }

    public function orders(){
        return $this->belongsTo(OrderDetail::class);
    }
}
