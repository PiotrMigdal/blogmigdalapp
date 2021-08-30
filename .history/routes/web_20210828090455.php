<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to a view called "post"

    $post = Post::find($slug);

    retur nview('post', [
      'post' -> $post
    ])


    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    //if file doesn't exist, redirect to home page
    if (! file_exists($path)) {
      return redirect('/');
    }
    //Cache the output. 1200 is number of seconds to remember (you can use also now()->addMinutes(60) or now()->addHours(24)). From php 7.4 you can replace last part with arrow function fn() => file_get_contents($path));
    $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
      return file_get_contents($path);
    });

    return view('post', [
      'post' => $post
    ]);

})->where('post', '[A-z_\-]+'); //wildcard constraint - execute only if letters or dash '-'. Otherwise 404