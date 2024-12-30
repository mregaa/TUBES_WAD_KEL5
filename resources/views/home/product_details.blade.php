<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('home.navbar')
    <!-- Navbar End -->

    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" style="margin: auto; width:25%; margin-top:200px">
        
        <div class="product-item">
            <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="{{ $menu->image }}" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $menu->kode_tenant }}</div>
            </div>
            <div class="text-center p-4">
                <a class="d-block h5 mb-2">{{ $menu->nama_menu }}</a>
                <span class="text-primary me-1">Harga: {{ $menu->harga}}</span>
                <span class="text-muted d-block">{{ $menu->deskripsi}}</span>
                <span class="text-muted d-block">Stok Tersisa: {{ $menu->stok}}</span>
                <span class="text-muted d-block">{{ $menu->status}}</span>
            </div>
            <div class="d-flex border-top">
            </div>
            <div class="d-flex border-top">

            <small class="w-100 text-center py-2 d-flex align-items-center justify-content-center">
                <form action="{{ url('add_cart') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="form-control me-2" style="width: 60px;">
                    <button type="submit" class="btn btn-primary">
                        <a class="text-body"></a><i class="fa fa-shopping-bag text-white me-2"></i>Add to cart
                    </button>
                </form>
            </small>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    @include('home.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>