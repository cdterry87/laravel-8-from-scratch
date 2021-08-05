<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
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
        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        // Comment::truncate();

        Post::factory(36)->create();
        Comment::factory(9)->create(['post_id' => 36]);

        // Setting specific data for a seeder
        /*
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        */

        // Manually created seeders
        /*
        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My first post',
            'slug' => 'my-first-post',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi rem adipisci quam, eveniet illum libero aperiam, repudiandae id voluptatum maxime ullam, eligendi perspiciatis nobis consectetur reprehenderit accusamus odit facere. Debitis!</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My second post',
            'slug' => 'my-second-post',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi rem adipisci quam, eveniet illum libero aperiam, repudiandae id voluptatum maxime ullam, eligendi perspiciatis nobis consectetur reprehenderit accusamus odit facere. Debitis!</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My third post',
            'slug' => 'my-third-post',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi rem adipisci quam, eveniet illum libero aperiam, repudiandae id voluptatum maxime ullam, eligendi perspiciatis nobis consectetur reprehenderit accusamus odit facere. Debitis!</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobbies->id,
            'title' => 'My fourth post',
            'slug' => 'my-fourth-post',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi rem adipisci quam, eveniet illum libero aperiam, repudiandae id voluptatum maxime ullam, eligendi perspiciatis nobis consectetur reprehenderit accusamus odit facere. Debitis!</p>'
        ]);
        */
    }
}
