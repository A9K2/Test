@extends('layout.admin')
@section('content')
    <div>
        <form action="{{route('admin.post.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input name = 'title' type="text" class="form-control" id="title" placeholder="title">
              @error('title')
                  <div class="text-danger">{{$message}}</div>
                  
              @enderror
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <input name = 'content' type="text" class="form-control" id="content" placeholder="content">
              @error('title')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="category">Categories</label>
              <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="tags">Tags</label>
              <select multiple class="form-control" id="tags" name="tags[]">
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
    </div>
@endsection


