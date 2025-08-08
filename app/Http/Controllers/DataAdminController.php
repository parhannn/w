<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kecamatan;
use App\Models\Kabupaten; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        $data = $query->where('role', 'dpc')->paginate(20)->withQueryString();

        return view('data-admin', compact('data'));
    }
}