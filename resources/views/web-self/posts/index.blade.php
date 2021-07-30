<<<<<<< HEAD
@extends('web-self.layouts.main')

@php
    /**
     *@var Post $post
    */
    use App\Models\WebSelf\Post;
@endphp

@section('content')
    <div class="container">
        <h1>Posts List</h1>
        <a class="btn btn-primary" href="{{ route('web-self.posts.create') }}">Create Post</a>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>

                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md12">
                    {{ $posts->onEachSide(3)->links() }}
                </div>
            </div>
        </div>
    </div>

=======
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
>>>>>>> 9031d8c (Controllers)
@endsection
