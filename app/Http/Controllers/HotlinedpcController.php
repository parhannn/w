<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HotlinedpcController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Laporan::query();
        
        if ($request->filled('isi_laporan')) {
            $query->where('kabupaten', $user->kabupaten);
            $query->where('isi_laporan', 'like', '%' . $request->isi_laporan . '%');
        }
    
        if ($request->filled('status')) {
            $query->where('kabupaten', $user->kabupaten);
            $query->where('status', $request->status);
        }
        
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
