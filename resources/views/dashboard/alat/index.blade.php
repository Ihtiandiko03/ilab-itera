@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Alat Laboratorium</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg">
    <a href="/dashboard/alat/create" class="btn btn-primary mb-3">Tambah Alat Lab</a>
    <table class="table table-striped table-sm" id="alatlab">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Gedung</th>
                <th scope="col">Nama Lab</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alat as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_alat }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>{{ $item->lokasi_gedung }}</td>
                <td>{{ $item->nama_lab }}</td>
                <td>{{ $item->ruangan }}</td>
                <td>{{ $item->harga }}</td>
                @if($item->status_alat == 'Tersedia')
                    <td class="text-success">{{ $item->status_alat }}</td>
                @else
                    <td class="text-danger">{{ $item->status_alat }}</td>
                @endif
                <td>
                    <a href="/dashboard/alat/view/{{ $item->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/alat/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/alat/hapus/{{ $item->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span></button>
                    </form>
                    <a href="/dashboard/datapeminjam/{{ $item->id }}" class="badge bg-secondary"><span data-feather="file-text"></span></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection