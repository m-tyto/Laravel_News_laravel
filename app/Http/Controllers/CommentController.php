<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{

    //対象記事、コメント表示処理
    public function index(Article $article){
       //$article = Article::find($id);
       $comments = $article->comments;

        return view("comments.index")->with([
            'article' => $article,
            'comments' => $comments
            ]);
    }

    //コメント追加処理
    public function add(Request $request){
        $this->validate($request,[
            'name' => 'required|max:30',
            'comment' => 'required',
        ],[
            'name.required' => "名前は必須入力です",
            'comment.required' => "コメントは必須入力です"
        ]);
        Comment::create($request->all());
        $id = $request->input('article_id');
        
        return redirect()->route('comment_home', ['id' => $id]);
    }

    //コメント削除処理
    public function delete(Request $request){
        $db = new Comment;
        $comment_id = $request->input("comment_id");
        $article_id = $request->input("article_id");
        $comment = Comment::find($comment_id);
        $comment->delete();
        
        return redirect()->route('comment_home', ['id' => $article_id]);
    }
}
