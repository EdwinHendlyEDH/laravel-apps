@extends('layouts.main')
@section('container')
    <article class='mt-5'>
        <h1>{{$name}} ({{$age}})</h1>
        <p style='max-width: 600px;'>{{$about}}</p>
    </article>
@endsection
