@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah Alat Laboratorium</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/alat/tambahdata" class="mb-5" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="nama_alat" class="form-label">Nama Alat Lab</label>
        <input type="text" class="form-control @error('nama_alat') is-invalid @enderror" id="nama_alat" name="nama_alat" autofocus value="{{ old('nama_alat') }}">
        @error('nama_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
            <option value="{{ old('kategori') }}">Pilih {{ old('kategori') }}</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
            @endforeach
        </select>
        @error('kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk') }}">
        @error('tgl_masuk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="lokasi_gedung" class="form-label">Lokasi Gedung</label>
        <input type="text" class="form-control @error('lokasi_gedung') is-invalid @enderror" id="lokasi_gedung" name="lokasi_gedung" value="{{ old('lokasi_gedung') }}">
        @error('lokasi_gedung')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama_lab" class="form-label">Nama Lab</label>
        <input type="text" class="form-control @error('nama_lab') is-invalid @enderror" id="nama_lab" name="nama_lab" value="{{ old('nama_lab') }}">
        @error('nama_lab')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="ruangan" class="form-label">Ruangan</label>
        <input type="text" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" name="ruangan" value="{{ old('ruangan') }}">
        @error('ruangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kondisi" class="form-label">Kondisi</label>
        <input type="text" class="form-control @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi" value="{{ old('kondisi') }}">
        @error('kondisi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="jumlah_alat" class="form-label">Jumlah Alat Lab</label>
        <input type="number" class="form-control @error('jumlah_alat') is-invalid @enderror" id="jumlah_alat" name="jumlah_alat" value="{{ old('jumlah_alat') }}">
        @error('jumlah_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="spesifikasi_alat" class="form-label">Spesifikasi Alat</label>
        <textarea class="form-control @error('spesifikasi_alat') is-invalid @enderror" id="spesifikasi_alat" name="spesifikasi_alat">{{ old('spesifikasi_alat') }}</textarea>
        @error('spesifikasi_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="ket_alat" class="form-label">Keterangan</label>
        <textarea class="form-control @error('ket_alat') is-invalid @enderror" id="ket_alat" name="ket_alat">{{ old('ket_alat') }}</textarea>
        @error('ket_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="gambar_alat" class="form-label @error('gambar_alat') is-invalid @enderror">Gambar Alat Lab</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="gambar_alat" name="gambar_alat" onchange="previewImage()">
        @error('gambar_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="status_alat" class="form-label">Status</label>
        <select name="status_alat" id="status_alat" class="form-select @error('status_alat') is-invalid @enderror">
            <option value="{{ old('status_alat') }}">Pilih {{ old('status_alat') }}</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Tidak Tersedia">Tidak Tersedia</option>
        </select>
        @error('ket_alat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage(){
        const image = document.querySelector('#gambar_alat');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }


</script>
@endsection