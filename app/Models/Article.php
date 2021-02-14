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

    //全記事の取得
    public function getData(){
        $data = DB::table($this->table)->get();
        return $data;
    }
}
