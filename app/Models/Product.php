<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table =  'products';

    protected $fillable = ['product_name','product_price'];

    public function product_order_details(){
        return $this->hasMany(OrderDetail::class, 'product_code', 'id');
     }

}
