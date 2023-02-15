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
            @foreach($users as $user)
                <option value="{{ $user->id }}" @if($user->id == $post->user_id) selected @endif>{{ $user->name ." ". $user->lastname }}</option>
            @endforeach
        </select>
        @error('user') {{ $message }} @enderror
        @foreach($topics as $topic)
            <label>{{ $topic->title }}
                <input type="checkbox" name="topics[]" value="{{ $topic->id }}" @if(in_array($topic->id, $currentTopics)) checked @endif/>
            </label>
        @endforeach
        @error('topics') {{ $message }} @enderror
        <input type="submit" value="Update"/>
    </form>
@endsection