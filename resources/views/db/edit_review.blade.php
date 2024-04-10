<link rel="stylesheet" href="{{ asset('/css/style_create_review.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            レビューの編集・削除
        </h2>
    </x-slot>
    <div class="main">
        <h1>既にレビューは投稿済みです</h1>
        <form action="/book/public/db/update_review" method="post">
            @csrf
            @foreach($exist as $recode)
            <input type="hidden" name="id" value="{{ $recode->id }}">
            <label for="rating">おすすめ度 (1-5): </label>
            <input type="number" name="rating" id="rating" min="1" max="5" required value="{{ $recode->rating }}"><br><br>
            <label for="comment">コメント: </label><br>
            <textarea name="comment" id="comment" rows="4" cols="50">{{ $recode->comment }}</textarea><br><br>
            <div class="button">
                <input class="input" hidden name="isbn" value="{{ $isbn }}">
                <input class="button" type="submit" name="update" value="更新">
                <input class="button" type="submit" name="delete" value="削除">
            </div>
            @endforeach
        </form>
        <div class="link">
            <x-nav-link :href="route('booked')" :active="request()->routeIs('booked')">
                <p>一覧に戻る</p>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>