@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Peminjam Alat <b> {{ $alat->nama_alat }} </b></h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/datapeminjam/store" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

      <input type="hidden" name="key" value="{{ $data->id }}">
      <input type="hidden" name="id_alat_lab" value="{{ $alat->id }}">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Peminjam</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $data->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autofocus value="{{ old('phone', $data->phone) }}">
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="instansi" class="form-label">Instansi</label>
        <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" autofocus value="{{ old('instansi', $data->instansi) }}">
        @error('instansi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat_instansi" class="form-label">Alamat Instansi</label>
        <textarea name="alamat_instansi" class="form-control @error('alamat_instansi') is-invalid @enderror" id="alamat_instansi" cols="30" rows="10">{{ old('alamat_instansi', $data->alamat_instansi) }}</textarea>
        @error('alamat_instansi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tgl_dipinjam" class="form-label">Tanggal Diajukan</label>
        <input type="date" class="form-control @error('tgl_dipinjam') is-invalid @enderror" id="tgl_dipinjam" name="tgl_dipinjam" autofocus value="{{ old('tgl_dipinjam', $data->tgl_dipinjam) }}">
        @error('tgl_dipinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tgl_dikembalikan" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control @error('tgl_dikembalikan') is-invalid @enderror" id="tgl_dikembalikan" name="tgl_dikembalikan" autofocus value="{{ old('tgl_dikembalikan', $data->tgl_dikembalikan) }}">
        @error('tgl_dikembalikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Sampel</label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" autofocus value="{{ old('jumlah', $data->jumlah) }}">
        @error('jumlah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            @if($data->status)
                <option value="{{ $data->status }}">{{ $data->status }} (Status saat ini)</option>
            @endif
            <option value="">Pilih</option>
            <option value="Diajukan">Diajukan</option>
            <option value="Diterima">Diterima</option>
            <option value="Sampel Diproses">Sampel Diproses</option>
            <option value="Sampel Selesai">Sampel Selesai</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

@endsection