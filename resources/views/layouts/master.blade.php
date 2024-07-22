<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sistem Informasi Inventaris</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow animate__animated animate__fadeInDown">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Sistem Informasi <br> Inventaris</a>
          <li class="nav-item dropdown mb-3" style="margin-right: 5rem">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              Selamat Datang {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn" onclick="return confirm('Yakin Ingin Logout??')" style="">Logout</button>  
                </form>  
              </li>
              {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
            </ul>
          </li>
        
      </header>
      
      <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-4 animate__animated animate__fadeInLeft">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                {{-- <li class="nav-item">
                  <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <h4>
                      <span data-feather="home"></span>
                      Dashboard
                    </h4>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link {{ request()->is(['inventaris', 'inventaris/create', 'inventaris/{id}/edit', 'inventaris/{id}']) ? 'active' : '' }}" aria-current="page" href="/inventaris">
                    <h5>
                      <span data-feather="package"></span>
                      Inventaris
                    </h5>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('peminjam') ? 'active' : '' }}" href="/peminjam">
                    <h5>
                      <span data-feather="users"></span>
                      Peminjam
                    </h5>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('peminjaman', 'peminjaman/create') ? 'active' : '' }}" href="/peminjaman">
                    <h5>
                      <span data-feather="archive"></span>
                      Peminjaman
                    </h4>
                  </a>
                </li>
              </ul>
      
            </div>
          </nav>
      
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
      
            @yield('content')
    
          </main>
        </div>
      </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="{{ asset('js/dashboard.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      @stack('scripts')
  </body>
</html>