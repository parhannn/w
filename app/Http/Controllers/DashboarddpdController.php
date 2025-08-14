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

        $disabilitasSummary = [];

        foreach ($jenisDisabilitas as $jenis) {
            $row = ['name' => $jenis];
            foreach ($kabupatens as $kabupaten) {
                $row[$kabupaten] = Anggota::where('jenis_disabilitas', $jenis)
                                        ->where('kabupaten', $kabupaten)
                                        ->count();
            }
            $disabilitasSummary[] = $row;
        }

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
