<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Auth::～使う場合いる
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


use App\Models\Department;
use App\Models\User;
use App\Models\Book;
use App\Models\Review;

class MainController extends Controller
{
    // 書籍一覧表示が押されたら
    public function books(Request $request){

        $books = Book::all();

        // 評価値の平均値抽出
        $rating_avg = Review::select('isbn_id')
                    ->selectRaw('round(AVG(rating),1) as ratingAvg')
                    ->groupBy('isbn_id')
                    ->get();

        $data = [
            'users' => User::all(),
            `departments` => Department::all(),
            'relations' => User::all(),
            'rating_avg' => $rating_avg
        ];

        return view('books', $data)
            ->with([
                "books" => $books
            ]);   
    }

    public function booked(Request $request){
        return redirect()->route('books');
    }

    public function booksDetail(Request $request)
    {
        // 評価値の平均値抽出
        $rating_avg = Review::select('isbn_id')
                    ->selectRaw('round(AVG(rating),1) as ratingAvg')
                    ->groupBy('isbn_id')
                    ->get();
        
                    

        $data = [
            'users' => User::all(),
            `departments` => Department::all(),
            'reviews' => Review::all()->where('isbn_id', $request->isbn),
            'isbn' => $request->isbn,
            'rating_avg' => $rating_avg
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
        return redirect()->route('create');
    }

    public function stored(Request $request){

    // バリデーションチェック
    $input = $request->validate([
        "title" => 'required | string',
        "author" => 'required | string',
        "publisher" => 'required | string',
        "publication_Date" => 'required',
        "genre" => 'required | in:"文芸書","実用書","専門書", "雑誌","漫画","絵本","その他"',
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

            return view('db.delete')
            ->with([
                "books" => $books
            ]);

        // 更新ボタンが押されたら
        } elseif ($request->has('bookDataUpdate')) {
            $checkedId = $request->checkedId;
            // セッションに$checkedIdを一旦保存しておく
            $request->session()->put('checkedId',$checkedId);
            
            // 複数条件での検索はwhereInで出来る
            $books = Book::all()->whereIn('id', $checkedId);

            return view('db.update')
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

            // チェックされたレコードからisbnを取り出して配列に入れる
            $books = Book::all()->whereIn('id', $checkedId);
            $isbn = [];
            foreach($books as $book){
                array_push($isbn,$book->isbn);
            }

            // 先にReviewから削除（リレーションシップがあるため）
            $review = Review::whereIn('isbn_id', $isbn)->delete();
            // 次にBookを削除
            $books = Book::whereIn('id', $checkedId)->delete();

            // セッションの'checkedId'と'isbn'を消去する
            $request->session()->forget('checkedId');
        }
            
        return redirect()->route('books');
    }

    // データの更新実行(UPDATE)
    public function update(Request $request){

        // バリデーションチェック
        // $input = $request->validate([
        //     "title" => 'required | string',
        //     "author" => 'required | string',
        //     "publisher" => 'required | string',
        //     "publication_Date" => 'required',
        //     "genre" => 'required | string',
        //     "isbn" => 'required | integer | digits_between:10,13 | unique:books,isbn',
        //     "price" => 'integer | min:0'
        // ]);
        
            
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
// ここから森倉さん
    public function createReview(Request $request)
    {
        $books = Book::all()->where('isbn', $request->isbn);;
        $isbn = $request->isbn;

        $data = [
            'books' => $books,
            'isbn' => $isbn,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ];
        $exists = Review::where('user_id', $request->user()->id)
            ->where('isbn_id', $isbn)
            ->exists();
        $exist = Review::all()->where('user_id', $request->user()->id)
            ->where('isbn_id', $isbn);
        if ($exists) {
            return view('db/edit_review', $data)
                ->with([
                    "exist" => $exist
                ]);
        } else {
            return view('db/create_review', $data);
        }
    }

    public function confirmReview(Request $request)
    {
        $books = Book::all()->where('isbn', $request->isbn);
        $isbn = $request->isbn;
        $data = [
            'books' => $books,
            'isbn' => $isbn,
            'rating' => $request->rating,
            'comment' => $request->comment
        ];
        return view('db/confirm_review', $data);
    }

    public function submitReview(Request $request)
    {
        $user = Auth::user();
        $review = new Review();

        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->isbn_id = $request->isbn;
        $review->user_id = $user->id;

        $review->save();

        $data = [
            'rating' => $request->rating,
            'comment' => $request->comment,
        ];
        return view('db/submit_review', $data);
    }

    public function editReview(Request $request)
    {
        $id = $request->id;
        $data = [
            'record' => Review::find($id)
        ];
        return view('db/edit_review', $data);
    }

    public function updateReview(Request $request)
    {
        // 更新ボタンが押されたら
        if ($request->has('update')) {
            $review = Review::find($request->id);

            $review->rating = $request->rating;
            $review->comment = $request->comment;

            $review->save();

            $data = [
                'rating' => $request->rating,
                'comment' => $request->comment,
                'message' => 'レビューを更新しました',
            ];
            return view('db/update_review', $data);

        // 削除ボタンがおされたら
        } elseif ($request->has('delete')) {
            $review = Review::where('user_id', $request->user()->id)
            ->where('isbn_id', $request->isbn)->delete();

            $data = [
                'rating' => $request->rating,
                'comment' => $request->comment,
                'message' => 'レビューを削除しました',
            ];

            return view('db/update_review', $data);
        }
    }
    // レビューデータの削除
    public function deleteReview(Request $request){
        $checkedId = $request->checkedId;
        // セッションに$checkedIdを一旦保存しておく
        $request->session()->put('checkedId',$checkedId);

        // 複数条件での検索はwhereInで出来る
        $review = Review::all()->whereIn('id', $checkedId);

        return view('db.delete_review')
        ->with([
            "review" => $review
        ]);
        
    }

    // データの削除実行(REMOVE)
    public function removeReview(Request $request){
       
        if($request->session()->has('checkedId')){
        

            $checkedId = $request->session()->get('checkedId');

            // 先にReviewから削除（リレーションシップがあるため）
            $review = Review::whereIn('id', $checkedId)->delete();

           
        // セッションの'checkedId'と'isbn'を消去する
        $request->session()->forget('checkedId');
            
        $books = Book::all();

        // 評価値の平均値抽出
        $rating_avg = Review::select('isbn_id')
                    ->selectRaw('round(AVG(rating),1) as ratingAvg')
                    ->groupBy('isbn_id')
                    ->get();

        $data = [
            'users' => User::all(),
            `departments` => Department::all(),
            'relations' => User::all(),
            'rating_avg' => $rating_avg
        ];

        return view('books', $data)
            ->with([
                "books" => $books
            ]); 
    }
    }
}