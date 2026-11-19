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

        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;

            margin: 0;

            padding: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            min-height: 100vh;

            color: #1e293b;

            background: #eff6ff;
        }



        /* =========================================================
           PAGE
        ========================================================= */

        .login-page {
            position: relative;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            padding: 35px;


            background:

                linear-gradient(
                    135deg,
                    rgba(15, 46, 100, .88),
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

            width: 420px;
            height: 420px;

            left: -170px;
            top: -160px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.08);

            pointer-events: none;
        }


        .login-page::after {
            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            right: -130px;
            bottom: -150px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);

            pointer-events: none;
        }



        /* =========================================================
           MAIN CARD
        ========================================================= */

        .login-wrapper {
            position: relative;

            z-index: 2;

            width: 100%;

            max-width: 980px;

            display: grid;

            grid-template-columns:
                minmax(0, 1.1fr)
                minmax(340px, .9fr);

            overflow: hidden;

            border:
                1px solid
                rgba(255,255,255,.18);

            border-radius: 28px;

            background:
                rgba(255,255,255,.96);

            box-shadow:
                0 30px 80px
                rgba(15,23,42,.32);

            backdrop-filter:
                blur(18px);
        }



        /* =========================================================
           LEFT SIDE
        ========================================================= */

        .login-brand {
            position: relative;

            overflow: hidden;

            min-height: 620px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            padding: 48px;


            background:

                linear-gradient(
                    145deg,
                    rgba(30,64,175,.96),
                    rgba(37,99,235,.90),
                    rgba(14,165,233,.85)
                );
        }


        .login-brand::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            right: -90px;
            top: -100px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.10);
        }


        .login-brand::after {
            content: "";

            position: absolute;

            width: 170px;
            height: 170px;

            left: -65px;
            bottom: 90px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);
        }


        .brand-top,
        .brand-middle,
        .brand-footer {
            position: relative;

            z-index: 2;
        }


        .brand-logo {
            display: inline-flex;

            align-items: center;

            gap: 11px;

            color: white;

            font-weight: 800;

            font-size: 15px;

            letter-spacing: .3px;
        }


        .brand-logo-icon {
            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid
                rgba(255,255,255,.20);

            border-radius: 13px;

            background:
                rgba(255,255,255,.13);

            font-size: 23px;

            backdrop-filter:
                blur(10px);
        }


        .brand-middle h1 {
            max-width: 430px;

            margin-bottom: 16px;

            color: white;

            font-size: 38px;

            line-height: 1.15;
        }


        .brand-middle p {
            max-width: 460px;

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

            margin-top: 25px;
        }


        .brand-feature {
            padding: 13px 10px;

            border:
                1px solid
                rgba(255,255,255,.13);

            border-radius: 13px;

            background:
                rgba(255,255,255,.09);

            text-align: center;

            color: white;

            backdrop-filter:
                blur(8px);
        }


        .brand-feature span {
            display: block;

            margin-bottom: 5px;

            font-size: 21px;
        }


        .brand-feature strong {
            display: block;

            font-size: 9px;
        }


        .brand-footer {
            color:
                rgba(255,255,255,.62);

            font-size: 10px;

            line-height: 1.6;
        }



        /* =========================================================
           RIGHT SIDE
        ========================================================= */

        .login-form-section {
            display: flex;

            align-items: center;

            padding: 45px;
        }


        .login-form-container {
            width: 100%;
        }


        .mobile-logo {
            display: none;

            margin-bottom: 22px;

            text-align: center;
        }


        .mobile-logo-icon {
            width: 64px;
            height: 64px;

            margin:
                0 auto 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 18px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #0ea5e9
                );

            color: white;

            font-size: 31px;

            box-shadow:
                0 12px 25px
                rgba(37,99,235,.20);
        }


        .login-heading {
            margin-bottom: 27px;
        }


        .login-heading .welcome {
            display: inline-block;

            margin-bottom: 7px;

            color: #2563eb;

            font-size: 9px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1.2px;
        }


        .login-heading h2 {
            margin-bottom: 7px;

            color: #0f172a;

            font-size: 27px;
        }


        .login-heading p {
            color: #64748b;

            font-size: 11px;

            line-height: 1.6;
        }



        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            display: flex;

            align-items: flex-start;

            gap: 9px;

            margin-bottom: 18px;

            padding: 12px 13px;

            border-radius: 10px;

            font-size: 10px;

            line-height: 1.5;
        }


        .alert-error {
            background: #fff1f2;

            border:
                1px solid #fecdd3;

            color: #9f1239;
        }


        .alert-success {
            background: #ecfdf5;

            border:
                1px solid #bbf7d0;

            color: #166534;
        }


        .alert ul {
            margin: 0;

            padding-left: 16px;
        }



        /* =========================================================
           FORM
        ========================================================= */

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
                42px
                12px
                40px;

            border:
                1px solid #cbd5e1;

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


        .toggle-password {
            position: absolute;

            right: 10px;

            top: 50%;

            transform:
                translateY(-50%);

            width: 31px;
            height: 31px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: none;

            border-radius: 8px;

            background: transparent;

            cursor: pointer;

            color: #64748b;

            font-size: 15px;

            transition: .2s;
        }


        .toggle-password:hover {
            background: #f1f5f9;
        }



        /* =========================================================
           CAPS LOCK
        ========================================================= */

        .caps-warning {
            display: none;

            margin-top: 6px;

            color: #d97706;

            font-size: 8px;
        }



        /* =========================================================
           REMEMBER
        ========================================================= */

        .login-options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 10px;

            margin:
                3px 0
                20px;
        }


        .remember {
            display: flex;

            align-items: center;

            gap: 7px;
        }


        .remember input {
            width: 15px;
            height: 15px;

            accent-color: #2563eb;

            cursor: pointer;
        }


        .remember label {
            color: #475569;

            cursor: pointer;

            font-size: 9px;
        }


        .login-security {
            color: #94a3b8;

            font-size: 8px;
        }



        /* =========================================================
           LOGIN BUTTON
        ========================================================= */

        .btn-login {
            position: relative;

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 13px 16px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            font-size: 11px;

            font-weight: 800;

            cursor: pointer;

            transition: .2s;

            box-shadow:
                0 7px 18px
                rgba(37,99,235,.20);
        }


        .btn-login:hover {
            transform:
                translateY(-1px);

            box-shadow:
                0 10px 22px
                rgba(37,99,235,.30);
        }


        .btn-login:disabled {
            opacity: .7;

            cursor: not-allowed;

            transform: none;
        }


        .btn-loader {
            display: none;

            width: 14px;
            height: 14px;

            border:
                2px solid
                rgba(255,255,255,.4);

            border-top-color: white;

            border-radius: 50%;

            animation:
                spin .7s linear infinite;
        }


        @keyframes spin {

            to {
                transform:
                    rotate(360deg);
            }

        }



        /* =========================================================
           FOOTER
        ========================================================= */

        .login-footer {
            margin-top: 24px;

            padding-top: 18px;

            border-top:
                1px solid #edf2f7;

            text-align: center;

            color: #94a3b8;

            font-size: 8px;

            line-height: 1.7;
        }


        .login-footer strong {
            color: #64748b;
        }



        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 850px) {

            .login-page {
                padding: 20px;
            }


            .login-wrapper {
                max-width: 470px;

                display: block;
            }


            .login-brand {
                display: none;
            }


            .login-form-section {
                padding: 35px;
            }


            .mobile-logo {
                display: block;
            }

        }


        @media(max-width: 500px) {

            .login-page {
                padding: 12px;
            }


            .login-wrapper {
                border-radius: 20px;
            }


            .login-form-section {
                padding:
                    28px
                    22px;
            }


            .login-heading h2 {
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


    <div class="login-wrapper">


        <!-- =====================================================
             BRAND SIDE
        ====================================================== -->

        <section class="login-brand">


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



            <div class="brand-middle">


                <h1>
                    Laundry Lebih Mudah, Cepat & Terorganisir.
                </h1>


                <p>
                    Sistem informasi untuk membantu pengelolaan
                    pelanggan, transaksi, layanan, status cucian,
                    pembayaran, dan laporan Tania Mutiara Laundry.
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



        <!-- =====================================================
             LOGIN FORM
        ====================================================== -->

        <section class="login-form-section">


            <div class="login-form-container">


                <!-- MOBILE LOGO -->

                <div class="mobile-logo">


                    <div class="mobile-logo-icon">
                        🧺
                    </div>


                    <strong>
                        Tania Mutiara Laundry
                    </strong>


                </div>



                <!-- HEADING -->

                <div class="login-heading">


                    <span class="welcome">
                        Administrator Access
                    </span>


                    <h2>
                        Selamat Datang 👋
                    </h2>


                    <p>
                        Masuk menggunakan akun administrator
                        untuk mengakses dashboard dan mengelola
                        sistem laundry.
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

                                @foreach(
                                    $errors->all()
                                    as $error
                                )

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>


                    </div>

                @endif



                <!-- FORM -->

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



                    <!-- OPTIONS -->

                    <div class="login-options">


                        <div class="remember">


                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"

                                {{
                                    old('remember')
                                    ? 'checked'
                                    : ''
                                }}
                            >


                            <label for="remember">

                                Ingat saya

                            </label>


                        </div>


                        <span class="login-security">

                            🔒 Akses administrator

                        </span>


                    </div>



                    <!-- LOGIN BUTTON -->

                    <button
                        type="submit"
                        class="btn-login"
                        id="loginButton"
                    >


                        <span
                            class="btn-loader"
                            id="loginLoader"
                        ></span>


                        <span id="loginButtonIcon">

                            🔐

                        </span>


                        <span id="loginButtonText">

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


    </div>


</div>



<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /*
        |--------------------------------------------------------------------------
        | PASSWORD TOGGLE
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


        if (
            password
            &&
            togglePassword
        ) {

            togglePassword.addEventListener(
                'click',
                function () {

                    const isHidden =
                        password.type ===
                        'password';


                    password.type =
                        isHidden
                        ? 'text'
                        : 'password';


                    togglePassword.textContent =
                        isHidden
                        ? '🙈'
                        : '👁';


                    togglePassword.title =
                        isHidden
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
        | CAPS LOCK WARNING
        |--------------------------------------------------------------------------
        */

        const capsWarning =
            document.getElementById(
                'capsWarning'
            );


        function checkCapsLock(event)
        {
            if (
                !capsWarning
            ) {
                return;
            }


            if (
                event.getModifierState
                &&
                event.getModifierState(
                    'CapsLock'
                )
            ) {

                capsWarning.style.display =
                    'block';

            } else {

                capsWarning.style.display =
                    'none';

            }
        }


        if (
            password
        ) {

            password.addEventListener(
                'keyup',
                checkCapsLock
            );


            password.addEventListener(
                'keydown',
                checkCapsLock
            );


            password.addEventListener(
                'blur',
                function () {

                    if (
                        capsWarning
                    ) {

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


        const loginButtonIcon =
            document.getElementById(
                'loginButtonIcon'
            );


        const loginButtonText =
            document.getElementById(
                'loginButtonText'
            );


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


                    if (
                        loginLoader
                    ) {

                        loginLoader.style.display =
                            'inline-block';

                    }


                    if (
                        loginButtonIcon
                    ) {

                        loginButtonIcon.style.display =
                            'none';

                    }


                    if (
                        loginButtonText
                    ) {

                        loginButtonText.textContent =
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