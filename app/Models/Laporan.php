<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
    'pelapor', 'isi_laporan', 'status', 'user_id',

    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
