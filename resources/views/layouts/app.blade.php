<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="theme-color"
        content="#1d4ed8"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @yield(
            'title',
            'Tania Mutiara Laundry'
        )
    </title>


    <link
        rel="stylesheet"
        href="{{ asset('css/laundry.css') }}"
    >


    @stack('styles')


    <style>

        /* =========================================================
           RESET LAYOUT
        ========================================================= */

        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;

            min-height: 100vh;

            background: #f4f7fb;

            color: #0f172a;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        body.sidebar-open {
            overflow: hidden;
        }



        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {
            position: fixed;

            top: 0;
            left: 0;

            z-index: 1000;

            width: 250px;
            height: 100vh;

            display: flex;
            flex-direction: column;

            padding: 22px 16px 15px;

            overflow: hidden;

            color: white;

            background:
                linear-gradient(
                    180deg,
                    #1e3a8a 0%,
                    #1d4ed8 48%,
                    #2563eb 100%
                );

            box-shadow:
                12px 0 35px
                rgba(15,23,42,.10);

            transition:
                transform .28s ease;
        }


        .sidebar::before {
            content: "";

            position: absolute;

            width: 210px;
            height: 210px;

            right: -120px;
            top: -100px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);

            pointer-events: none;
        }



        /* =========================================================
           BRAND
        ========================================================= */

        .sidebar-brand {
            position: relative;

            z-index: 2;

            display: flex;
            align-items: center;

            gap: 11px;

            padding:
                3px
                4px
                22px;
        }


        .sidebar-brand-logo {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border:
                1px solid
                rgba(255,255,255,.18);

            border-radius: 14px;

            background:
                rgba(255,255,255,.13);

            font-size: 23px;

            box-shadow:
                0 8px 20px
                rgba(0,0,0,.08);
        }


        .sidebar-brand-text {
            min-width: 0;
        }


        .sidebar-brand-text h2 {
            margin: 0;

            color: white;

            font-size: 15px;

            line-height: 1.2;
        }


        .sidebar-brand-text span {
            display: block;

            margin-top: 4px;

            color:
                rgba(255,255,255,.65);

            font-size: 9px;

            letter-spacing: .4px;
        }



        /* =========================================================
           MENU
        ========================================================= */

        .menu-label {
            margin:
                3px
                8px
                9px;

            color:
                rgba(255,255,255,.45);

            font-size: 8px;

            font-weight: 800;

            letter-spacing: 1.2px;
        }


        .sidebar-nav {
            position: relative;

            z-index: 2;

            flex: 1;

            overflow-y: auto;
            overflow-x: hidden;

            padding-right: 2px;
        }


        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }


        .sidebar-nav::-webkit-scrollbar-thumb {
            border-radius: 20px;

            background:
                rgba(255,255,255,.20);
        }


        .sidebar-nav a {
            position: relative;

            display: flex;
            align-items: center;

            gap: 11px;

            margin-bottom: 6px;

            padding:
                11px
                12px;

            overflow: hidden;

            border:
                1px solid transparent;

            border-radius: 11px;

            color:
                rgba(255,255,255,.76);

            text-decoration: none;

            font-size: 11px;

            font-weight: 600;

            transition: .2s;
        }


        .sidebar-nav a:hover {
            color: white;

            background:
                rgba(255,255,255,.10);

            transform:
                translateX(2px);
        }


        .sidebar-nav a.active {
            color: white;

            border-color:
                rgba(255,255,255,.13);

            background:
                rgba(255,255,255,.16);

            box-shadow:
                0 7px 16px
                rgba(15,23,42,.08);
        }


        .sidebar-nav a.active::before {
            content: "";

            position: absolute;

            left: 0;
            top: 9px;
            bottom: 9px;

            width: 3px;

            border-radius:
                0 4px 4px 0;

            background: white;
        }


        .nav-icon {
            width: 26px;
            height: 26px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 8px;

            background:
                rgba(255,255,255,.08);

            font-size: 14px;
        }


        .sidebar-nav a.active
        .nav-icon {
            background:
                rgba(255,255,255,.16);
        }


        .nav-text {
            flex: 1;
        }



        /* =========================================================
           SIDEBAR BOTTOM
        ========================================================= */

        .sidebar-bottom {
            position: relative;

            z-index: 2;

            margin-top: auto;

            flex-shrink: 0;
        }


        .admin-profile {
            display: flex;
            align-items: center;

            gap: 9px;

            width: 100%;

            padding: 10px;

            margin-top: 12px;

            border:
                1px solid
                rgba(255,255,255,.14);

            border-radius: 14px;

            background:
                rgba(255,255,255,.10);

            backdrop-filter:
                blur(8px);
        }


        .admin-avatar {
            width: 38px;
            height: 38px;

            min-width: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                rgba(255,255,255,.18);

            color: white;

            font-size: 16px;

            font-weight: 800;
        }


        .admin-info {
            flex: 1;

            min-width: 0;

            overflow: hidden;
        }


        .admin-name {
            display: block;

            overflow: hidden;

            color: white;

            font-size: 10px;

            font-weight: 800;

            white-space: nowrap;

            text-overflow: ellipsis;
        }


        .admin-role {
            display: block;

            margin-top: 2px;

            color:
                rgba(255,255,255,.68);

            font-size: 8px;
        }


        .admin-email {
            display: block;

            margin-top: 2px;

            overflow: hidden;

            color:
                rgba(255,255,255,.52);

            font-size: 7px;

            white-space: nowrap;

            text-overflow: ellipsis;
        }


        .logout-form {
            margin: 0;

            flex-shrink: 0;
        }


        .logout-button {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: none;

            border-radius: 10px;

            cursor: pointer;

            color: #fecaca;

            background:
                rgba(239,68,68,.18);

            font-size: 15px;

            transition: .2s;
        }


        .logout-button:hover {
            color: white;

            background: #ef4444;

            transform:
                translateX(2px);
        }


        .sidebar-footer {
            margin-top: 9px;

            padding:
                0 5px;

            text-align: center;

            color:
                rgba(255,255,255,.48);

            font-size: 7px;

            line-height: 1.5;
        }


        .sidebar-footer strong {
            display: block;

            color:
                rgba(255,255,255,.69);

            font-size: 8px;
        }



        /* =========================================================
           MAIN AREA
        ========================================================= */

        .main-wrapper {
            min-height: 100vh;

            margin-left: 250px;

            display: flex;
            flex-direction: column;

            transition:
                margin-left .28s ease;
        }



        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            position: sticky;

            top: 0;

            z-index: 700;

            height: 64px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding:
                0
                28px;

            border-bottom:
                1px solid
                #e9eef5;

            background:
                rgba(255,255,255,.92);

            backdrop-filter:
                blur(15px);

            box-shadow:
                0 4px 15px
                rgba(15,23,42,.03);
        }


        .topbar-left {
            display: flex;
            align-items: center;

            gap: 11px;

            min-width: 0;
        }


        .menu-toggle {
            width: 38px;
            height: 38px;

            display: none;
            align-items: center;
            justify-content: center;

            padding: 0;

            border:
                1px solid #e2e8f0;

            border-radius: 10px;

            cursor: pointer;

            background: white;

            color: #334155;

            font-size: 18px;
        }


        .topbar-title {
            min-width: 0;
        }


        .topbar-title strong {
            display: block;

            overflow: hidden;

            color: #0f172a;

            font-size: 12px;

            white-space: nowrap;

            text-overflow: ellipsis;
        }


        .topbar-title span {
            display: block;

            margin-top: 2px;

            color: #94a3b8;

            font-size: 8px;
        }


        .topbar-right {
            display: flex;
            align-items: center;

            gap: 8px;
        }


        .topbar-badge {
            display: inline-flex;
            align-items: center;

            gap: 5px;

            padding:
                7px
                10px;

            border:
                1px solid #dbeafe;

            border-radius: 20px;

            background: #eff6ff;

            color: #1d4ed8;

            font-size: 8px;

            font-weight: 700;
        }



        /* =========================================================
           CONTENT
        ========================================================= */

        .main-content {
            width: 100%;

            flex: 1;

            padding:
                26px
                28px;
        }



        /* =========================================================
           GLOBAL ALERTS
        ========================================================= */

        .layout-alert {
            display: flex;
            align-items: flex-start;

            gap: 8px;

            margin-bottom: 18px;

            padding:
                12px
                14px;

            border-radius: 11px;

            font-size: 10px;

            line-height: 1.6;
        }


        .layout-alert-success {
            border:
                1px solid #bbf7d0;

            background: #ecfdf5;

            color: #166534;
        }


        .layout-alert-error {
            border:
                1px solid #fecaca;

            background: #fef2f2;

            color: #991b1b;
        }



        /* =========================================================
           FOOTER
        ========================================================= */

        .main-footer {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            padding:
                18px
                25px;

            border-top:
                1px solid #e8eef7;

            color: #94a3b8;

            background: white;

            font-size: 8px;

            text-align: center;
        }


        .main-footer strong {
            color: #64748b;
        }



        /* =========================================================
           OVERLAY
        ========================================================= */

        .page-overlay {
            position: fixed;

            inset: 0;

            z-index: 900;

            display: none;

            background:
                rgba(15,23,42,.47);

            backdrop-filter:
                blur(2px);
        }


        .page-overlay.show {
            display: block;
        }



        /* =========================================================
           MOBILE CLOSE BUTTON
        ========================================================= */

        .sidebar-close {
            position: absolute;

            top: 15px;
            right: 12px;

            z-index: 5;

            width: 33px;
            height: 33px;

            display: none;
            align-items: center;
            justify-content: center;

            padding: 0;

            border:
                1px solid
                rgba(255,255,255,.15);

            border-radius: 9px;

            cursor: pointer;

            color: white;

            background:
                rgba(255,255,255,.10);

            font-size: 15px;
        }



        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 900px) {

            .sidebar {
                transform:
                    translateX(-100%);
            }


            .sidebar.open {
                transform:
                    translateX(0);
            }


            .main-wrapper {
                margin-left: 0;
            }


            .menu-toggle,
            .sidebar-close {
                display: flex;
            }


            .topbar {
                padding:
                    0
                    18px;
            }


            .main-content {
                padding:
                    22px
                    18px;
            }

        }


        @media(max-width: 550px) {

            .sidebar {
                width: 84%;
                max-width: 280px;
            }


            .topbar {
                height: 60px;

                padding:
                    0
                    13px;
            }


            .topbar-badge {
                display: none;
            }


            .main-content {
                padding:
                    17px
                    12px;
            }


            .main-footer {
                flex-direction: column;

                gap: 2px;
            }

        }


        @media(max-height: 700px) {

            .sidebar-nav a {
                padding:
                    8px
                    11px;
            }


            .admin-profile {
                padding: 8px;
            }


            .sidebar-footer {
                display: none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     OVERLAY
========================================================= -->

<div
    class="page-overlay"
    id="pageOverlay"
></div>



<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside
    class="sidebar"
    id="sidebar"
>


    <!-- CLOSE MOBILE -->

    <button
        type="button"
        class="sidebar-close"
        id="sidebarClose"
        aria-label="Tutup menu"
    >
        ✕
    </button>



    <!-- BRAND -->

    <div class="sidebar-brand">


        <div class="sidebar-brand-logo">
            🧺
        </div>


        <div class="sidebar-brand-text">

            <h2>
                Tania Mutiara
            </h2>

            <span>
                LAUNDRY SERVICE
            </span>

        </div>


    </div>



    <!-- MENU LABEL -->

    <div class="menu-label">
        MENU UTAMA
    </div>



    <!-- NAV -->

    <nav class="sidebar-nav">


        <!-- DASHBOARD -->

        <a
            href="{{ route('dashboard') }}"
            class="{{
                request()->routeIs('dashboard')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                🏠
            </span>

            <span class="nav-text">
                Dashboard
            </span>

        </a>



        <!-- PELANGGAN -->

        <a
            href="{{ route('pelanggan.index') }}"
            class="{{
                request()->routeIs('pelanggan.*')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                👥
            </span>

            <span class="nav-text">
                Pelanggan
            </span>

        </a>



        <!-- TRANSAKSI -->

        <a
            href="{{ route('transaksi.index') }}"
            class="{{
                request()->routeIs('transaksi.*')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                🧾
            </span>

            <span class="nav-text">
                Transaksi
            </span>

        </a>



        <!-- LAYANAN -->

        <a
            href="{{ route('layanan.index') }}"
            class="{{
                request()->routeIs('layanan.*')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                👕
            </span>

            <span class="nav-text">
                Layanan
            </span>

        </a>



        <!-- STATUS -->

        <a
            href="{{ route('status.index') }}"
            class="{{
                request()->routeIs('status.*')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                🫧
            </span>

            <span class="nav-text">
                Status Laundry
            </span>

        </a>



        <!-- LAPORAN -->

        <a
            href="{{ route('laporan.index') }}"
            class="{{
                request()->routeIs('laporan.*')
                    ? 'active'
                    : ''
            }}"
        >

            <span class="nav-icon">
                📊
            </span>

            <span class="nav-text">
                Laporan
            </span>

        </a>


    </nav>



    <!-- =====================================================
         SIDEBAR BOTTOM
    ====================================================== -->

    <div class="sidebar-bottom">


        @auth


            <div class="admin-profile">


                <!-- AVATAR -->

                <div class="admin-avatar">

                    {{
                        strtoupper(
                            substr(
                                auth()->user()->name,
                                0,
                                1
                            )
                        )
                    }}

                </div>



                <!-- USER -->

                <div class="admin-info">

                    <span class="admin-name">

                        {{
                            auth()->user()->name
                        }}

                    </span>


                    <span class="admin-role">
                        Administrator
                    </span>


                    <span
                        class="admin-email"
                        title="{{
                            auth()->user()->email
                        }}"
                    >

                        {{
                            auth()->user()->email
                        }}

                    </span>

                </div>



                <!-- LOGOUT -->

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="logout-form"
                    onsubmit="
                        return confirm(
                            'Yakin ingin keluar dari Tania Mutiara Laundry?'
                        )
                    "
                >

                    @csrf


                    <button
                        type="submit"
                        class="logout-button"
                        title="Logout"
                        aria-label="Logout"
                    >
                        🚪
                    </button>


                </form>


            </div>


        @endauth



        <div class="sidebar-footer">

            <strong>
                Bersih • Wangi • Rapi
            </strong>

            Tania Mutiara Laundry

        </div>


    </div>


