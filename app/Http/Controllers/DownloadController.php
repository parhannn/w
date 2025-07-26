<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        // Bisa gunakan path untuk membedakan, atau parameter query
        $path = $request->path();

        if ($path == 'downloaddpd') {
            return view('downloaddpd');
        } elseif ($path == 'downloaddpc') {
            return view('downloaddpc');
        } else {
            abort(404);
        }
    }
}
