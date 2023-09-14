<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = Post::all();
            $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
            $randomPost = Post::inRandomOrder()->first();

            return view('posts.index', compact('posts', 'latestPosts', 'randomPost'));
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $categories = ["Sport", "IT", "Economie", "Politica", "Monden", "Sanatate", "Stiinta", "Cultura", "Altele"];
            return view('posts.create', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title_post' => 'required|max:255',
                'body_post' => 'required',
                'category_post' => 'required',
                'image_post' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);
    
            $originalImageName = $request->file('image_post')->getClientOriginalName();
            $imageContent = file_get_contents($request->file('image_post')->path());
    
            Storage::disk('dropbox')->put('blog_images/' . $originalImageName, $imageContent);
    
            $newPost = new Post;
            $newPost->title_post = $validatedData['title_post'];
            $newPost->body_post = $validatedData['body_post'];
            $newPost->category_post = $validatedData['category_post'];
            $newPost->user_id = auth()->user()->id;
            $newPost->image_post = $originalImageName;
    
            $newPost->save();
    
            // Redirectăm utilizatorul către pagina de afișare a postului nou creat
            return redirect()->route('posts.show', ['post' => $newPost->id]);
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        try {
            $image = Storage::disk('dropbox')->get('blog_images/' . $post->image_post);
            $image = base64_encode($image);
            $image = 'data:image/jpeg;base64,' . $image;

            return view('posts.show', compact('post', 'image'));
            return $image;
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        try {
            if ($post->user_id != auth()->user()->id) {
                session()->flash('errorMessage', 'You are not allowed to edit this post!');
                return redirect()->route('home')->with(['showAlert' => true]);
            } else {
                return view('posts.edit', compact('post'));
            }
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            if ($post->user_id != auth()->user()->id) {
                session()->flash('errorMessage', 'You are not allowed to edit this post!');
                return redirect()->route('home')->with(['showAlert' => true]);
            } else {
                $validatedData = $request->validate([
                    'title_post' => 'required|max:255',
                    'body_post' => 'required',
                    'category_post' => 'required',
                ]);

                $post->title_post = $validatedData['title_post'];
                $post->body_post = $validatedData['body_post'];
                $post->category_post = $validatedData['category_post'];

                $post->save();

                return redirect()->route('posts.show', ['post' => $post->id]);
            }
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            if ($post->user_id != auth()->user()->id) {
                session()->flash('errorMessage', 'You are not allowed to delete this post!');
                return redirect()->route('home')->with(['showAlert' => true]);
            } else {
                $post->delete();
                // stergem si imaginea din storage
                Storage::disk('dropbox')->delete('blog_images/' . $post->image_post);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->route('error.page')->withErrors([$e->getMessage()]);
        }
    }

    public function category(Request $request)
    {
        try {
            $category = $request->input('category');

            $posts = Post::where('category_post', $category)->get();

            return response()->json([
                'posts' => $posts
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'error' => 'A apărut o eroare: ' . $e->getMessage()
            ], 500);
        }
    }
}

