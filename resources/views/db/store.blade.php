<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('completion_of_registration') }}
        </h2>
    </x-slot>

    <body>
        <h2>本の情報を登録しました</h2>
        <table>
            <tr><th>書籍名</th><td>{{ $title }}</td></tr>
            <tr><th>作者</th><td>{{ $author }}</td></tr>
            <tr><th>出版社</th><td>{{ $publisher }}</td></tr>
            <tr><th>刊行日</th><td>{{ $publication_Date }}</td></tr>
            <tr><th>ジャンル</th><td>{{ $genre }}</td></tr>
            <tr><th>ISBN(書籍番号)</th><td>{{ $isbn }}</td></tr>
            <tr><th>金額</th><td>{{ $price }}</td></tr>

        </table>
        <br>
        <form action="/book/public/dashboard" method="post">
            @csrf
            <input class="button" type="submit" name="dashboard" value="Topに戻る">
        </form>
        <!-- dep_idがD002だけ書籍登録画面へのリンクを表示する -->
        @if(Auth::user()-> dep_id===1)
            @elseif(Auth::user()-> dep_id===2)
            <form action="/book/public/db/create" method="post">
                @csrf
                <input class="button" type="submit" name="books_registration" value="続けて登録する">
            </form>   
        @endif
    </body>
</x-app-layout>