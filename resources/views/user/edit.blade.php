@extends('layout.master')

@section('title', 'User edit')

@section('content')
    <form action="{{ route('user-update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Name" value="{{ old('name', $user->name) }}"/>
        @error('name') {{ $message }} @enderror
        <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname', $user->lastname) }}"/>
        <input type="submit" value="Update"/>
    </form>
@endsection