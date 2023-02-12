@extends('layout.master')

@section('title', 'Topic create')

@section('content')
    <form action="{{ route('topic-store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"/>
        @error('title') {{ $message }} @enderror
        <input type="text" name="text" placeholder="Text" value="{{ old('text') }}"/>
        @error('text') {{ $message }} @enderror
        <input type="submit" value="Store"/>
    </form>
@endsection