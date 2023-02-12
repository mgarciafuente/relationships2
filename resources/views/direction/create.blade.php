@extends('layout.master')

@section('title', 'Direction create')

@section('content')
    <form action="{{ route('direction-store') }}" method="post">
        @csrf
        <input type="text" name="street" placeholder="street" value="{{ old('street') }}"/>
        @error('street') {{ $message }} @enderror
        <input type="text" name="number" placeholder="number" value="{{ old('number') }}"/>
        @error('number') {{ $message }} @enderror
        <input type="number" name="postal_code" placeholder="postal_code" value="{{ old('postal_code') }}"/>
        @error('postal_code') {{ $message }} @enderror
        <input type="text" name="city" placeholder="city" value="{{ old('city') }}"/>
        @error('city') {{ $message }} @enderror
        <select name="user">
            <option disabled selected>Select a user</option>
            @foreach($users as $key => $user)
                <option value="{{ $user->id }}">{{ $user->name ." ". $user->lastname}}</option>
            @endforeach
        </select>
        @error('user') {{ $message }} @enderror
        <input type="submit" value="Store"/>
    </form>
@endsection