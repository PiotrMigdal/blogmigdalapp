<?php

use App\Models\Post;
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
  $files = File::files(resource_path(("posts")));
  $documents = [];

  foreach ($files as $file) {
    $documents[] = YamlFrontMatter::parseFile($file);
  }
  //Give me all posts and their contents and titles
  // return view ('posts', [
  //   'posts' => Post::all()
  // ]);

});

Route::get('/posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to a view called "post"

    return view('post', [
      'post' => Post::find($slug)
    ]);


})->where('post', '[A-z_\-]+'); //wildcard constraint - execute only if letters or dash '-'. Otherwise 404