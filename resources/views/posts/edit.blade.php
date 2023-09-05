@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title_post">Title</label>
            <input type="text" class="form-control" name="title_post" id="title_post" value="{{ $post->title_post }}">
        </div>
        <div class="form-group">
            <label for="body_post">Body</label>
            <textarea class="form-control" name="body_post" id="body_post" cols="30" rows="10">{{ $post->body_post }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_post">Category</label>
            <input type="text" class="form-control" name="category_post" id="category_post" value="{{ $post->category_post }}">
        </div>
        <button class="btn btn-primary">Update Post</button>
    </form>

@endsection