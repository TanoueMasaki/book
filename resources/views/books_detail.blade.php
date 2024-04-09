<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('book_detail') }}
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
                        <th>登録者</th>
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
                        <td>{{$book->con_id}}</td>
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

                    @foreach($reviews as $book)
                    <tr>
                        <td>{{$book->rating}}</td>
                        <td>{{$book->comment}}</td>
                        <td>{{$book->user->name}}</td>
                        <td>{{$book->user->department->dep_name}}</td>
                        <td>{{$book->created_at}}</td>
                    </tr>
                    @endforeach
                </table>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($books as $book)
                    <form action="/book/public/db/create_review" method="post">
                        @csrf
                        <input class="input" type="hidden" name="isbn" value=<?= $book->isbn ?>>
                        <input type="submit" value="レビューの投稿" class="btn btn-primary">
                    </form>
                    @endforeach
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/list">一覧表示へ戻る</a><br>
                    <a href="/book/db/create">レビュー登録</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>