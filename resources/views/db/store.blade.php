<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍管理システム</title>
</head>
<body>
    <h2>本の情報を登録しました</h2>
    <table>
        <tr><th>書籍名</th><td>{{ $record -> title }}</td></tr>
        <tr><th>作者</th><td>{{ $record -> author }}</td></tr>
        <tr><th>出版社</th><td>{{ $record -> publisher }}</td></tr>
        <tr><th>刊行日</th><td>{{ $record -> publication_Date }}</td></tr>
        <tr><th>ジャンル</th><td>{{ $record -> genre }}</td></tr>
        <tr><th>ISBN(書籍番号)</th><td>{{ $record -> isbn }}</td></tr>
        <tr><th>金額</th><td>{{ $record -> price }}</td></tr>

    </table>
    <br>
    <a href="/db/create">続けて登録する</a><br><br>
    <a href="/dashboard">Topに戻る</a>
</body>
</html>