</aside>



<!-- =========================================================
     MAIN WRAPPER
========================================================= -->

<div class="main-wrapper">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <header class="topbar">


        <div class="topbar-left">


            <button
                type="button"
                class="menu-toggle"
                id="menuToggle"
                aria-label="Buka menu"
            >
                ☰
            </button>


            <div class="topbar-title">

                <strong>
                    Tania Mutiara Laundry
                </strong>

                <span>
                    Sistem Informasi Manajemen Laundry
                </span>

            </div>


        </div>



        <div class="topbar-right">


            <span class="topbar-badge">
                ● Sistem Aktif
            </span>


            @auth

                <span class="topbar-badge">

                    👤 {{
                        auth()->user()->name
                    }}

                </span>

            @endauth


        </div>


    </header>



    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content">


        <!-- SUCCESS -->

        @if(session('success'))

            <div
                class="
                    layout-alert
                    layout-alert-success
                "
            >

                <span>
                    ✓
                </span>

                <div>
                    {{ session('success') }}
                </div>

            </div>

        @endif



        <!-- ERROR -->

        @if(session('error'))

            <div
                class="
                    layout-alert
                    layout-alert-error
                "
            >

                <span>
                    ⚠️
                </span>

                <div>
                    {{ session('error') }}
                </div>

            </div>

        @endif



        <!-- CONTENT -->

        @yield('content')


    </main>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="main-footer">

        <span>
            © {{ date('Y') }}
        </span>

        <strong>
            Tania Mutiara Laundry
        </strong>

        <span>
            •
        </span>

        <span>
            Bersih • Wangi • Rapi
        </span>

    </footer>


