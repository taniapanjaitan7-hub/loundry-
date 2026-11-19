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
        Terjadi Kesalahan - Tania Mutiara Laundry
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

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 25px;

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #dbeafe
                );

            color: #0f172a;
        }


        .error-card {
            width: 100%;
            max-width: 720px;

            padding: 45px 35px;

            text-align: center;

            background: white;

            border:
                1px solid #e2e8f0;

            border-radius: 26px;

            box-shadow:
                0 20px 55px
                rgba(15,23,42,.11);
        }


        .error-logo {
            width: 78px;
            height: 78px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin:
                0 auto
                20px;

            border-radius: 21px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #0ea5e9
                );

            font-size: 36px;

            box-shadow:
                0 12px 28px
                rgba(37,99,235,.22);
        }


        .error-code {
            margin-bottom: 6px;

            color: #dc2626;

            font-size: 78px;
            font-weight: 900;

            line-height: 1;
        }


        .error-badge {
            display: inline-flex;
            align-items: center;

            gap: 5px;

            margin-bottom: 15px;

            padding: 6px 10px;

            border-radius: 20px;

            background: #fee2e2;

            color: #b91c1c;

            font-size: 9px;
            font-weight: 800;
        }


        h1 {
            margin-bottom: 12px;

            color: #0f172a;

            font-size: 25px;
        }


        .description {
            max-width: 520px;

            margin:
                0 auto
                25px;

            color: #64748b;

            font-size: 12px;

            line-height: 1.7;
        }


        .info-box {
            max-width: 540px;

            margin:
                0 auto
                25px;

            padding: 13px 15px;

            border:
                1px solid #dbeafe;

            border-radius: 11px;

            background: #eff6ff;

            color: #1d4ed8;

            font-size: 9px;

            line-height: 1.6;
        }


        .error-actions {
            display: flex;
            justify-content: center;

            gap: 10px;

            flex-wrap: wrap;
        }


        .error-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            padding: 11px 16px;

            border: none;

            border-radius: 10px;

            cursor: pointer;

            text-decoration: none;

            font-size: 10px;
            font-weight: 700;

            transition: .2s;
        }


        .btn-primary {
            background: #2563eb;

            color: white;
        }


        .btn-primary:hover {
            background: #1d4ed8;

            transform:
                translateY(-1px);
        }


        .btn-secondary {
            background: #f1f5f9;

            color: #475569;

            border:
                1px solid #e2e8f0;
        }


        .btn-secondary:hover {
            background: #e2e8f0;
        }


        .brand {
            margin-top: 30px;

            padding-top: 20px;

            border-top:
                1px solid #edf2f7;

            color: #94a3b8;

            font-size: 9px;

            line-height: 1.7;
        }


        .brand strong {
            color: #64748b;
        }


        @media(max-width: 500px) {

            .error-card {
                padding:
                    35px
                    20px;
            }


            .error-code {
                font-size: 62px;
            }


            h1 {
                font-size: 21px;
            }


            .error-actions {
                flex-direction: column;
            }


            .error-btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="error-card">


    <div class="error-logo">
        🧺
    </div>


    <div class="error-code">
        500
    </div>


    <div class="error-badge">
        ⚠ Kesalahan Sistem
    </div>


    <h1>
        Terjadi Kesalahan pada Sistem
    </h1>


    <p class="description">
        Maaf, sistem Tania Mutiara Laundry sedang mengalami
        kendala saat memproses permintaan Anda.
        Silakan kembali ke dashboard atau coba lagi.
    </p>


    <div class="info-box">
        💡 Data Anda tetap aman. Jika halaman ini muncul
        berulang kali, periksa konfigurasi aplikasi,
        database, atau log Laravel.
    </div>


    <div class="error-actions">


        @auth

            <a
                href="{{ route('dashboard') }}"
                class="error-btn btn-primary"
            >
                🏠 Kembali ke Dashboard
            </a>

        @else

            <a
                href="{{ route('login') }}"
                class="error-btn btn-primary"
            >
                🔐 Kembali ke Login
            </a>

        @endauth


        <button
            type="button"
            class="error-btn btn-secondary"
            onclick="window.location.reload()"
        >
            🔄 Coba Lagi
        </button>


        <a
            href="javascript:history.back()"
            class="error-btn btn-secondary"
        >
            ← Kembali
        </a>


    </div>


    <div class="brand">

        © {{ date('Y') }}

        <strong>
            Tania Mutiara Laundry
        </strong>

        <br>

        Bersih • Wangi • Rapi

    </div>


</div>


</body>

</html>