<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web</title>
    @vite(['resources/css/bootstrap.css', 'resources/js/bootstrap.bundle.js'])
</head>
<body>
    <div class="container">
        <div class="cow">
            <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('post.home')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                </li>
                @can('view', auth()->user())
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.post.index')}}">Admin</a>
                </li>
                @endcan
              </ul>
        </div>
        @yield('content')
    </div>
</body>
</html>