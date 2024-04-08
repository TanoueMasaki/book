<x-app-layout>

  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('書籍新規登録') }}
        </h2>
    </x-slot>
<body>
    <h2>本の新規登録</h2>

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
        <input type="text" name="con_id" value="{{Auth::user()->id}}" hidden>
        <p>書籍名</p>
        <input type="text" name="title" id="title" value="{{old('title')}}">
        <p>作者</p>
        <input type="text" name="author" id="author" value="{{old('author')}}">
        <p>出版社</p>
        <input type="text" name="publisher" id="publisher" value="{{old('publisher')}}">
        <p>刊行日</p>
        <input type="date" name="publication_Date" id="publication_Date" value="{{old('publication_Date')}}">
        <p>ジャンル</p>
        <select name="genre">
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
        <input type="text" name="isbn" id="isbn" max="20" pattern="^[0-9]+$" value="{{old('isbn')}}">
        <p>金額</p>
        <input type="number" min="0" name="price" id="price" value="{{old('price',0)}}">
        <input type="submit" value="登録">
    </form>
</body>
</x-app-layout>