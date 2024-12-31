<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cart</title>
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

    <style type="text/css">

        body {
            background-color: #f0fdf4;
            font-family: 'Open Sans', sans-serif;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table td {
            vertical-align: middle;
        }

    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    @if(session('message'))
    <div class="alert alert-success" style='margin-top:100px;'>
        {{ session('message') }}
    </div>
    @endif

    <!-- Navbar Start -->
    @include('home.navbar')
    <!-- Navbar End -->
    
    <div class="container my-5">
        <h1 class="text-center display-5 mb-3" style="color: #000000;">Keranjang</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary text-white text-center">
                        <th>Foto</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $totalPrice = 0; ?>
                    @foreach ($carts as $cart)
                    <tr>
                        <td><img src="{{ $cart->image }}" alt="Menu" class="img-thumbnail" style="width: 200px;"></td>
                        <td>{{ $cart->menu_nama}}</td>
                        <td>{{ $cart->quantity}}</td>
                        <td>Rp. {{number_format($cart->price, 0, ',', '.')}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('cart.edit',$cart->id)}}">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus menu ini?')" href="{{url('/remove_cart',$cart->id)}}">Hapus</a>
                        </td>
                    </tr>
                    <?php $totalPrice = $totalPrice + $cart->price; ?>
                    @endforeach

                </tbody>
            </table>
            <div>
                <h1 style='font-size: 25px; padding-bottom: 25px'>Total Price: Rp. {{number_format($totalPrice,0,',','.')}} </h1>
            </div>
            <div>
                <h1 style='font-size: 25px; padding-bottom: 15px'>Checkout Pesanan</h1>
                <a href="{{url('qr')}}" class="btn btn-primary" id="rounded-square">Bayar dengan QR</a>
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