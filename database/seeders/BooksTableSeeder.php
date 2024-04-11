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
            'genre' => '専門書',
            'isbn' => 9784800712349,
            'price' => 1980,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '【令和６年度】 いちばんやさしい ITパスポート 絶対合格の教科書＋出る順問題集',
            'author' => '高橋 京介',
            'publisher' => 'SBクリエイティブ',
            'publication_Date' => '2023-12-15',
            'genre' => '専門書',
            'isbn' => 9784815624255,
            'price' => 1760,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '新TOEIC Test 出る単特急 金のフレーズ',
            'author' => 'TEX加藤',
            'publisher' => '朝日新聞出版',
            'publication_Date' => '2012-03-07',
            'genre' => '専門書',
            'isbn' => 9784023310650,
            'price' => 890,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'うずらちゃんのかくれんぼ',
            'author' => 'きもと ももこ',
            'publisher' => '福音館書店',
            'publication_Date' => '1994-02-16',
            'genre' => '絵本',
            'isbn' => 9784834012309,
            'price' => 990,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'スッキリわかるJava入門 第4版',
            'author' => '国本 大悟',
            'publisher' => 'インプレス',
            'publication_Date' => '2023-11-06',
            'genre' => '専門書',
            'isbn' => 9784295017936,
            'price' => 2970,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '告白',
            'author' => '湊 かなえ',
            'publisher' => '双葉社',
            'publication_Date' => '2010-04-08',
            'genre' => '文芸書',
            'isbn' => 9784575513448,
            'price' => 680,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'すずめの戸締まり',
            'author' => '新海 誠',
            'publisher' => '角川文庫',
            'publication_Date' => '2022-08-24',
            'genre' => '文芸書',
            'isbn' => 9784041126790,
            'price' => 748,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '白夜行',
            'author' => '東野 圭吾',
            'publisher' => '集英社文庫',
            'publication_Date' => '2002-05-25',
            'genre' => '文芸書',
            'isbn' => 9784087474398,
            'price' => 1430,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'ぴよちゃんとはりねずみ',
            'author' => 'いりやま さとし',
            'publisher' => 'Gakken',
            'publication_Date' => '2008-10-08',
            'genre' => '絵本',
            'isbn' => 9784052030512,
            'price' => 1045,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'ONE PIECE 1',
            'author' => '尾田 栄一郎',
            'publisher' => 'ジャンプコミックス',
            'publication_Date' => '1997-12-024',
            'genre' => '漫画',
            'isbn' => 9784088725093,
            'price' => 484,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'ジーニアス英和辞典 第6版',
            'author' => '中邑 光男',
            'publisher' => '大修館書店',
            'publication_Date' => '2022-11-08',
            'genre' => 'その他',
            'isbn' => 9784469041873,
            'price' => 3960,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => '広辞苑 第七版',
            'author' => '新村 出',
            'publisher' => '岩波書店',
            'publication_Date' => '2018-01-12',
            'genre' => 'その他',
            'isbn' => 9784000801317,
            'price' => 9900,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'きんぎょが にげた',
            'author' => '五味 太郎',
            'publisher' => '福音館書店',
            'publication_Date' => '1982-08-31',
            'genre' => '絵本',
            'isbn' => 9784834008999,
            'price' => 990,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'title' => 'しろくまちゃんのほっとけーき',
            'author' => 'わかやま けん',
            'publisher' => 'こぐま社',
            'publication_Date' => '1972-10-15',
            'genre' => '絵本',
            'isbn' => 9784772100311,
            'price' => 990,
            'quantity' => 1,
            'con_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
