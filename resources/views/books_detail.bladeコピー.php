<x-app-layout>
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
                    </tr>
                    @endforeach
                </table>

                <table>
                    <tr>
                        <th>おすすめ度</th>
                        <th>コメント</th>
                        <th>投稿者</th>
                        <th>部署名</th>
                        <th>投稿日</th>
                    </tr>
                    @foreach($relations2 as $record)
                    <tr>
                        <td>{{$record->name}}</td>
                        <td>{{$record->dep_id_str}}</td>
                        <td>{{$record->users->department->dep_name}}</td>
                    </tr>
                    @endforeach

                    
                </table>

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