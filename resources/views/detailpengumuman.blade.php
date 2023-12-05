@extends('layouts.index')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-8 mt-5">
            <article>
                <h1 class="mb-3">{{ $pengumuman['title'] }}</h1>
                
                @if ($pengumuman['image'])
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $pengumuman['image']) }}" alt="{{ $pengumuman['title'] }}" class="img-fluid">
                </div>
                @else    
                <img src="https://source.unsplash.com/1200x400" alt="{{ $pengumuman['title'] }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $pengumuman['body'] !!}
                </article>
            </article>

            <a href="/pengumuman" class="text-decoration-none d-block mt-3 text-warning">Kembali</a>
        </div>
    </div>
</div>


    
@endsection