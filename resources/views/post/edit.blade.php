@extends('layout.master')

@section('title', 'Post edit')

@section('content')
    <form action="{{ route('post-update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="title" placeholder="Title" value="{{ old('title', $post->title) }}"/>
        @error('title') {{ $message }} @enderror
        <input type="text" name="text" placeholder="Text" value="{{ old('text', $post->text ) }}"/>
        @error('text') {{ $message }} @enderror
        <select name="user">
            @if($current) <option value="{{ $current->id }}" selected>{{ $current->name ." ". $current->lastname }}</option> @endif
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name ." ". $user->lastname }}</option>
            @endforeach
        </select>
        @error('user') {{ $message }} @enderror
        <input type="submit" value="Update"/>
    </form>
@endsection