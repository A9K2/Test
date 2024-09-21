@extends('layout.main')
@section('content')
    <div>
        @foreach ($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
        @endforeach
        {{$posts->withQueryString()->links()}}
        <a href="{{route('post.create')}}" class="btn btn-primary">Create</a>
    </div>
@endsection