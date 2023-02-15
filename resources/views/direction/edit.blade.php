@extends('layout.master')

@section('title', 'Direction edit')

@section('content')
    <form action="{{ route('direction-update', ['direction' => $direction->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="street" placeholder="street" value="{{ old('street', $direction->street) }}"/>
        @error('street') {{ $message }} @enderror
        <input type="text" name="number" placeholder="number" value="{{ old('number', $direction->number) }}"/>
        @error('number') {{ $message }} @enderror
        <input type="number" name="postal_code" placeholder="postal_code" value="{{ old('postal_code', $direction->postal_code) }}"/>
        @error('postal_code') {{ $message }} @enderror
        <input type="text" name="city" placeholder="city" value="{{ old('city', $direction->city) }}"/>
        @error('city') {{ $message }} @enderror
        <select name="user">
            @foreach($users as $key => $user)
                <option value="{{ $user->id }}" @if($user->id == $direction->user()->first()->id) selected @endif>{{ $user->name ." ". $user->lastname}}</option>
            @endforeach
        </select>
        <input type="submit" value="Update"/>
    </form>
@endsection