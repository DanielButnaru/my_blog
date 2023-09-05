<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //   voi adauga si ultimele 3 postari
        $posts = Post::all();
        $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $randomPost = Post::inRandomOrder()->first();

        $categories = ["Sport", "IT", "Economie", "Politica", "Monden", "Sanatate", "Stiinta", "Cultura", "Altele"];



        return view('home', compact('posts', 'latestPosts', 'randomPost', 'categories'));
    }
}
