<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_db_update.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの更新
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>以下のレコードを更新します。更新データを入力して実行ボタンを押してください。</p>
                    <p class="red">
                        更新を終了する時は必ず画面下部の「更新を終了する」ボタンを押して下さい<br>
                        （ブラウザの戻るボタンは使用しないで下さい）
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 更新レコードの表示 -->
    
        <!-- main_table -->
        <div class="scroll_table">
            <table class="main_table">
                <thead>
                    <tr>
                        <th class="none"></th>
                        <th class="short">id</th>
                        <th class="long">タイトル</th>
                        <th class="long" >著者</th>
                        <th class="long">出版社</th>
                        <th class="long">出版日</th>
                        <th>ジャンル</th>
                        <th class="long">ISBN</th>
                        <th>価格</th>
                        <th class="short">登録者id</th>
                        <th>登録日時</th>
                        <th>更新日時</th>
                    </tr>
                </thead>
                </table>
            @foreach($books as $book)
            <table class="main_table">
                <tbody>
                    <tr>
                        <td class="none">現在データ:</td>
                        <td class="short">{{$book->id}}</td>
                        <td class="long">{{$book->title}}</td>
                        <td class="long">{{$book->author}}</td>
                        <td class="long">{{$book->publisher}}</td>
                        <td class="long">{{$book->publication_Date}}</td>
                        <td>{{$book->genre}}</td>        
                        <td class="long">{{$book->isbn}}</td>
                        <td>{{$book->price}}</td>
                        <td class="short">{{$book->con_id}}</td>
                        <td>{{$book->created_at}}</td>
                        <td>{{$book->updated_at}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- input_table -->
            
            <form action="/book/public/db/update" method="post">
                @csrf
                <table class="input_table">
                    <tr>
                        <td class="none">更新データ:</td>
                        <td class="short"><input type="text" name="id" value="{{$book->id}}" hidden></td>
                        <td class="long"><input type="text" name="title" value="{{$book->title}}" required></td>
                        <td class="long"><input type="text" name="author" value="{{$book->author}}" required></td>
                        <td class="long"><input type="text" name="publisher" value="{{$book->publisher}}" required></td>
                        <td class="long"><input type="text" name="publication_Date" value="{{$book->publication_Date}}" required></td>
                        <td>
                            <!-- 分類選択肢 -->
                            <select name="genre" required>
                                <option hidden >選択して下さい</option>
                                <option value="文芸書" @if("文芸書" === old('genre'))  selected @endif>文芸書</option>
                                <option value="実用書" @if("実用書" === old('genre'))  selected @endif>実用書</option>
                                <option value="専門書" @if("専門書" === old('genre'))  selected @endif>専門書</option>
                                <option value="雑誌" @if("雑誌" === old('genre'))  selected @endif>雑誌</option>
                                <option value="漫画" @if("漫画" === old('genre'))  selected @endif>漫画</option>
                                <option value="絵本" @if("絵本" === old('genre'))  selected @endif>絵本</option>
                                <option value="その他" @if("その他" === old('genre'))  selected @endif>その他</option>
                            </select>
                        </td>
                        <td class="long"><input type="text" min="0" name="isbn" value="{{$book->isbn}}"></td>
                        <td><input type="number" name="price" value="{{$book->price}}"></td>
                        <td class="short"><input type="text" name="con_id" value="{{$book->con_id}}"></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                </table>
                <input class="button" type="submit" name="bookDataUpdate" value="実行">
            </form>
            @endforeach
        </div>
        <form action="/book/public/db/updateEnd" method="post">
        @csrf
        <input class="endButton" type="submit" name="updateEnd" value="更新を終了する">
    </form>
</x-app-layout>
