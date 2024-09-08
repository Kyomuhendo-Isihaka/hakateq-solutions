@extends('layouts.app')

@section('content')


<section id="portfolio" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5"><span class="text-app">Our</span> Projects</h2>
        <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-4 mb-3">
                <div class="portfolio-item">
                    <img src="{{ asset($project->project_image) }}" class="img-fluid" alt="Project 1">
                    <a href="" class="nav-link">
                        <h5 class="text-center">{{ $project->title }}</h5>
                    </a>
                    <p class="text-center">{{ $project->type }}</p>
                </div>
            </div>
        @endforeach

        </div>

    </div>
</section>

@endsection
