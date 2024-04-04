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
            'rating' => '4',
            'isbn' => '9784800712349',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'おかげでITパスポート試験に合格した',
            'rating' => '5',
            'isbn' => '9784815624255',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'TOEICの点数がかなり上がった',
            'rating' => '5',
            'isbn' => '9784023310650',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
