<link rel="stylesheet" href="{{ asset('/css/style_books_detail.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('book_detail') }}
        </h2>
    </x-slot>
    <div class="main">
        <h1>選択中の書籍情報</h1>
        <table class="main_table"> 
            <tr>
                <th>評価値</th>
                <th class="short">ID</th>
                <th class="long">タイトル</th>
                <th>著者</th>
                <th class="long">出版社</th>
                <th>出版日</th>
                <th>ジャンル</th>
                <th>ISBN</th>
                <th class="short">価格</th>
                <th class="short">登録者No</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </tr>

            @foreach($books as $book)
            <tr>
                <td>
                <!-- 評価値の判定 -->
                @foreach($rating_avg as $avg)
                        @if($avg->isbn_id === $book->isbn)
                            {{$avg->ratingAvg}}
                            @if($avg->ratingAvg > 0 && $avg->ratingAvg < 2)
                                <p class="star">★</p>
                                @elseif($avg->ratingAvg >= 2 && $avg->ratingAvg < 3)
                                <p class="star">★★</p>
                                @elseif($avg->ratingAvg >= 3 && $avg->ratingAvg < 4)
                                <p class="star">★★★</p>
                                @elseif($avg->ratingAvg >= 4 && $avg->ratingAvg < 5)
                                <p class="star">★★★★</p>
                                @elseif($avg->ratingAvg >= 5)
                                <p class="star">★★★★★</p>
                                @endif
                                <?php $val = 1;?>
                                @break
                            @else
                            <?php $val = 0;?>
                        @endif
                    @endforeach
                    @if($val === 0)
                    <p>評価なし</p>
                    @endif
                </td>
                <td class="short">{{$book->id}}</td>
                <td class="long">{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td class="long">{{$book->publisher}}</td>
                <td>{{$book->publication_Data}}</td>
                <td>{{$book->genre}}</td>
                <td>{{$book->isbn}}</td>
                <td class="short">{{$book->price}}円</td>
                <td class="short">{{$book->con_id}}</td>
                <td>{{$book->created_at}}</td>
                <td>{{$book->updated_at}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="sub">
        <h1>書籍レビュー一覧</h1>
        <h2>レビューの登録は同じ書籍につき１つまで可能です</h2>
        <div class="scroll_table">
            <table class="sub_table">
                <tr>
                    @if(Auth::user()-> dep_id===2)
                    <th class="short"></th>
                    @endif
                    
                    <th>投稿者</th>
                    <th>部署名</th>
                    <th>投稿日</th>
                    <th class="short">おすすめ度</th>
                    <th class="long">コメント</th>
                </tr>
                <form action="/book/public/db/deleteReview" method="post">
                @csrf
                @foreach($reviews as $book)
                <tr>
                    @if(Auth::user()-> dep_id===2)
                    <td class="short"><input type="checkbox" name="checkedId[]" value=<?=$book->id?> ></td>
                    @endif
                    
                    <td>{{$book->user->name}}</td>
                    <td>{{$book->user->department->dep_name}}</td>
                    <td>{{$book->created_at}}</td>
                    <td class="short">{{$book->rating}}</td>
                    <td id=comment class="long">{{$book->comment}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="frex">
                    @if(Auth::user()-> dep_id===2)
                    <input class="button" id="checkButtonDe" type="submit" name="bookDataDelete" value="削除">
                    <input class="button" id="checkButtonRe" type="reset" value="リセット">
                    @endif
                </form>
            <form action="/book/public/db/create_review" method="post">
                @csrf
                <input class="input" hidden name="isbn" value="{{$isbn}}">
                <input class="button" type="submit" value="レビューの投稿（編集）">
            </form>
        </div>
    </div>
</x-app-layout>