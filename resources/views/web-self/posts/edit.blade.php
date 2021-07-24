@extends('web-self.posts.layouts.post')

@section('content')
<h1>Posts Edit</h1>

<form action="{{ route('posts.update', $id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$title}}">
    <button type="submit">Submit</button>
    
</form>
@endsection
