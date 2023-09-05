@extends('layouts.app')

@section('content')
    <div class="container">
        <div>





            <main class="container">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    {{-- afiseaza cate un post random din lista --}}
                    @if ($randomPost)
                        <div class="col-lg-6 px-0">
                            <h1 class="display-4 fst-italic">{{ $randomPost->title_post }}</h1>
                            <p class="lead my-3">{{ $randomPost->body_post }}</p>
                            <p class="lead mb-0"><a href="{{ route('posts.show', $randomPost->id) }}"
                                    class="text-body-emphasis fw-bold">Continue reading...</a></p>


                        </div>
                    @endif
                </div>



                <div class="row g-5">
                    <div class="col-md-8">

                        {{-- filtru pentru afisarea posturilor --}}
                        <div class="show-post mt-5">
                            <div class="nav-scroller py-1 mb-3">


                                <form class="form-inline" id="categoryForm">
                                    @csrf
                                    @for ($i = 0; $i < count($categories); $i++)
                                        <button class="categoryButton" data-category="{{ $categories[$i] }}"
                                            type="button">{{ $categories[$i] }}</button>
                                    @endfor
                                </form>


                            </div>

                            <div id="postsList" class="row mb">
                                <!-- Aici vor fi afișate posturile folosind ajax -->
                                <p class="text-center"><strong> See the posts by category</strong></p>

                            </div>
                        </div>
                            
                            {{-- adaugarea unui post --}}
                        <div class="add-post my-5">
                            <h4 class="text-center"> Create your post here</h4>
                            <form method="POST" action="{{ route('posts.store') }}">
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
                        <div class="latest-post mt-5">
                            <h4 class="text-center border-top pt-3">Latest Post</h4>
                            @foreach ($latestPosts as $post)
                            <article class="blog-post">
                                <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title_post }}</h2>
                                <p class="blog-post-meta">
                                    {{ $post->created_at->format('Y F d') }} by <a href="{{ route('user.posts', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a>
                                </p>
                                <p>{{ $post->body_post }}</p>
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
                                        <strong>Crearea unui Post Nou</strong>: Utilizatorii pot crea și publica posturi noi pe platformă,
                                        oferind informații și păreri despre subiectele care îi interesează.
                                    </li>
                                    <li>
                                        <strong>Editarea și Ștergerea Posturilor</strong>: Utilizatorii au dreptul de a edita și șterge doar
                                        posturile create de ei, ceea ce asigură controlul asupra conținutului personal.
                                    </li>
                                    <li>
                                        <strong>Cele Mai Noi 3 Posturi</strong>: Pe pagina principală, cele mai recente trei posturi sunt
                                        evidențiate, permițând utilizatorilor să le vadă rapid și să exploreze subiectele proaspete.
                                    </li>
                                    <li>
                                        <strong>Listă Completă de Posturi</strong>: O secțiune dedicată care afișează toate posturile
                                        disponibile pe platformă, permițând utilizatorilor să răsfoiască conținutul în detaliu.
                                    </li>
                                    <li>
                                        <strong>Posturi Asociate Proprietarului</strong>: O secțiune care prezintă toate posturile create de un utilizator
                                    </li>
                                    <li>
                                        <strong>Căutare pe Baza Categoriei</strong>: Utilizatorii pot selecta o categorie specifică și vor
                                        vedea toate posturile care se încadrează în acea categorie.
                                    </li>
                                </ol>
                            </div>

                            {{-- afisarea tutror posturilor --}}
                            <div>
                                <div>
                                    <h4 class="fst-italic">Recent posts</h4>
                                    <ul class="list-unstyled">
                                        @foreach ($posts as $post)
                                            <li>
                                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                                    href="{{ route('posts.show', $post->id) }}">
                                                    <svg class="bd-placeholder-img" width="100%" height="96"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                                        <rect width="100%" height="100%" fill="#777"></rect>
                                                    </svg>
                                                    <div class="col-lg-8">
                                                        <h6 class="mb-0">{{ $post->title_post }}</h6>
                                                        <small class="text-body-secondary">{{ $post->updated_at }}</small>
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
