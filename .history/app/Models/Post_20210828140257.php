<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
      $this->title = $title;
      $this->excerpt = $excerpt;
      $this->date = $date;
      $this->body = $body;
      $this->slug = $slug;
    }

    public static function all()
    {
      return collect(File::files(resource_path("posts")))
        ->map(fn($document) => new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
          ));
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