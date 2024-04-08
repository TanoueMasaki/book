<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_books.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('book_list') }}
        </h2>
    </x-slot>

    @if(session('errorMessage')===null)
    @else
    <p id="errorMessage">{{session('errorMessage')}}</p>
    @endif
    
        <div class="scroll_table">
            
                <table class="main_table">
                    <thead>
                        <tr>
                            
                            <th class="short"></th>
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
                            <th class="short"></th>
                            <th class="short"></th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td class="short"><input type="checkbox" name="checkedId[]" value=<?=$book->id?> ></td>
                            <td class="short">{{$book->id}}</td>
                            <td class="long">{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td class="long">{{$book->publisher}}</td>
                            <td>{{$book->publication_Data}}</td>
                            <td>{{$book->genre}}</td>
                            <td>{{$book->isbn}}</td>
                            <td class="short">{{$book->price}}円</td>
                            <td class="short">{{$book->user->name}}</td>
                            <td>{{$book->created_at}}</td>
                            <td>{{$book->updated_at}}</td>
                            <td class="short">
                                <form action="/book/public/books_detail" method="post">
                                @csrf
                                    <input class="input" type="hidden" name="isbn" value=<?=$book->isbn?>>
                                    <input class="buttonDetail" type="submit" value="詳細">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/book/public/db/deleteOrUpdate" method="post">
                @csrf
                <input class="button" type="submit" name="bookDataDelete" value="削除">
                <input class="button" type="submit" name="bookDataUpdate" value="編集">
                <input class="button" type="reset" value="リセット">
            </form>
        </div>
</x-app-layout>