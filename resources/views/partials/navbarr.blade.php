

    <?php
        $total_quantity = 0;
        $total_price = 0;
    ?>

    <div class="mb-nav">
        <div class="mb-move-item"></div>
        <div class="mb-nav-item {{ ($active === "Home") ? 'active' : '' }}">
            <a href="/">
                <i class="bx bxs-home"></i>
            </a>
        </div>
        <div class="mb-nav-item {{ ($active === "Katalog") ? 'active' : '' }}">
            <a href="/katalog">
                <i class='bx bxs-wink-smile'></i>
            </a>
        </div>
        <div class="mb-nav-item {{ ($active === "posts") ? 'active' : '' }}">
            <a href="/posts">
                <i class='bx bxs-food-menu'></i>
            </a>
        </div>
        <div class="mb-nav-item {{ ($active === "FAQ") ? 'active' : '' }}">
            <a href="/faq">
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <a id="btnEmpty" href="/katalog/checkout?action=empty" class="text-danger"><b>Kosongkan Keranjang</b></a>
        <?php 
            $session = session('cart_item');
            // var_dump($session);
        ?>
        @if (isset($session))
            <?php
                $total_quantity = 0;
                $total_price = 0;
            ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1" style="font-size: 10pt;">
            <tbody>
            <tr>
            <th style="text-align:center;">Name</th>
            {{-- <th style="text-align:left;">Code</th> --}}
            <th style="text-align:right;" width="5%">Quantity</th>
            <th style="text-align:right;" width="10%">Unit Price</th>
            <th style="text-align:center;" width="10%">Price</th>
            <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            @foreach ($session as $item)
                <?php $item_price = $item["quantity"]*$item["harga"]; ?>
                <tr>
                    <td><img src="{{ asset('storage/' . $item['gambar_alat']) }}" width="50" class="cart-item-image" style="margin-bottom: 20px; margin-right: 20px;"/><?php echo $item["nama_alat"]; ?></td>
                    {{-- <td><?php echo $item["id"]; ?></td> --}}
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "Rp ".$item["harga"]; ?></td>
                    <td  style="text-align:right;"><?php echo "Rp ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="/katalog/checkout?action=remove&code={{ $item['id'] }}" class="btnRemoveAction text-danger">Hapus</a></td>
                </tr>
                <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["harga"]*$item["quantity"]);
                ?>
            @endforeach

            <tr>
            <td colspan="1" align="right">Total:</td>
            <td align="right"><?php echo $total_quantity; ?></td>
            <td align="right" colspan="2"><strong><?php echo "Rp ".number_format($total_price, 2); ?></strong></td>
            <td></td>
            </tr>
            </tbody>
            </table>
        @else
            <div class="no-records">Your Cart is Empty</div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="/katalog/isiform" class="btn btn-primary">Checkout</a>
        {{-- <button type="button" class="btn btn-primary">Checkout</button> --}}
      </div>
    </div>
  </div>
</div>

    <!-- TOP NAVIGATION -->
    <div class="nav">
        <div class="menu-wrap">
            {{-- <a href="/" >
                <div class="logo" style="margin-left: -300px;">
                    UPT Lab Terpadu
                </div>
            </a> --}}
            <div class="menu h-xs">
                <a href="/" >
                    <div class="logo" style="background-color: #004A73; padding: 5px; border-radius: 7px;">
                        <img src="{{ asset('aset/img/logo-upt2.png') }}" width="100%">
                    </div>
                </a>
                <a href="/" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Home") ? 'active' : '' }}">
                        Beranda
                    </div>
                </a>
                {{-- <a href="/#about">
                    <div class="menu-item">
                        Tentang
                    </div>
                </a> --}}
                <a href="/fasilitas" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Fasilitas") ? 'active' : '' }}">
                        Fasilitas
                    </div>
                </a>
                <div class="dropdown">
                    <button class="dropdownMenu btn dropdown-toggle menu-item {{ ($active === "Layanan") ? 'active' : '' }}" style="font-size: 10pt; border: none;" type="button" data-bs-toggle="dropdown">
                        Layanan
                    </button>
                    <ul class="dropdown-menu" style="border: none;">
                        <li><a class="dropdown-item" style="font-size: 10pt;" href="/layanan/pendidikan">Pendidikan</a></li>
                        <li><a class="dropdown-item" style="font-size: 10pt;" href="/layanan/penelitian">Penelitian</a></li>
                        <li><a class="dropdown-item" style="font-size: 10pt;" href="/layanan/pengujian">Pengujian</a></li>
                    </ul>
                </div>
                <a href="/katalog" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Katalog") ? 'active' : '' }}">
                        Katalog
                    </div>
                </a>
                <a href="/posts" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "posts") ? 'active' : '' }}">
                        Berita
                    </div>
                </a>
                <a href="/pengumuman" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "pengumuman") ? 'active' : '' }}">
                        Pengumuman
                    </div>
                </a>
                <a href="/galeri" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Galeri") ? 'active' : '' }}">
                        Galeri
                    </div>
                </a>
                <a href="/faq" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "FAQ") ? 'active' : '' }}">
                        FAQ
                    </div>
                </a>
                <a href="/download" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Download") ? 'active' : '' }}">
                        Download
                    </div>
                </a>
                <a href="/kontakkami" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "Kontak Kami") ? 'active' : '' }}">
                        Kontak
                    </div>
                </a>
                <a href="/login" style="font-size: 10pt;">
                    <div class="menu-item {{ ($active === "login") ? 'active' : '' }}">
                        Login
                    </div>
                </a>
            </div>
            <div class="right-menu">
                <div class="cart-btn">
                    <button type="button" style="border: none; background-color: transparent;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{-- <i class='bx bx-cart-alt' value="5"></i> --}}
                        <i class="fa badge fa-lg" value=<?=  $total_quantity; ?> style="font-size:30px;color: var(--primary-color);">&#xf07a;</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION -->


