<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('title')</h1>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <br>
            <li><a href="{{ route('users') }}">Users</a></li>
            <li><a href="{{ route('user-create') }}">Create user</a></li>
            <br>
            {{-- <li><a href="{{ route('directions') }}">Directions</a></li>
            <li><a href="{{ route('insert-direction') }}">Insert direction</a></li>
            <li><a href="{{ route('assign-direction') }}">Assign direction</a></li>
            <br>
            <li><a href="{{ route('posts') }}">Posts</a></li>
            <li><a href="{{ route('insert-post') }}">Insert post</a></li>
            <br>
            <li><a href="{{ route('temas') }}">Temas</a></li>
            <li><a href="{{ route('insert-tema') }}">Insert tema</a></li> --}}
        </ul>
    </nav>
    <br>
    @section('content')
    @show
</body>
</html>