<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            'title'=>'All Posts',
            'active' => 'posts',
            'posts'=> Post::latest()->get(),
        ]);
    }

    public function show(Post $post){
        // $posts = Post::all();
        // $single_post = Post::find($id);
    
        return view('/post', [
            'title'=>'single-post',
            'active' => 'posts',
            'post'=>$post
        ]);
    }
}
