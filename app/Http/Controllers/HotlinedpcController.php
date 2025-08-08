<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HotlinedpcController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $query = Laporan::query();
        
        $laporans = $query->where('kabupaten', $user->kabupaten)->paginate(15)->withQueryString();

        return view('hotline-dpc', compact('laporans'));
    }

    public function terimaLaporan($id)
    {
        // Logika update status laporan jadi 'Diterima' untuk DPC
        // Contoh: LaporanDpc::find($id)->update(['status' => 'Diterima']);

        return redirect()->route('hotline.dpc')->with('success', 'Laporan sudah diterima.');
    }
}
