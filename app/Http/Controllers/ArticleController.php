<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

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
        $db = new Article();
        $articles = $db->getData();
        $title = $request->input('title');
        $text = $request->input('sentence');
        if(empty($title) || empty($text)){
            $msg = "タイトルまたは本文が入力されていません";
            return redirect()->route('home')->with(['msg' => $msg]);
        }
        if(strlen($title) > 30){
            $msg = "タイトルは30字以内で入力してください";
            return redirect()->route('home')->with(['msg' => $msg]);
        }
        
        $db->title = $title;
        $db->text = $text;
        $db->save();
        return redirect('/');
    }
}
