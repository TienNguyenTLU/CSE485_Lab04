<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class Order_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $product_id = DB::table('products')->pluck('id')->toArray();
        $order_id = DB::table('oders')->pluck('id')->toArray();
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Order_detail::create([
            "quantity"=> $faker->numberBetween(5,10),]);}
    }
}
