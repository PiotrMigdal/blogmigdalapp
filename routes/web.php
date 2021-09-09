<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// the middleware 'guest' is build in laravel function. It will check if the user is logged in, if it is, they will be redirected to home
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
//Common convention is to call the registration request 'store'
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy']);


/** NOTE THAT YOU CAN ALSO FILTER CATEGORIES/Authors USING THE FOLLOWING. CURRENTLY REPLACED WITH FILTER IN PostController */
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//       'posts' => $category->posts,
//       'currentCategory' => $category,
//       'categories' => Category::all()
//     ]);
// });
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//       'posts' => $author->posts
//     ]);
// });