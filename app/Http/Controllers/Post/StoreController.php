<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;

class StoreController extends BaseController
{
   public function  __invoke(StoreRequest $request)
   {
    $date = $request->validated();
    
    $post = $this->service->store($date);
    
    return new PostResource($post);

    return redirect()->route('post.index');
   }
}
