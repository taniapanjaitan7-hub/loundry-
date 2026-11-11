<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatusLaundryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
            ->when($search, function ($query, $search) {
                $query->where('kode_transaksi', 'like', "%{$search}%")
                    ->orWhereHas('pelanggan', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->get();

        $totalProses = Transaksi::whereNotIn('status_laundry', [
            'Selesai',
            'Diambil',
            'Dikirim'
        ])->count();

        $totalSelesai = Transaksi::where('status_laundry', 'Selesai')
            ->count();

        $totalDiambil = Transaksi::whereIn('status_laundry', [
            'Diambil',
            'Dikirim'
        ])->count();

        return view('status.index', compact(
            'transaksis',
            'totalProses',
            'totalSelesai',
            'totalDiambil'
        ));
    }
}