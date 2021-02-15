<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index(){
        // Render a list of resources

        $context = [
            'articles'=>Article::latest()->get()
        ];

        return view('article.index', $context);

    }


    public function show($article_id){
        // Render a single resource

        $article = Article::find($article_id);

        $context = [
            'article'=>$article
        ];

        return view('article.show', $context);
    }


    public function create(){
        // Show a view to create a new  resource
        return view('article.create');
    }


    public function store(){
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/article');
    }
}
