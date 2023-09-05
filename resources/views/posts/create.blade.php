@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="title_post">Title</label>
                <input type="text" class="form-control" id="title_post" placeholder="Title" name="title_post">
            </div>
            <div class="form-group">
                <label for="body_post">Body</label>
                <textarea class="form-control" id="body_post" rows="3" name="body_post"></textarea>
            </div>
            <div class="form-group">
                <label for="category_post">Category</label>
                <select class="form-control" id="category_post" name="category_post">
                    <option value="0" disabled selected >Select your category</option>
                    @for ($i = 0; $i < count($categories); $i++)
                        <option value="{{ $categories[$i] }}">{{ $categories[$i] }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

    </div>
@endsection
