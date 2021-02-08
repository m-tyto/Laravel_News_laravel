<!DOCTYPE html>
<html lang="ja">
<head>
    <title>LaravelNews</title>
</head>
<body>
    <h1>LaravelNews</h1>
    <form action="{{ url('/')}}" method="post">
        <dl class="form">
        @csrf
            <dt>タイトル</dt>
            <dd><input type="text" name="title"></dd>
            <dt>本文</dt>
            <dd><textarea name="sentence" cols="50" rows="10"></textarea></dd>
            <div class="button"><input type="submit" value="投稿"> </div>
      </dl> 
    </form>
</body>
</html>
