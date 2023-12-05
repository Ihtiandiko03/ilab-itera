@extends('layouts.index')
@section('container')

<div class="row justify-content-center mt-5">
    <div id="home" class="col-md mt-5">
        <h1 class=" mb-3  text-center" style="color: var(--primary-color) ">FAQ</h1>
        <h6 class=" mb-3 fw-normal text-center" style="color: var(--primary-color) ">Frequently Asked Question</h6>

        <div class="accordion mx-auto col-md-6" id="accordionExample">
            @foreach ($faq as $item)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading{{ $item->id }}">
                <button class="accordion-button text-white" style="background-color: var(--primary-color);" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                    {{ $item->pertanyaan }}
                </button>
                </h2>
                <div id="collapse{{ $item->id }}" class="accordion-collapse collapse " aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{ $item->jawaban }}
                </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection