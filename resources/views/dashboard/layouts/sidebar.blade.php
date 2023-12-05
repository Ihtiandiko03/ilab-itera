<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Konten Berita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"  href="/dashboard/categories">
              <span data-feather="grid"></span>
              Kategori Berita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/alat*') ? 'active' : '' }}" href="/dashboard/alat">
              <span data-feather="trello" class="align-text-bottom"></span>
              Alat Laboratorium
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
              <span data-feather="clipboard" class="align-text-bottom"></span>
              Kategori Alat Lab
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pengumuman*') ? 'active' : '' }}" href="/dashboard/pengumuman">
              <span data-feather="bell" class="align-text-bottom"></span>
              Pengumuman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/faq*') ? 'active' : '' }}" href="/dashboard/faq">
              <span data-feather="check-square" class="align-text-bottom"></span>
              FAQ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/galeri*') ? 'active' : '' }}" href="/dashboard/galeri">
              <span data-feather="camera" class="align-text-bottom"></span>
              Galeri
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/fasilitas*') ? 'active' : '' }}" href="/dashboard/fasilitas">
              <span data-feather="codesandbox" class="align-text-bottom"></span>
              Fasilitas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/download*') ? 'active' : '' }}" href="/dashboard/download">
              <span data-feather="download" class="align-text-bottom"></span>
              Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="/dashboard/layanan">
              <span data-feather="download" class="align-text-bottom"></span>
              Layanan
            </a>
          </li>
        </ul>
        @endcan
      </div>
    </nav>