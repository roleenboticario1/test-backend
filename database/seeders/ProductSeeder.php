<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Guitar Fender', 
            'product_price' => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Product::create([
            'product_name' => 'Drums Yamaha', 
            'product_price' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Product::create([
            'product_name' => 'Mic Shure', 
            'product_price' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
