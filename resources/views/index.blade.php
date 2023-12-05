
@extends('layouts.index')

@section('container')
    <!-- SECTION HOME -->
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
        style="background-image: url(aset/img/FWA_2396.jpg);">
        <div class="container " >
            <div class="row flex-row-reverse">
                <div class="col-5 col-xs-12 ">
                    <div class="slogan ">
                        <h1 class="right-to-left play-on-scroll text-center" >
                            ILAB
                        </h1>
                        <p class="right-to-left play-on-scroll delay-2 text-center">
                            Sistem Informasi Peminjaman Alat Laboratorium  adalah suatu platform inovatif yang dirancang untuk
                            memfasilitasi akses masyarakat umum ke fasilitas laboratorium dan alat-alat eksperimental. Tujuan utama dari sistem ini
                            adalah membuka peluang bagi individu di luar kalangan akademis, seperti pelajar, mahasiswa non-ilmu pengetahuan, dan
                            inovator mandiri, agar dapat menggunakan alat-alat laboratorium untuk keperluan penelitian dan eksperimen.
                        </p>
                        <div class="right-to-left play-on-scroll delay-4 align-items-center">
                            <button onclick="window.location.href='/katalog'">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION HOME -->
    <!-- SECION ABOUT -->
    <section class="about fullheight align-items-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-7 h-xs">
                    <img src="aset/img/iteralab.png" alt=""
                        class="fullwidth left-to-right play-on-scroll">
                </div>
                <div class="col-5 col-xs-12 align-items-center">
                    <div class="about-slogan right-to-left play-on-scroll">
                        <h3>
                            <span class="primary-color">Cek</span> Status <span class="primary-color">Sampel</span>
                        </h3>
                        {{-- <p>
                            Institut Teknologi Sumatera (ITERA) terletak di  Jalan Terusan Ryacudu, Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365
                        </p> --}}
                        
                            <input type="text" name="nomor_referensi" id="nomor_referensi" class="form-control" autocomplete="off" placeholder="Masukkan nomor referensi anda..">
                            <button class="btn mt-3" onclick="cek()">Cek Sampel</button>
                        
                            <div id="resultTiket">
                            </div>
                        {{-- <a href="/login">
                            <div class="menu-item {{ ($active === "login") ? 'active' : '' }}">
                                Login
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECION ABOUT -->
    <!-- FOOD MENU SECTION -->
    <section class="align-items-center bg-img bg-img-fixed" id="food-menu-section"
        style="background-image: url(aset/img/bg-katalog2.jpg);">
        <div class="container">
            <div class="food-menu">
                <h1>
                    Pesan <span class="primary-color">alat laboratorium</span> sekarang
                </h1>
                <p>
                    Laboratorium Institut Teknologi Sumatera memiliki lebih dari 1500 alat laboratorium yang dapat dipinjam untuk masyarakat umum.
                    Ketersediaan alat laboratorium diperbarui secara akurat dan real-time untuk menghindari tumpang tindih pemesanan.
                </p>
                <div class="food-category">
                    <div class="zoom play-on-scroll">
                        <button class="active" data-food-type="all">
                            All Kategori
                        </button>
                    </div>
                    @foreach ($kategori as $item)
                    <div class="zoom play-on-scroll delay-2">
                        <button data-food-type="{{ $item->nama_kategori }}">
                            {{ $item->nama_kategori }}
                        </button>
                    </div>
                    @endforeach

                    <div class="zoom play-on-scroll delay-8" style="margin-top: 0.5rem;">
                        <a href="/katalog" id="kataloglainnya">Lihat Lainnya</a>
                    </div>
                </div>

                <div class="food-item-wrap all">

                    @foreach ($alat as $item)
                    <div class="food-item {{ $item->nama_kategori }}-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url({{ asset('storage/' . $item->gambar_alat) }});">
                                </div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3 style="font-size: 13pt;">
                                        {{ $item->nama_alat }}
                                    </h3>
                                    <span>
                                        Rp.{{ number_format($item->harga ,2,",",".") }}
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <a href="/katalog"><i class="bx bx-cart-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- END FOOD MENU SECTION -->
    <!-- TESTIMONIAL SECTION -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                
                @if (!isset($berita))
                @else
                    @foreach ($berita as $key => $item)    
                        <div class="col-4 col-xs-12">
                            @if ($key == 1)
                                    <div class="zoom play-on-scroll">
                                        <div class="review-wrap active">
                                            <div class="review-content">
                                                <p>
                                                    {{$item->excerpt ? $item->excerpt : ''}}
                                                </p>
                                                <div class="review-img bg-img"
                                                    style="background-image: url({{ $item->image ? asset('storage/' . $item->image) : 'https://source.unsplash.com/500x400' }});">
                                                </div>
                                            </div>
                                            <div class="review-info">
                                                <h3>
                                                    {{$item->title ? $item->title : ''}}
                                                </h3>
                                                <div class="rating">
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                </div>
                                                <div>
                                                    <a href="/posts"><b>Klik untuk berita lainnya</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @else    
                                <div class="review-wrap zoom play-on-scroll delay-2">
                                    <div class="review-content">
                                        <p>
                                            {{$item->excerpt ? $item->excerpt : ''}}
                                        </p>
                                        <div class="review-img bg-img"
                                            style="background-image: url({{ $item->image ? asset('storage/' . $item->image) : 'https://source.unsplash.com/500x400' }});">
                                        </div>
                                    </div>
                                    <div class="review-info">
                                        <h3>
                                            {{$item->title ? $item->title : ''}}
                                        </h3>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
                
                
                
                {{-- <div class="col-4 col-xs-12">
                    <div class="zoom play-on-scroll">
                        <div class="review-wrap active">
                            <div class="review-content">
                                <p>
                                    {{$berita[1]['excerpt']}}
                                </p>
                                <div class="review-img bg-img"
                                    style="background-image: url({{ $berita[1]['image'] ? asset('storage/' . $berita[1]['image']) : 'https://source.unsplash.com/500x400' }});">
                                </div>
                            </div>
                            <div class="review-info">
                                <h3>
                                    {{$berita[1]['title']}}
                                </h3>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                                <div>
                                    <a href="/posts"><b>Klik untuk berita lainnya</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-4">
                        <div class="review-content">
                            <p>
                                {{$berita[2]['excerpt']}}
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url({{ $berita[2]['image'] ? asset('storage/' . $berita[2]['image']) : 'https://source.unsplash.com/500x400' }});">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                {{$berita[2]['title']}}
                            </h3>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL SECTION -->
    

    <script>
        function myFunction() {
            alert('Hehe');
        }
    </script>
@endsection

<script>
    function cek() {  
        var nomor_referensi = document.getElementById("nomor_referensi").value;
        var uri = "<?=url('/get')?>";
        
        $.ajax({
                url: uri,
                type: 'GET',
                dataType: 'json',
                async : true,
                data: {
                        'nomor_referensi': nomor_referensi
                        },
                success: function(data) {
                    // console.log(data);
                    $('#resultTiket').html(data);
                }
        });

    }
</script>
