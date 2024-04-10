<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reviews')->insert([
            'comment' => 'SQLについてよくわかった',
            'rating' => '3',
            'isbn_id' => '9784800712349',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'SQLについてよくわかった',
            'rating' => '2',
            'isbn_id' => '9784800712349',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'SQLについてよくわかった',
            'rating' => '3',
            'isbn_id' => '9784800712349',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'SQLについてよくわかった',
            'rating' => '4',
            'isbn_id' => '9784800712349',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'SQLについてよくわかった',
            'rating' => '5',
            'isbn_id' => '9784800712349',
            'user_id' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'おかげでITパスポート試験に合格した',
            'rating' => '5',
            'isbn_id' => '9784815624255',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'TOEICの点数がかなり上がった',
            'rating' => '5',
            'isbn_id' => '9784023310650',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
