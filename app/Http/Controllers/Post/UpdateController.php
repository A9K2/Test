<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;

class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
    $date = $request->validated();

    $post = $this->service->update($date, $post);

    return new PostResource($post);
    //return redirect()->route('post.show', $post->id);
   }
}
