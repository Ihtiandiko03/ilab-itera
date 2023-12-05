
@extends('layouts.index')
@section('container')

    <h1 class="mb-3 text-center">Katalog Alat Laboratorium</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/katalog" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($alat->count())
    <div class="container">
        <div class="d-flex">
            <div class="col-lg-2" >
                <a href="/katalog"><h1>Kategori</h1></a>
                <div class="col-lg-3 mb-3">
                    @foreach ($kategori as $item)
                        <a class="btn mt-2" style="background-color: var(--primary-color); color: var(--white);" href="/katalog?kategori={{ $item->nama_kategori }}">{{ $item->nama_kategori }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                @foreach ($alat as $item)
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <form method="post" action="/katalog/checkout?action=add&code={{ $item->id }}">
                                @csrf
                                <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.3)"><a href="#" class="text-white text-decoration-none">{{ $item->nama_kategori }}</a></div>
                            
                                @if ($item->gambar_alat)
                                    <img src="{{ asset('storage/' . $item->gambar_alat) }}" alt="{{ $item->nama_alat }}" width="400" height="200" class="mt-4 img-fluid rounded mx-auto d-block">
                                @else
                                    <img src="https://source.unsplash.com/500x400" class="card-img-top" alt="{{ $item->gambar_alat }}">
                                @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->nama_alat }}</h5>
                                        <p>
                                            <small class="text-muted">
                                                 {{ $item->lokasi_gedung }}, {{ $item->nama_lab }}, {{ $item->ruangan }}
                                            </small>
                                        </p>
                                        <p class="card-text"><b>Rp.{{ number_format($item->harga ,2,",",".") }}</b></p>
                                        <input type="hidden" name="code" value="{{ $item->id }}">
                                        <input type="hidden" name="harga" value="{{ $item->harga }}">
                                        <input type="hidden" name="action" value="Add">
                                        <div class="row g-3">
                                            <div class="col-auto">
                                                <input type="number" class="form-control" name="quantity" placeholder="Jumlah" style="width: 110px;">
                                            </div>
                                            <div class="col-auto">
                                                <input type="submit" class="btn btn-primary" value="Ajukan Sampel" class="btnAddAction">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

    @else
        <p class="text-center fs-4">Data tidak ditemukan</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $alat->links() }}
    </div>
@endsection