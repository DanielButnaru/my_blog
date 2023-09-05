<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/posts", [PostController::class, "index"])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
Route::post("/posts", [PostController::class, "store"])->name("posts.store");
Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");
Route::get("/posts/category/{category}",[PostController::class, "category"]);
Route::get('/user/{user}/posts', [UserController::class,'userPosts'])->name('user.posts');






Route::get("/error", function () {
    return view("error");
})->name("error.page");