@extends('layouts.main')
@section('container')
    <article class="mt-5">
        <h1>{{$post['title']}}</h1>
        <h4>{{$post['author']}}</h4>
        <p>{{$post['body']}}</p>
    </article>
@endsection