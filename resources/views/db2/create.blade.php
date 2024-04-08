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
            background-image: url(/book/public/img/book2.JPG);
            background-color:rgba(255,255,255,0.4);
            background-blend-mode:lighten;
            background-size: cover;
            width:900px; margin:0 auto;
        }
        .input{ width:15em; }
        form{
            background-color:rgba(255,255,255,0);
        }
    </style>
</head>
<body>
    <div class="mb-3">
    <br><br>
    <h2>本の新規登録</h2>
    <hr>
    <form action="/book/resources/views/db/store" method="post">
        @csrf
        <br>
        <lavel>書籍名</lavel><br>
        <input type="text" name="title" id="title" class="input"><br><br>
        <lavel>作者</lavel><br>
        <input type="text" name="author" id="author" class="input"><br><br>
        <lavel>出版社</lavel><br>
        <input type="text" name="publisher" id="publisher" class="input"><br><br>
        <lavel>刊行日</lavel><br>
        <input type="text" name="publication_Date" id="publication_Date" class="input"><br><br>
        <lavel>ジャンル</lavel><br>
        <select name="genre">
            <option value="文芸書">文芸書</option>
            <option value="実用書">実用書</option>
            <option value="専門書">専門書</option>
            <option value="雑誌">雑誌</option>
            <option value="漫画">漫画</option>
            <option value="絵本">絵本</option>
            <option value="その他">その他</option>
        </select><br><br>
        <lavel>ISBN(書籍番号)</lavel><br>
        <input type="text" name="isbn" id="isbn"  pattern="^[0-9]{20}$" class="input"><br><br>
        <lavel>金額</lavel><br>
        <input type="number" name="price" id="price" maxlength="11" class="input"><br><br>
        </div>
        <input type="submit" value="登録" class="btn btn-primary">
    </form>
    <br><br>
    <a href="/book/resources/views/dashboard">Topに戻る</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
</body>
</html>