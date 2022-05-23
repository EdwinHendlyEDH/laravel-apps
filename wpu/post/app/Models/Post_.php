<?php

namespace App\Models;

class Post
{   
    private static $blog_posts = [
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

    public static function all(){
        return collect(self::$blog_posts);
    }


    public static function find($slug){
        $posts = static::all();
        // $single_post = [];
        // foreach($posts as $post){
        //     if ($post['slug'] == $slug){
        //         $single_post = $post;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }

}
