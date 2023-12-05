@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">FAQ (Frequently Asked Question)</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg">
    <a href="/dashboard/faq/create" class="btn btn-primary mb-3">Tambah FAQ</a>
    <table class="table table-striped table-sm" id="faq">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faq as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pertanyaan }}</td>
                <td>
                    <a href="/dashboard/faq/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/faq/hapus/{{ $item->id }}" method="post" class="d-inline">
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