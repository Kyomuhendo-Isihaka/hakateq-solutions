<header class="bg-white shadow-sm fixed-top">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <a href="" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('image/hakateq.png') }}" width="40" class="mr-2" alt="hakateq Logo">
            <span class="font-weight-bold text-app">Hakateq Solutions</span>
        </a>

        <!-- For larger devices -->
        <nav class="d-none d-md-flex">
            <a href="{{route('home')}}" class="nav-link text-app mx-2">Home</a>
            <a href="{{route('services')}}" class="nav-link text-app mx-2">Services</a>
            <a href="{{route('blogs')}}" class="nav-link text-app mx-2">Blogs</a>
            <a href="{{route('about')}}" class="nav-link text-app mx-2">About</a>
            <a href="{{route('contact')}}" class="nav-link text-app mx-2">Contact Us</a>

        </nav>

        <!-- For small devices -->
        <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="collapse navbar-collapse bg-app">
        <div class="container py-3">
            <a href="{{route('home')}}" class="nav-link text-white">Home</a>
            <a href="{{route('services')}}" class="nav-link text-white">Services</a>
            <a href="{{route('blogs')}}" class="nav-link text-white">Blogs</a>
            <a href="{{route('about')}}" class="nav-link text-white">About</a>
            <a href="{{route('contact')}}" class="nav-link text-white">Contact Us</a>

        </div>
    </div>
</header>
