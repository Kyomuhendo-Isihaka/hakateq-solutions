@extends('layouts.app')

@section('content')
    <div>
        <section class="hero-section d-flex align-items-center text-center text-white">
            <video autoplay muted loop playsinline class="video-bg">
                <source src="{{ asset('image/hakateq_video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
            <div class="container">
                {{-- <h1 class="display-4">Innovative Software Solutions</h1> --}}
                <p class="lead"> Innovating the Future with Advanced Software Solutions</p>
                <a href="{{route('services')}}" class="btn btn-outline-light ">Learn More</a>
                <a href="{{route('contact')}}" class="btn btn-outline-light ">Get in Touch</a>
            </div>
        </section>


        <!-- Services Section -->
        <section id="services" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center mb-4"><span class="text-app">Our</span> Expertise</h2>
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
                
                <a class="text-center" href="{{route('services')}}" style="text-decoration:none;">See More <i class="fa fa-arrow-right"></i></a>
            </div>
        </section>


        <!-- why Us Section -->
        <section id="about" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Why <span class="text-app">Us</span></h2>

                <div class="row py-2">
                    <div class="col-md-7">
                        <p>We have a proven track record of delivering successful
                            projects on time and within budget, thanks to our
                            experienced team of professionals with years of expertise in
                            software development and IT consulting. Our client-focused
                            approach ensures that we take the time to understand your
                            business, crafting solutions that align with your goals. We
                            leverage cutting-edge technology to provide you with
                            solutions that offer a competitive advantage, and we offer
                            comprehensive support and maintenance to keep your
                            software up-to-date and performing optimally</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('image/hakateq.png') }}" width="100%" alt="">
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4 text-center">
                        <h5 class="text-app">Our Mission</h5>
                        <p>To deliver exceptional, customized software solutions that meet our clients' unique needs by
                            harnessing the latest technologies and industry best practices. We strive to build lasting
                            partnerships by consistently exceeding expectations and adding value to our clients' businesses.
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="text-app">Our Vision</h5>
                        <p>To be a global leader in software innovation, delivering
                            cutting-edge solutions that boost business efficiency, drive
                            growth, and ensure long-term success.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="text-app">Our Values</h5>
                        <p>Innovation, Integrity, Excellence, and Customer Satisfaction.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center mb-5"><span class="text-app">Our</span> Products</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <img src="{{ asset('image/hakafinlogo.png') }}" class="img-fluid mb-3" alt="Project 1">
                            <a href="" class="nav-link">
                                <h5 class="text-center">Hakafin</h5>
                            </a>
                            <p class="text-center">Finacial Management System</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <img src="{{ asset('image/ibeliveqlogo.png') }}" class="img-fluid mb-3" alt="Project 3">
                            <a href="" class="nav-link">
                                <h5 class="text-center">Ibelieve</h5>
                            </a>
                            <p class="text-center">Social Management system</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-item">
                            <img src="{{ asset('image/hakateq.png') }}" class="img-fluid mb-3" alt="Project 2">
                            <a href="" class="nav-link">
                                <h5 class="text-center">DMS</h5>
                            </a>
                            <p class="text-center">Drug Management system</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


       <!-- Testimonials Section -->
       <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What <span class="text-app">Our Clients</span> Say</h2>
            <div id="testimonialsCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <p class="mb-4">"Hakateq exceeded our expectations. The team delivered a robust and scalable solution."</p>
                                <p><strong>Allan, Coep Creations</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <p class="mb-4">"Their professionalism and expertise are unparalleled. We highly recommend Hakateq solutions"</p>
                                <p><strong>Okot Joshua, Kakebe Tech</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <p class="mb-4">"A great partner for our business. They understand our needs and deliver on time."</p>
                                <p><strong>Oscar Bulls, JCM</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonialsCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonialsCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>


    </div>
@endsection
