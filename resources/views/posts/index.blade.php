@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="filter-posts">
            <form>
                @csrf
                @for($i=0; $i < count($categories); $i++)
                <button type="button" class="categoryButton" data-category="{{$categories[$i]}}">{{ $categories[$i] }}</button>
                @endfor
            </form>
        </div>
        <div class="latest-article mt-5" id="postsList">
            <h4 class="text-center border-top pt-3">All Posts</h4>
            @foreach ($posts as $post)
                <article class="blog-post">
                    <div class="post-info">
                        <div class="post-by">
                            <span class="post-by__text">Post by</span>
                            <a href="{{ route('user.posts', $post->user_id) }}"><span
                                    class="post-by__author">{{ $post->user->name }}</span></a>
                        </div>
                        <div class="extra-info">

                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>

                        </div>
                    </div>
                    <div class="post-text">
                        <span class="created-date">{{ $post->created_at->format('Y F d') }}</span>
                        <h2 class="post-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title_post }}</a>
                        </h2>
                        <div class="post-body">
                            <p>{{ $post->body_post }}</p>
                        </div>
                    </div>

                    <div class="post-image">
                        <img src="{{ $postImages[$post->id] }}" class="img-fluid" alt="{{ $post->title_post }}">
                        {{-- category link --}}
                        <div class="category-link">
                            <a href="#">{{ $post->category_post }}</a>
                        </div>

                </article>
            @endforeach
        </div>
    </div>
@endsection
