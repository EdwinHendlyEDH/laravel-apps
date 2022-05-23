@extends('dashboard.layouts.main')

@section("container")
<div class="container">
    <div class="row">
        <div class="col-lg-8 my-3">
            <h1 class="mb-3">{{$post->title}}</h1>

            <div class="action d-flex justify-content-start gap-3 my-2">
                <a href="/dashboard/posts" class="btn btn-primary d-flex align-items-center justify-content-start gap-1"><span data-feather="arrow-left"></span>Back to all My Posts</a>
                <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning d-flex align-items-center justify-content-start gap-1"><span data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick='return confirm("Are you sure want to delete?")'><span data-feather="x-circle"></span>Detele</button>
                </form>
            </div>

            <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="" class="img-fluid mt-3">
            

            <article class="my-4 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection