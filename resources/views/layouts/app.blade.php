<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UNICI') }}</title>

    <link rel="icon" type="image/png" href="/UNICIicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/UNICIicons/favicon.svg" />
    <link rel="shortcut icon" href="/UNICIicons/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/UNICIicons/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Inventario" />
    <link rel="manifest" href="/UNICIicons/site.webmanifest" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Establece un color azul claro específico para el fondo -->
    <div class="min-h-screen bg-gray-100 sm:flex">
        {{-- @include('layouts.navigation') --}}

        <section class="ml-[0%] w-screen">
            <!-- Page Heading -->
            {{--
                @isset($header)
                    <header class="bg-black shadow dark:bg-gray-800">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
            --}}

            <!-- Page Content -->
            <div id="app">
                <div class="main-wrapper main-wrapper-1">
                    <div class="navbar-bg"></div>
                    <nav class="bg-[#192f59] navbar navbar-expand-lg main-navbar">
                        <form class="mr-auto form-inline">
                            <ul class="mr-3 navbar-nav">
                                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                            class="fas fa-bars"></i></a></li>
                                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                            class="fas fa-search"></i></a></li>
                            </ul>
                            <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                    data-width="250">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                <div class="search-backdrop"></div>
                                <div class="search-result">
                                    <div class="search-header">
                                        Histories
                                    </div>
                                    <div class="search-item">
                                        <a href="#">How to hack NASA using CSS</a>
                                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="search-item">
                                        <a href="#">Kodinger.com</a>
                                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="search-item">
                                        <a href="#">#Stisla</a>
                                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="search-header">
                                        Result
                                    </div>
                                    <div class="search-item">
                                        <a href="#">
                                            <img class="mr-3 rounded" width="30"
                                                src="assets/img/products/product-3-50.png" alt="product">
                                            oPhone S9 Limited Edition
                                        </a>
                                    </div>
                                    <div class="search-item">
                                        <a href="#">
                                            <img class="mr-3 rounded" width="30"
                                                src="assets/img/products/product-2-50.png" alt="product">
                                            Drone X2 New Gen-7
                                        </a>
                                    </div>
                                    <div class="search-item">
                                        <a href="#">
                                            <img class="mr-3 rounded" width="30"
                                                src="assets/img/products/product-1-50.png" alt="product">
                                            Headphone Blitz
                                        </a>
                                    </div>
                                    <div class="search-header">
                                        Projects
                                    </div>
                                    <div class="search-item">
                                        <a href="#">
                                            <div class="mr-3 text-white search-icon bg-danger">
                                                <i class="fas fa-code"></i>
                                            </div>
                                            Stisla Admin Template
                                        </a>
                                    </div>
                                    <div class="search-item">
                                        <a href="#">
                                            <div class="mr-3 text-white search-icon bg-primary">
                                                <i class="fas fa-laptop"></i>
                                            </div>
                                            Create a new Homepage Design
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="bg-[#192f59] navbar-nav navbar-right">
                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                    class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                    <div class="dropdown-header">Messages
                                        <div class="float-right">
                                            <a href="#">Mark All As Read</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-list-content dropdown-list-message">
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="assets/img/avatar/avatar-1.png"
                                                    class="rounded-circle">
                                                <div class="is-online"></div>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Kusnaedi</b>
                                                <p>Hello, Bro!</p>
                                                <div class="time">10 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="assets/img/avatar/avatar-2.png"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Dedik Sugiharto</b>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="assets/img/avatar/avatar-3.png"
                                                    class="rounded-circle">
                                                <div class="is-online"></div>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Agung Ardiansyah</b>
                                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="assets/img/avatar/avatar-4.png"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Ardian Rahardiansyah</b>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                                <div class="time">16 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="dropdown-item-avatar">
                                                <img alt="image" src="assets/img/avatar/avatar-5.png"
                                                    class="rounded-circle">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Alfa Zulkarnain</b>
                                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                                <div class="time">Yesterday</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center dropdown-footer">
                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                    class="nav-link notification-toggle nav-link-lg beep"><i
                                        class="far fa-bell"></i></a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                    <div class="dropdown-header">Notifications
                                        <div class="float-right">
                                            <a href="#">Mark All As Read</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-list-content dropdown-list-icons">
                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                            <div class="text-white dropdown-item-icon bg-primary">
                                                <i class="fas fa-code"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Template update is available now!
                                                <div class="time text-primary">2 Min Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="text-white dropdown-item-icon bg-info">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                                <div class="time">10 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="text-white dropdown-item-icon bg-success">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                                <div class="time">12 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="text-white dropdown-item-icon bg-danger">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Low disk space. Let's clean it!
                                                <div class="time">17 Hours Ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="text-white dropdown-item-icon bg-info">
                                                <i class="fas fa-bell"></i>
                                            </div>
                                            <div class="dropdown-item-desc">
                                                Welcome to Stisla template!
                                                <div class="time">Yesterday</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center dropdown-footer">
                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown"
                                    class="flex nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    {{-- <img alt="image" src="assets/img/avatar/avatar-1.png"
                                        class="mr-1 rounded-circle"> --}}
                                    <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-title">Logged in 5 min ago</div>
                                    <a href="features-profile.html" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Profile
                                    </a>
                                    <a href="features-activities.html" class="dropdown-item has-icon">
                                        <i class="fas fa-bolt"></i> Activities
                                    </a>
                                    <a href="features-settings.html" class="dropdown-item has-icon">
                                        <i class="fas fa-cog"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item has-icon text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <div class="main-sidebar sidebar-style-2">
                        <aside id="sidebar-wrapper">
                            <div class="grid w-full h-20 pt-5 place-content-center">
                                <div class="pl-20 sidebar-brand">
                                    <img src="{{ asset('img/unici.png') }}" alt="logo" width="50%" class=""
                                        style="margin-left: 0%;">
                                </div>
                                <div class="pl-1 sidebar-brand sidebar-brand-sm">
                                    <a href="{{ route('dashboard') }}">
                                        <img src="{{ asset('img/logo512.png') }}" alt="logo" width="140%" class="" style="margin-left: 0%;">
                                    </a>
                                </div>
                            </div>
                            <ul class="sidebar-menu">
                                <br>
                                <br>
                                <li class="menu-header">Sistema de Inventario</li>
                                <li style="color: #192f59;">
                                    <a class="nav-link" href="{{ route('dashboard') }}" style="color: #192f59;">
                                        <i class="fas fa-home"></i>
                                        <span>Inicio</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                <li style="color: #192f59;"><a class="nav-link" href="{{ route('Gestion') }}"
                                        style="color: #192f59;"><i class="fas fa-home"></i> <span>Gestión de usuarios</span></a></li>
                                <li class="dropdown">
                                <li class="dropdown">
                                    <a href="#" class="nav-link has-dropdown" href="{{ route('General.index') }}"
                                        style="color: #192f59;">
                                        <i class="fas fa-th-large"></i>
                                        <span>Inventario</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                General
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Papeleria
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Souvenirs
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Publicidad
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Limpieza
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="nav-link has-dropdown" href="{{ route('General.index') }}"
                                        style="color: #192f59;">
                                        <i class="fas fa-th-large"></i>
                                        <span>Gestión de Productos</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Producto / Bien
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Categorías
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li style="color: #192f59;">
                                    <a class="nav-link" href="{{ route('dashboard') }}" style="color: #192f59;">
                                        <i class="fas fa-home"></i>
                                        <span>Proveedores</span>
                                    </a>
                                </li>

                                <li style="color: #192f59;">
                                    <a class="nav-link" href="{{ route('dashboard') }}" style="color: #192f59;">
                                        <i class="fas fa-home"></i>
                                        <span>Informes / Reportes</span>
                                    </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="nav-link has-dropdown" href="{{ route('General.index') }}"
                                        style="color: #192f59;">
                                        <i class="fas fa-th-large"></i>
                                        <span>Configuración</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Campus
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Áreas
                                            </a>
                                        </li>

                                        <li><a class="nav-link beep beep-sidebar" href="{{ route('General.index') }}"><i
                                                    class="fas fa-pencil-ruler"></i>Responsables</a></li>

                                    </ul>
                                </li>

                                <li style="color: #192f59;">
                                    <a class="nav-link" href="{{ route('dashboard') }}" style="color: #192f59;">
                                        <i class="fas fa-home"></i>
                                        <span>Lector QR</span>
                                    </a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="nav-link has-dropdown" href="{{ route('General.index') }}"
                                        style="color: #192f59;">
                                        <i class="fas fa-th-large"></i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="nav-link beep beep-sidebar" href="{{ route('profile.edit') }}">
                                                <i class="fas fa-pencil-ruler"></i>
                                                Perfil
                                            </a>
                                        </li>


                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li>
                                                <a class="flex flex-row beep beep-sidebar" href="{{route('logout') }}"
                                                    onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                                    <i class="fas fa-pencil-ruler"></i>
                                                    <p>
                                                        Cerrar Sesión
                                                    </p>
                                                </a>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                                
                            </div>
                        </aside>
                    <div class="relative">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

</body>

</html>