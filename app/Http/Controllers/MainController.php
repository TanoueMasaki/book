<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

use App\Models\User;
use App\Models\Department;

class MainController extends Controller
{
    public function books(Request $request){
        
        // 書籍一覧表示が押されたら
        if ($request->has('books')) {

            $books = Book::all();
            // $relations = User2::all();
            $data = [
                'users' => User::all(),
                `departments` => Department::all(),
                'relations' => User::all()
            ];
            
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
            

            return view('books',$data)
            ->with([
                "books" => $books,
                "images" => $images,
                "imageNum" => $imageNum
            ]);
        }elseif ($request->has('books_registration')) {
        }
    }
}
