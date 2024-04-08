<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Auth::～使う場合いる
use Illuminate\Support\Facades\Auth;

use App\Models\Department;
use App\Models\User;
use App\Models\Book;
use App\Models\Review;

class MainController extends Controller
{
    public function books(Request $request){

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

        return view('books', $data)
            ->with([
                "books" => $books,
                "images" => $images,
                "imageNum" => $imageNum
            ]);   

        
    }

    // 書籍一覧表示が押されたら
    public function booked(Request $request){
        return redirect()->route('books');
    }

    public function booksDetail(Request $request)
    {
        $data = [
            'users' => User::all(),
            `departments` => Department::all(),
            'reviews' => Review::all()->where('isbn_id', $request->isbn)
        ];

        $books = Book::all()->where('isbn', $request->isbn);
        return view('books_detail',$data)
            ->with([
                "books" => $books
            ]);
    }

    public function create(Request $request){

        if(Auth::user()->dep_id === 1){
            return view('welcome');
        }elseif(Auth::user()->dep_id === 2){
            return view('db.create');
        }
    }
    
    public function created(Request $request){
        return redirect()->route('db.create');
    }

    public function stored(Request $request){

    // バリデーションチェック
    $input = $request->validate([
        "title" => 'required | string',
        "author" => 'required | string',
        "publisher" => 'required | string',
        "publication_Date" => 'required',
        "genre" => 'required | string',
        "isbn" => 'required | integer | digits_between:10,13 | unique:books,isbn',
        "price" => 'integer | min:0'
    ]);

    Book::create([  
        "title" => $request->title,
        "author" => $request->author,
        "publisher" => $request->publisher,
        "publication_Date" => $request->publication_Date,
        "genre" => $request->genre,
        "isbn" => $request->isbn,
        "price" => $request->price,
        "con_id" => $request->con_id,
    ]);  

    $inputData = [
        "title" => $request->title,
        "author" => $request->author,
        "publisher" => $request->publisher,
        "publication_Date" => $request->publication_Date,
        "genre" => $request->genre,
        "isbn" => $request->isbn,
        "price" => $request->price,
        "con_id" => $request->con_id,
    ] ;

    
    return view('db.store',$inputData);
    }

    // データの削除or更新(DELETE or UPDATE)
    public function deleteOrUpdate(Request $request){

        if($request->checkedId===null){
            return redirect()->route('booked')
            ->with('errorMessage','チェックして下さい');
        }

        // 削除ボタンが押されたら
        if ($request->has('bookDataDelete')) {
            $checkedId = $request->checkedId;
            // セッションに$checkedIdを一旦保存しておく
            $request->session()->put('checkedId',$checkedId);
            
            // 複数条件での検索はwhereInで出来る
            $books = Book::all()->whereIn('id', $checkedId);

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

            return view('db.delete')
            ->with([
                "books" => $books,
                "images" => $images,
                "imageNum" => $imageNum
            ]);

        // 更新ボタンが押されたら
        } elseif ($request->has('bookDataUpdate')) {
            $checkedId = $request->checkedId;
            // セッションに$checkedIdを一旦保存しておく
            $request->session()->put('checkedId',$checkedId);
            
            // 複数条件での検索はwhereInで出来る
            $books = Book::all()->whereIn('id', $checkedId);

            return view('userOnly.update')
            ->with([
                "books" => $books
            ]);
        } 
    }

    // データの削除実行(REMOVE)
    public function remove(Request $request){
        // セッションに'checkedId'があれば削除する
        if($request->session()->has('checkedId')){
            $checkedId = $request->session()->get('checkedId');
            $books = Book::whereIn('id', $checkedId)->delete();
            // セッションの'checkedId'を消去する
            $request->session()->forget('checkedId');
        }
            
        return redirect()->route('books');
    }

    // データの更新実行(UPDATE)
    public function update(Request $request){

        // バリデーションチェック
        $input = $request->validate([
            "title" => 'required | string',
            "author" => 'required | string',
            "publisher" => 'required | string',
            "publication_Date" => 'required',
            "genre" => 'required | string',
            "isbn" => 'required | integer | digits_between:10,13 | unique:books,isbn',
            "price" => 'integer | min:0'
        ]);
        
            
            $checkedId = $request->session()->get('checkedId');
            $books = Book::find($request->id);

            $books->title = $request->title;
            $books->author = $request->author;
            $books->publisher = $request->publisher;
            $books->publication_Date = $request->publication_Date;
            $books->genre = $request->genre;
            $books->isbn = $request->isbn;
            $books->price = $request->price;
            $books->con_id = $request->con_id;  
            $books->save();
            
            $books = Book::all()->whereIn('id', $checkedId);
            return view('db.update')
            ->with([
                "books" => $books
            ]);
    }
    public function updateEnd(Request $request){
        // セッションに'checkedId'があれば実行する
        if($request->session()->has('checkedId')){
            // セッションの'checkedId'を消去する
            $request->session()->forget('checkedId');
        }
        return redirect()->route('books');
    }




}
