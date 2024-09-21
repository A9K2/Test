<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Tag;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{

   public function __invoke()
   {
    $tags = Tag::all();
    $categories = Category::all();
    return view('admin.post.create', compact('categories', 'tags'));
   }
}
