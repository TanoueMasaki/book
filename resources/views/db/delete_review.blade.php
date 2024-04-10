<link rel="stylesheet" href="{{ asset('/css/style_db_delete.css')  }}">
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの削除
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 id="title">以下のレビューが削除されます。本当に削除しますか？<br></h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 削除レコードの表示 -->
    <div class="scroll_table">
        <table class="main_table">
            <thead>
                <tr>
                <th>投稿者</th>
                    <th>部署名</th>
                    <th>投稿日</th>
                    <th class="short">おすすめ度</th>
                    <th class="long">コメント</th>
                </tr>
            </thead>
            @foreach($review as $book)
            <tbody>
                <tr>
                    <td>{{$book->user->name}}</td>
                    <td>{{$book->user->department->dep_name}}</td>
                    <td>{{$book->created_at}}</td>
                    <td class="short">{{$book->rating}}</td>
                    <td id=comment class="long">{{$book->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- 削除実行 -->
    <form action="/book/public/db/removeReview" method="post">
    @csrf
        <input class="button" type="submit" name="bookDataRemove" value="削除を実行する">
    </form>   
</x-app-layout>
