<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class MainController extends Controller
{
    // 書籍一覧表示
    public function books(Request $request){
        $books = Book::all();
        
        // 分類イメージ画像を配列に入れる
        $images = [
            asset('/data/image/no_image.png'),
            asset('/data/image/comic.png'),
            asset('/data/image/doujinshi.png'),
            asset('/data/image/ehon.png'),
            asset('/data/image/fashion.png'),
            asset('/data/image/meigensyu.png'),
            asset('/data/image/music.png')
        ];
        $imageNum = 0;
        

        return view('books')
        ->with([
            "books" => $books,
            "images" => $images,
            "imageNum" => $imageNum
         ]);
    }
}
