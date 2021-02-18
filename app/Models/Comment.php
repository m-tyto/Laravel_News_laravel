<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    //テーブル選択
    protected $table = 'comments';

    //操作可能項目選択
    protected $fillable = [
        "id",
        "article_id",
        "name",
        "comment"
    ];

    //対象記事取得
    public function getArticle($article_id){
        $article = DB::table('articles')->where('id',$article_id)->first();
        return $article;
    }

    //対象コメント取得
    public function getComment($article_id){
        $comments = DB::table($this->table)->where('article_id',$article_id)->get();
        return $comments;
    }

    public function article(){
        return $this->belongsTo('App\Article', 'foreign_key');
    }

}
