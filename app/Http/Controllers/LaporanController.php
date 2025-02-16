<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;


class LaporanController extends Controller
{
    public function halamanNasabah()
    {
        $semuaTransaksi = Transaksi::where('user_id', Auth::id())->get();   
        return view('nasabah.index')->with('semuaTransaksi', $semuaTransaksi);
    }
    public function laporanNasabah()
    {
        $semuaTransaksi = Transaksi::where('user_id', Auth::id())->get();   
        return view('nasabah.laporan')->with('semuaTransaksi', $semuaTransaksi);
    }
    public function cetakLaporan()
    {
        $semuaTransaksi = Transaksi::where('user_id', Auth::id())->get();   
        $pdf = PDF::loadView('nasabah.laporan', ['semuaTransaksi' => $semuaTransaksi]);
        return $pdf->download('Laporan Nasabah.pdf');
    }
    public function laporanTransaksiAdmin()
    {
        $semuaTransaksi = Transaksi::all();   
        return view('admin.laporan')->with('semuaTransaksi', $semuaTransaksi);
    } 
    public function cetakLaporanAdmin()
    {
        $semuaTransaksi = Transaksi::all();   
        $pdf = PDF::loadView('admin.laporan', ['semuaTransaksi' => $semuaTransaksi]);
        return $pdf->download('Laporan Seluruh Nasabah.pdf');
    }
    public function cetakLaporanPilih($id)
    {
        $semuaTransaksi = Transaksi::where('user_id', $id)->get();
        $nasabah = User::find($id); 
        $pdf = PDF::loadView('admin.cetak', ['semuaTransaksi' => $semuaTransaksi, 'nasabah' => $nasabah]);
        return $pdf->download('Laporan Nasabah.pdf');
    }
}
