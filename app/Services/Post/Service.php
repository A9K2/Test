<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($date)
    {
        DB::beginTransaction();
        try{
            $tags = $date['tags'];
            $category = $date['category'];
            unset($date['tags'], $date['category']);
            
            $tagsIds = $this->getTagsIds($tags);
    
            $date['category_id'] = $this->getCategoryId($category);
            $post = Post::FirstOrCreate($date);
            $post->tags()->attach($tagsIds);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    public function update($date, $post)
    {
        try{
            DB::beginTransaction(); 

            $tags = $date['tags'];
            $category = $date['category'];
            unset($date['tags'], $date['category']);

            $tagsIds = $this->getTagsWithUpdate($tags);
            $date['category_id'] = $this->getCategoryWithUpdate($category);

            $post->update($date);
            $post->tags()->sync($tagsIds);

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        
        return $post->fresh();
    }

    private function getTagsIds($tags)
    {
        $tagIds = [];
        foreach($tags as $tag){
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getTagsWithUpdate($tags)
    {
        $tagIds = [];
        foreach($tags as $tag){
            if(!isset($tag['id']))
            {
               $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        
        return $tagIds;
    }

    private function getCategoryWithUpdate($item)
    {
        if(!isset($item['id']))
        {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category->fresh();
        }
        
        return $category->id;
    }

}