<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

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
