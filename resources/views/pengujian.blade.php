@extends('layouts.index')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-8 mt-5">
            <article>
                <h1 class="mb-3 text-center" style="color: var(--primary-color) ">{{ $pengujian->nama_layanan }}</h1>
                <br>
                <article class="my-3 fs-5">
                    {!! $pengujian->body !!}
                </article>
            </article>
        </div>
    </div>
</div>


    
@endsection