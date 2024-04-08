<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('completion_of_registration') }}
        </h2>
    </x-slot>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
crossorigin="anonymous">

<style>
    div.back{
        background-image: url(/book/public/img/book3.JPG);
        background-color:rgba(255,255,255,0.4);
        background-blend-mode:lighten;
        background-size: cover;
        background-size: auto auto;
        background-repeat: no-repeat;
    }
</style>

<body>
    <div class="back">
       
        <table class="table table-striped table-bordered">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
            crossorigin="anonymous">
        </script>
    </div>
</body>

</x-app-layout>
