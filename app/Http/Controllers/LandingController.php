<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $data = Anggota::select('kabupaten', DB::raw('count(*) as jumlah'))
                    ->groupBy('kabupaten')
                    ->get();

        return view('landing', compact('data'));
    }
}
