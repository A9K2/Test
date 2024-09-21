@extends('layout.main')
@section('content')
<div>
    <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="title">Title</label>
          <input name = 'title' type="text" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <input name = 'content' type="text" class="form-control" id="content" placeholder="content" value="{{$post->content}}">
        </div>
        <div class="form-group">
          <label for="category">Categories</label>
          <select class="form-control" id="category" name="category_id">
            @foreach ($categories as $category)
            <option
            {{$post->category_id === $category->id ? 'selected':''}}
            value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tags">Tags</label>
          <select multiple class="form-control" id="tags" name="tags[]">
            @foreach ($tags as $tag)
            <option 
            @foreach ($post->tags as $postTags)
            {{$tag->id === $postTags->id ? 'selected':''}}
            @endforeach
            value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@endsection