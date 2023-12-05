@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 mx-auto">Data Peminjam <b> {{ $alat->nama_alat }} </b></h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg" role="alert">
    {{ session('success') }}
</div>
@elseif(session()->has('failed'))
<div class="alert alert-danger col-lg" role="alert">
    {{ session('failed') }}
</div>
@endif


<div class="table-responsive col-lg">
    <a href="/dashboard/datapeminjam/create/{{ $alat->id }}" class="btn btn-primary mb-3">Tambah Data Peminjam</a>
    <table class="table table-striped table-sm" id="datapeminjam">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor Referensi</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Instansi</th>
                <th scope="col">Tanggal Diajukan</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_tiket }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->instansi }}</td>
                <td><?php
                        $dp = strtotime($item->tgl_dipinjam);
                        if(date('d-m-Y', $dp) == '01-01-1970'){
                            echo '';
                        }
                        else{
                            echo date('d-m-Y', $dp);
                        }
                    ?>
                </td>
                <td>
                    <?php
                        $ds = strtotime($item->tgl_dikembalikan);
                        if(date('d-m-Y', $ds) == '01-01-1970'){
                            echo '';
                        }
                        else{
                            echo date('d-m-Y', $ds);
                        }
                    ?>
                </td>
                <td>
                    @if($item->status == 'Diajukan')
                        <span class="badge bg-secondary" style="font-size: 10pt;">
                    @elseif($item->status == 'Diterima')
                        <span class="badge bg-info" style="font-size: 10pt;">
                    @elseif($item->status == 'Sampel Diproses')
                        <span class="badge bg-warning" style="font-size: 10pt;">
                    @elseif($item->status == 'Sampel Selesai')
                        <span class="badge bg-success" style="font-size: 10pt;">
                    @else
                        <span class="badge bg-light " style="font-size: 10pt;">
                    @endif

                        {{ $item->status }}
                    </span>
                </td>

                <td>
                    <a href="/dashboard/datapeminjam/edit/{{ $item->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/datapeminjam/hapus/{{ $item->id }}/{{ $alat->id }}" method="post" class="d-inline">
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