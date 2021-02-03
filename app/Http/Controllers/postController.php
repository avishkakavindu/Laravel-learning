<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postController extends Controller
{
    public function show($slug)
    {
//        $post = \DB::table('post')->where('slug',$slug)->first();
        $post = Post::where('slug', $slug)-> firstOrFail();

        $context = [
            'post' => $post
        ];

        return view('test', $context);
    }
}
