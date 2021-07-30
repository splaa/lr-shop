@extends('web-self.posts.layouts.post')

@section('content')
<h1>Posts Edit</h1>

<<<<<<< HEAD
<form action="{{ route('web-self.posts.update', $id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$title}}">
    @if ($errors->has('title'))
        <label class="error" for="title">{{ $errors->first('title') }}</label>
    @endif
=======
<form action="{{ route('posts.update', $id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$title}}">
>>>>>>> 9031d8c (Controllers)
    <button type="submit">Submit</button>
    
</form>
@endsection
