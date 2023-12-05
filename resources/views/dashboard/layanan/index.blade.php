@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Layanan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg">
    <table class="table table-striped table-sm" id="download">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Layanan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($layanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_layanan }}</td>
                <td>
                    {{-- <a href="/dashboard/download/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                    <a href="/dashboard/layanan/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection