<!DOCTYPE html>
<html lang="id" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-vertical-style="closed" data-toggled="close-menu-close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $title ? $title . ' | ' : '' }} Adminku</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="Jaringan Dokumentasi Informasi Hukum Kabupaten Bulungan">
    <meta name="Author" content="AL Gzl">
    <meta name="keywords"
        content="JDIH, Bulungan, JDIH Bulungan, Jaringan Dokumentasi Informasi Hukum, Kabupaten Bulungan, Kalimantan Utara">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link id="style" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/notif/notifIt.css') }}" rel="stylesheet" />
    <link href="{{ asset('libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ assets('css/back-custom.css') }}" rel="stylesheet">
    @routes
</head>

<body>
    <div id="loader">
        <img src="{{ asset('images/loader.svg') }}" alt="">
    </div>
    <div class="page">
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);">
                            <i class="header-icon fe fe-align-left"></i>
                        </a>
                    </div>
                </div>
                <div class="header-content-right">
                    <div class="header-element header-theme-mode">
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" height="24"
                                    viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z" />
                                </svg>
                            </span>
                            <span class="dark-layout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" fill="currentColor"
                                    height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="header-element header-fullscreen">
                        <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="full-screen-open full-screen-icon header-link-icon" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="currentColor">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="full-screen-close full-screen-icon header-link-icon d-none" fill="currentColor"
                                height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M320-200v-120H200v-80h200v200h-80Zm240 0v-200h200v80H640v120h-80ZM200-560v-80h120v-120h80v200H200Zm360 0v-200h80v120h120v80H560Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="header-element headerProfile-dropdown">
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="{{ asset('images/user.png') }}" alt="img" width="37" height="37"
                                class="rounded-circle">
                        </a>
                        <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end main-profile-menu"
                            aria-labelledby="mainHeaderProfile">
                            <li>
                                <div class="main-header-profile bg-primary menu-header-content text-fixed-white">
                                    <div class="my-auto">
                                        <h6 class="mb-0 lh-1 text-fixed-white">{{ Auth::user()->name ?? '-' }}</h6>
                                        <span class="fs-11 op-7 lh-1">{{ Auth::user()->role_id }}</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex" href="profile.html">
                                    <i class="bx bx-user-circle fs-18 me-2 op-7"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex" href="profile.html">
                                    <i class="bx bx-user-circle fs-18 me-2 op-7"></i>
                                    Ganti Kata sandi
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                                    class="dropdown-item d-flex">
                                    <i class="fa-solid fa-right-from-bracket fs-18 ms-2 me-2 op-7"></i>
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('min.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <aside class="app-sidebar sticky" id="sidebar">
            <div class="main-sidebar-header">
                <a href="" class="header-logo">
                    ADMINKU
                </a>
            </div>
            <div class="main-sidebar" id="sidebar-scroll">
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">
                        <li class="slide__category"><span class="category-name">Daftar Menu</span></li>
                        <li class="slide">
                            <a href="{{ route('min.index') }}" class="side-menu__item">
                                <i class="fa-solid fa-house-chimney sidemenu_icon"></i>
                                <span class="side-menu__label">Beranda</span>
                            </a>
                        </li>

                        <li class="slide">
                            <a href="icons.html" class="side-menu__item">
                                <i class="fa-solid fa-house-chimney sidemenu_icon"></i>
                                <span class="side-menu__label">Icons</span>
                            </a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fa-solid fa-database sidemenu_icon"></i>
                                <span class="side-menu__label">Data Master</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('min.mst.status.index') }}" class="side-menu__item">Data
                                        Status</a>
                                </li>
                                <li class="slide">
                                    <a href="" class="side-menu__item">Data 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
            </div>
        </aside>
        <div class="main-content app-content">
            {{ $slot }}
        </div>
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © {{ date('Y') }} | xxx
                </span>
            </div>
        </footer>
    </div>
    <div class="scrollToTop">
        <span class="arrow"><i class="las la-angle-double-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <script src="{{ asset('libs/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/axios.min.js') }}"></script>
    <script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/defaultmenu.min.js') }}"></script>
    <script src="{{ asset('libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('libs/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('libs/notif/notifIt.js') }}"></script>
    <script src="{{ asset('libs/notif/notifit-alert.js') }}"></script>
    <script src="{{ asset('libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('libs/moment/min/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('libs/parsley-js/parsley.min.js') }}"></script>
    <script src="{{ asset('libs/parsley-js/i18n/id.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ assets('js/custom.js') }}"></script>
    @if (session('success'))
        <script>
            alert_success("{{ session('success') }}");
        </script>
    @endif
    @if (session('error'))
        <script>
            alert_error("{{ session('error') }}");
        </script>
    @endif
    @stack('scripts')
</body>

</html>
