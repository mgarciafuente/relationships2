@extends('layout.master')

@section('title', 'Users')

@section('content')
    <table>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }} {{ $user->lastname }}</td>
                <td>
                    <form action="{{ route('user-edit', ['user' => $user->id]) }}" method="get">
                        @csrf
                        <input type="submit" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form action="{{ route('user-delete', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection