<?php 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Toate rutele din acest grup vor fi protejate și accesibile doar utilizatorilor autentificați

    Route::get("/posts", [PostController::class, "index"])->name("posts.index");
    Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
    Route::post("/posts", [PostController::class, "store"])->name("posts.store");
    Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
    Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
    Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");
    Route::get('/user/{user}/posts', [UserController::class, 'userPosts'])->name('user.posts');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get("/posts/category{categories}", [PostController::class, "category"]);
Route::get("/posts/category/{category}", [PostController::class, "showPostsByCategory"])->name("posts.by.category");

Route::get("/error", function () {
    return view("error");
})->name("error.page");
