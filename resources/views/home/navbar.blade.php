<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-10 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Telkom University</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>telueats@gmail.com</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="/" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Telu<span class="text-secondary">Eats</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}#menu" class="nav-item nav-link">Menu</a>
                    <a href="{{ url('/') }}#about" class="nav-item nav-link">About Us</a>
                    <a href="{{ url('/') }}#rating" class="nav-item nav-link">Ratings & Reviews</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{url('show_cart')}}">
                        <small class="fa fa-shopping-bag text-body"></small>
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
                <a class="btn btn-secondary" id='rounded-square' href="{{ route('register') }}">Register</a>

                @endauth
                @endif
            </div>
        </nav>
    </div>
