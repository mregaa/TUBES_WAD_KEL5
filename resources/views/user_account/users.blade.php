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
                <div class="container my-5">
                    <h1 class="text-center display-5 mb-3" style="font-size:36px">Daftar Pengguna</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white text-center" style=color: #000000;>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Tipe User</th>
                                    <th>Kode Tenant</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row -->
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->phone}}</td>
                                    <td>{{ $user->address}}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->kode_tenant }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('users.edit', $user) }}">Edit</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus user ini?')">Hapus</button>
                                    </form>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>