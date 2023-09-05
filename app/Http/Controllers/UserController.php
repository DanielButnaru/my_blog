<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userPosts(User $user)
    {
        $posts = $user->posts; // Obține toate posturile utilizatorului
    
        return view('posts.user_post', compact('posts', 'user'));
    }
}
