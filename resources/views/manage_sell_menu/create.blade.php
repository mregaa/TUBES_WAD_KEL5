<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Create Menu</title>
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
        /* Global Reset and Box Sizing */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Body Styling */
        body {
            background-color: #f4f9f4;
            font-family: 'Open Sans', sans-serif;
            padding: 20px;
        }

        /* Form Header */
        h1 {
            color: #4CAF50;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form Styling */
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #4CAF50;
        }

        .form-control {
            border: 1px solid #4CAF50;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #45a049;
            box-shadow: 0 0 5px rgba(72, 182, 72, 0.5);
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #45a049;
            cursor: pointer;
        }

        /* Back Button Styling */
        .btn-back {
            background-color: #f4f9f4;
            border: 1px solid #4CAF50;
            color: #4CAF50;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #e0e9e0;
            cursor: pointer;
        }

        /* Fix Bottom Spacing */
        .form-container .form-body {
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- Back Button -->
    <a href="{{ route('manage_menu_sell.index') }}"  class="btn-back">Back to Menu</a>

    <h1>Create Menu</h1>

    <div class="form-container">
        <form action="{{ route('manage_menu_sell.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="menuImage" class="form-label">Foto Menu</label>
                <input type="file" class="form-control" name="image" id="menuImage" value="{{ old('image') }}">
                @error('image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="menuName" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" name="nama_menu" id="menuName" placeholder="Masukkan nama menu" value="{{ old('nama_menu') }}">
                @error('nama_menu')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="menuQuantity" class="form-label">Jumlah Tersedia</label>
                <input type="number" class="form-control" name="stok" id="menuQuantity" placeholder="Masukkan jumlah tersedia"value="{{ old('stok') }}">
                @error('stok')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="menuDescription" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="menuDescription" rows="3" placeholder="Masukkan deskripsi menu" value="{{ old('deskripsi') }}"></textarea>
                @error('deskripsi')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="menuPrice" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" id="menuPrice" placeholder="Masukkan harga" value="{{ old('harga') }}">
                @error('harga')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="menuStatus" class="form-label">Status</label>
                <select class="form-control" name="status" id="menuStatus" value="{{ old('status') }}">
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak_tersedia">Tidak Tersedia</option>
                </select>
                @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tenantCode" class="form-label">Kode Tenant</label>
                <input type="text" class="form-control" name="kode_tenant" id="tenantCode" placeholder="Masukkan kode tenant" value="{{ old('kode_tenant') }}">
                @error('kode_tenant')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
