<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index(){
        // Render a list of resources
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else {
            $articles = Article::latest()->get();
        }

        $context = [
            'articles'=>$articles
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
        $tags = Tag::all();

        $context = [
            'tags'=>$tags
        ];
        return view('article.create', $context);
    }


    public function store(){
        // validate first
        $this->validateArticle();
        // if valid
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;   // hard-coding
        $article->save();

        $article->tags()->attach(request('tags'));
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
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
