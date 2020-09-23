<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articleshow',compact('article'));
    }

    public function edit(Request $request,$id)
    {
        $article = Article::findOrFail($id);
        $validation = $request->validate([
            'title'=>'required|min:10|max:50',
            'body'=>'required|min:40',
        ]);
        if ($validation){
            $article->title = $request->title;
            $article->content = $request->body;

            $article->save();

            return redirect()->back()->with('success', 'تغییرات با موقیت انجام شد');
        }else{
            return back()->with('error','تغییرات ثبت نشد');
        }

    }
}
