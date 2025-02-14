@extends('layout.admin')
@section('content')
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
<div class="container">
<!-- Update alert markup -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card mt-3">
    <div class="card-body"> 
      <div class="row">
      <div class="col-sm-6">
      <h3>Penilaian Guru</h3>
      </div>
      </div>
      </div>
</div>
    <div class="card mt-3">
        <div class="card-body">
                <form>
                @csrf
                <!-- Member Selection -->
                <div class="mb-3">
                    <label class="mb-2">Guru</label>
                    <select name="id_member" class="form-select">
                        <option value="" disabled selected>Pilih Guru</option>
                        @foreach ($guru as $g )
                        <option value="{{$g->id }}">{{$g->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Products Section -->
                <table class="table table-bordered table-hover  shadow-lg">
                    <thead class="table-secondary">
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 75%;">Kompetensi</th>
                            <th style="width: 20%;">Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($kompetensi->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            <img src="{{ asset('/build/assets/Animation - 1736668256622.gif') }}" alt="No Data" style="width: 150px; margin-top: 10px;">
                        </td>
                    </tr>
                    @else
                        @foreach ($kompetensi as $data)
                            <tr class="align-middle">
                                <td style="text-align: center;">{{ $data->id }}</td>
                                <td style="text-align: center;">{{ $data->nama_kompetensi }}</td>
                                <td style="text-align: left;">
                                    @foreach ($bobot as $b)
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penilaian[{{ $data->id }}]" id="penilaian_{{ $data->id }}_{{ $b->id }}" value="{{ $b->id }}">
                                    <label class="form-check-label" for="penilaian_{{ $data->id }}_{{ $b->id }}">
                                        {{ $b->nama_kriteria }}
                                    </label>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
        </div>
    </div>
</div>
@endsection