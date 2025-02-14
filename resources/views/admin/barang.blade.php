@extends('layout.admin')
@section('content')
<!-- <div class="container mt-5">
    <h2 class="mb-4">Barang</h2>
    <button class="btn btn-primary btn-sm mb-4"
    onclick="window.location.href='/barang/create'"
    >Tambah</button>
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-primary">
        <tr>
          <th>id</th>
          <th>Nama Barang</th>
          <th>Harga jual</th>
          <th>Harga Beli</th>
          <th>Satuan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
            @foreach ($barang as $item)
            <tr>
            <td>{{ $item->id_barang}}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->harga_jual }}</td>
            <td>{{ $item->harga_beli }}</td>
            <td>{{ $item->satuan }}</td>
            <td>
                  <button class="btn btn-warning btn-sm"
                  onclick="window.location.href='/barang/update/{{ $item->id_barang }}'"
                  >Edit</button>
                  <form action="/barang/hapus/{{ $item->id_barang }}" method="POST" class="d-inline">
                  @csrf
                  <button class="btn btn-danger btn-sm">Hapus</button>
                  </form>
            </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div> -->



  <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(to bottom, #f8f9fa, #e9ecef) no-repeat, 
                repeating-linear-gradient(45deg, #f8f9fa 0%, #e9ecef 25%, #f8f9fa 50%) no-repeat;
    background-size: 100% 100%, 20px 20px;
    min-height: 100vh;
  }
  .app-content-header {
    background-color: #ffffff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
  }
  .card-body {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }
  /* Tabel Styling */
.table {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan lembut */
}

/* Header Tabel */
.table-dark {
  background-color: #343a40; /* Warna gelap untuk header */
  color: white; /* Warna teks putih pada header */
}

/* Baris Tabel */
.table-striped tbody tr:nth-child(odd) {
  background-color: #f9f9f9; /* Memberikan warna latar belakang pada baris ganjil */
}

.table-hover tbody tr:hover {
  background-color: #f1f1f1; /* Memberikan warna latar belakang saat hover */
  cursor: pointer;
  transition: background-color 0.3s ease-in-out; /* Efek transisi halus */
}

/* Tombol Styling */
.btn {
  padding: 8px 16px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.btn:hover {
  opacity: 0.8; /* Efek transparansi saat hover */
  transform: translateY(-2px); /* Efek angkat tombol saat hover */
}

.btn-warning {
  background-color: #f0ad4e; /* Warna oranye */
}

.btn-warning:hover {
  background-color: #ec971f; /* Warna lebih gelap saat hover */
}

.btn-danger {
  background-color: #d9534f; /* Warna merah */
}

.btn-danger:hover {
  background-color: #c9302c; /* Warna lebih gelap saat hover */
}

/* Styling Kolom ID */
th {
  text-align: center;
  font-weight: bold;
}

/* Styling Kolom Aksi */
td button {
  margin-right: 8px;
}


</style>

<!--begin::App Content Header-->

<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    <!-- begin::Row-->
    @if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center mt-3" id="error-alert" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
          </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-3" id="error-alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
        </div>
    @endif

    <!-- Success alert -->
    @if (session('success'))
        <div class="alert alert-success mt-3" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="display: none;"></button>
        </div>
    @endif

    <div>
      <div class="card-body mt-3"> 
      <div class="row">
      <div class="col-sm-6">
      <h3>Data Pengguna</h3>
      </div>
      </div>
      </div>
      <div class="card-body mt-3">
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-primary mb-4 text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Pengguna
          </button>
        </div>

      <!-- CREATE -->


      <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header" style="padding: 15px; display: flex; justify-content: center; align-items: center;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight: bold; text-align: center; margin: 0;">Tambah Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; opacity: 1; border-radius: 50%;"></button>
              </div>

              <!-- Modal Body -->
              <div class="modal-body" style="padding: 20px;">
                <!-- Form Tambah Kasir -->
                <form id="tambahKasirForm" action="{{route('barang.store')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="nama_user" class="form-label" style="font-weight: bold;">Nama Pengguna</label>
                      <input type="text" class="form-control"  id="nama_user" name="nama_user" placeholder="Masukan Nama Pengguna" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    </div>
                    <label for="username" class="form-label" style="font-weight: bold;">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                  </div>
                  <div class="mb-3">
                    <label for="level" class="form-label" style="font-weight: bold;">level</label>
                    <input type="level" class="form-control " id="level" name="level" placeholder="Masukkan level" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                  </div>
                </form>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer" style=" display: flex; justify-content: flex-end; ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Close</button>
                <button type="submit" class="btn btn-primary" form="tambahKasirForm" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Simpan</button>
              </div>
            </div>
          </div>
        </div>


        <!-- UPDATE -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdropUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header" style="padding: 15px; display: flex; justify-content: center; align-items: center;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight: bold; text-align: center; margin: 0;">Edit Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white; opacity: 1; border-radius: 50%;"></button>
              </div>
              <!-- Modal Body -->
              <div class="modal-body" style="padding: 20px;">
                <!-- Form Tambah Kasir -->
                <form id="updateKasirForm"  method="POST">
                @csrf
                  <!-- Input Hidden untuk ID Kasir -->
                  <input type="hidden" id="id_user" name="id_user">
                  <!-- <input type="hidden" id="password2" name="password"> -->

                  <div class="mb-3">
                    <div class="mb-3">
                      <label for="nama_user2" class="form-label" style="font-weight: bold;">Nama User</label>
                      <input type="text" class="form-control"  id="nama_user2" name="nama_user2" placeholder="Nama User" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                    </div>
                    <label for="username2" class="form-label" style="font-weight: bold;">Username</label>
                    <input type="text" class="form-control" id="username2" name="username2" placeholder="Masukan Username" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                  </div>
                  <div class="mb-3">
                    <label for="level2" class="form-label" style="font-weight: bold;">level</label>
                    <input type="level2" class="form-control " id="level2" name="level2" placeholder="Level" required style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
                  </div>
                </form>
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer" style=" display: flex; justify-content: flex-end; ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Close</button>
                <button type="submit" class="btn btn-success" form="updateKasirForm" style="font-size: 14px; padding: 8px 15px; border-radius: 8px;">Simpan</button>
              </div>
            </div>
          </div>
        </div>



        <!-- DELETE -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Hapus Data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            <input type="hidden" name="id_user" id="id_user3">
                            <button type="submit" class="btn btn-danger" form="deleteForm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  

        <div class="table-responsive">
        <table class="table table-bordered table-hover  shadow-lg">
    <thead class="table-secondary">
        <tr>
            <th style="width: 10px">ID</th>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
    @if ($barang->isEmpty())
      <tr>
        <td colspan="6" class="text-center text-muted">
            <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data" style="width: 150px; margin-top: 10px;">
        </td>
      </tr>
    @else
        @foreach ($barang as $data)
            <tr class="align-middle">
                <td>{{ $data->id_user }}</td>
                <td>{{ $data->nama_user }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->level }}</td>
                <!-- <td><img 
                src="{{ asset('uploads/' . $data->foto) }}" 
                alt="Foto {{ $data->nama_Pengguna }}" 
                style="width: 100px; height: auto; border-radius: 8px; object-fit: cover;"></td> -->
                    <td>
                    <!-- Tombol Edit (Update) -->
                    <a 
                      href="javascript:void(0)" 
                      data-bs-toggle="modal" 
                      data-bs-target="#staticBackdropUpdate" 
                      onclick="setEditData('{{ $data->id_user }}', '{{ $data->nama_user }}', '{{ $data->username }}', '{{ $data->level }}')" 
                      class="text-warning" 
                      title="Edit">
                      <i class="bi bi-pencil-square fs-5"></i>
                  </a>

                    <!-- Tombol Hapus (Delete) -->
                    <a 
                      href="javascript:void(0)" 
                      data-bs-toggle="modal" 
                      data-bs-target="#staticBackdropDelete" 
                      onclick="setDeleteData('{{ $data->id_user }}')" 
                      class="text-danger" 
                      title="Delete">
                      <i class="bi bi-trash fs-5"></i>
                  </a>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <!-- Previous Page -->
                <li class="page-item {{ $barang->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $barang->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                
                <!-- Page Number Links -->
                @for ($i = 1; $i <=$barang->lastPage(); $i++)
                    <li class="page-item {{ $i ==$barang->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{$barang->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Next Page -->
                <li class="page-item {{$barang->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{$barang->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
      </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
<script>
    // Fungsi untuk mengisi data edit
    function setEditData(id_user, nama_user, username, level) {
        // Isi nilai form
        document.getElementById('id_user').value = id_user;
        document.getElementById('nama_user2').value = nama_user;
        document.getElementById('username2').value = username;
        document.getElementById('level2').value = level;

        // Perbarui action form dengan id_member
        const form = document.getElementById('updateKasirForm');
        const baseUrl = "{{ url('/barang/update-barang/') }}/"; // URL dasar tanpa parameter
        form.action = `${baseUrl}${id_user}`;
        console.log(form.action);
        
    }

    // Fungsi untuk mengisi data hapus
    function setDeleteData(id_user) {
        // Isi nilai form
        document.getElementById('id_user3').value = id_user;

        // Perbarui action form dengan id_member
        const form = document.getElementById('deleteForm');
        const baseUrl = "{{ url('/barang/hapus/') }}/"; // URL dasar tanpa parameter
        form.action = `${baseUrl}${id_user}`;
    }

    // Menutup alert setelah 3 detik
    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        var successAlert = document.getElementById('success-alert');
        
        // Cek apakah ada error alert dan trigger event close
        if (errorAlert) {
            var closeButton = errorAlert.querySelector('[data-bs-dismiss="alert"]');
            if (closeButton) {
                closeButton.click(); // Men-trigger klik pada tombol close
            }
        }

        // Cek apakah ada success alert dan trigger event close
        if (successAlert) {
            var closeButton = successAlert.querySelector('[data-bs-dismiss="alert"]');
            if (closeButton) {
                closeButton.click(); // Men-trigger klik pada tombol close
            }
        }
    }, 3000); // 3000ms = 3 seconds
</script>




@endsection