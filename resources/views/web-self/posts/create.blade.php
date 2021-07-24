@extends('web-self.posts.layouts.post')

@section('content')
<h1>Posts create</h1>

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <button type="submit">Submit</button>
    
</form>
@endsection
