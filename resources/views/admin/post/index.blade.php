@extends('layout.admin')
@section('content')
<div>
    <div>
        @foreach ($posts as $post)
            <div><a href="{{route('admin.post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
        @endforeach
        {{$posts->withQueryString()->links()}}
        <a href="{{route('admin.post.create')}}" class="btn btn-primary">Create</a>
    </div>
</div>
@endsection