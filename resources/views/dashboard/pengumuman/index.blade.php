@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengumuman</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg">
    <a href="/dashboard/pengumuman/create" class="btn btn-primary mb-3">Tambah Pengumuman</a>
    <table class="table table-striped table-sm" id="pengumuman">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumuman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="/dashboard/pengumuman/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/pengumuman/hapus/{{ $item->id }}" method="post" class="d-inline">
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