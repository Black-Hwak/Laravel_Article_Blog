<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'detail']);
    }
    public function index(){
        $data = Article::latest()->paginate(5);
        return view('articles.index',[
            'articles' => $data
        ]);
    }

    public function detail($id){
        $data = Article::find($id);
        return view('articles.detail',[
            'article' => $data
        ]);
    }

    public function add(){
        $categories = [
            ['id' => 1, 'name'=>'news'],
            ['id' => 2, 'name'=>'tech']
        ];
        return view('articles.add',[
            'categories' => $categories
        ]);
    }

    public function create(){
        $validator = validator(request()->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        };

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles')->with('add_info', 'New Article Added.');
    }

    public function edit($id){
        $categories = [
            ['id' => 1, 'name'=>'news'],
            ['id' => 2, 'name'=>'tech']
        ];
        $data = Article::find($id);
        return view('articles.edit',[
            'article' => $data,
            'categories' => $categories
        ]);
    }

    public function update($id){
        // $validator = validator(request()->all(),[
        //     'title' => 'required',
        //     'body' => 'required',
        //     'category_id' => 'required'
        // ]);

        // if($validator->fails()){
        //     return back()->withErrors($validator);
        // };

        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        // dd(request()->category_id);
        $article->save();

        return redirect('/articles')->with('update_info', 'Article Updated.');
    }

   

    public function delete($id){
        $data = Article::find($id);
        $data->delete();

        return redirect('/articles')->with('del_info','An Article Deleted.');
    }


}
