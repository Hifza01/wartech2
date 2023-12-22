<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/lab.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Wartech - Warga Technology</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>

            <span class="logo_name">Wartech</span>
        </div>

        <div class="menu-items">
            <ul class="nav-link">
                <li><a href="{{ route('home') }}">
                        <i class="uil uil-estate"></i>
                        <span class="link-name active">Dahsboard</span>
                    </a>
                </li>                
                <li><a href="{{ route('laporan') }}">
                        <i class="uil uil-book"></i>
                        <span class="link-name">Daftar Laporan</span>
                    </a>
                </li>
                
                <li><a href="{{ route('surat_domisili') }}">
                        <i class="uil uil-clipboard-alt"></i>
                        <span class="link-name">Surat Domisili</span>
                    </a>
                </li> 
                <li><a href="{{ route('surat_keterangan_nikah') }}">
                        <i class="uil uil-clipboard-alt"></i>
                        <span class="link-name">Surat Pengantar Nikah</span>
                    </a>
                </li> 
                <li><a href="{{ route('surat_kematian') }}">
                        <i class="uil uil-clipboard-alt"></i>
                        <span class="link-name">Surat Kematian</span>
                    </a>
                </li>                  
            </ul>        
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="action">
                <div class="profile" onclick="menuToggle();">
                    <img src="{{ asset('images/undraw_profile.svg') }}" alt="">
                </div>

                <div class="menu">                   
                    <ul>
                        <li>
                            <span class="bi bi-person-circle"></span>
                            <a>{{ Auth::user()->name }}</a>                       
                        <li>
                            <span class="bi bi-door-closed-fill"></span>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                             </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
    </script>
    <script src="{{ asset('js/lab.js') }}"></script>    
</body>
</html>