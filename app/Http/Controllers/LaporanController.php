<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    
    public function create()
    {
        return view('input-laporan'); // pastikan nama file dan folder-nya benar
    }

    public function index()
    {
        if (auth()->user()->role === 'dpd') {
            $laporans = Laporan::with('user')->latest()->get();
        } else {
            $laporans = Laporan::where('pelapor', auth()->user()->name)->with('user')->latest()->get();
        }

        return view('hotline-dpc', compact('laporans'));
    }

    

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'isi_laporan' => 'required|string|min:50',
        ]);
        Laporan::create([
            'isi_laporan' => $request->isi_laporan,
            'status' => 'Menunggu',
            'user_id' => auth()->id(),
            'kabupaten' => $user->kabupaten,
        ]);


        return redirect()->route('hotline.dpc')->with('success', 'Laporan berhasil dikirim!');
    }

    public function terima($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => 'Dibaca']);

        return redirect()->back()->with('success', 'Laporan ditandai telah dibaca.');
    }
}
