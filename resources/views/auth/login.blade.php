<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - Tania Mutiara Laundry</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
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
                    rgba(14, 56, 104, 0.65)
                ),
                url("{{ asset('images/laundry-bg.png') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-card {
            width: 100%;
            max-width: 430px;

            background: rgba(255, 255, 255, 0.96);

            padding: 35px;

            border-radius: 20px;

            box-shadow:
                0 20px 50px
                rgba(0, 0, 0, 0.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo .icon {
            font-size: 55px;
        }

        .logo h1 {
            margin: 10px 0 5px;
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

            font-weight: bold;
            color: #334155;
        }

        input {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #cbd5e1;
            border-radius: 10px;

            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.12);
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

            transform: translateY(-50%);

            border: none;
            background: transparent;

            cursor: pointer;
            font-size: 18px;
        }

        .btn-login {
            width: 100%;

            padding: 13px;

            border: none;
            border-radius: 10px;

            background: #2563eb;
            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 18px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 18px;
        }

        .footer {
            text-align: center;

            margin-top: 25px;

            color: #64748b;
            font-size: 13px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 18px;
        }

        .remember input {
            width: auto;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">

        <div class="icon">
            🧺
        </div>

        <h1>
            Tania Mutiara Laundry
        </h1>

        <p>
            Login Admin
        </p>

    </div>


    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert-error">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
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
            >

            <label
                for="remember"
                style="margin:0; font-weight:normal;"
            >
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


    <div class="footer">

        © {{ date('Y') }}
        Tania Mutiara Laundry

        <br>

        Sistem Informasi Laundry

    </div>

</div>


<script>

function togglePassword()
{
    const password =
        document.getElementById('password');

    if (password.type === 'password') {

        password.type = 'text';

    } else {

        password.type = 'password';

    }
}

</script>

</body>
</html>