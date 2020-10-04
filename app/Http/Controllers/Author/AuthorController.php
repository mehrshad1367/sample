<?php

namespace App\Http\Controllers\Author;

use App\Artical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index(){

//        $id = Auth::user()->id;
 $x=Artical::where('id',2);
        Log::info(print_r($x, true));

        return view('portal.author',compact('articles'));
    }

    public function edit($id)
    {

        $article=Artical::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function update(Request $request,$id)
    {
        $input=$request->all();
        $article=Artical::find($request->input('id'));

        $article->title = $input['title'];
        $article->category = $input['category'];
        $article->body = $input['body'];

        $article->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    public function confirm($id)
    {
        $article=Artical::find($id);
        if ($article->status == 0) {
            $article->status = 1;
            $article->save();
        }else{
            $article->status = 0;
            $article->save();
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $article=Artical::find($id);
        $article->delete();
        return redirect()->back();
    }
}
