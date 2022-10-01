<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'customer_name' => 'Darlene Zschech', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Customer::create([
            'customer_name' => 'Brooke Fraser', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Customer::create([
            'customer_name' => 'Lincoln Brewster', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
