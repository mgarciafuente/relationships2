@extends('layout.master')

@section('title', 'User create')

@section('content')
    <form action="{{ route('user-store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"/>
        @error('name') {{ $message }} @enderror
        <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}"/>
        @error('lastname') {{ $message }} @enderror
        <input type="submit" value="Store"/>
    </form>
@endsection