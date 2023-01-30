@extends('layout.master')

@section('title', 'User edit')

@section('content')
    <form action="{{ route('user-update', ['id' => $user->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Name" value="{{ $user->name }}"/>
        <input type="text" name="lastname" placeholder="Lastname" value="{{ $user->lastname }}"/>
        <input type="submit" value="Update"/>
    </form>
@endsection