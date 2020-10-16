<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class PostController extends Controller
{
    
    public function show($slug)
    {
        // dd($slug);
        $post = DB::table('posts')->where('slug', $slug) ->first();

        // return dd($post);
        return view('posts.show',[
            'post' => $post
        ]);
    }
}
