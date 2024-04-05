<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍管理システム</title>
</head>
<body>
    <h2>本の新規登録</h2>
    <form action="/db/store" method="post">
        @csrf
        <p>書籍名</p>
        <input type="text" name="title" id="title">
        <p>作者</p>
        <input type="text" name="author" id="author">
        <p>出版社</p>
        <input type="text" name="publisher" id="publisher">
        <p>刊行日</p>
        <input type="text" name="publication_Date" id="publication_Date">
        <p>ジャンル</p>
        <select name="genre">
            <option value="文芸書">文芸書</option>
            <option value="実用書">実用書</option>
            <option value="専門書">専門書</option>
            <option value="雑誌">雑誌</option>
            <option value="漫画">漫画</option>
            <option value="絵本">絵本</option>
            <option value="その他">その他</option>
        </select>
        <p>ISBN(書籍番号)</p>
        <input type="text" name="isbn" id="isbn" max="20" pattern="^[0-9]+$">
        <p>金額</p>
        <input type="number" name="price" id="price" max="11">
        <input type="submit" value="登録">
    </form>
</body>
</html>