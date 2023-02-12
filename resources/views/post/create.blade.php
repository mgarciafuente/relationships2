@extends('layout.master')

@section('title', 'Post create')

@section('content')
    <form action="{{ route('post-store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"/>
        @error('title') {{ $message }} @enderror
        <input type="text" name="text" placeholder="Text" value="{{ old('text') }}"/>
        @error('text') {{ $message }} @enderror
        <select name="user">
            <option disabled selected>Select a user</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name ." ". $user->lastname }}</option>
            @endforeach
        </select>
        @error('user') {{ $message }} @enderror
        @foreach($topics as $topic)
            <label>{{ $topic->title }}
                <input type="checkbox" name="topic[]" value="{{ $topic->id }}"/>
            </label>
        @endforeach
        @error('topic') {{ $message }} @enderror
        <input type="submit" value="Store"/>
    </form>
@endsection