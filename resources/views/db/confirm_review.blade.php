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
                    <title>投稿の確認</title>
                </head>

                <body>
                    <h1>投稿の確認</h1>
                    <table class="table">
                        <tr><th>おすすめ度</th><th>コメント</th></tr>
                        <tr>
                            <td>{{ $rating }}</td>
                            <td>{{ $comment }}</td>
                        </tr>
                    </table>
                    <br>
                    @foreach($books as $book)
                    <form action="/book/public/db/submit_review" method="post">
                        @csrf
                        <input type="hidden" name="rating" value="{{ $rating }}">
                        <input type="hidden" name="comment" value="{{ $comment }}">
                        <button type="button" onclick="history.back()">戻る</button>
                        <input class="input" type="hidden" name="isbn" value=<?= $book->isbn ?>>
                        <input type="submit" value="この内容で投稿する" class="btn btn-primary">
                    </form>
                    @endforeach
                </body>

                </html>

            </div>
        </div>
</x-app-layout>