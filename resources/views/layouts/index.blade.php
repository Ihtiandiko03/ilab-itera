<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistem Peminjaman Alat Lab </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('aset/img/ilab.ico') }}">
    
    <link rel="stylesheet" href="/aset/css/style.css">
    <style>
        .badge:after{
            content:attr(value);
            font-size:14px;
            color: #fff;
            background: red;
            border-radius:50%;
            padding: 0 5px;
            position:relative;
            left:-8px;
            top:-10px;
            opacity:0.9;
        }
    </style>
</head>

<body>
    @include('partials.navbarr')


        @yield('container')

    <!-- FOOTER SECTION -->
    {{-- <section class="footer bg-img" style="background-image: url({{ asset('aset/img/bg-katalog4.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-4 col-xs-12">
                    <h1>
                        UPT Laboratorium Terpadu
                    </h1>
                    <br>
                    <p style="color: var(--primary-color);">UPT Laboratorium Terpadu menyediakan layanan pendidikan khususnya di bidang
                        praktikum yang berada di Institut Teknologi
                        Sumatera</p>
                </div>
                <div class="col-6 col-xs-12">
                    <h1>
                        SIPAL
                    </h1>
                    <br>
                    <p style="color: var(--primary-color);">Gedung Lab Teknik 2, Lantai 3, ITERA, Jalan Terusan Ryacudu, Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365</p>
                    <br>
                    <p style="color: var(--primary-color);">Email: upt.laboratorium@itera.ac.id</p>
                    <p style="color: var(--primary-color);">Phone: (0721) 8030188</p>
                </div>
                <div class="col-2 col-xs-12">
                    <h1>
                        Aplikasi Lain
                    </h1>
                    <br>
                    <p style="color: var(--primary-color);">
                        <a href="#">
                            Itera
                        </a>
                    </p>
                    <p style="color: var(--primary-color);">
                        <a href="#">
                            Silabor
                        </a>
                    </p>
                    <p style="color: var(--primary-color);">
                        <a href="#">
                            iLab
                        </a>
                    </p>
                    <p style="color: var(--primary-color);">
                        <a href="#">
                            Simpelkom
                        </a>
                    </p>
                    
                </div>
                
            </div>
        </div>
    </section> --}}
    <section class="footer bg-img" style="background-color: var(--primary-color);">
        <div class="container">
            <div class="row">
                <div class="col-4 col-xs-12">
                    <h1 style="color: #fff;">
                        UPT Laboratorium Terpadu
                    </h1>
                    <br>
                    <p style="color: #fff;">UPT Laboratorium Terpadu menyediakan layanan pendidikan khususnya di bidang
                        praktikum yang berada di Institut Teknologi
                        Sumatera</p>
                        <a href="https://www.instagram.com/uptlabitera/" target="_blank" class="btn btn-circle  text-white" style="border: none"><i class="fa fa-instagram fa-3x"></i></a>
                        <a href="https://web.facebook.com/itera.official" target="_blank" class="btn btn-circle  text-white" style="border: none"><i class="fa fa-facebook fa-3x"></i></a>
                        <a href="https://www.youtube.com/watch?v=HS_RPLa5gPw" target="_blank" class="btn btn-circle  text-white" style="border: none"><i class="fa fa-youtube-play fa-3x"></i></a>
                </div>
                <div class="col-6 col-xs-12">
                    <h1 style="color: #fff;">
                        SIMPELAB
                    </h1>
                    <br>
                    <p style="color: #fff;">Gedung Lab Teknik 2, Lantai 3, ITERA, Jalan Terusan Ryacudu, Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365</p>
                    <br>
                    <p style="color: #fff;">Email: upt.laboratorium@itera.ac.id</p>
                    <p style="color: #fff;">Phone: (0721) 8030188</p>
                </div>
                <div class="col-2 col-xs-12">
                    <h1 style="color: #fff;">
                        Aplikasi Lain
                    </h1>
                    <br>
                    <p style="color: #fff;">
                        <a href="https://www.itera.ac.id/">
                            Itera
                        </a>
                    </p>
                    <p style="color: #fff;">
                        <a href="https://silabor.itera.ac.id/">
                            Silabor
                        </a>
                    </p>
                    <p style="color: #fff;">
                        <a href="https://ilab.itera.ac.id/">
                            iLab
                        </a>
                    </p>
                    <p style="color: #fff;">
                        <a href="https://simpelkom.itera.ac.id/">
                            Simpelkom
                        </a>
                    </p>
                    
                </div>
                
            </div>
        </div>
    </section>
    <!-- END FOOTER SECTION -->
    <!-- END FOOTER SECTION -->

    <script>
        function myFunction() {
            alert('Ok');
        }
    </script>
    <script src="aset/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>
