<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login Admin - Tania Mutiara Laundry
    </title>


    <style>

        * {
            box-sizing: border-box;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        body {

            margin: 0;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;


            background:

                linear-gradient(
                    rgba(8, 35, 82, 0.55),
                    rgba(14, 56, 104, 0.70)
                ),

                url("{{ asset('images/laundry-bg.png') }}");


            background-size: cover;

            background-position: center;

            background-repeat: no-repeat;

            padding: 20px;

        }


        .login-card {

            width: 100%;

            max-width: 430px;

            background:
                rgba(255,255,255,.97);

            padding: 38px;

            border-radius: 22px;


            box-shadow:
                0 25px 60px
                rgba(0,0,0,.28);

        }


        .logo {

            text-align: center;

            margin-bottom: 28px;

        }


        .logo-icon {

            width: 75px;

            height: 75px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: center;


            border-radius: 50%;


            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #60a5fa
                );


            color: white;

            font-size: 38px;

            box-shadow:
                0 10px 30px
                rgba(37,99,235,.30);

        }


        .logo h1 {

            margin:
                18px 0
                5px;

            color: #1e3a8a;

            font-size: 27px;

        }


        .logo p {

            margin: 0;

            color: #64748b;

        }


        .form-group {

            margin-bottom: 18px;

        }


        label {

            display: block;

            margin-bottom: 7px;

            font-weight: 600;

            color: #334155;

        }


        input[type="email"],
        input[type="password"],
        input[type="text"] {

            width: 100%;

            padding:
                13px
                14px;

            border:
                1px solid
                #cbd5e1;

            border-radius: 10px;

            font-size: 15px;

            outline: none;

            transition: .2s;

        }


        input:focus {

            border-color:
                #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.12);

        }


        .password-wrapper {

            position: relative;

        }


        .password-wrapper input {

            padding-right: 50px;

        }


        .toggle-password {

            position: absolute;

            right: 12px;

            top: 50%;

            transform:
                translateY(-50%);

            border: none;

            background: transparent;

            cursor: pointer;

            font-size: 19px;

        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 20px;

        }


        .remember input {

            width: 16px;

            height: 16px;

        }


        .remember label {

            margin: 0;

            font-weight: normal;

            font-size: 14px;

            color: #475569;

        }


        .btn-login {

            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: .2s;

        }


        .btn-login:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 8px 20px
                rgba(37,99,235,.30);

        }


        .alert-error {

            background:
                #fee2e2;

            color:
                #991b1b;

            padding: 13px;

            border-radius: 9px;

            margin-bottom: 18px;

            font-size: 14px;

        }


        .alert-success {

            background:
                #dcfce7;

            color:
                #166534;

            padding: 13px;

            border-radius: 9px;

            margin-bottom: 18px;

            font-size: 14px;

        }


        .footer-login {

            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 13px;

            line-height: 1.6;

        }


        @media(max-width: 500px) {

            .login-card {

                padding: 28px 22px;

            }


            .logo h1 {

                font-size: 23px;

            }

        }

    </style>

</head>


<body>


<div class="login-card">


    <div class="logo">


        <div class="logo-icon">

            🧺

        </div>


        <h1>

            Tania Mutiara Laundry

        </h1>


        <p>

            Sistem Informasi Laundry

        </p>


    </div>



    @if(session('success'))

        <div class="alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif



    @if($errors->any())

        <div class="alert-error">

            @foreach($errors->all() as $error)

                <div>

                    • {{ $error }}

                </div>

            @endforeach

        </div>

    @endif



    <form

        action="{{ route('login.process') }}"

        method="POST"

    >


        @csrf



        <div class="form-group">


            <label>

                Email Admin

            </label>


            <input

                type="email"

                name="email"

                value="{{ old('email') }}"

                placeholder="Masukkan email admin"

                required

                autofocus

            >


        </div>



        <div class="form-group">


            <label>

                Password

            </label>


            <div class="password-wrapper">


                <input

                    type="password"

                    name="password"

                    id="password"

                    placeholder="Masukkan password"

                    required

                >


                <button

                    type="button"

                    class="toggle-password"

                    onclick="togglePassword()"

                    title="Tampilkan password"

                >

                    👁

                </button>


            </div>


        </div>



        <div class="remember">


            <input

                type="checkbox"

                name="remember"

                id="remember"

                value="1"

            >


            <label for="remember">

                Ingat saya

            </label>


        </div>



        <button

            type="submit"

            class="btn-login"

        >

            🔐 Masuk ke Dashboard

        </button>


    </form>



    <div class="footer-login">

        © {{ date('Y') }}

        Tania Mutiara Laundry

        <br>

        Bersih • Wangi • Rapi

    </div>


</div>



<script>

    function togglePassword()
    {

        const password =
            document.getElementById(
                'password'
            );


        if (
            password.type ===
            'password'
        ) {

            password.type =
                'text';

        } else {

            password.type =
                'password';

        }

    }

</script>


</body>

</html>