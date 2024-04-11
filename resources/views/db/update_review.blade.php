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
div.main{
    width: fit-content;
    padding: 30px;
    margin: 0 auto;
}
/* ボタン */
.button{
    font-size: 30px;
    width: fit-content;
    margin: 5px 20px 5px 20px;
    padding: 10px 20px 10px 20px;
    border-radius: 10px;
    background: #e2e2e7;
    color: #555555;
    vertical-align: middle;
    text-align: center;
}
.button:hover{
    background: rgb(102, 102, 110);
    color: rgb(255, 255, 255);
    transition: .2s;
}
h1#title{
    font-size:30px;
    font-weight:bold;
    padding: 10px 30px 10px 30px;
    background-color:rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    margin-bottom:50px ;
}
table{
    margin: 50px 0 50px;
    width: 100%;
    background: #ffffff;
}
table th.long{
    width: 80%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 20px;
    background-color: #bebec3;
}
table th.short{
    width: 20%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 30px;
    background-color: #bebec3;
}
table td.long{
    width: 80%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 28px;
}
table td.short{
    width: 20%;
    text-align: center;
    vertical-align: middle;
    border-top: 1px solid rgb(82, 81, 81);
    border-right: 1px solid rgb(82, 81, 81);
    border-left: 1px solid rgb(82, 81, 81);
    border-collapse: collapse;
    font-size: 18px;
}


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            更新・削除
        </h2>
    </x-slot>
    <div class="main">
        <h1 id="title">{{ $message }}</h1>
        @if($message==="レビューを更新しました")
        
        <table class="main">
            <tr class="short"><th class="short">おすすめ度</th><th class="long">コメント</th></tr>
            <tr>
                <td class="short">{{ $rating }}</td>
                <td class="long">{{ $comment }}</td>
            </tr>
        </table>
        @endif
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <p class="button">{{ __('top_page') }}へ戻る</p>
        </x-nav-link>
        <x-nav-link :href="route('booked')" :active="request()->routeIs('booked')">
            <p class="button">書籍一覧に戻る</p>
        </x-nav-link> 
    </div>
</x-app-layout>