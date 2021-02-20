<!DOCTYPE html>
<html lang="ja">
<head>
    <title>LaravelNews</title> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type='text/css'>
</head>
<body>
    <h1>LaravelNews</h1>
    <div class="article">
        <h2>{{$article->title}}</h3>
        <p>{{$article->text}}</p>
        <hr>
    </div>

    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    
    <h4>コメント</h3>
    <form action="{{route('comment_add')}}" method="post" onsubmit="return addCommentConfirm()">
        @csrf
        <dl class="form">
            <dt>名前</dt>
            <dd><input type="text" name="name" value="匿名"></dd>
            <dt>コメント</dt>
            <dd><textarea name="comment" cols="50" rows="10"></textarea></dd>
            <input type="hidden" name='article_id' value="{{ $article->id }}">
            <div class="button"><input type="submit" value="コメントする"> </div>
      </dl> 
    </form>

    @if(isset($comments))
        @foreach($comments as $comment)
            <p>{{ $comment->name }}</p>
            <p>{{ $comment->comment }}</p>
            <form action="{{route('comment_del',['id' => $article->id])}}" method='post' onsubmit="return deleteCommentConfirm()">
                @method('delete')
                @csrf
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <input type="hidden" name='article_id' value="{{$comment->article_id}}">
                <input type="submit" value="コメントを削除する">
            </form>
            <hr>
        @endforeach
    @endif
    
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>