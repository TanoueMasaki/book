<x-app-layout>
    <style>
        th{width:200px}
        table,
        table th,
        table td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px 10px 0 10px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                

                <table>
                    <tr>
                        <th></th>
                        <th>タイトル</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th>出版日</th>
                        <th>ジャンル</th>
                        <th>ISBN</th>
                        <th>価格</th>
                        <th>登録日時</th>
                        <th>更新日時</th>
                    </tr>
                    @foreach($books as $book)
                        <form action="/book/public/books_detail" method="post">
                        @csrf
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->publisher}}</td>
                                <td>{{$book->publication_Data}}</td>
                                <td>{{$book->genre}}</td>
                                <td>{{$book->isbn}}</td>
                                <td>{{$book->price}}円</td>
                                <td>{{$book->created_at}}</td>
                                <td>{{$book->updated_at}}</td>
                                <td><input class="button" type="submit"  value="詳細"></td>
                                
                            </tr>
                        </form>
                    @endforeach
                </table>

                <!-- name=<?=$book->id?> -->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/list">一覧表示</a><br>
                    <!-- dep_idがD002だけ書籍登録画面へのリンクを表示する -->
                    @if(Auth::user()-> dep_id==="D001")
                        @elseif(Auth::user()-> dep_id==="D002")
                        <a href="/db/create">データ登録</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>