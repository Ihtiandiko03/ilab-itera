<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #073C64">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">iLab</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 border-0" style="background-color: #073C64"> Logout <span data-feather="log-out" class="align-text-bottom"></span></button>
      </form>
    </div>
  </div>
</header>