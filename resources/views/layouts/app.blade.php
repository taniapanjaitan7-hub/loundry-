<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
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

        /* =========================================
           SIDEBAR LAYOUT
        ========================================= */

        .sidebar {

            display: flex !important;

            flex-direction: column;

            height: 100vh;

            overflow: hidden;

            padding-bottom: 15px;

        }


        .sidebar nav {

            flex: 1;

            overflow-y: auto;

            overflow-x: hidden;

            padding-right: 2px;

        }


        .sidebar nav::-webkit-scrollbar {

            width: 4px;

        }


        .sidebar nav::-webkit-scrollbar-thumb {

            background:
                rgba(
                    255,
                    255,
                    255,
                    .20
                );

            border-radius: 20px;

        }



        /* =========================================
           ADMIN AREA
        ========================================= */

        .sidebar-bottom {

            margin-top: auto;

            flex-shrink: 0;

        }


        .admin-profile {

            display: flex;

            align-items: center;

            gap: 10px;

            width: 100%;

            padding: 10px;

            margin-top: 12px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .10
                );

            border:
                1px solid
                rgba(
                    255,
                    255,
                    255,
                    .15
                );

            border-radius: 14px;

            backdrop-filter: blur(8px);

            -webkit-backdrop-filter:
                blur(8px);

            color: white;

        }



        /* =========================================
           AVATAR
        ========================================= */

        .admin-avatar {

            width: 38px;

            height: 38px;

            min-width: 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 11px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .18
                );

            font-size: 17px;

            font-weight: bold;

            color: white;

        }



        /* =========================================
           ADMIN INFO
        ========================================= */

        .admin-info {

            flex: 1;

            min-width: 0;

            overflow: hidden;

        }


        .admin-name {

            display: block;

            width: 100%;

            color: white;

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .admin-role {

            display: block;

            margin-top: 2px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    .70
                );

            font-size: 9px;

        }


        .admin-email {

            display: block;

            width: 100%;

            margin-top: 2px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    .60
                );

            font-size: 8px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }



        /* =========================================
           LOGOUT
        ========================================= */

        .logout-form {

            margin: 0;

            padding: 0;

            flex-shrink: 0;

        }


        .logout-button {

            width: 36px;

            height: 36px;

            padding: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border: none;

            border-radius: 10px;

            background:
                rgba(
                    239,
                    68,
                    68,
                    .18
                );

            color: #fecaca;

            font-size: 16px;

            cursor: pointer;

            transition:
                background .2s,
                color .2s,
                transform .2s;

        }


        .logout-button:hover {

            background: #ef4444;

            color: white;

            transform:
                translateX(2px);

        }



        /* =========================================
           SIDEBAR FOOTER
        ========================================= */

        .sidebar-mini-footer {

            margin-top: 8px;

            padding: 0 5px;

            text-align: center;

            color:
                rgba(
                    255,
                    255,
                    255,
                    .55
                );

            font-size: 9px;

            line-height: 1.4;

        }


        .sidebar-mini-footer strong {

            display: block;

            color:
                rgba(
                    255,
                    255,
                    255,
                    .75
                );

            font-size: 9px;

            font-weight: 600;

        }



        /* =========================================
           ERROR
        ========================================= */

        .alert-error-layout {

            background: #fee2e2;

            color: #991b1b;

            padding: 14px;

            border-radius: 10px;

            margin-bottom: 20px;

        }



        /* =========================================
           RESPONSIVE HEIGHT
        ========================================= */

        @media(max-height: 700px) {

            .sidebar nav a {

                padding-top: 9px !important;

                padding-bottom: 9px !important;

            }


            .admin-profile {

                padding: 8px;

            }


            .admin-avatar {

                width: 34px;

                height: 34px;

                min-width: 34px;

            }


            .logout-button {

                width: 32px;

                height: 32px;

            }


            .sidebar-mini-footer {

                display: none;

            }

        }

    </style>

</head>


<body>


<div class="page-overlay"></div>



<aside class="sidebar">


    <!-- =====================================
         BRAND
    ====================================== -->

    <div class="brand">


        <div class="brand-logo">

            🧺

        </div>


        <div>


            <h2>

                Tania Mutiara

            </h2>


            <span>

                Laundry Service

            </span>


        </div>


    </div>



    <!-- =====================================
         MENU LABEL
    ====================================== -->

    <div class="menu-label">

        MENU UTAMA

    </div>



    <!-- =====================================
         NAVIGATION
    ====================================== -->

    <nav>


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

            Dashboard

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

            Pelanggan

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

            Transaksi

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

            Layanan

        </a>



        <!-- STATUS LAUNDRY -->

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

            Status Laundry

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

            Laporan

        </a>


    </nav>



    <!-- =====================================
         BAGIAN BAWAH SIDEBAR
    ====================================== -->

    <div class="sidebar-bottom">


        @auth


            <!-- ADMIN PROFILE -->

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



                <!-- ADMIN INFO -->

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



        <!-- MINI FOOTER -->

        <div class="sidebar-mini-footer">


            <strong>

                Bersih • Wangi • Rapi

            </strong>


            Tania Mutiara Laundry


        </div>


    </div>


</aside>



<!-- =====================================
     MAIN CONTENT
====================================== -->

<main class="main-content">


    <!-- SUCCESS -->

    @if(session('success'))


        <div class="alert-success">

            ✓ {{ session('success') }}

        </div>


    @endif



    <!-- ERROR -->

    @if(session('error'))


        <div class="alert-error-layout">

            {{ session('error') }}

        </div>


    @endif



    <!-- PAGE CONTENT -->

    @yield('content')



    <!-- MAIN FOOTER -->

    <footer class="footer">


        © {{ date('Y') }}

        Tania Mutiara Laundry


        <span>

            •

        </span>


        Bersih • Wangi • Rapi


    </footer>


</main>



@stack('scripts')


</body>

</html>