@extends('layouts.index')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-8 mt-5">
            <article>
                <h1 class="mb-3">{{ $fasilitas['title'] }}</h1>
                <a href="/fasilitas" class="text-decoration-none d-block mt-3 text-warning">Kembali</a>

                
                @if ($fasilitas['image'])
                <div style="max-height: 350px; overflow:hidden; text-align:center;">
                    <img src="{{ asset('storage/' . $fasilitas['image']) }}" alt="{{ $fasilitas['title'] }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400" alt="{{ $fasilitas['title'] }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5" style="text-align: justify;">
                    {!! $fasilitas['body'] !!}
                </article>

                <h1 class="mb-3">Alat</h1>
                <article class="my-3 fs-5">
                    <p>{{ $fasilitas->nama_fasilitas }} dilengkapi beberapa peralatan yang menunjang kegiatan praktikum. Beberapa peralatan praktikum yang berbasis otomasi diantaranya :</p>
                    @if (count($alat) === 0)
                        <p>Belum terdapat alat laboratorium</p>
                    @else
                        <div class="container">
                            <div class="row">
                                @foreach ($alat as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.3)"><a href="#" class="text-white text-decoration-none">{{ $item->nama_kategori }}</a></div>

                                        @if ($item->gambar_alat)
                                            <img src="{{ asset('storage/' . $item->gambar_alat) }}" class="img-fluid">
                                        @else
                                            <img src="https://source.unsplash.com/500x400?lab" class="card-img-top">
                                        @endif
                                            <div class="card-body">
                                                <h5 class="card-title" style="color: var(--primary-color) ">{{ $item->nama_alat }}</h5>
                                                <p class="card-text">{{ $item->spesifikasi_alat }}</p>
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </article>

            </article>

            <a href="/fasilitas" class="text-decoration-none d-block mt-3 text-warning">Kembali</a>
        </div>
    </div>
</div>


    
@endsection