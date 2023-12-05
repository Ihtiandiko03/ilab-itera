@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Download File</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg">
    <a href="/dashboard/download/create" class="btn btn-primary mb-3">Tambah File Download</a>
    <table class="table table-striped table-sm" id="download">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama File</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($download as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    {{-- <a href="/dashboard/download/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                    <form action="/dashboard/download/hapus/{{ $item->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection