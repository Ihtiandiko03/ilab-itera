@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Peminjam Alat {{ $alat->nama_alat }}</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/datapeminjam/tambahdata" class="mb-5" enctype="multipart/form-data">
        @csrf
      
      <input type="hidden" name="id_alat_lab" value="{{ $alat->id }}">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Peminjam</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" autofocus value="{{ old('nik') }}">
        @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autofocus value="{{ old('phone') }}">
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tgl_dipinjam" class="form-label">Tanggal Dipinjam</label>
        <input type="date" class="form-control @error('tgl_dipinjam') is-invalid @enderror" id="tgl_dipinjam" name="tgl_dipinjam" autofocus value="{{ old('tgl_dipinjam') }}">
        @error('tgl_dipinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tgl_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
        <input type="date" class="form-control @error('tgl_dikembalikan') is-invalid @enderror" id="tgl_dikembalikan" name="tgl_dikembalikan" autofocus value="{{ old('tgl_dikembalikan') }}">
        @error('tgl_dikembalikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Alat</label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" autofocus value="{{ old('jumlah') }}">
        @error('jumlah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="">Pilih</option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

@endsection