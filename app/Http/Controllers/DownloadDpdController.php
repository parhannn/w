<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Mpdf\Mpdf;

class DownloadDpdController extends Controller
{
    public function index()
    {
        $kecamatans = [];

        return view('downloaddpd', compact('kecamatans'));
    }

    public function getKecamatan(Request $request)
    {
        $kabupaten = $request->input('kabupaten');
        $kabupatenId = $this->getKabupatenId($kabupaten);

        $kecamatans = [];
        if ($kabupatenId) {
            $kecamatans = Kecamatan::where('kabupaten_id', $kabupatenId)->get();
        }

        return response()->json($kecamatans);
    }

    public function export(Request $request)
    {
        $kabupaten = $request->input('kabupaten');
        $kecamatan = $request->input('kecamatan');
        $jenis_disabilitas = $request->input('jenis_disabilitas');

        $anggotas = Anggota::query();

        if ($kabupaten) {
            $anggotas->where('kabupaten', $kabupaten);
        }

        if ($kecamatan) {
            $anggotas->where('kecamatan', $kecamatan);
        }
        
        if ($jenis_disabilitas) {
            $anggotas->where('jenis_disabilitas', $jenis_disabilitas);
        }

        $anggotas = $anggotas->orderBy('nama')->get();

        $html = view('pdf-dpd', compact('anggotas', 'kabupaten', 'kecamatan', 'jenis_disabilitas'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        $filename = 'Data Anggota';

        if ($kabupaten || $kecamatan || $jenis_disabilitas) {
            $filename .= ' - Filtered';
        }

        return $mpdf->Output($filename . '.pdf', 'D');
    }
    
    private function getKabupatenId($kabupaten)
    {
        return match ($kabupaten) {
            'Lampung Selatan' => 1,
            'Lampung Barat' => 2,
            'Lampung Tengah' => 3,
            'Lampung Timur' => 4,
            'Mesuji' => 5,
            'Pringsewu' => 6,
            'Pesisir Barat' => 7,
            'Tanggamus' => 8,
            'Tulang Bawang' => 9,
            'Tulang Bawang Barat' => 10,
            'Way Kanan' => 11,
            'Bandar Lampung' => 12,
            'Metro' => 13,
            'Pesawaran' => 14,
            'Lampung Utara' => 15,
            default => null,
        };
    }
}