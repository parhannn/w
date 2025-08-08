<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kabupaten;

class DashboardDPDController extends Controller
{
    public function index()
    {
        // Rekap berdasarkan jenis disabilitas
        $jenisDisabilitas = [
            'Tunanetra', 'Tunarungu', 'Tunawicara',
            'Tunagrahita', 'Tunadaksa', 'Tunalaras', 'Disabilitas Ganda'
        ];

        $disabilitasSummary = [];
        foreach ($jenisDisabilitas as $jenis) {
            $disabilitasSummary[] = [
                'name' => $jenis,
                'value' => Anggota::where('jenis_disabilitas', $jenis)->count()
            ];
        }

        // Rekap berdasarkan kabupaten
        $kabupatens = [
            'Lampung Selatan',
            'Lampung Barat',
            'Lampung Tengah',
            'Mesuji',
            'Pringsewu',
            'Pesisir Barat',
            'Tanggamus',
            'Tulang Bawang',
            'Tulang Bawang Barat',
            'Way Kanan',
            'Bandar Lampung',
            'Metro',
            'Pesawaran',
            'Lampung Utara'
        ];
        $jumlahKabupatenSummary = [];

        foreach ($kabupatens as $kabupaten) {
            $jumlahKabupatenSummary[] = [
                'name' => $kabupaten,
                'value' => Anggota::where('kabupaten', $kabupaten)->count()
            ];
        }

        return view('dashboard-dpd', compact('disabilitasSummary', 'jumlahKabupatenSummary'));
    }
}
