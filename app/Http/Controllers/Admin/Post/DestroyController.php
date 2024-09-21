<?php

namespace App\Http\Controllers\Admin\Post;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTags;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
   public function  __invoke(Post $post)
   {
    $post->delete();
    return redirect()->route('admin.post.index');
   }
}
