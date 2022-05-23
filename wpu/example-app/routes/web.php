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

Route::get('/', function () {
    return view('welcome', [
        'title'=>'Home Page'
    ]);
});

Route::get('/about', function(){
    return view('about',[
        'title'=>'About Page',
        'name'=>'Edwin Hendly',
        'age'=>15,
        'about'=>'I am a Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi mollitia nihil perferendis officia vero cupiditate labore doloremque quasi laudantium! Facilis?'
    ]);
});


Route::get('/posts', function(){
    $posts = [
        [
            'title'=>'Judul Satu',
            'slug'=>'judul-satu',
            'author'=>'Edwin Hendly',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error impedit ipsa natus! A, ipsa. Impedit magni, dolorem quod cupiditate quam veritatis! Quia facilis tenetur ducimus ex natus ad deserunt explicabo vero amet reprehenderit maiores, quaerat eos reiciendis accusantium odit id dolore voluptatem culpa quisquam officiis quod. Similique magni error nisi natus, delectus voluptatem vitae, fugiat eius perspiciatis exercitationem id quae minima voluptatum, deleniti pariatur consectetur ut! Omnis fuga eligendi atque quibusdam itaque minus qui facere placeat laboriosam veniam sed aliquam distinctio, labore deleniti ut, quam rerum facilis saepe. Cupiditate aut dignissimos ut sint non! Cum necessitatibus eum et temporibus rerum.', 
        ],
        [
            'title'=>'Judul Dua',
            'slug'=>'judul-dua',
            'author'=>'David Gunawan',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error impedit ipsa natus! A, ipsa. Impedit magni, dolorem quod cupiditate quam veritatis! Quia facilis tenetur ducimus ex natrehenderit maiores, quaerat eos reiciendis accusantium odit id dolore voluptatem culi pariatur consectetur ut! Omnis fuga eligendi atque quibusdam itaque minus qui facere placeat laboriosam veniam sed aliquam distinctio, labore deleniti ut, quam rerum facilis saepe. Cupiditate aut dignissimos ut sint non! Cumm et temporibus rerum.', 
        ]
    ];
    return view('posts', [
        'title'=>'Posts Page',
        'posts'=> $posts,
    ]);
});


Route::get('/posts/{slug}', function($slug){
    $posts = [
        [
            'title'=>'Judul Satu',
            'slug'=>'judul-satu',
            'author'=>'Edwin Hendly',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error impedit ipsa natus! A, ipsa. Impedit magni, dolorem quod cupiditate quam veritatis! Quia facilis tenetur ducimus ex natus ad deserunt explicabo vero amet reprehenderit maiores, quaerat eos reiciendis accusantium odit id dolore voluptatem culpa quisquam officiis quod. Similique magni error nisi natus, delectus voluptatem vitae, fugiat eius perspiciatis exercitationem id quae minima voluptatum, deleniti pariatur consectetur ut! Omnis fuga eligendi atque quibusdam itaque minus qui facere placeat laboriosam veniam sed aliquam distinctio, labore deleniti ut, quam rerum facilis saepe. Cupiditate aut dignissimos ut sint non! Cum necessitatibus eum et temporibus rerum.', 
        ],
        [
            'title'=>'Judul Dua',
            'slug'=>'judul-dua',
            'author'=>'David Gunawan',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error impedit ipsa natus! A, ipsa. Impedit magni, dolorem quod cupiditate quam veritatis! Quia facilis tenetur ducimus ex natrehenderit maiores, quaerat eos reiciendis accusantium odit id dolore voluptatem culi pariatur consectetur ut! Omnis fuga eligendi atque quibusdam itaque minus qui facere placeat laboriosam veniam sed aliquam distinctio, labore deleniti ut, quam rerum facilis saepe. Cupiditate aut dignissimos ut sint non! Cumm et temporibus rerum.', 
        ]
    ];
    
    $new_post = [];

    foreach($posts as $post){
        if ($post['slug'] == $slug){
            $new_post = $post;
        }
    }

    return view('post', [
        'title'=>'Single Post',
        'post'=>$new_post,
    ]);
});
