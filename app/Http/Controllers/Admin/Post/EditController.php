<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    

   public function  __invoke(Post $post)
   {
    $tags = Tag::all();
    $categories = Category::all();
    return view('admin.post.edit', compact('post', 'categories', 'tags'));
   }
}
