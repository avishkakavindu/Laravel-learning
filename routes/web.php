<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('posts/{post}', function ($post) {
//     $posts = [
//         'my-first-post' => 'This is my first blog post.',
//         'my-second-post' => 'This is my second blog post'
//     ];

//     if (!array_key_exists($post, $posts)){
//         abort(404, 'Page not found!');
//     }

//     $context = [
//         'post'=> $posts[$post]
//     ];

//     return view('test', $context);
// });

Route::get('', function(){
    return view('welcome');
});

Route::get('contact', function(){
    return view('contact');
});

Route::get('article', 'ArticleController@index');

Route::get('about', function(){
    $article = App\Article::take(3)->latest()->get();
    $context = [
        'articles'=>$article,
    ];

    return view('about', $context);
});

Route::post('article', 'ArticleController@store');
Route::get('article/create', 'ArticleController@create');
Route::get('article/{article}', 'ArticleController@show');
Route::get('posts/{post}', 'postController@show');
