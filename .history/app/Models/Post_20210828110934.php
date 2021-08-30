<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public static function all()
    {
      return File::files(resource_path(("posts/")));
    }
    public static function find($slug)
    {

      //if file doesn't exist, redirect to home page
      if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        throw new ModelNotFoundException();
      }

      //Cache the output. 1200 is number of seconds to remember (you can use also now()->addMinutes(60) or now()->addHours(24)). From php 7.4 you can replace last part with arrow function fn() => file_get_contents($path));
      return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
        return file_get_contents($path);
      });

    }
}