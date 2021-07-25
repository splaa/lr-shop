@extends('web-self.layouts.main')

@section('content')
    <div class="container">
        <h1>Posts List</h1>
        <a class="btn btn-primary" href="{{ route('web-self.posts.create') }}">Create Post</a>
        <ui>
            <li>
                <a href="{{ route('web-self.posts.show', ['post' => 1]) }}">post 1</a> |
                <a href="{{ route('web-self.posts.edit', ['post' => 1]) }}">Edit </a> |
                <form action="{{ route('web-self.posts.destroy', ['post' =>1]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
            <li>
                <a href="{{ route('web-self.posts.show', ['post' => 2]) }}">post 2</a> |
                <a href="{{ route('web-self.posts.edit', ['post' => 2]) }}">Edit</a> |
                <form action="{{ route('web-self.posts.destroy', ['post' =>2]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
            <li>
                <a href="{{ route('web-self.posts.show', ['post' => 3]) }}">post 3</a> |
                <a href="{{ route('web-self.posts.edit', ['post' => 3]) }}">Edit</a> |
                <form action="{{ route('web-self.posts.destroy', ['post' =>3]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        </ui>
    </div>
@endsection
