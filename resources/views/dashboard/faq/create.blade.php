@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah FAQ</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/faq/tambahdata" class="mb-5" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="pertanyaan" class="form-label">Pertanyaan</label>
        <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" autofocus value="{{ old('pertanyaan') }}">
        @error('pertanyaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jawaban" class="form-label">Jawaban</label>
        <textarea name="jawaban" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" cols="30" rows="10">{{ old('jawaban') }}</textarea>
        @error('jawaban')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

@endsection