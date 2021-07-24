@extends('web-self.posts.layouts.post')

@section('content')
<h1>Posts List</h1>

<ui>
    <li>
        <a href="{{ route('posts.show', ['post' => 1]) }}">post 1</a> |
        <a href="{{ route('posts.edit', ['post' => 1]) }}">Edit </a> |
        <form action="{{ route('posts.destroy', ['post' =>1]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    <li>
        <a href="{{ route('posts.show', ['post' => 2]) }}">post 2</a> |
        <a href="{{ route('posts.edit', ['post' => 2]) }}">Edit</a> |
        <form action="{{ route('posts.destroy', ['post' =>2]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    <li>
        <a href="{{ route('posts.show', ['post' => 3]) }}">post 3</a> |
        <a href="{{ route('posts.edit', ['post' => 3]) }}">Edit</a> |
        <form action="{{ route('posts.destroy', ['post' =>3]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
</ui>
@endsection
