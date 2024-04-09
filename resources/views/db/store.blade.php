<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('completion_of_registration') }}
        </h2>
    </x-slot>

<style>
    html,body{
        height: 100%;
    }
    div.back{
        background-image: url(/book/public/img/book3.JPG);
        background-color:rgba(255,255,255,0.4);
        background-size:  100% auto;
        background-repeat: no-repeat;
        padding-top: 50px;
        height: 100%;
        text-align: center;
    }
    table,th,td{
        margin: 0 auto;
        border-radius: 5%;
        border: 1px solid rgb(82, 81, 81);
        background-color:rgba(255,255,255,1);
        border-collapse: collapse;
    }
    table{
        padding-top:50px;
    }
    th,td{
        padding: 5px 20px 5px 20px;
    }
    th{
        font-size:24px;
        font-weight:bold;
        width: fit-content;
    }
    td{
        width: 500px;
        font-size:20px;
    }
    .frex{
        width: fit-content;
        display: flex;
        margin: 0 auto;
    }
    .frex input.button{
        padding: 5px 20px 5px 20px;
        margin: 50px 20px 50px 20px;
        font-size:24px;
        font-weight:bold;
        width: fit-content;
        border-radius: 10%;
        color:rgba(255, 255, 255,1);
        background: rgba(0, 0, 0,0.7);
    }
    .frex input.button:hover{
    color:rgba(0, 0, 0,1);
    background: rgba(255, 255, 255,0.7);
    transition: .2s;
}

</style>

<body>
    <div class="back">
       
        <table >
            <tr><th>書籍名</th><td>{{ $title }}</td></tr>
            <tr><th>作者</th><td>{{ $author }}</td></tr>
            <tr><th>出版社</th><td>{{ $publisher }}</td></tr>
            <tr><th>刊行日</th><td>{{ $publication_Date }}</td></tr>
            <tr><th>ジャンル</th><td>{{ $genre }}</td></tr>
            <tr><th>ISBN(書籍番号)</th><td>{{ $isbn }}</td></tr>
            <tr><th>金額</th><td>{{ $price }}</td></tr>
        </table>
        
        <div class="frex">
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
        </div>
    </div>
</body>

</x-app-layout>
