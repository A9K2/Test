<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
   public function  __invoke(StoreRequest $request)
   {
    $date = $request->validated();
    
    $this->service->store($date);

    return redirect()->route('admin.post.index');
   }
}
