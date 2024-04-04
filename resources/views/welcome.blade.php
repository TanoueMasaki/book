<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>書籍管理システム</title>
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">

        
    </head>
    <body class="antialiased">
        
            <h2>書籍管理システム</h2><hr>
            <!-- <img src="{{ asset('') }}" alt=""> -->
            <a href="{{ route('register') }}">新規登録</a>
            <a href="{{ route('login') }}">ログイン</a>
    </body>
</html>
