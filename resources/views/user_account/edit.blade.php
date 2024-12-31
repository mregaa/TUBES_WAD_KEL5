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
                <div class="container">
                    <h1>Edit Pengguna</h1>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" name="address">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="usertype" class="form-label">Tipe Pengguna</label>
                            <select class="form-control" name="usertype" id="usertype">
                                <option value="0" {{ old('usertype', $user->usertype) == 0 ? 'selected' : '' }}>User Biasa</option>
                                <option value="1" {{ old('usertype', $user->usertype) == 1 ? 'selected' : '' }}>Tenant</option>
                            </select>
                            @error('usertype')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3" id="tenantField" style="{{ old('usertype', $user->usertype) == 1 ? '' : 'display: none;' }}">
                            <label for="kode_tenant" class="form-label">Kode Tenant</label>
                            <input type="text" class="form-control" name="kode_tenant" value="{{ old('kode_tenant', $user->kode_tenant) }}">
                            @error('kode_tenant')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Opsional)</label>
                            <input type="password" class="form-control" name="password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const usertypeSelect = document.getElementById('usertype');
                        const tenantField = document.getElementById('tenantField');

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