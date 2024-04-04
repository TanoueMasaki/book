<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ Auth::user()-> name}}さんで{{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/laravel/book/public/books" method="post">
                        @csrf
                        <input class="button" type="submit" name="books" value="書籍一覧">
                        <!-- dep_idがD002だけ書籍登録画面へのリンクを表示する -->
                        @if(Auth::user()-> dep_id==="D001")
                            @elseif(Auth::user()-> dep_id==="D002")
                            <input class="button" type="submit" name="books_registration" value="書籍登録">
                        @endif
                    </form>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
