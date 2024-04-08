<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('書籍新規登録') }}
        </h2>
    </x-slot>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
crossorigin="anonymous">

<style>
    .input{ 
        width:15em;
        margin-bottom: 20px; 
    }
    div.back{
        background-image: url(/book/public/img/book2.JPG);
        background-color:rgba(255,255,255,0.4);
        background-blend-mode:lighten;
        background-size: cover;
    }
    form{
        margin: 0 0 50px 200px;
    }
    p{
        font-size:20px;
        font-weight:bold;
        margin: 0;
    }
    .link p{
        margin: 0 0 0 200px;
        padding: 0 0 100px 0;
        font-size:20px;
        font-weight:bold;
        color:rgb(0,0,0);
    }
</style>

    

<body>
    <div class="back">
        <br><br>
        <!-- バリデーションチェックエラーがあれば表示 -->
        @if($errors->any())
        <div  class="errors">
            <p>※不正な入力があります※</p>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/book/public/db/store" method="post">
            @csrf
            <input class="input" type="text" name="con_id" value="{{Auth::user()->id}}" hidden>
            <p>書籍名</p>
            <input class="input" type="text" name="title" id="title" value="{{old('title')}}">
            <p>作者</p>
            <input class="input" type="text" name="author" id="author" value="{{old('author')}}">
            <p>出版社</p>
            <input class="input" type="text" name="publisher" id="publisher" value="{{old('publisher')}}">
            <p>刊行日</p>
            <input class="input" type="date" name="publication_Date" id="publication_Date" value="{{old('publication_Date')}}">
            <p>ジャンル</p>
            <select class="input" name="genre">
                <option hidden >選択して下さい</option>
                <option value="文芸書" @if("文芸書" === old('genre'))  selected @endif>文芸書</option>
                <option value="実用書" @if("実用書" === old('genre'))  selected @endif>実用書</option>
                <option value="専門書" @if("専門書" === old('genre'))  selected @endif>専門書</option>
                <option value="雑誌" @if("雑誌" === old('genre'))  selected @endif>雑誌</option>
                <option value="漫画" @if("漫画" === old('genre'))  selected @endif>漫画</option>
                <option value="絵本" @if("絵本" === old('genre'))  selected @endif>絵本</option>
                <option value="その他" @if("その他" === old('genre'))  selected @endif>その他</option>
            </select>
            <p>ISBN(書籍番号)</p>
            <!-- pattern="^[0-9]+$" -->
            <input class="input" type="text" name="isbn" id="isbn" max="20" pattern="^[0-9]+$" value="{{old('isbn')}}">
            <p>金額</p>
            <input class="input" type="number" min="0" name="price" id="price" value="{{old('price',0)}}" maxlength="11" class="input">
            <input class="btn btn-primary" type="submit" value="登録">
        </form>
        <div class="link">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <p>{{ __('top_page') }}</p>
            </x-nav-link>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
</body>
</x-app-layout>