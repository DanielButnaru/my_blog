<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userPosts(User $user)
{
    try {
        $posts = $user->posts;
        return view('posts.user_post', compact('posts', 'user'));
    } catch (\Exception $e) {
        
        return redirect()->back()->with('error', 'A apărut o eroare. Vă rugăm să încercați din nou mai târziu.');
    }
}

}
