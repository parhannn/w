<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Auth;

class DashboardDpcController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kabupaten_id = $user->kabupaten_id;

        $kecamatans = Kecamatan::where('kabupaten_id', $kabupaten_id)->get();

        // Rekap berdasarkan jenis disabilitas
        $jenisDisabilitas = [
            'Tunanetra', 'Tunarungu', 'Tunawicara',
            'Tunagrahita', 'Tunadaksa', 'Tunalaras', 'Disabilitas Ganda'
        ];

        $disabilitasSummary = [];
        foreach ($kecamatans as $kec) {
            $row = ['kecamatan' => $kec->nama];

            foreach ($jenisDisabilitas as $jenis) {
                $count = Anggota::where('kecamatan', $kec->nama)
                    ->where('jenis_disabilitas', $jenis)
                    ->count();

                $row[$jenis] = $count;
            }

            $disabilitasSummary[] = $row;
        }

        // Buat data anggota per kecamatan
        $dataPerKecamatan = [];
        foreach ($kecamatans as $kec) {
            $anggotaCount = Anggota::where('kecamatan', $kec->nama)->count();

            $dataPerKecamatan[] = [
                'name' => $kec->nama,
                'value' => $anggotaCount
            ];
        }

        return view('dashboard-dpc', [
            'dataPerKecamatan' => $dataPerKecamatan,
            'disabilitasSummary' => $disabilitasSummary
        ]);
    }
}
