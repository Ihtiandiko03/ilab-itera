
@extends('layouts.index')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-5 border-bottom">
        <h1 class="h2 mt-5 mx-auto">Isi Data Diri</h1>
    </div>

<div class="col-lg-8 mx-auto">
    <form method="post" action="/katalog/verifdatadiri" class="mb-5">
        @csrf
      <input type="hidden" id="nomor_tiket" name="nomor_tiket" value="{{mt_rand(10000000000000, 99999999999999)}}">
      <input type="hidden" id="status" name="status" value="Diajukan">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Nomor Whatsapp</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autofocus value="{{ old('phone') }}">
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

@endsection