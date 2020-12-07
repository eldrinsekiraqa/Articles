<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function create(){

        return view('articles.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'string|required',
            'status' =>'string|required'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $article_data = [
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'user_id' => $user_id
        ];
        $article = Articles::create($article_data);
        if($article->save()){
            $request->session()->flash('success', 'Article has been created successfully!');
        }
        else
        {
            $request->session()->flash('error', 'There is an error postin this Article!');
        }

        return redirect()->route("home");
    }

}
