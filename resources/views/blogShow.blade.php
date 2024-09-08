@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/w3pro-4.13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/w3-theme.css') }}">
<section id="blogshow" class="py-5 container">
    <div class="w3-card-4 w3-light-grey w3-padding-16 p-3">
        <h4 class="text-center display-4 font-weight-bold">{{$blog->title}}</h4>
        <p><small>Published on {{ \Carbon\Carbon::parse($blog->published_at)->format('F j, Y') }}</small></p>
        <img src="{{asset($blog->image_path)}}" width="100%" alt="">
        <p class="text-center">Author: <small>{{$blog->author}}</small></p>
        <hr>

        <p>{!! $blog->content !!}</p>
    </div>
</section>
@endsection
