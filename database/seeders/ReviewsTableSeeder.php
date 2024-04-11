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
            'comment' => 'わかりやすかったが、一部誤植があった',
            'rating' => '2',
            'isbn_id' => '9784800712349',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '子どもに読むとすごく喜んだ',
            'rating' => '5',
            'isbn_id' => '9784834012309',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '絵柄が可愛い',
            'rating' => '4',
            'isbn_id' => '9784834012309',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '勉強頑張るぞー！',
            'rating' => '5',
            'isbn_id' => '9784815624255',
            'user_id' => '3',
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
        DB::table('reviews')->insert([
            'comment' => 'わかりやすかった',
            'rating' => '4',
            'isbn_id' => '9784295017936',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'Java初心者でも読みやすい',
            'rating' => '5',
            'isbn_id' => '9784295017936',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'この間映画を見たので小説も読んでみたけど面白かった',
            'rating' => '5',
            'isbn_id' => '9784041126790',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '面白い',
            'rating' => '4',
            'isbn_id' => '9784041126790',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '面白い',
            'rating' => '4',
            'isbn_id' => '9784575513448',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '何度も読んでしまう',
            'rating' => '4',
            'isbn_id' => '9784087474398',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '子どもがこのシリーズ好き',
            'rating' => '5',
            'isbn_id' => '9784052030512',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'ぴよちゃん可愛い',
            'rating' => '5',
            'isbn_id' => '9784052030512',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '面白い',
            'rating' => '5',
            'isbn_id' => '9784088725093',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '役に立つ',
            'rating' => '5',
            'isbn_id' => '9784469041873',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'よくお世話になってます',
            'rating' => '4',
            'isbn_id' => '9784000801317',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '子どもが好き',
            'rating' => '4',
            'isbn_id' => '9784834008999',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '懐かしい',
            'rating' => '3',
            'isbn_id' => '9784834008999',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '面白い',
            'rating' => '4',
            'isbn_id' => '9784834008999',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '面白い',
            'rating' => '4',
            'isbn_id' => '9784772100311',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => '小さい頃に読んでもらったなー',
            'rating' => '4',
            'isbn_id' => '9784772100311',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('reviews')->insert([
            'comment' => 'しろくまちゃん可愛いと子どもが喜ぶ',
            'rating' => '5',
            'isbn_id' => '9784772100311',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
