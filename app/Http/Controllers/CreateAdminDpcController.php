<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateAdminDpcController extends Controller
{
    public function index(Request $request)
    {
        return view('tambah-admin');
    }

    public function store(Request $request)
    {
        $kabupaten = $request->input('kabupaten');

        $kabupatenId = null;

        switch ($kabupaten) {
            case 'Lampung Selatan':
                $kabupatenId = 1;
                break;
            case 'Lampung Barat':
                $kabupatenId = 2;
                break;
            case 'Lampung Tengah':
                $kabupatenId = 3;
                break;
            case 'Lampung Timur':
                $kabupatenId = 4;
                break;
            case 'Mesuji':
                $kabupatenId = 5;
                break;
            case 'Pringsewu':
                $kabupatenId = 6;
                break;
            case 'Pesisir Barat':
                $kabupatenId = 7;
                break;
            case 'Tanggamus':
                $kabupatenId = 8;
                break;
            case 'Tulang Bawang':
                $kabupatenId = 9;
                break;
            case 'Tulang Bawang Barat':
                $kabupatenId = 10;
                break;
            case 'Way Kanan':
                $kabupatenId = 11;
                break;
            case 'Bandar Lampung':
                $kabupatenId = 12;
                break;
            case 'Metro':
                $kabupatenId = 13;
                break;
            case 'Pesawaran':
                $kabupatenId = 14;
                break;
            case 'Lampung Utara':
                $kabupatenId = 15;
                break;
            default:
                $kabupatenId = null;
                break;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'plain_password' => $request->password,
            'role' => 'dpc',
            'kabupaten' => $kabupaten,
            'kabupaten_id' => $kabupatenId
        ]);

        return redirect()->route('data.admin')->with('success', 'Laporan berhasil dikirim!');
    }
}

