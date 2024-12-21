<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       $customer_id = DB::table('customers')->pluck('id')->toArray();
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Order::create([
                "order_date"=> $fakeOrder->date,
                "status"= $fakeOrder->status,]);}
            
    }
}
