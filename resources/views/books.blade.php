<link rel="stylesheet" href="{{ asset('/css/style_books.css') }}">
<x-app-layout>
    <x-slot name="header">
        <div class="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('book_list') }}
            </h2>
            @if(session('errorMessage')===null)
            @else
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" id="errorMessage">{{session('errorMessage')}}</h2>
            @endif
        </div>
    </x-slot>
    
        <div class="scroll_table">
            @if(Auth::user()-> dep_id===1)
            @elseif(Auth::user()-> dep_id===2)   
            
            <table class="check_table">
                <tr>
                    <th class="short"></th>
                </tr>
                <form action="/book/public/db/deleteOrUpdate" method="post">
                    @csrf
                    @foreach($books as $book)
                    <tr><td class="short"><input type="checkbox" name="checkedId[]" value=<?=$book->id?> ></td></tr>
                    @endforeach
            </table>
                <div class="checkButton">
                    <input  id="checkButtonDe" type="submit" name="bookDataDelete" value="削除">
                    <input  id="checkButtonUp" type="submit" name="bookDataUpdate" value="編集">
                    <input  id="checkButtonRe" type="reset" value="リセット">
                </div>
            </form>
            @endif
            <table class="main_table">  
                <tr>
                    <th>書影</th>
                    <th>評価</th>
                    <th class="short">ID</th>
                    <th class="long">タイトル</th>
                    <th>著者</th>
                    <th class="long">出版社</th>
                    <th>出版日</th>
                    <th>ジャンル</th>
                    <th>ISBN</th>
                    <th class="short">価格</th>
                    <th class="short">数量</th>
                    <th class="short">登録者</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th class="short"></th>
                </tr>
                @foreach($books as $book)
                <tr>
                    <td>
                    <img id="book" src="https://ndlsearch.ndl.go.jp/thumbnail/{{$book->isbn}}.jpg" alt="NO IMAGE">
                    
                    </td>
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
                    <td>{{$book->publication_Date}}</td>
                    <td>{{$book->genre}}</td>
                    <td>{{$book->isbn}}</td>
                    <td class="short">{{$book->price}}円</td>
                    <td class="short">{{$book->quantity}}</td>
                    <td class="short">{{$book->user->name}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>{{$book->updated_at}}</td>
                    <td class="short">
                        <form action="/book/public/books_detail" method="post">
                        @csrf
                            <input class="input" type="hidden" name="isbn" value="{{$book->isbn}}">
                            <input class="buttonDetail" type="submit" value="詳細">
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        
        </div>
    </x-app-layout>