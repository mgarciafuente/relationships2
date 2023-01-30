@extends('layout.master')

@section('title', 'User create')

@section('content')
    <form action="{{ route('user-store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"/>
        <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}"/>
        <input type="submit" value="Store"/>
    </form>
@endsection