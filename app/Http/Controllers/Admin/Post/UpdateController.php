<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;


class UpdateController extends BaseController
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
    $date = $request->validated();

    $this->service->update($date, $post);

    return redirect()->route('admin.post.show', $post->id);
   }
}
