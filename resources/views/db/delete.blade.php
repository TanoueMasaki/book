<link rel="stylesheet" href="{{ asset('/css/style_db_delete.css')  }}">
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの削除
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 id="title">以下のレコードが削除されます。本当に削除しますか？<br>
                ※この書籍のレビューも全て削除されます</h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 削除レコードの表示 -->
    <div class="scroll_table">
        <table class="main_table">
            <thead>
                <tr>
                    <th class="long">タイトル</th>
                    <th>著者</th>
                    <th class="long">出版社</th>
                    <th>出版日</th>
                    <th>ジャンル</th>
                    <th>ISBN</th>
                    <th class="short">価格</th>
                    <th class="short">登録者</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            @foreach($books as $book)
            <tbody>
                <tr>
                    <td class="long">{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td class="long">{{$book->publisher}}</td>
                    <td>{{$book->publication_Date}}</td>
                    <td>{{$book->genre}}</td>            
                    <td>{{$book->isbn}}</td>
                    <td class="short">{{$book->price}}</td>
                    <td class="short">{{$book->con_id}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>{{$book->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- 削除実行 -->
    <form action="/book/public/books" method="get">
    @csrf
        <input class="buttonBack" type="submit" name="books" value="戻る">
    </form>
    <form action="/book/public/db/remove" method="post">
    @csrf
        <input class="button" type="submit" name="bookDataRemove" value="削除を実行する">
    </form>   
</x-app-layout>
