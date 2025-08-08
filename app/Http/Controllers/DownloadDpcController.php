<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Mpdf\Mpdf;

class DownloadDpcController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan');
        }

        // Ambil kabupaten dari kabupaten user
        $kabupaten = $user->kabupaten;
        $kabupatenId = $user->kabupaten_id;

        // Ambil kecamatan sesuai kabupaten tersebut
        $kecamatans = Kecamatan::where('kabupaten_id', $kabupatenId)->get();

        return view('downloaddpc', compact('kabupaten', 'kecamatans', 'user'));
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

        $html = view('pdf-dpc', compact('anggotas', 'kabupaten', 'kecamatan', 'jenis_disabilitas'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        $filename = 'Data Anggota';

        if ($kabupaten || $kecamatan || $jenis_disabilitas) {
            $filename .= ' - Filtered';
        }

        return $mpdf->Output($filename . '.pdf', 'D');
    }
}