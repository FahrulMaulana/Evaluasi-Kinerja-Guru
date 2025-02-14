@extends('layout.admin')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Tambah Barang Baru</h2>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('barang.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" required>
          </div>
          <!-- <div class="mb-3">
            <label for="kategoriBarang" class="form-label">Kategori</label>
            <select class="form-select" id="kategoriBarang" required>
              <option value="" disabled selected>Pilih kategori</option>
              <option value="Elektronik">Elektronik</option>
              <option value="Pakaian">Pakaian</option>
              <option value="Makanan">Makanan</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div> -->
          <div class="mb-3">
            <label for="harga_jual" class="form-label">Harga Jual</label>
            <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan harga barang" required>
          </div>
          <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Masukkan harga barang" required>
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="number" class="form-control" name="satuan" id="satuan" placeholder="Masukkan jumlah stok" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-2" onclick="window.location.href='/barang'">batal</button>
            <button type="submit" class="btn btn-primary ">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection