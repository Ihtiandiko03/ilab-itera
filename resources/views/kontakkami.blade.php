@extends('layouts.index')
@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-md mt-5">
        <h1 class=" mb-3 fw-normal text-center" style="color: var(--primary-color) ">Kontak Kami</h1>
        <div class="d-flex flex-row justify-content-center mt-5">
            <div class="col-md-4 mx-auto">
                <h3 style="color: var(--primary-color) ">Lab Terpadu ITERA</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4589.48505985561!2d105.31462655676944!3d-5.360836279436418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c59fcd7cd4b3%3A0x31d5cd788e205697!2sGedung%20Laboratorium%20Teknik%202!5e0!3m2!1sid!2sid!4v1697437082162!5m2!1sid!2sid" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                <address class="mt-3">
                    <i class="fa fa-fw text-prime fa-building"></i> Gedung Lab Teknik 2, Lantai 3, ITERA, Jalan Terusan Ryacudu, Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365 <br>
                    <i class="fa fa-fw text-prime fa-phone"></i> (0721) 8030188<br>
                    <i class="fa fa-fw text-prime fa-envelope"></i> upt.laboratorium@itera.ac.id<br>
                    <i class="fa fa-fw text-prime fa-globe"></i> https://ilab.itera.ac.id/<br>
                </address>
                <a href="https://www.instagram.com/uptlabitera/" target="_blank" class="btn btn-circle  text-dark" style="border: none"><i class="fa fa-instagram fa-3x"></i></a>
                <a href="https://web.facebook.com/itera.official" target="_blank" class="btn btn-circle  text-dark" style="border: none"><i class="fa fa-facebook fa-3x"></i></a>
                <a href="https://www.youtube.com/watch?v=HS_RPLa5gPw" target="_blank" class="btn btn-circle  text-dark" style="border: none"><i class="fa fa-youtube-play fa-3x"></i></a>
            </div>
            <div class="col-md-3 mx-auto">
                <h3 style="color: var(--primary-color) ">Hubungi Kami</h3>
                <form action="" method="post">
                        <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-control" id="pesan" cols="30" rows="10"></textarea>
                        @error('pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>

                </form>
            </div>
        </div>

        
        
    </div>
</div>

@endsection