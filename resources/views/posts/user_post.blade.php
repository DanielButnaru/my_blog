@extends('layouts.app') {{-- Utilizați șablonul dvs. de aspect aici, dacă există unul --}}

@section('content')
<div class="container">
    <h1>Posturile lui {{ $user->name }}</h1>

    <div class="mt-5">
        @foreach ($posts as $post)
            <article class="blog-post border-bottom"> 
                <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title_post }}</h2>
                <p>{{ $post->body_post }}</p>
            </article>
        @endforeach
        </div>
</div>
@endsection
