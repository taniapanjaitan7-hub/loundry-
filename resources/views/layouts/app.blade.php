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

        /* =============================
           ADMIN PROFILE
        ============================= */

        .admin-profile {

            margin-top: 25px;

            padding: 14px;

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

            border-radius: 12px;

            color: white;

        }


        .admin-profile-title {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 10px;

        }


        .admin-avatar {

            width: 40px;

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .18
                );

            border-radius: 50%;

            font-size: 19px;

        }


        .admin-info {

            min-width: 0;

            overflow: hidden;

        }


        .admin-info strong {

            display: block;

            font-size: 13px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .admin-info span {

            display: block;

            margin-top: 3px;

            font-size: 11px;

            opacity: .8;

        }


        .admin-email {

            font-size: 10px !important;

            margin-top: 4px !important;

        }


        /* =============================
           LOGOUT
        ============================= */

        .logout-form {

            margin-top: 12px;

        }


        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 11px 14px;

            border: none;

            border-radius: 9px;

            background: #dc2626;

            color: white;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;

        }


        .logout-button:hover {

            background: #b91c1c;

            transform:
                translateY(-1px);

        }


        /* =============================
           ERROR
        ============================= */

        .alert-error-layout {

            background: #fee2e2;

            color: #991b1b;

            padding: 14px;

            border-radius: 10px;

            margin-bottom: 20px;

        }

    </style>


</head>


<body>


<div class="page-overlay"></div>



<aside class="sidebar">


    <!-- BRAND -->

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



    <!-- MENU -->

    <div class="menu-label">

        MENU UTAMA

    </div>



    <nav>


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



    <!-- ADMIN -->

    @auth


        <div class="admin-profile">


            <div class="admin-profile-title">


                <div class="admin-avatar">

                    👤

                </div>


                <div class="admin-info">


                    <strong>

                        {{ auth()->user()->name }}

                    </strong>


                    <span>

                        Administrator

                    </span>


                    <span class="admin-email">

                        {{ auth()->user()->email }}

                    </span>


                </div>


            </div>



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

                >

                    🚪 Logout

                </button>


            </form>


        </div>


    @endauth



    <div class="sidebar-footer">


        <strong>

            Bersih • Wangi • Rapi

        </strong>


        <span>

            Perawatan terbaik untuk
            pakaian Anda.

        </span>


    </div>


</aside>



<main class="main-content">


    @if(session('success'))


        <div class="alert-success">

            ✓ {{ session('success') }}

        </div>


    @endif



    @if(session('error'))


        <div class="alert-error-layout">

            {{ session('error') }}

        </div>


    @endif



    @yield('content')



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