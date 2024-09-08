@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-4">About <span class="text-app">Us</span> </h2>
    <p> Hakateq Solutions is a visionary software development
        company committed to transforming businesses with
        innovative technology. Built on a foundation of excellence,
        integrity, and a customer-first approach, we deliver high
       quality software products tailored to the unique needs of
        our clients. Our team of seasoned professionals is dedicated
        to driving digital transformation and empowering
        organizations to thrive in an ever-evolving technological
        landscape.</p>

        <section class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-4">Meet Our Team</h2>
                <div class="row w3-center">
                    @foreach ($team as $member)
                    <div class="col-md-3 text-center">
                        <div class="team-member">
                            <img src="{{ asset($member->profile) }}" width="100%" height="250px" alt="Team Member" class="img-flui rounded-circle mb-3">
                            <h5>{{$member->name}}</h5>
                            <p class="text-muted">{{$member->phone}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>


</div>
@endsection
