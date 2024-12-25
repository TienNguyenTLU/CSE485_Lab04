<?php

namespace Database\Seeders;

use App\Models\Borrow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book_id = DB::table('books')->pluck('id')->toArray();
        $reader_id = DB::table('readers')->pluck('id')->toArray();
        $faker = Faker::create();
        for($i=0;$i<20;$i++)
        {
            Borrow::create(
                [
                    'book_id' => $book_id[array_rand($book_id)],
                    'reader_id' => $reader_id[array_rand($reader_id)],
                    'return_date' => $faker->date(),
                    'borrow_date' => $faker->date(),
                    'status'=> $faker->boolean()
                ]
                );
        }
    }
}
