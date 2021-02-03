<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function show($slug)
    {
        $post = \DB::table('post')->where('slug',$slug)->first();

        $context = [
            'post' => $post
        ];

        return view('test', $context);
    }
}
