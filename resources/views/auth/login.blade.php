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

    <title>
        Login Admin - Tania Mutiara Laundry
    </title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        body {
            min-height: 100vh;
            background: #eff6ff;
            color: #0f172a;
        }


        /* =====================================================
           PAGE
        ====================================================== */

        .login-page {
            position: relative;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            padding: 30px;

            background:
                linear-gradient(
                    135deg,
                    rgba(15, 46, 100, .86),
                    rgba(37, 99, 235, .72)
                ),
                url("{{ asset('images/laundry-bg.png') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .login-page::before {
            content: "";

            position: absolute;

            width: 450px;
            height: 450px;

            top: -220px;
            left: -180px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.08);
        }


        .login-page::after {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            right: -150px;
            bottom: -160px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);
        }


        /* =====================================================
           MAIN CARD
        ====================================================== */

        .login-container {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 1000px;

            display: grid;

            grid-template-columns:
                1.1fr
                .9fr;

            overflow: hidden;

            border-radius: 28px;

            border:
                1px solid
                rgba(255,255,255,.20);

            background:
                rgba(255,255,255,.97);

            box-shadow:
                0 30px 80px
                rgba(15,23,42,.35);
        }


        /* =====================================================
           LEFT BRAND
        ====================================================== */

        .brand-section {
            position: relative;

            min-height: 620px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            overflow: hidden;

            padding: 46px;

            color: white;

            background:
                linear-gradient(
                    145deg,
                    rgba(30,64,175,.97),
                    rgba(37,99,235,.92),
                    rgba(14,165,233,.86)
                );
        }


        .brand-section::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: -100px;
            top: -110px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.10);
        }


        .brand-section::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            left: -70px;
            bottom: 80px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);
        }


        .brand-top,
        .brand-content,
        .brand-footer {
            position: relative;
            z-index: 2;
        }


        .brand-logo {
            display: flex;
            align-items: center;

            gap: 11px;

            font-size: 15px;
            font-weight: 800;
        }


        .brand-logo-icon {
            width: 47px;
            height: 47px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            border:
                1px solid
                rgba(255,255,255,.20);

            background:
                rgba(255,255,255,.13);

            font-size: 24px;
        }


        .brand-content h1 {
            max-width: 440px;

            margin-bottom: 17px;

            font-size: 38px;

            line-height: 1.15;
        }


        .brand-content p {
            max-width: 450px;

            color:
                rgba(255,255,255,.82);

            font-size: 13px;

            line-height: 1.8;
        }


        .brand-features {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;

            margin-top: 26px;
        }


        .brand-feature {
            padding: 14px 8px;

            border-radius: 13px;

            border:
                1px solid
                rgba(255,255,255,.14);

            background:
                rgba(255,255,255,.09);

            text-align: center;
        }


        .brand-feature span {
            display: block;

            margin-bottom: 6px;

            font-size: 21px;
        }


        .brand-feature strong {
            font-size: 9px;
        }


        .brand-footer {
            color:
                rgba(255,255,255,.66);

            font-size: 10px;

            line-height: 1.7;
        }


        /* =====================================================
           LOGIN SIDE
        ====================================================== */

        .login-section {
            display: flex;
            align-items: center;

            padding: 45px;
        }


        .login-content {
            width: 100%;
        }


        .mobile-logo {
            display: none;

            margin-bottom: 20px;

            text-align: center;
        }


        .mobile-logo-icon {
            width: 65px;
            height: 65px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin:
                0 auto
                10px;

            border-radius: 18px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #0ea5e9
                );

            font-size: 31px;

            box-shadow:
                0 12px 26px
                rgba(37,99,235,.23);
        }


        .login-header {
            margin-bottom: 27px;
        }


        .login-label {
            display: inline-block;

            margin-bottom: 7px;

            color: #2563eb;

            font-size: 9px;
            font-weight: 800;

            letter-spacing: 1.2px;

            text-transform: uppercase;
        }


        .login-header h2 {
            margin-bottom: 7px;

            color: #0f172a;

            font-size: 27px;
        }


        .login-header p {
            color: #64748b;

            font-size: 11px;

            line-height: 1.6;
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .alert {
            display: flex;

            gap: 9px;

            margin-bottom: 18px;

            padding: 12px 13px;

            border-radius: 10px;

            font-size: 10px;

            line-height: 1.6;
        }


        .alert-success {
            color: #166534;

            background: #ecfdf5;

            border:
                1px solid
                #bbf7d0;
        }


        .alert-error {
            color: #9f1239;

            background: #fff1f2;

            border:
                1px solid
                #fecdd3;
        }


        .alert-error ul {
            margin-top: 5px;

            padding-left: 17px;
        }


        /* =====================================================
           FORM
        ====================================================== */

        .form-group {
            margin-bottom: 17px;
        }


        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #334155;

            font-size: 10px;

            font-weight: 700;
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {
            position: absolute;

            left: 13px;

            top: 50%;

            transform:
                translateY(-50%);

            pointer-events: none;

            font-size: 15px;
        }


        .form-control {
            width: 100%;

            padding:
                12px
                43px
                12px
                40px;

            border:
                1px solid
                #cbd5e1;

            border-radius: 10px;

            outline: none;

            background: white;

            color: #0f172a;

            font-size: 11px;

            transition: .2s;
        }


        .form-control::placeholder {
            color: #94a3b8;
        }


        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.09);
        }


        /* =====================================================
           PASSWORD BUTTON
        ====================================================== */

        .toggle-password {
            position: absolute;

            right: 9px;

            top: 50%;

            transform:
                translateY(-50%);

            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;

            border-radius: 8px;

            background: transparent;

            cursor: pointer;

            font-size: 15px;

            transition: .2s;
        }


        .toggle-password:hover {
            background: #f1f5f9;
        }


        /* =====================================================
           CAPS LOCK
        ====================================================== */

        .caps-warning {
            display: none;

            margin-top: 6px;

            color: #d97706;

            font-size: 8px;
        }


        /* =====================================================
           OPTIONS
        ====================================================== */

        .login-options {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 10px;

            margin:
                3px 0
                21px;
        }


        .remember {
            display: flex;
            align-items: center;

            gap: 7px;
        }


        .remember input {
            width: 15px;
            height: 15px;

            cursor: pointer;

            accent-color: #2563eb;
        }


        .remember label {
            color: #475569;

            cursor: pointer;

            font-size: 9px;
        }


        .security-text {
            color: #94a3b8;

            font-size: 8px;
        }


        /* =====================================================
           LOGIN BUTTON
        ====================================================== */

        .login-button {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 13px 16px;

            border: none;

            border-radius: 10px;

            cursor: pointer;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            font-size: 11px;
            font-weight: 800;

            box-shadow:
                0 8px 20px
                rgba(37,99,235,.22);

            transition: .2s;
        }


        .login-button:hover {
            transform:
                translateY(-1px);

            box-shadow:
                0 11px 25px
                rgba(37,99,235,.30);
        }


        .login-button:disabled {
            opacity: .7;

            cursor: not-allowed;

            transform: none;
        }


        .loader {
            display: none;

            width: 14px;
            height: 14px;

            border:
                2px solid
                rgba(255,255,255,.40);

            border-top-color: white;

            border-radius: 50%;

            animation:
                loading
                .7s
                linear
                infinite;
        }


        @keyframes loading {

            to {
                transform:
                    rotate(360deg);
            }

        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .login-footer {
            margin-top: 24px;

            padding-top: 18px;

            border-top:
                1px solid
                #edf2f7;

            text-align: center;

            color: #94a3b8;

            font-size: 8px;

            line-height: 1.7;
        }


        .login-footer strong {
            color: #64748b;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media(max-width: 850px) {

            .login-page {
                padding: 20px;
            }


            .login-container {
                display: block;

                max-width: 470px;
            }


            .brand-section {
                display: none;
            }


            .mobile-logo {
                display: block;
            }


            .login-section {
                padding: 35px;
            }

        }


        @media(max-width: 500px) {

            .login-page {
                padding: 12px;
            }


            .login-container {
                border-radius: 20px;
            }


            .login-section {
                padding:
                    28px
                    22px;
            }


            .login-header h2 {
                font-size: 23px;
            }


            .login-options {
                align-items: flex-start;
                flex-direction: column;
            }

        }

    </style>

</head>


<body>


<div class="login-page">


    <main class="login-container">


        <!-- =================================================
             BRAND
        ================================================== -->

        <section class="brand-section">


            <div class="brand-top">

                <div class="brand-logo">

                    <div class="brand-logo-icon">
                        🧺
                    </div>

                    <span>
                        TANIA MUTIARA LAUNDRY
                    </span>

                </div>

            </div>



            <div class="brand-content">

                <h1>
                    Laundry Lebih Mudah, Cepat & Terorganisir.
                </h1>

                <p>
                    Sistem informasi untuk membantu pengelolaan
                    pelanggan, layanan, transaksi, pembayaran,
                    status cucian dan laporan Tania Mutiara Laundry.
                </p>


                <div class="brand-features">

                    <div class="brand-feature">

                        <span>
                            🧾
                        </span>

                        <strong>
                            Transaksi
                        </strong>

                    </div>


                    <div class="brand-feature">

                        <span>
                            🫧
                        </span>

                        <strong>
                            Status Laundry
                        </strong>

                    </div>


                    <div class="brand-feature">

                        <span>
                            📊
                        </span>

                        <strong>
                            Laporan
                        </strong>

                    </div>

                </div>

            </div>



            <div class="brand-footer">

                Sistem Informasi Laundry

                <br>

                Bersih • Wangi • Rapi

            </div>


        </section>



        <!-- =================================================
             LOGIN
        ================================================== -->

        <section class="login-section">


            <div class="login-content">


                <!-- MOBILE BRAND -->

                <div class="mobile-logo">

                    <div class="mobile-logo-icon">
                        🧺
                    </div>

                    <strong>
                        Tania Mutiara Laundry
                    </strong>

                </div>



                <!-- HEADER -->

                <div class="login-header">

                    <span class="login-label">
                        Administrator Access
                    </span>

                    <h2>
                        Selamat Datang 👋
                    </h2>

                    <p>
                        Silakan masuk menggunakan akun administrator
                        untuk mengakses dashboard Tania Mutiara Laundry.
                    </p>

                </div>



                <!-- SUCCESS -->

                @if(session('success'))

                    <div class="alert alert-success">

                        <span>
                            ✓
                        </span>

                        <div>
                            {{ session('success') }}
                        </div>

                    </div>

                @endif



                <!-- ERROR -->

                @if($errors->any())

                    <div
                        class="alert alert-error"
                        role="alert"
                    >

                        <span>
                            ⚠️
                        </span>

                        <div>

                            <strong>
                                Login belum berhasil.
                            </strong>

                            <ul>

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                @endif



                <!-- FORM LOGIN -->

                <form
                    action="{{ route('login.process') }}"
                    method="POST"
                    id="loginForm"
                >

                    @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email Admin
                        </label>


                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉️
                            </span>


                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email admin"
                                autocomplete="email"
                                maxlength="255"
                                required
                                autofocus
                            >

                        </div>

                    </div>



                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>


                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔑
                            </span>


                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required
                            >


                            <button
                                type="button"
                                class="toggle-password"
                                id="togglePassword"
                                title="Tampilkan password"
                                aria-label="Tampilkan password"
                            >
                                👁
                            </button>

                        </div>


                        <div
                            class="caps-warning"
                            id="capsWarning"
                        >
                            ⚠ Caps Lock sedang aktif.
                        </div>

                    </div>



                    <!-- REMEMBER -->

                    <div class="login-options">

                        <div class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                            >

                            <label for="remember">
                                Ingat saya
                            </label>

                        </div>


                        <span class="security-text">
                            🔒 Akses Administrator
                        </span>

                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="login-button"
                        id="loginButton"
                    >

                        <span
                            class="loader"
                            id="loginLoader"
                        ></span>


                        <span id="loginIcon">
                            🔐
                        </span>


                        <span id="loginText">
                            Masuk ke Dashboard
                        </span>

                    </button>

                </form>



                <!-- FOOTER -->

                <div class="login-footer">

                    © {{ date('Y') }}

                    <strong>
                        Tania Mutiara Laundry
                    </strong>

                    <br>

                    Sistem Informasi Manajemen Laundry

                </div>


            </div>


        </section>


    </main>


</div>



<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /*
        |--------------------------------------------------------------------------
        | ELEMENT
        |--------------------------------------------------------------------------
        */

        const password =
            document.getElementById(
                'password'
            );

        const togglePassword =
            document.getElementById(
                'togglePassword'
            );

        const capsWarning =
            document.getElementById(
                'capsWarning'
            );

        const loginForm =
            document.getElementById(
                'loginForm'
            );

        const loginButton =
            document.getElementById(
                'loginButton'
            );

        const loginLoader =
            document.getElementById(
                'loginLoader'
            );

        const loginIcon =
            document.getElementById(
                'loginIcon'
            );

        const loginText =
            document.getElementById(
                'loginText'
            );


        /*
        |--------------------------------------------------------------------------
        | SHOW / HIDE PASSWORD
        |--------------------------------------------------------------------------
        */

        if (
            password
            &&
            togglePassword
        ) {

            togglePassword.addEventListener(
                'click',
                function () {

                    const hidden =
                        password.type ===
                        'password';


                    password.type =
                        hidden
                        ? 'text'
                        : 'password';


                    togglePassword.textContent =
                        hidden
                        ? '🙈'
                        : '👁';


                    togglePassword.title =
                        hidden
                        ? 'Sembunyikan password'
                        : 'Tampilkan password';


                    togglePassword.setAttribute(
                        'aria-label',
                        togglePassword.title
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CAPS LOCK
        |--------------------------------------------------------------------------
        */

        function detectCapsLock(event)
        {
            if (
                !capsWarning
                ||
                !event.getModifierState
            ) {
                return;
            }


            const active =
                event.getModifierState(
                    'CapsLock'
                );


            capsWarning.style.display =
                active
                ? 'block'
                : 'none';
        }


        if (password) {

            password.addEventListener(
                'keydown',
                detectCapsLock
            );


            password.addEventListener(
                'keyup',
                detectCapsLock
            );


            password.addEventListener(
                'blur',
                function () {

                    if (capsWarning) {

                        capsWarning.style.display =
                            'none';

                    }

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN LOADING
        |--------------------------------------------------------------------------
        */

        if (
            loginForm
            &&
            loginButton
        ) {

            loginForm.addEventListener(
                'submit',
                function () {

                    loginButton.disabled =
                        true;


                    if (loginLoader) {

                        loginLoader.style.display =
                            'inline-block';

                    }


                    if (loginIcon) {

                        loginIcon.style.display =
                            'none';

                    }


                    if (loginText) {

                        loginText.textContent =
                            'Memproses Login...';

                    }

                }
            );

        }

    }
);

</script>


</body>

</html>