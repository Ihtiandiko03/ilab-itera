
@extends('layouts.index')

@section('container')

    <div class="row justify-content-center mt-5">
        <div id="home" class="col-md mt-5">
            <h1 id="home" class="mb-3  text-center" style="color: var(--primary-color) ">Galeri</h1>
            <h6 class="mb-3 fw-normal text-center" style="color: var(--primary-color) ">Galeri Foto-Foto dari Laboratorium Terpadu Institut Teknologi Sumatera</h6>
        </div>
    </div>

    @if ($galeri->count())
    <div class="container">
        <div class="row">
            @foreach ($galeri as $foto)
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.3)"><a href="/posts?category={{ $foto->title }}" class="text-white text-decoration-none">{{ $foto->title }}</a></div>
               
                @if ($foto->image)
                    <img src="{{ asset('storage/' . $foto->image) }}" alt="{{ $foto->title }}" class="img-fluid">
                @else    
                    <img src="https://source.unsplash.com/500x400" class="card-img-top" alt="{{ $foto->title }}">
                @endif    
                
                
                    {{-- <div class="card-body">
                        <h5 class="card-title">{{ $foto->title }}</h5>
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No posts found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $galeri->links() }}
    </div>
@endsection