<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyArticlesController extends Controller
{
    public function index(){
        $user = Auth::user();
        $articles = Articles::with('user')
            ->where('user_id',$user->id)
            ->orderByDesc('publish_date')
            ->get();
        return view('my_articles.index')->with('articles',$articles);
    }
    public function destroy(Request $request, $id)
    {
        $article = Articles::find($id);
        if($article->delete()){
            $request->session()->flash('success', 'Article has been deleted successfully!');
        }
        else
        {
            $request->session()->flash('error', 'There is an error deleting this Article!');
        }
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $article = Articles::where('id',$id)
            ->first();
        if ($article){
            $article->status='Publish';
            $article->publish_date=date('Y-m-d G:i:s');
            $article->save();
            $request->session()->flash('success', 'Article has been published successfully!');
        }else
        {
            $request->session()->flash('error', 'There is an error publishing this Article!');
        }
        return redirect()->route('home');
    }
}
