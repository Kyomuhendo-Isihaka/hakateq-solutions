@extends('layouts.app')

@section('content')
    <div>
        <!-- Contact Section -->
        <section id="contact" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 text-app">Contact Us</h2>
                <div class="row">

                    <div class="col-md-7">
                        <h5>Get in touch <span>
                                <hr>
                            </span></h5>
                        <h5>Contact Details</h5>
                        <p>Street, Tech City, Uganda</p>
                        <p>Email: info@hakateq.com</p>
                        <p>Phone: +256 743102612</p>
                        <hr>
                        <h5>Follow Us</h5>
                        <a href="#" class="nav-link text-app"><i class="fab fa-facebook"></i> Facebook</a><br>
                        <a href="#" class="nav-link text-app"><i class="fab fa-twitter"></i> Twitter</a><br>
                        <a href="#" class="nav-link text-app"><i class="fab fa-linkedin"></i> LinkedIn</a>
                    </div>

                    <div class="col-md-5">
                        <div class="card p-3 bg-white">
                            <div class="card-title text-app text-center">Send us a Message</div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="w3-panel w3-green w3-margin-bottom">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="w3-panel w3-red w3-margin-bottom">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('contact.send') }}" method="POST">
                                    @csrf 

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                                    </div>

                                    <button type="submit" class="btn bg-app text-white">Send Message</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
