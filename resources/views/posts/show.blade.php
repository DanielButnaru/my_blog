@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>{{ $post->title_post }}</h1>
                <p>{{ $post->body_post }}</p>
                <hr>
                <p>Posted In: {{ $post->category_post }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center ">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back to Posts</a>
                <a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
          
        </div>
    </div>
@endsection
