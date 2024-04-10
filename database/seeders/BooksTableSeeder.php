<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('books')->insert([
            'title' => 'いちばんやさしいSQL入門教室',
            'author' => '矢沢 久雄',
            'publisher' => 'ソーテック社',
            'publication_Date' => '2022-03-10',
            'genre' => 'コンピュータ(コンピューティング)＆IT(情報技術)',
            'isbn' => 9784800712349,
            'price' => 1980,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '【令和６年度】 いちばんやさしい ITパスポート　絶対合格の教科書＋出る順問題集',
            'author' => '高橋 京介',
            'publisher' => 'SBクリエイティブ',
            'publication_Date' => '2023-12-15',
            'genre' => 'コンピュータ(コンピューティング)＆IT(情報技術)',
            'isbn' => 9784815624255,
            'price' => 1760,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '新TOEIC Test 出る単特急 金のフレーズ',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310650,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'あ',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310651,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'い',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310652,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'う',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310653,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'え',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310654,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'お',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310655,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'か',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310656,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'き',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '言語、言語学',
            'isbn' => 9784023310657,
            'price' => 890,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
