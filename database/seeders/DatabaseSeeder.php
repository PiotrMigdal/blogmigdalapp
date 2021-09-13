<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Truncate the tables so you won't get any error because of unique values when run seeder again
        //Not needed if you refresh DB
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        /** Post factory included creation of User and Category because of relationship. See PostFactory */
        //Post::factory(5)->create();

        /** THE ABOVE WILL USER AND CATEGORY FOR EACH POST, YOU CAN OVERRIDE THIS USIGN THE FOLLOWING */
        $user = User::factory()->create([
          'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
          'user_id' => $user->id
        ]);


        /** FOLLOWING REPLACED WITH FACTORY */

        //$user = User::factory()->create();

        // $personal = Category::create([
        //   'name' => 'Personal',
        //   'slug' => 'personal'
        // ]);
        // $work = Category::create([
        //   'name' => 'Work',
        //   'slug' => 'work'
        // ]);
        // $hobby = Category::create([
        //   'name' => 'Hobby',
        //   'slug' => 'hoppy'
        // ]);

        // Post::create([
        //   'user_id' => $user->id,
        //   'category_id' => $personal->id,
        //   'title' => 'My first post',
        //   'slug' => 'my-first-post',
        //   'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
        //   'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non tempora cumque dolorum doloribus quasi. Iure, fugiat aspernatur voluptas distinctio itaque porro animi minus provident! Beatae reprehenderit molestiae eveniet ad dolores!'
        // ]);
        // Post::create([
        //   'user_id' => $user->id,
        //   'category_id' => $work->id,
        //   'title' => 'My work post',
        //   'slug' => 'my-work-post',
        //   'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
        //   'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non tempora cumque dolorum doloribus quasi. Iure, fugiat aspernatur voluptas distinctio itaque porro animi minus provident! Beatae reprehenderit molestiae eveniet ad dolores!'
        // ]);
        // Post::create([
        //   'user_id' => $user->id,
        //   'category_id' => $hobby->id,
        //   'title' => 'My hobby post',
        //   'slug' => 'my-hobby-post',
        //   'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
        //   'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non tempora cumque dolorum doloribus quasi. Iure, fugiat aspernatur voluptas distinctio itaque porro animi minus provident! Beatae reprehenderit molestiae eveniet ad dolores!'
        // ]);
    }
}
