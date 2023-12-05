@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg">
            <article>
                <h1 class="mb-3">{{ $alat->nama_alat }}</h1>
                <a href="/dashboard/alat" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
                <a href="/dashboard/alat/edit/{{ $alat->id }}" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/alat/hapus/{{ $alat->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><span data-feather="x-circle"></span>Delete</button>
                </form>
                
                @if ($alat->gambar_alat)
                <div style="max-height: 350px; text-align:center; overflow:hidden;">
                    <img src="{{ asset('storage/' . $alat->gambar_alat) }}" style="border-radius: 10px;" class="img-fluid mt-3">
                </div>
                @else    
                    <img src="https://source.unsplash.com/1200x400?lab"  class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    <table class="table table-striped table-sm"  style="font-size: 12pt;">
                        <tbody>
                            <tr>
                                <th scope="col">Nama Alat</th>
                                <td>{{ $alat->nama_alat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Kategori</th>
                                <td>{{ $alat->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Harga Alat</th>
                                <td>{{ $alat->harga }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Masuk</th>
                                <td>{{ $alat->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Gedung</th>
                                <td>{{ $alat->lokasi_gedung }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Nama Lab</th>
                                <td>{{ $alat->nama_lab }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Ruangan</th>
                                <td>{{ $alat->ruangan }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Kondisi Alat</th>
                                <td>{{ $alat->kondisi }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Jumlah Alat</th>
                                <td>{{ $alat->jumlah_alat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Spesifikasi Alat</th>
                                <td>{{ $alat->spesifikasi_alat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Keterangan Alat</th>
                                <td>{{ $alat->ket_alat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Status</th>
                                <td>{{ $alat->status_alat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </article>
            </article>

        </div>
    </div>
</div>
@endsection