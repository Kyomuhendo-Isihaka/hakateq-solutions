@extends('layouts.app')

@section('content')
 <!-- Blog Section -->
 <section id="blog" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-4 font-weight-bold mb-4 text-center text-app">Our Blogs</h2>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/'. $blog->image_path) }}" class="card-img-top" height="200" alt="Blog Image">
                    <div class="card-body">
                        <a href="{{ route('blogs.show', ['id' => $blog->id, 'title' => \Str::slug($blog->title)]) }}" class="text-dark custom-link"style="text-decoration:none;"><h5 class="card-title">{{$blog->title}}</h5></a>
                        <p><small><i class="fa fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->published_at)->format('F j, Y') }}</small></p>
                        <p class="card-text truncate">{{$blog->content}}</p>
                        <a href="{{ route('blogs.show', ['id' => $blog->id, 'title' => \Str::slug($blog->title)]) }}" class="text-app " style="text-decoration:none;">Read More <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="w3-center">
            {{ $blogs->links('components.pagination') }}
        </div>

    </div>
</section>
@endsection
