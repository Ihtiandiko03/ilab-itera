@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Kategori Alat Laboratorium</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/kategori/ubahkategori" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{ $kategori['id'] }}">
      <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" autofocus value="{{ old('nama_kategori', $kategori['nama_kategori']) }}">
        @error('nama_kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</div>
@endsection