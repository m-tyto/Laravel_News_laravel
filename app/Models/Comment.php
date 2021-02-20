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

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }

}
