<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function show($post)
    {
        $posts = [
            'my-first-post' => 'This is my first blog post',
            'my-second-post' => 'This is my second blog post'
        ];

        if (!array_key_exists($post, $posts)) {
            abort(404, 'Page not found!');
        }

        $context = [
            'post' => $posts[$post]
        ];

        return view('test', $context);
    }
}
