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
                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="team-member">
                            <img src="{{asset('image/hakateq.png')}}" alt="Team Member" class="img-fluid rounded-circle mb-3">
                            <h5>Isihaka Kyomuhendo</h5>
                            <p class="text-muted">CEO & Founder</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="team-member">
                            <img src="{{asset('image/hakateq.png')}}" alt="Team Member" class="img-fluid rounded-circle mb-3">
                            <h5>Edison Kusemererwa</h5>
                            <p class="text-muted">COO & Co-Founder</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="team-member">
                            <img src="{{asset('image/hakateq.png')}}" alt="Team Member" class="img-fluid rounded-circle mb-3">
                            <h5>Davis Mugabe</h5>
                            <p class="text-muted">CTO</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="team-member">
                            <img src="{{asset('image/hakateq.png')}}" alt="Team Member" class="img-fluid rounded-circle mb-3">
                            <h5>Akello</h5>
                            <p class="text-muted">Salesperson</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


</div>
@endsection
