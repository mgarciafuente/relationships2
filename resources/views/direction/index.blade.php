@extends('layout.master')

@section('title', 'Directions')

@section('content')
    <table>
        @foreach($directions as $direction)
            <tr>
                <td>{{ $direction->street }} {{ $direction->number }} {{ $direction->postal_code }}, {{ $direction->city }} @if($direction->user) ({{ $direction->user->name }} {{ $direction->user->lastname }}) @endif</td>
                <td>
                    <form action="{{ route('direction-edit', ['direction' => $direction->id]) }}" method="get">
                        @csrf
                        <input type="submit" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form action="{{ route('direction-destroy', ['direction' => $direction->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection