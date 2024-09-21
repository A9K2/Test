<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($date)
    {
        $tags = $date['tags'];
        unset($date['tags']);

        $post = Post::FirstOrCreate($date);
        $post->tags()->attach($tags);

        return $post;
    }

    public function update($date, $post)
    {
        $tags = $date['tags'];
        unset($date['tags']);

        $post->update($date);
        $post->tags()->sync($tags);
        return $post->fresh();
    }
}