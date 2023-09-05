<div class="container">
    <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li>
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                    </li>
                  
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                  
                </ul>
            </div>
        </div>
        
    </header>
    <nav class="nav nav-underline justify-content-between">
        <a class="nav-item nav-link link-body-emphasis active" href="#">World</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">U.S.</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Technology</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
        <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a>
    </nav>

    
</div>