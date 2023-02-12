@extends('layout.master')

@section('title', 'Topics')

@section('content')
    <table>
        @foreach($topics as $topic)
            <tr>
                <td>{{ $topic->title }}</td>
                <td>
                    <form action="{{ route('topic-destroy', ['topic' => $topic->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection