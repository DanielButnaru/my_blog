<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        // Obține toate posturile
        $posts = Post::all();
        
        // Obține cele mai recente 3 posturi
        $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        
        // Obține un post aleatoriu
        $randomPost = Post::inRandomOrder()->first();
    
        // Modificați textul pentru a afișa doar primele 30 de cuvinte
        $randomPost->body_post = $this->limitWords($randomPost->body_post, 15);
    
        // Definiți categoriile
        $categories = ["Sport", "IT", "Economie", "Politica", "Monden", "Sanatate", "Stiinta", "Cultura", "Altele"];
    
        // Creează un array pentru a stoca imagini pentru fiecare post
        $postImages = [];
    
        foreach ($posts as $post) {
            try {
                $image = Storage::disk('dropbox')->get('blog_images/' . $post->image_post);
                $image = base64_encode($image);
                $image = 'data:image/jpeg;base64,' . $image;
                $postImages[$post->id] = $image;
            } catch (\Exception $e) {
                // Poți trata eroarea aici sau lăsa elementul gol
                $postImages[$post->id] = '';
            }
        }
        
    
        return view('home', compact('posts', 'latestPosts', 'randomPost', 'categories', 'postImages'));
    }
    
    // Funcția pentru limitarea textului la numărul de cuvinte specificat
    private function limitWords($text, $limit) {
        $words = str_word_count($text, 2);
        if (count($words) <= $limit) {
            return $text;
        }
        $trimmedWords = array_slice($words, 0, $limit);
        return implode(' ', $trimmedWords) . '...';
    }
    
}
