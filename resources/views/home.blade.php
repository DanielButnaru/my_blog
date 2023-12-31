@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <main class="container">
                @if ($randomPost)
                    <div class="header-banner">
                        <div class="banner-image">
                            <img src="{{ $postImages[$randomPost->id] }}" class="img-fluid"
                                alt="{{ $randomPost->title_post }}">
                        </div>
                        <div class="banner-text">
                            <h1>{{ $randomPost->title_post }}</h1>
                            <p>{{ $randomPost->body_post }}</p>
                            <p class="lead mb-0 rdm-btn"><a href="{{ route('posts.show', $randomPost->id) }}"
                                    class="text-body-emphasis fw-bold">Read me</a></p>
                        </div>

                    </div>
                @endif
        </div>



        <div class="row g-5">
            <div class="col-md-8">

                {{-- filtru pentru afisarea posturilor --}}
                <div class="show-post mt-5">
                    <div class="nav-scroller py-1 mb-3">


                      


                    </div>

                    <div class="row mb">
                        <!-- Aici vor fi afișate posturile folosind ajax -->
                        <p class="text-center"><strong> See the posts by category</strong></p>

                    </div>
                </div>

                {{-- adaugarea unui post --}}
                <div class="add-post my-5">
                    <h4 class="text-center"> Create your post here</h4>
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="title_post">Title</label>
                            <input type="text" class="form-control" id="title_post" placeholder="Title"
                                name="title_post">
                        </div>
                        <div class="form-group">
                            <label for="body_post">Body</label>
                            <textarea class="form-control" id="body_post" rows="3" name="body_post"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image_post">Image</label>
                            <input type="file" class="form-control" id="image_post" placeholder="Image"
                                name="image_post">
                        </div>
                        <div class="form-group">
                            <label for="category_post">Category</label>
                            <select class="form-control" id="category_post" name="category_post">
                                <option value="0" disabled selected>Select your category</option>
                                @for ($i = 0; $i < count($categories); $i++)
                                    <option value="{{ $categories[$i] }}">{{ $categories[$i] }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>

                {{-- afisarea ultimelor posturi --}}
                <div class="latest-article mt-5">
                    <h4 class="text-center border-top pt-3">Latest Post</h4>
                    @foreach ($latestPosts as $post)
                        <article class="blog-post">
                            <div class="post-info">
                                <div class="post-by">
                                    <span class="post-by__text">Post by</span>
                                    <a href="{{ route('user.posts', $post->user_id) }}"><span class="post-by__author">{{ $post->user->name }}</span></a>
                                </div>
                                <div class="extra-info">

                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>

                                </div>
                            </div>
                            <div class="post-text">
                                <span class="created-date">{{ $post->created_at->format('Y F d') }}</span>
                                <h2 class="post-title"><a
                                        href="{{ route('posts.show', $post->id) }}">{{ $post->title_post }}</a>
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


            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
             
                    <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p>Funcționalități principale ale proiectului "MyBlog":</p>

                        <ol>
                            <li>
                                <strong>Crearea unui Post Nou</strong>: Utilizatorii pot crea și publica posturi noi
                                pe platformă,
                                oferind informații și păreri despre subiectele care îi interesează.
                            </li>
                            <li>
                                <strong>Editarea și Ștergerea Posturilor</strong>: Utilizatorii au dreptul de a
                                edita și șterge doar
                                posturile create de ei, ceea ce asigură controlul asupra conținutului personal.
                            </li>
                            <li>
                                <strong>Cele Mai Noi 3 Posturi</strong>: Pe pagina principală, cele mai recente trei
                                posturi sunt
                                evidențiate, permițând utilizatorilor să le vadă rapid și să exploreze subiectele
                                proaspete.
                            </li>
                            <li>
                                <strong>Listă Completă de Posturi</strong>: O secțiune dedicată care afișează toate
                                posturile
                                disponibile pe platformă, permițând utilizatorilor să răsfoiască conținutul în
                                detaliu.
                            </li>
                            <li>
                                <strong>Posturi Asociate Proprietarului</strong>: O secțiune care prezintă toate
                                posturile create de un utilizator
                            </li>
                            <li>
                                <strong>Căutare pe Baza Categoriei</strong>: Utilizatorii pot selecta o categorie
                                specifică și vor
                                vedea toate posturile care se încadrează în acea categorie.
                            </li>
                        </ol>
                    </div>
                    <div class="follow-me">
                        <div class="follow-me_title">
                            <h4>Follow me</h4>
                        </div>
                        <div class="follow-me_list">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>

                            </ul>
                    </div>



                    <div class="post-category">
                        <div class="post-category_title">
                            <h4>Category</h4>
                        </div>
                        <div class="post-category_list">
                            <div class="category-form">
                                
                                @for ($i = 0; $i < count($categories); $i++)
                                    <a href="{{ route('posts.by.category', $categories[$i])}}" class="categoryButton category-item">{{ $categories[$i] }}</a>
                                @endfor
                            </div>
                        </div>
                    </div>

                    {{-- afisarea tutror posturilor --}}
                    <div>
                        <div class="recent-posts">
                            <div class="recent-post_title">
                                <h4 >Recent posts</h4>

                            </div>
                            <ul class=" posts-list">
                                @foreach ($posts as $post)
                                    <li >
                                        <a class="post-item row" href="{{ route('posts.show', $post->id) }}">
                                            <img src="{{ $postImages[$post->id] }}" class="bd-placeholder-img col-sm-6"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <div class="info-post col-sm-6">
                                                <h6>{{ $post->title_post }}</h6>
                                                <small>{{ $post->created_at->format('Y F d') }}</small>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>

        </main>

    </div>
    </div>


    @if (session('showAlert'))
        <script>
            $(document).ready(function() {
                var errorMessage = "{{ session('errorMessage') }}";

                if (errorMessage) {
                    alert(errorMessage);
                }
            });
        </script>
    @endif
@endsection
