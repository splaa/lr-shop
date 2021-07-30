<<<<<<< HEAD
@extends('web-self.layouts.main')

@section('content')
    <div class="container">
        <h1>Posts create</h1>
        <form action="{{ route('web-self.posts.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " 
                       id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          name="content" id="content" rows="3">
                    {{ old('content') }}
                </textarea>
                @error('content')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rubric_id">Select Rubric</label>
                <select class="form-control @error('rubric_id') is-invalid @enderror" 
                        id="rubric_id" name="rubric_id">
                    <option>Select...</option>
                    <option value="1">1</option>
                </select>
                @error('rubric_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control @error('rubric_id') is-invalid @enderror" 
                          id="comment" rows="3" name="comment"></textarea>
                @error('comment')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        
        </form>
    </div>
=======
@extends('web-self.posts.layouts.post')

@section('content')
<h1>Posts create</h1>

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <button type="submit">Submit</button>
    
</form>
>>>>>>> 9031d8c (Controllers)
@endsection
