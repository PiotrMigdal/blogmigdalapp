<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
      $path = __DIR__ . "/../resources/posts/{$slug}.html";

      //if file doesn't exist, redirect to home page
      if (! file_exists($path)) {
        return redirect('/');
      }

      //Cache the output. 1200 is number of seconds to remember (you can use also now()->addMinutes(60) or now()->addHours(24)). From php 7.4 you can replace last part with arrow function fn() => file_get_contents($path));
      return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
        return file_get_contents($path);
      });

    }
}
