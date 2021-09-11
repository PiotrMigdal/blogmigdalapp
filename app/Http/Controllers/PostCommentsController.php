<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // Validate
        request()->validate([
            'body' => 'required'
        ]);

        // Perform an action
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        // Return to page
        return back();
    }
}
