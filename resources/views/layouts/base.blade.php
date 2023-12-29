<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon_isi.jpg') }}"/>
    <link href="{{ asset('css/constantes.style.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('alerts.alert-message')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="" class="text-nowrap logo-img">
                        <img src="{{ asset('images/isi_login.jpg') }}" width="170" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                       
                    </ul>    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('images/profile-user.png') }}" alt="profile-user"
                                    width="35"
                                    height="35" class="rounded-circle" />
                                    <span class="ml-1 nav-user-name hidden-sm m-2"> {{ Auth::user()->prenom }}
                                        {{ Auth::user()->nom }}
                                        <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                    
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{route('logout')}}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Se déconnecter</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- @section('scripts') --}}
        <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    {{-- @endsection --}}

</body>

</html>
