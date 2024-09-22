@extends('layouts.app')

@section('content')
    <div>
        <section class="hero-section d-flex align-items-center text-center text-white">
            <video autoplay muted loop playsinline class="video-bg">
                <source src="{{ asset('image/intro_red.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
            <div class="container">
                {{-- <h1 class="display-4">Innovative Software Solutions</h1> --}}
                <p class="lead"> Innovating the Future with Advanced Software Solutions</p>
                <a href="{{ route('services') }}" class="btn btn-outline-light ">Learn More</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light ">Get in Touch</a>
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

                <a class="text-center text-app" href="{{ route('services') }}" style="text-decoration:none;">See More <i
                        class="fa fa-arrow-right"></i></a>
            </div>
        </section>


        <section class="py-5">
            <div class="row">
                <div class="col-md-3">
                   <div class="text-center">
                      <i class="fa fa-trophy" style="font-size:3rem;"></i>
                   </div>
                   <h4 class="counter text-app text-center" data-target="3"></h4>
                   <h6 class="text-center">Years of Experience</h6>
                </div>


                <div class="col-md-3">
                   <div class="text-center">
                      <i class="fa fa-check-circle" style="font-size:3rem;"></i>
                   </div>
                   <h4 class="counter text-app text-center" data-target="9"></h4>
                   <h6 class="text-center">Projects Completed</h6>
                </div>

                <div class="col-md-3">
                   <div class="text-center">
                      <i class="fa fa-handshake" style="font-size:3rem;"></i>
                   </div>
                   <h4 class="counter text-app text-center" data-target="6"></h4>
                   <h6 class="text-center">Happy Clients</h6>
                </div>

                <div class="col-md-3">
                   <div class="text-center">
                      <i class="fa fa-users-cog" style="font-size:3rem;"></i>
                   </div>
                   <h4 class="counter text-app text-center" data-target="10"></h4>
                   <h6 class="text-center">Expert Team Members</h6>
                </div>
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
                        <img src="{{ asset('image/about.jpg') }}" width="100%" alt="">
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
                <h2 class="text-center mb-5"><span class="text-app">Our</span> Projects</h2>
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-md-4">
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
                <a class="text-center text-app pt-3" href="{{ route('projects.index') }}" style="text-decoration:none;">See
                    More <i class="fa fa-arrow-right"></i></a>

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
                                    <p class="mb-4">"Hakateq exceeded our expectations. The team delivered a robust and
                                        scalable solution."</p>
                                    <p><strong>Allan, Coep Creations</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-8 text-center">
                                    <p class="mb-4">"Their professionalism and expertise are unparalleled. We highly
                                        recommend Hakateq solutions"</p>
                                    <p><strong>Okot Joshua, Kakebe Tech</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-8 text-center">
                                    <p class="mb-4">"A great partner for our business. They understand our needs and
                                        deliver on time."</p>
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

        <section id="faq" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Frequently <span class="text-app">Asked Questions</span></h2>
                <div class="accordion bg-white" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="card ">
                        <div class="card-header" id="faq1">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark bg-white collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    What services does Hakateq Solutions offer?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="faq1" data-parent="#faqAccordion">
                            <div class="card-body">
                                Hakateq Solutions provides custom software development, cloud-based solutions, AI integrations, and cybersecurity services tailored to meet business needs.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="card">
                        <div class="card-header" id="faq2">
                            <h5 class="mb-0">
                                <button class="btn bg-white btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    How long does a typical project take to complete?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="faq2" data-parent="#faqAccordion">
                            <div class="card-body">
                                The timeline depends on the complexity and scope of the project. On average, most projects are completed within 3-6 months.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="card">
                        <div class="card-header" id="faq3">
                            <h5 class="mb-0">
                                <button class="btn bg-white btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Can you help with maintaining our existing software?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="faq3" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, Hakateq Solutions offers software maintenance and support services to ensure your systems run smoothly and are up-to-date.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="card">
                        <div class="card-header" id="faq4">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark bg-white collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Do you offer cloud solutions?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="faq4" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, we specialize in cloud-based solutions that offer scalability, security, and flexibility for your business operations.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="card">
                        <div class="card-header" id="faq5">
                            <h5 class="mb-0">
                                <button class="btn btn-link bg-white text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    How do I get started with a project?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="faq5" data-parent="#faqAccordion">
                            <div class="card-body">
                                Simply contact us via email or phone, and our team will arrange a consultation to discuss your project needs and how we can help.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
@endsection
