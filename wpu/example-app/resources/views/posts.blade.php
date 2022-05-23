@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <article class="mt-5">
            <h1><a href="/posts/{{$post['slug']}}">{{$post['title']}}</a></h1>
            <h4>{{$post['author']}}</h4>
            <p>{{$post['body']}}</p>
        </article>
    @endforeach
@endsection