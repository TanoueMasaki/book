<link rel="stylesheet" href="{{ asset('/css/style_create_review.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            新規レビューの作成
        </h2>
    </x-slot>
    <div class="main">
        <form action="/book/public/db/confirm_review" method="post">
            @csrf
            <div>
                <label for="rating">おすすめ度 (1-5): </label>
                <input type="number" name="rating" id="rating" min="1" max="5" required><br><br>
            </div>
            <div>
                <label for="comment">コメント: </label><br>
                <textarea name="comment" id="comment" rows="4" cols="50" required></textarea><br><br>
            </div>
            <div class="button">
                <input class="input" name="isbn" value="{{ $isbn }}">
                <input class="button" type="submit" name="confirm" value="投稿の確認" >
            </div>
        </form>
        <div class="link">
            <x-nav-link :href="route('booked')" :active="request()->routeIs('booked')">
                <p>一覧に戻る</p>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>