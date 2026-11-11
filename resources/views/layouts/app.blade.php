<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tania Mutiara Laundry')</title>

    <link rel="stylesheet" href="{{ asset('css/laundry.css') }}">

    @stack('styles')
</head>

<body>

<div class="page-overlay"></div>

<aside class="sidebar">

    <div class="brand">

        <div class="brand-logo">
            🧺
        </div>

        <div>
            <h2>Tania Mutiara</h2>
            <span>Laundry Service</span>
        </div>

    </div>

    <div class="menu-label">
        MENU UTAMA
    </div>

    <nav>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="nav-icon">🏠</span>
            Dashboard
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            <span class="nav-icon">👥</span>
            Pelanggan
        </a>

        <a href="{{ route('transaksi.index') }}"
           class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
            <span class="nav-icon">🧾</span>
            Transaksi
        </a>

        <a href="{{ route('layanan.index') }}"
           class="{{ request()->routeIs('layanan.*') ? 'active' : '' }}">
            <span class="nav-icon">👕</span>
            Layanan
        </a>

        <a href="{{ route('status.index') }}"
           class="{{ request()->routeIs('status.*') ? 'active' : '' }}">
            <span class="nav-icon">🫧</span>
            Status Laundry
        </a>

        <a href="{{ route('laporan.index') }}"
           class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <span class="nav-icon">📊</span>
            Laporan
        </a>

    </nav>

    <div class="sidebar-footer">
        <strong>Bersih • Wangi • Rapi</strong>
        <span>Perawatan terbaik untuk pakaian Anda.</span>
    </div>

</aside>

<main class="main-content">

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    @yield('content')

    <footer class="footer">
        © {{ date('Y') }} Tania Mutiara Laundry
        <span>•</span>
        Bersih • Wangi • Rapi
    </footer>

</main>

@stack('scripts')

</body>
</html>