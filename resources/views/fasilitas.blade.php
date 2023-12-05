@extends('layouts.index')
@section('container')

<div class="row justify-content-center mt-5" style="margin: auto; width: 60%;">
    <div class="col-md mt-5 ">
        <h1 class=" mb-3  text-center" style="color: var(--primary-color) ">Fasilitas</h1>
        <div class="col-md">
            <h5 class="judulhead mb-3 text-center" style="color: var(--primary-color) ">Daftar Fasilitas yang Terdapat Laboratorium Terpadu Institut Teknologi Sumatera</h5>

            <div class="container">
                <div class="row">
                    @foreach ($fasilitas as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if ($item->image)
                                <a href="/fasilitas/detail/{{ $item->slug }}"><img src="{{ asset('storage/' . $item->image) }}" class="img-fluid"></a>
                            @else
                                <a href="/fasilitas/detail/{{ $item->slug }}"><img src="https://source.unsplash.com/500x400?lab" class="card-img-top"></a>
                            @endif
                                <div class="card-body">
                                    <a href="/fasilitas/detail/{{ $item->slug }}"><h5 class="card-title" style="color: var(--primary-color) ">{{ $item->title }}</h5></a>
                                    <p class="card-text" style="text-align: justify;">{{ $item->excerpt }}</p>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="d-flex justify-content-center">
        {{ $fasilitas->links() }}
    </div>
@endsection