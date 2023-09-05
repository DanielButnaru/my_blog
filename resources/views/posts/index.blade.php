@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post )

        <div class="col-md-12 text-center my-5">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $post->title_post }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $post->body_post }}</p>
                    <p>Category: {{ $post->category_post }}</p>
                    <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">View Post</a>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
{{-- @foreach ($posts as $post)
<div class="post">
    <h2>{{ $post->title_post }}</h2>
    <p>{{ $post->body_post }}</p>
    <p>Categorie: {{ $post->category_post }}</p>
    <!-- Alte detalii ale postului -->
</div>
@endforeach --}}
@endsection