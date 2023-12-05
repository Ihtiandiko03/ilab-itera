@extends('layouts.index')
@section('container')

<div class="row justify-content-center mt-5" style="margin: auto; width: 60%;">
    <div class="col-md mt-5 ">
        <h1 class=" mb-3  text-center" style="color: var(--primary-color) ">Pengumuman</h1>
        <div class="col-md">
            <h5 class="judulhead mb-3 text-center" style="color: var(--primary-color) ">Daftar pengumuman seputar Laboratorium Terpadu Institut Teknologi Sumatera</h5>


            @foreach ($pengumuman as $item)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body row">
                    <div class="col-auto text-muted border-right px-4 text-center">
                        <h2 class="m-0">
                            <?php
                                $ds = strtotime($item['created_at']);
                                echo date('d', $ds);
                            ?>
                        </h2>
                        <span class="text-dark font-weight-bold">
                            <?php
                                $ms = strtotime($item['created_at']);
                                echo date('M', $ms);
                            ?>
                        </span>
                    </div>
                    <div class="col align-items-center d-flex">
                        <a href="/pengumuman/detail/{{ $item['slug'] }}" style="color: var(--primary-color)" class="text-prime">{{ $item['title'] }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    <div class="d-flex justify-content-center">
        {{ $pengumuman->links() }}
    </div>
@endsection