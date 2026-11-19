<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        /*
        |--------------------------------------------------------------------------
        | JIKA ADMIN SUDAH LOGIN
        |--------------------------------------------------------------------------
        |
        | Jika user sudah memiliki session login,
        | maka tidak perlu melihat halaman login lagi.
        |
        */

        if (Auth::check()) {

            return redirect()
                ->route('dashboard');

        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN LOGIN
        |--------------------------------------------------------------------------
        */

        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI FORM
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],

                'password' => [
                    'required',
                    'string',
                ],
            ],
            [
                'email.required' =>
                    'Email admin wajib diisi.',

                'email.email' =>
                    'Format email yang dimasukkan tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'password.required' =>
                    'Password wajib diisi.',

                'password.string' =>
                    'Password tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BERSIHKAN EMAIL
        |--------------------------------------------------------------------------
        */

        $email = strtolower(
            trim(
                $validated['email']
            )
        );


        /*
        |--------------------------------------------------------------------------
        | REMEMBER ME
        |--------------------------------------------------------------------------
        |
        | Jika checkbox "Ingat saya" dicentang,
        | Laravel akan mempertahankan login lebih lama.
        |
        */

        $remember =
            $request->boolean('remember');


        /*
        |--------------------------------------------------------------------------
        | DATA LOGIN
        |--------------------------------------------------------------------------
        */

        $credentials = [
            'email' => $email,

            'password' =>
                $validated['password'],
        ];


        /*
        |--------------------------------------------------------------------------
        | COBA LOGIN
        |--------------------------------------------------------------------------
        */

        if (
            Auth::attempt(
                $credentials,
                $remember
            )
        ) {

            /*
            |--------------------------------------------------------------------------
            | REGENERATE SESSION
            |--------------------------------------------------------------------------
            |
            | Penting untuk mencegah session fixation.
            |
            */

            $request
                ->session()
                ->regenerate();


            /*
            |--------------------------------------------------------------------------
            | LOGIN BERHASIL
            |--------------------------------------------------------------------------
            |
            | intended() akan membawa user kembali ke halaman
            | yang sebelumnya ingin dibuka.
            |
            */

            return redirect()
                ->intended(
                    route('dashboard')
                )
                ->with(
                    'success',
                    'Login berhasil. Selamat datang di Tania Mutiara Laundry.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN GAGAL
        |--------------------------------------------------------------------------
        |
        | Password tidak dikembalikan ke form.
        |
        */

        return back()
            ->withInput([
                'email' => $email,

                'remember' =>
                    $remember
                        ? '1'
                        : null,
            ])
            ->withErrors([
                'email' =>
                    'Email atau password yang Anda masukkan tidak sesuai.',
            ]);
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | LOGOUT USER
        |--------------------------------------------------------------------------
        */

        Auth::logout();


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION LAMA
        |--------------------------------------------------------------------------
        */

        $request
            ->session()
            ->invalidate();


        /*
        |--------------------------------------------------------------------------
        | TOKEN CSRF BARU
        |--------------------------------------------------------------------------
        */

        $request
            ->session()
            ->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Anda berhasil keluar dari sistem.'
            );
    }
}