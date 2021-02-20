<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //テーブル選択
    protected $table = 'articles';

    //操作可能項目選択
    protected $fillable = [
        "title",
        "text"
    ];
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

}
