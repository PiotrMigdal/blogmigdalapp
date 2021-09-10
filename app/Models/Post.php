<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];
    //scopeFilter is scopeName of the method I use in Post Controller 'posts' => Post::latest()->filter(request(['search']))->get(),
    public function scopeFilter($query, array $filters) //Post::newQuery()->filter
    {
            //this work as MySQL query, this creates one
            $query->when($filters['search'] ?? false, fn ($query, $search) =>
                $query->where(fn($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    )
                );
        //Below says that 'Give me a post that has category which slug matches the slug requested by client
            $query->when($filters['category'] ?? false, fn ($query, $category) =>
                $query->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)
                )
            );
            $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }


    public function category()
    {
        //Eloquent Relationship to Category
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //Had to add name of the foreign key because it would try to find author_id which doesn't exist
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
