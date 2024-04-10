<style>
html{
height: 100%;
}
body{
    height: 100%;
}
div.min-h-screen bg-gray-100 dark:bg-gray-900{
    margin: 0;
    padding: 0;
}
main{
    height: 85%;
    width: 100%;
    padding: 30px;
    background-image: url(/book/public/data/image/book3.jpg);
    /* background-color:rgba(255,255,255,0.4); */
    background-size:  100% auto;
    background-repeat: no-repeat;
    background-position-y:-400px ;
}
/* メインテーブル */
div.main{
    width: 50%;
    height: fit-content;
    margin: 0 auto;
    padding: 30px;
    background-color:rgba(0, 0, 0, 0.589);
    border-radius: 50px;
}
table{
    margin: 50px;
    width: 100%;
    background: #ffffff;
}
table th.long{
    width: 60%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 12px;
}
table th.short{
    width: 40%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 12px;
}
table td.long{
    width: 60%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 12px;
}
table td.short{
    width: 40%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 12px;
}
/* ボタン */
input.button{
    font-size: 20px;
    width: 200px;
    margin: 5px 10px 5px 10px;
    padding: 3px 8px 3px 8px;
    border-radius: 10px;
    background: #e2e2e7;
    color: #555555;
}
input.button:hover{
    background: rgb(102, 102, 110);
    color: rgb(255, 255, 255);
    transition: .2s;
}
h1#title{
    font-size:20px;
    font-weight:bold;
    padding: 10px 30px 10px 30px;
    background-color:rgba(255, 255, 255, 0.8);
    border-radius: 10px;
}


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            投稿の確認
        </h2>
    </x-slot>

    <div class="main">
        <h1 id="title">以下の内容で投稿します、宜しいですか？</h1>
        <table class="table">
            <tr><th class="short">おすすめ度</th><th class="long">コメント</th></tr>
            <tr>
                <td class="short">{{ $rating }}</td>
                <td class="long">{{ $comment }}</td>
            </tr>
        </table>
        <form action="/book/public/db/submit_review" method="post">
            @csrf
            <input type="hidden" name="rating" value="{{ $rating }}">
            <input type="hidden" name="comment" value="{{ $comment }}">
            <button type="button" onclick="history.back()">戻る</button>
            <input class="input" hidden name="isbn" value="{{$isbn}}">
            <input class="button" type="submit" value="この内容で投稿する" >
        </form>
    </div>
</x-app-layout>