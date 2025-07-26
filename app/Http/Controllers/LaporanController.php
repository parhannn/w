<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

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
    $request->validate([
        'isi_laporan' => 'required|string|min:50',
    ]);
        Laporan::create([
    'pelapor' => auth()->user()->name,
    'isi_laporan' => $request->isi_laporan,
    'status' => 'Diterima',
    'user_id' => auth()->id(),
]);


    return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim!');
}

    public function terima($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => 'Dibaca']);

        return redirect()->back()->with('success', 'Laporan ditandai telah dibaca.');
    }
}
