<x-app-layout>
    <!-- <link rel="stylesheet" href="{{ asset('/css/style_userOnly_index.css')  }}"> -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの削除
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                以下のレコードが削除されます。本当に削除しますか？
                ※この書籍のレビューも全て削除されます
                </div>
            </div>
        </div>
    </div>
    
    <!-- 削除レコードの表示 -->
    <div class="scroll_table">
        <table class="main_table">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>著者</th>
                    <th>出版社</th>
                    <th>出版日</th>
                    <th>ジャンル</th>
                    <th>ISBN</th>
                    <th>価格</th>
                    <th>登録者</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            @foreach($books as $book)
            <tbody>
                <tr>
                    <td class="middle">{{$book->title}}</td>
                    <td class="center">{{$book->author}}</td>
                    <td class="middle">{{$book->publisher}}</td>
                    <td class="center">{{$book->publication_Date}}</td>
                    <td class="center">{{$book->genre}}</td>            
                    <td class="middle">{{$book->isbn}}</td>
                    <td class="center">{{$book->price}}</td>
                    <td class="center">{{$book->con_id}}</td>
                    <td class="center">{{$book->created_at}}</td>
                    <td class="center">{{$book->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- 削除実行 -->
    <form action="/book/public/db/remove" method="post">
        @csrf
        <input class="button" type="submit" name="bookDataRemove" value="削除を実行する">
    </form>   
</x-app-layout>
