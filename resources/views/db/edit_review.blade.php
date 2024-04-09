<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!DOCTYPE html>
                <html lang="ja">

                <head>
                    <meta charset="UTF-8">
                    <title>レビューの編集</title>
                </head>

                <body>
                    <h1>既にレビューは投稿済みです</h1>
                    @if(isset($exist))
                    <form action="/book/public/db/update_review" method="post">
                        @csrf
                        @foreach($exist as $recode)
                        <input type="hidden" name="id" value="{{ $recode->id }}">
                        <label for="rating">おすすめ度 (1-5): </label>
                        <input type="number" name="rating" id="rating" min="1" max="5" required value="{{ $recode->rating }}"><br><br>
                        <label for="comment">コメント: </label><br>
                        <textarea name="comment" id="comment" rows="4" cols="50">{{ $recode->comment }}</textarea><br><br>

                        <input class="input" type="hidden" name="isbn" value="{{ $isbn }}">
                        <input type="submit" value="この内容で更新する" class="btn btn-primary">
                        @endforeach
                    </form>
                    @endif
                </body>

                </html>

            </div>
        </div>
</x-app-layout>