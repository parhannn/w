<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotlinedpdController extends Controller
{
    public function index()
    {
        // Contoh data yang diambil, bisa kamu ganti sesuai data sebenarnya
        $laporan = [
            ['id' => 1, 'judul' => 'Laporan A', 'status' => 'Diterima'],
            ['id' => 2, 'judul' => 'Laporan B', 'status' => 'Pending'],
        ];

        return view('hotline-dpd', compact('laporan'));
    }

    public function terimaLaporan($id)
    {
        // Logika update status laporan jadi 'Diterima'
        // Contoh: Laporan::find($id)->update(['status' => 'Diterima']);

        return redirect()->route('hotline.dpd')->with('success', 'Laporan sudah diterima.');
    }
}
