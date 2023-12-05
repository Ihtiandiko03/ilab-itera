<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistem Peminjaman Alat Lab </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- MOBILE NAV -->
    <div class="mb-nav">
        <div class="mb-move-item"></div>
        <div class="mb-nav-item active">
            <a href="#home">
                <i class="bx bxs-home"></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#about">
                <i class='bx bxs-wink-smile'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#food-menu-section">
                <i class='bx bxs-food-menu'></i>
            </a>
        </div>
        <div class="mb-nav-item">
            <a href="#testimonial">
                <i class='bx bxs-comment-detail'></i>
            </a>
        </div>
    </div>
    <!-- END MOBILE NAV -->
    <!-- BACK TO TOP BTN -->
    <a href="#home" class="back-to-top">
        <i class="bx bxs-to-top"></i>
    </a>
    <!-- END BACK TO TOP BTN -->
    <!-- TOP NAVIGATION -->
    <div class="nav">
        <div class="menu-wrap">
            <a href="#home">
                <div class="logo">
                    SIPAL
                </div>
            </a>
            <div class="menu h-xs">
                <a href="#home">
                    <div class="menu-item active">
                        Home
                    </div>
                </a>
                <a href="#about">
                    <div class="menu-item">
                        Tentang
                    </div>
                </a>
                <a href="#food-menu-section">
                    <div class="menu-item">
                        Katalog
                    </div>
                </a>
                <a href="#testimonial">
                    <div class="menu-item">
                        Berita
                    </div>
                </a>
            </div>
            <div class="right-menu">
                <div class="cart-btn">
                    <i class='bx bx-cart-alt'></i>
                </div>
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION -->
    <!-- SECTION HOME -->
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
        style="background-image: url(img/main.png);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <div class="slogan">
                        <h1 class="left-to-right play-on-scroll">
                            SIPAL
                        </h1>
                        <p class="left-to-right play-on-scroll delay-2">
                            Sistem Informasi Peminjaman Alat Laboratorium untuk Masyarakat Umum adalah suatu platform inovatif yang dirancang untuk
                            memfasilitasi akses masyarakat umum ke fasilitas laboratorium dan alat-alat eksperimental. Tujuan utama dari sistem ini
                            adalah membuka peluang bagi individu di luar kalangan akademis, seperti pelajar, mahasiswa non-ilmu pengetahuan, dan
                            inovator mandiri, agar dapat menggunakan alat-alat laboratorium untuk keperluan penelitian dan eksperimen.
                        </p>
                        <div class="left-to-right play-on-scroll delay-4">
                            <button>
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
                    <img src="img/iteralab.png" alt=""
                        class="fullwidth left-to-right play-on-scroll">
                </div>
                <div class="col-5 col-xs-12 align-items-center">
                    <div class="about-slogan right-to-left play-on-scroll">
                        <h3>
                            <span class="primary-color">UPT</span> Laboratorium <span class="primary-color">Institut</span>
                            Teknologi <span class="primary-color">Sumatera</span>
                        </h3>
                        <p>
                            Institut Teknologi Sumatera (ITERA) terletak di  Jalan Terusan Ryacudu, Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECION ABOUT -->
    <!-- FOOD MENU SECTION -->
    <section class="align-items-center bg-img bg-img-fixed" id="food-menu-section"
        style="background-image: url(img/bg-katalog2.jpg);">
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
                    <div class="zoom play-on-scroll delay-2">
                        <button data-food-type="salad">
                            Fisika
                        </button>
                    </div>
                    <div class="zoom play-on-scroll delay-4">
                        <button data-food-type="lorem">
                            Kimia
                        </button>
                    </div>
                    <div class="zoom play-on-scroll delay-6">
                        <button data-food-type="ipsum">
                            Biologi
                        </button>
                    </div>
                    <div class="zoom play-on-scroll delay-8">
                        <button data-food-type="dolor">
                            Kelistrikan
                        </button>
                    </div>
                </div>

                <div class="food-item-wrap all">
                    <div class="food-item salad-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url(assets/anh-nguyen-kcA-c3f_3FE-unsplash.jpg);"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class="bx bx-cart-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item lorem-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/sina-piryae-bBzjWthTqb8-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item ipsum-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/jonathan-farber-OCNqOLeCwOc-unsplash.jpg');">
                                </div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item lorem-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/sina-piryae-bBzjWthTqb8-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item dolor-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/carly-jayne-Lv174o7fn7Y-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item salad-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/anh-nguyen-kcA-c3f_3FE-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item lorem-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/sina-piryae-bBzjWthTqb8-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="food-item dolor-type">
                        <div class="item-wrap bottom-up play-on-scroll">
                            <div class="item-img">
                                <div class="img-holder bg-img"
                                    style="background-image: url('assets/carly-jayne-Lv174o7fn7Y-unsplash.jpg');"></div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <h3>
                                        Lorem ipsum
                                    </h3>
                                    <span>
                                        120$
                                    </span>
                                </div>
                                <div class="cart-btn">
                                    <i class='bx bx-cart-alt'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOD MENU SECTION -->
    <!-- TESTIMONIAL SECTION -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-2">
                        <div class="review-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                                dolores ratione voluptatibus quidem explicabo.
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url(assets/close-up-portrait-cute-young-woman-holding-textbook-colored-pencils-posing-studio-isolated-pink_176532-9674.jpg);">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                Lorem Ipsum Dolor
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
                </div>
                <div class="col-4 col-xs-12">
                    <div class="zoom play-on-scroll">
                        <div class="review-wrap active">
                            <div class="review-content">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                    molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt
                                    corrupti
                                    dolores ratione voluptatibus quidem explicabo.
                                </p>
                                <div class="review-img bg-img"
                                    style="background-image: url(assets/michael-dam-mEZ3PoFGs_k-unsplash.jpg);">
                                </div>
                            </div>
                            <div class="review-info">
                                <h3>
                                    Lorem Ipsum Dolor
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
                    </div>
                </div>
                <div class="col-4 col-xs-12">
                    <div class="review-wrap zoom play-on-scroll delay-4">
                        <div class="review-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                                dolores ratione voluptatibus quidem explicabo.
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url(assets/portrait-happy-young-man_171337-21716.jpg);">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                Lorem Ipsum Dolor
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
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL SECTION -->
    <!-- FOOTER SECTION -->
    <section class="footer bg-img" style="background-image: url(img/bg-katalog4.jpg);">
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
                    <div class="input-group">
                        <input type="text" placeholder="Enter your email">
                        <button>
                            Subscribe
                        </button>
                    </div>
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
    </section>
    <!-- END FOOTER SECTION -->

    <script src="js/main.js"></script>
</body>

</html>
