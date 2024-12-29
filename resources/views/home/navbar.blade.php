<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-10 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Telkom University</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>telueats@gmail.com</small>
            </div>
            @if(Auth::user())
            <div class="col-lg-2">
                @include('navigation-menu')
            </div>
            @endif
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="dashboard" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Dashboard</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="product.html" class="nav-item nav-link">Catalogs</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                    </a>
                </div>
                        @if (Route::has('login'))

                        @auth
                        <a>
                            <x-app-layout>
                            </x-app-layout>
                        </a>
                        @else
                        <a class="btn btn-primary" id='logincss' href="{{ route('login') }}">Login</a>
                        <a class="btn btn-secondary" id='registercss' href="{{ route('register') }}">Register</a>

              @endauth
                        @endif
            </div>
        </nav>
    </div>
