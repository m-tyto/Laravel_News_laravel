<!DOCTYPE html>
<html lang="ja">
<head>
    <title>LaravelNews</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type='text/css'>
</head>
<body>
    <h1>LaravelNews</h1>
    
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    
    <form action="{{ route('article_add')  }}" method="post" onsubmit="return addArticleConfirm()">
        <dl class="form">
        @csrf
            <dt>タイトル</dt>
            <dd><input type="text" name="title"></dd>
            <dt>本文</dt>
            <dd><textarea name="text" cols="50" rows="10"></textarea></dd>
            <div class="button"><input type="submit" value="投稿"> </div>
      </dl> 
    </form>
    @foreach($articles as $article)
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->text }}</p>
        <a href="{{route('comment_home', $article->id)}}">コメントを表示する</a>
        <hr>
    @endforeach

    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
