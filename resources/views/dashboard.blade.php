<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_dashboard.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('top_page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="top">{{ Auth::user()-> name}}さんで{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>

        <main>
            <img class="top" src="{{ asset('/data/image/hondana.png') }}" alt="topImg">
            <div class="frex">
                <form action="/book/public/books" method="get">
                    @csrf
                    <input class="button" type="submit" name="books" value="書籍一覧">
                </form>
                <!-- dep_idがD002だけ書籍登録画面へのリンクを表示する -->
                @if(Auth::user()-> dep_id===1)
                @elseif(Auth::user()-> dep_id===2)
                <form action="/book/public/db/create" method="get">
                    @csrf
                    <input class="button" type="submit" name="books_registration" value="書籍登録">
                </form>   
                @endif
            </div>
        </main>
    </div>
</x-app-layout>
