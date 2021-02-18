<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Validator;

class ArticleController extends Controller
{
    //記事の表示処理
    public function index(){
        $db = new Article();
        $articles = $db->getData();
        return view("articles.index")->with('articles',$articles);
    }
    
    //記事の追加処理
    public function add(Request $request){
        $this->validate($request,[
            'title' => 'required|max:30',
            'text' => 'required',
        ],[
            'title.required' => "タイトルは必須入力です",
            'text.required' => "記事は必須入力です",
            'title.max' => "タイトルは30字以内です"
        ]);
       
        Article::create($request->all());
        return redirect('/');
    }
}
