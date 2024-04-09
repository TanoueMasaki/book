<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>書籍管理システム</title>
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">

        
    </head>
    <body class="antialiased" background="{{ asset('/img/book.JPG') }}">
        <main>
            <div class="login">
                <p>書籍管理システム</p><hr>
                <!-- <img src="{{ asset('') }}" alt=""> -->
                @if (Route::has('login'))
                    <div class='loginMain'>
                        @auth
                            <a href="{{ url('/dashboard') }}" >{{ Auth::user()->name }}さんこんにちは<br>こちらからお入り下さい</a>
                        @else
                            <a href="{{ route('login') }}" >ログイン</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" >登録</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </main>
    </body>
</html>
