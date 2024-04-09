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
                    <title>新規レビューの作成</title>
                </head>

                <body>
                    <h1>新規レビューの作成</h1>
                    @foreach($books as $book)
                    <form action="/book/public/db/confirm_review" method="post">
                        @csrf
                        <label for="rating">おすすめ度 (1-5): </label>
                        <input type="number" name="rating" id="rating" min="1" max="5" required><br><br>
                        <label for="comment">コメント: </label><br>
                        <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br><br>

                        <input class="input" type="hidden" name="isbn" value=<?= $book->isbn ?>>
                        <input type="submit" value="投稿の確認" class="btn btn-primary">

                    </form>
                    @endforeach
                </body>

                </html>

            </div>
        </div>
</x-app-layout>