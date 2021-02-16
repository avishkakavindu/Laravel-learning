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


    public function show(Article $article){
        // Render a single resource
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

        Article::create($this->validateArticle());
        return redirect(route('article.index'));
    }


    public function edit(Article $article){
        $context = [
            'article'=>$article
        ];
        return view('article.edit', $context);
    }


    public function update(Article $article){

        $article->update($this->validateArticle());

        return redirect('/article/'.$article->id);
    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
