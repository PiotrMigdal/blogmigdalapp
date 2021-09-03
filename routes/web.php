<?php

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

Route::get('/', function () {
  return view ('posts', [
    //Get all posts and related category and author and sort by latest first (you can specify the column ie latest('published_date))
    'posts' => Post::latest()->get()

    /** The category and author are now loaded in $with in Post model. The following show how to specific them here */
    // 'posts' => Post::latest()->with('category', 'author')->get()
    /** Or you can load them in post but here select what you don't need */
    // 'posts' => Post::latest()->without('author')->get()
  ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
      'post' => $post
    ]);
 });

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
      'posts' => $category->posts->load('category', 'author')
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
      'posts' => $author->posts->load('category', 'author')
    ]);
});