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
    html {
        resize: none;
        width:100%;
        height:100%;
    }
    body{
        height: 100%;
    }
    .input{ 
        width:300px;
        margin-bottom: 20px; 
    }
    div.back{
        background-image: url(/book/public/img/book2.JPG);
        background-color:rgba(255,255,255,0.4);
        background-blend-mode:lighten;
        background-size: cover;
        padding-left:300px ;
        padding-top:50px ;
        height: 100%;
    }
    form{
        margin: 0 0 50px 0;
    }
    p{
        font-size:20px;
        font-weight:bold;
        margin: 0;
    }
    .link p{
        padding: 10px;
        margin: 0 0 100px 0;
        font-size:20px;
        font-weight:bold;
        color:rgb(0,0,0);
        border-radius: 20%;
    }
    .link p:hover{
    color:rgba(255, 255, 255,1);
    background: rgba(0, 0, 0,0.7);
    transition: .2s;
    }
    .errors{
        color:red;
        font-weight:bold;
    }
    li.errors{
        list-style:none;
    }
</style>

    

<body>
    <div class="back">
        
        <!-- バリデーションチェックエラーがあれば表示 -->
        @if($errors->any())
        <div  class="errors">
            <p>入力に誤りがあります</p>
            <p>各項目を確認して下さい</p>
        </div>
        @endif

        <form action="/book/public/db/store" method="post">
            @csrf
            <input class="input" type="text" name="con_id" value="{{Auth::user()->id}}" hidden>
            <p>書籍名</p>
            @if ($errors->has('title'))
                <li class="errors">{{$errors->first('title')}}</li>
            @endif
            <input class="input" type="text" name="title" id="title" value="{{old('title')}}">
            <p>著者</p>
            @if ($errors->has('author'))
                <li class="errors">{{$errors->first('author')}}</li>
            @endif
            <input class="input" type="text" name="author" id="author" value="{{old('author')}}">
            <p>出版社</p>
            @if ($errors->has('publisher'))
                <li class="errors">{{$errors->first('publisher')}}</li>
            @endif
            <input class="input" type="text" name="publisher" id="publisher" value="{{old('publisher')}}">
            <p>出版日</p>
            @if ($errors->has('publication_Date'))
                <li class="errors">{{$errors->first('publication_Date')}}</li>
            @endif
            <input class="input" type="date" name="publication_Date" id="publication_Date" value="{{old('publication_Date')}}">
            <p>ジャンル</p>
            @if ($errors->has('genre'))
                <li class="errors">{{$errors->first('genre')}}</li>
            @endif
            <select class="input" name="genre" required>
                <option value="" hidden>選択して下さい</option>
                <option value="文芸書" @if("文芸書" === old('genre'))  selected @endif>文芸書</option>
                <option value="実用書" @if("実用書" === old('genre'))  selected @endif>実用書</option>
                <option value="専門書" @if("専門書" === old('genre'))  selected @endif>専門書</option>
                <option value="雑誌" @if("雑誌" === old('genre'))  selected @endif>雑誌</option>
                <option value="漫画" @if("漫画" === old('genre'))  selected @endif>漫画</option>
                <option value="絵本" @if("絵本" === old('genre'))  selected @endif>絵本</option>
                <option value="その他" @if("その他" === old('genre'))  selected @endif>その他</option>
            </select>
            <p>ISBN(書籍番号)</p>
            @if ($errors->has('isbn'))
                <li class="errors">{{$errors->first('isbn')}}</li>
                <li class="errors">数量を変更する場合は書籍一覧の編集から行ってください</li>
            @endif
            <!-- pattern="^[0-9]+$" -->
            <input class="input" type="text" name="isbn" id="isbn" max="20" pattern="^[0-9]+$" value="{{old('isbn')}}">
            <p>価格</p>
            @if ($errors->has('price'))
                <li class="errors">{{$errors->first('price')}}</li>
            @endif
            <input class="input" type="number" min="0" name="price" id="price" value="{{old('price',0)}}" maxlength="11" class="input"><br>
            <input class="btn btn-primary" type="submit" value="登録する">
        </form>
        <div class="link">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <p>{{ __('top_page') }}に戻る</p>
            </x-nav-link>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
</body>
</x-app-layout>