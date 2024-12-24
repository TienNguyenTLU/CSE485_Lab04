<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Testing\Fakes\Fake;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $i){
            Book::create([
                'name' => $faker->sentence(),
                'author' => $faker->name,
                'category' => $faker->word,
                'year' => $faker->year(),
                'quantity' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
