<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class= "card-header font-weight-bolder" style="font-size:36px">Tambah Pengguna</h1>
                <div class="form-container">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Hp</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukkan No Hp">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" placeholder="Masukkan alamat"></textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan password" name="password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="usertype" class="form-label">Tipe Pengguna</label>
                            <select class="form-control" name="usertype" id="usertype">
                                <option value="0" {{ old('usertype') == 0 ? 'selected' : '' }}>User Biasa</option>
                                <option value="1" {{ old('usertype') == 1 ? 'selected' : '' }}>Tenant</option>
                            </select>
                            @error('usertype')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3" id="tenantField" style="display: none;">
                            <label for="kode_tenant" class="form-label">Kode Tenant</label>
                            <input type="text" class="form-control" name="kode_tenant" placeholder="Masukkan kode tenant">
                            @error('kode_tenant')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const usertypeSelect = document.getElementById('usertype');
                        const tenantField = document.getElementById('tenantField');

                        // Fungsi untuk mengatur visibilitas kode_tenant
                        const toggleTenantField = () => {
                            if (usertypeSelect.value == '1') { // Admin
                                tenantField.style.display = 'block';
                            } else {
                                tenantField.style.display = 'none';
                            }
                        };

                        // Jalankan fungsi saat halaman dimuat
                        toggleTenantField();

                        // Event listener untuk perubahan tipe pengguna
                        usertypeSelect.addEventListener('change', toggleTenantField);
                    });
                </script>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')

    <!-- End custom js for this page -->
  </body>
</html>