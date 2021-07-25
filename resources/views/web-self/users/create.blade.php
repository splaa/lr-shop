@extends('web-self.layouts.main')

@section('content')
    <div class="container">

        <form action="{{ route('web-self.user.registry.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="password" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmation Password</label>
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input class="form-control-file" id="avatar" type="file" name="avatar">
            </div>

            <button class="btn btn-primary" type="submit">Register</button>

        </form>
    </div>
@endsection
