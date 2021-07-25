@extends('web-self.layouts.main')

@section('title')@parent:: {{ $title ?? 'Mail' }} @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Email sent.
        </div>
    </div>
@endsection