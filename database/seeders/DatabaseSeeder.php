<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Database\Factories\CategoryFactory;
use Database\Factories\PostFactory;
use Database\Factories\TagFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();

        foreach($posts as $post)
        {
            $tagsIDs = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIDs);
        }
    }
}
