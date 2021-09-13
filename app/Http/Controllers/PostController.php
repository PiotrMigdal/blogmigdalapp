<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view ('posts.index', [
        'posts' => Post::latest()->filter(
            request(['search', 'category', 'author'])
            )->simplePaginate(5)->withQueryString()

        /** The category and author are now loaded in $with in Post model. The following show how to specific them here */
        // 'posts' => Post::latest()->with('category', 'author')->get()
        /** Or you can load them in post but here select what you don't need */
        // 'posts' => Post::latest()->without('author')->get()
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', [
        'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/')->with('success', 'Posted!');;
    }

}
