<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $bookId = Book::pluck('id')->toArray();
        $readerId = Reader::pluck('id')->toArray();

        foreach(range(1, 10) as $i){
            Borrow::create([
                'reader_id' => $faker->randomElement($readerId),
                'book_id' => $faker->randomElement($bookId),
                'borrow_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'return_date' => $faker->dateTimeBetween('now', '+1 month'),
                'status' => $faker->boolean,
            ]);
        }
    }
}