</div>



<!-- =========================================================
     MOBILE SIDEBAR SCRIPT
========================================================= -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const sidebar =
            document.getElementById(
                'sidebar'
            );


        const menuToggle =
            document.getElementById(
                'menuToggle'
            );


        const sidebarClose =
            document.getElementById(
                'sidebarClose'
            );


        const overlay =
            document.getElementById(
                'pageOverlay'
            );


        /*
        |--------------------------------------------------------------------------
        | OPEN SIDEBAR
        |--------------------------------------------------------------------------
        */

        function openSidebar()
        {
            if (!sidebar) {
                return;
            }


            sidebar.classList.add(
                'open'
            );


            if (overlay) {

                overlay.classList.add(
                    'show'
                );

            }


            document.body.classList.add(
                'sidebar-open'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CLOSE SIDEBAR
        |--------------------------------------------------------------------------
        */

        function closeSidebar()
        {
            if (!sidebar) {
                return;
            }


            sidebar.classList.remove(
                'open'
            );


            if (overlay) {

                overlay.classList.remove(
                    'show'
                );

            }


            document.body.classList.remove(
                'sidebar-open'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

        if (menuToggle) {

            menuToggle.addEventListener(
                'click',
                openSidebar
            );

        }


        if (sidebarClose) {

            sidebarClose.addEventListener(
                'click',
                closeSidebar
            );

        }


        if (overlay) {

            overlay.addEventListener(
                'click',
                closeSidebar
            );

        }



        /*
        |--------------------------------------------------------------------------
        | CLOSE AFTER CLICK MENU ON MOBILE
        |--------------------------------------------------------------------------
        */

        const navLinks =
            document.querySelectorAll(
                '.sidebar-nav a'
            );


        navLinks.forEach(
            function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (
                            window.innerWidth <= 900
                        ) {

                            closeSidebar();

                        }

                    }
                );

            }
        );



        /*
        |--------------------------------------------------------------------------
        | ESC BUTTON
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key ===
                    'Escape'
                ) {

                    closeSidebar();

                }

            }
        );



        /*
        |--------------------------------------------------------------------------
        | RESIZE
        |--------------------------------------------------------------------------
        */

        window.addEventListener(
            'resize',
            function () {

                if (
                    window.innerWidth > 900
                ) {

                    closeSidebar();

                }

            }
        );

    }
);

</script>


@stack('scripts')


</body>

</html>