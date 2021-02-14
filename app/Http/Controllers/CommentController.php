<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    //対象記事、コメント表示処理
    public function index($id){
        $db = new Comment;
        $article = $db->getArticle($id);
        $comments = $db->getComment($id);

        return view("comments.index")->with([
            'article' => $article,
            'comments' => $comments
            ]);
    }

    //コメント追加処理
    public function add($id,Request $request){
        $db = new Comment;
        $article = $db->getArticle($id);
        $name = $request->input("name");
        $comment = $request->input("comment");

        if(empty($comment)){
            $msg =  "コメントを入力してください";
            return redirect()->route('comment_home',['id' => $id])->with(['msg' => $msg]);
        }

        $db->article_id = $id;
        $db->name = $name;
        $db->comment = $comment;
        $db->save();
        
        return redirect()->route('comment_home', ['id' => $id]);
    }

    //コメント削除処理
    public function delete($id,Request $request){
        $db = new Comment;
        $comment_id = $request->input("comment_id");
        $comment = Comment::find($comment_id);
        $comment->delete();
        
        return redirect()->route('comment_home', ['id' => $id]);
    }
}
