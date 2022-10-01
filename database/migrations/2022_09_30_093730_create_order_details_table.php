<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_number');
            $table->unsignedBigInteger('product_code');
            $table->integer('quantity');
            $table->string('gross_sales');
            $table->timestamps();
            
            $table->foreign('order_number')
                ->references('id')->on('orders')
                ->onDelete('cascade');
      
            $table->foreign('product_code')
              ->references('id')->on('products')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
