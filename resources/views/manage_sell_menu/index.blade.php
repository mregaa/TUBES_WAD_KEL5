<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Menu Table - Green Theme</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f0fdf4;
            font-family: 'Open Sans', sans-serif;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: #38b2ac;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

    </style>
</head>



<body>
{{-- Success Alert --}}
@if (session('success'))
<div class="mb-4 bg-green-500 text-white p-4 rounded-md">
    <div class="flex justify-between items-center">
        <span>{{ session('success') }}</span>
        <button type="button" class="text-white" data-bs-dismiss="alert" aria-label="close">
            <!-- <span class="material-symbols-rounded">close</span> -->
        </button>
    </div>
</div>
@endif

    <div class="container my-5">
        <h1 class="text-center mb-4" style="color: #38a169;">Daftar Menu</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="color: #2f855a;">Menu Kami</h2>
            <a href="{{ route('manage_menu_sell.create') }}" class="btn btn-primary">Tambah Menu</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Menu</th>
                        <th>Jumlah Tersedia</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Kode Tenant</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    @foreach ($menus as $menu)
                    <tr>
                        <td><img src="{{ $menu->image }}" alt="Menu" class="img-thumbnail" style="width: 100px;"></td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->stok}}</td>
                        <td>{{ $menu->deskripsi}}</td>
                        <td>{{ $menu->harga}}</td>
                        <td><span class="badge bg-warning">
                            {{ $menu->status === 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span></td>
                        <td>{{ $menu->kode_tenant }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('manage_menu_sell.edit', $menu) }}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
