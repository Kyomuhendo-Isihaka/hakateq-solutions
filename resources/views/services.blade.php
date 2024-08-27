@extends('layouts.app')

@section('content')
<div class="container">
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4"><span class="text-app">Our</span> Services</h2>
            <div class="row text-center">
                @foreach ($services as $service)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body">
                            <i class="fa {{$service->icon}} {{ $service->icon_color}} fs-1 mb-3 "></i>
                            <h5 class="card-title">{{$service->name}}</h5>
                            <p class="card-text">{{$service->brief_description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                </div>
        </div>
    </section>
</div>
@endsection
