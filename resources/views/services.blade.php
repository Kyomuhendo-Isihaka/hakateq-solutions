@extends('layouts.app')

@section('content')
<div class="container">
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4"><span class="text-app">Our</span> Services</h2>
            <div class="row text-center">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body">
                            <i class="fa fa-laptop fs-1 mb-3 text-primary"></i>
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Creating responsive and dynamic websites tailored to your business
                                needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body">
                            <i class="fa fa-phone fs-1 mb-3 text-success"></i>
                            <h5 class="card-title">Mobile App Development</h5>
                            <p class="card-text">Building intuitive and engaging mobile applications for iOS and
                                Android.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body">
                            <i class="fa fa-cloud fs-1 mb-3 text-info"></i>
                            <h5 class="card-title">Cloud Solutions</h5>
                            <p class="card-text">Offering scalable cloud services to enhance your business operations.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body">
                            <i class="fa fa-brain fs-1 mb-3 text-warning"></i>
                            <h5 class="card-title">AI & Machine Learning</h5>
                            <p class="card-text">Leveraging AI and ML to bring intelligent automation to your business.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
