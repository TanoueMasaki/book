<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    <style>
        body{
            width:800px; margin:0px auto; 
            background-image: url(/book/public/img/book3.JPG);
            background-size: auto auto;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <br><br>
    <h2>本の情報を登録しました</h2>
    <hr>
    <table class="table table-striped table-bordered">
        <tr><th>書籍名</th><td>{{ $record -> title }}</td></tr>
        <tr><th>作者</th><td>{{ $record -> author }}</td></tr>
        <tr><th>出版社</th><td>{{ $record -> publisher }}</td></tr>
        <tr><th>刊行日</th><td>{{ $record -> publication_Date }}</td></tr>
        <tr><th>ジャンル</th><td>{{ $record -> genre }}</td></tr>
        <tr><th>ISBN(書籍番号)</th><td>{{ $record -> isbn }}</td></tr>
        <tr><th>金額</th><td>{{ $record -> price }}円</td></tr>

    </table>
    <br>
    <a href="/book/resources/views/db/create">続けて登録する</a><br><br>
    <a href="/book/resources/views/dashboard">Topに戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
</body>
</html>