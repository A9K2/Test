<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        // Some
        $date = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams'=>array_filter($date)]);

        $page = $date['page'] ?? 1;
        $per_page = $date['per_page'] ?? 10;

        $posts = Post::filter($filter)->paginate($per_page, ['*'], 'page', $page);

        return PostResource::collection($posts);

        //return view('post.index', compact('posts'));
    }

    
}
