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
    //if you have any other filters you can add them here
            $query->when($filters['search'] ?? false, function ($query, $search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
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

}
