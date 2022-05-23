@extends('layouts.layout1')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <h1 class="mb-3">{{$post->title}}</h1>
            <p>Ditulis oleh <a href="/authors/{{$post->author->username}}" class="text-decoration-none">{{$post->author->name}}</a>, in <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a></p>

            <img src="https://source.unsplash.com/700x350?{{$post->category->name}}" alt="">
            

            <article class="my-4 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="text-decoration-none">Back to posts?</a>
        </div>
    </div>
</div>

@endsection


