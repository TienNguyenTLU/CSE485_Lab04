<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<20;$i++)
        {
            Book::create(
                [
                    'name'=>$faker->name,
                    'author'=>$faker->name,
                    'category'=>$faker->boolean(),
                    'year'=>$faker->year(),
                    'quantity'=>$faker->numberBetween(0,10)
                ]
                );
        }
    }
}
