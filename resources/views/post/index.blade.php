@extends('layout.master')

@section('title', 'Posts')

@section('content')
    <table>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    <form action="{{ route('post-edit', ['post' => $post->id]) }}" method="get">
                        @csrf
                        <input type="submit" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form action="{{ route('post-destroy', ['post' => $post->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection