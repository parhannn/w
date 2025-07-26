<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatanList = [
            // Lampung Selatan (kabupaten_id = 1)
            ['nama' => 'Bakauheni', 'kabupaten_id' => 1],
            ['nama' => 'Candipuro', 'kabupaten_id' => 1],
            ['nama' => 'Jati Agung', 'kabupaten_id' => 1],
            ['nama' => 'Kalianda', 'kabupaten_id' => 1],
            ['nama' => 'Katibung', 'kabupaten_id' => 1],
            ['nama' => 'Ketapang', 'kabupaten_id' => 1],
            ['nama' => 'Merbau Mataram', 'kabupaten_id' => 1],
            ['nama' => 'Natar', 'kabupaten_id' => 1],
            ['nama' => 'Palas', 'kabupaten_id' => 1],
            ['nama' => 'Penengahan', 'kabupaten_id' => 1],
            ['nama' => 'Rajabasa', 'kabupaten_id' => 1],
            ['nama' => 'Sidomulyo', 'kabupaten_id' => 1],
            ['nama' => 'Sragi', 'kabupaten_id' => 1],
            ['nama' => 'Tanjung Bintang', 'kabupaten_id' => 1],
            ['nama' => 'Tanjung Sari', 'kabupaten_id' => 1],
            ['nama' => 'Way Panji', 'kabupaten_id' => 1],
            ['nama' => 'Way Sulan', 'kabupaten_id' => 1],

            // Lampung Barat (kabupaten_id = 2)
            ['nama' => 'Balik Bukit', 'kabupaten_id' => 2],
            ['nama' => 'Bandar Negeri Suoh', 'kabupaten_id' => 2],
            ['nama' => 'Batu Brak', 'kabupaten_id' => 2],
            ['nama' => 'Batu Ketulis', 'kabupaten_id' => 2],
            ['nama' => 'Belalau', 'kabupaten_id' => 2],
            ['nama' => 'Gedung Surian', 'kabupaten_id' => 2],
            ['nama' => 'Kebun Tebu', 'kabupaten_id' => 2],
            ['nama' => 'Lumbok Seminung', 'kabupaten_id' => 2],
            ['nama' => 'Pagar Dewa', 'kabupaten_id' => 2],
            ['nama' => 'Sekincau', 'kabupaten_id' => 2],
            ['nama' => 'Sukau', 'kabupaten_id' => 2],
            ['nama' => 'Sumber Jaya', 'kabupaten_id' => 2],
            ['nama' => 'Suoh', 'kabupaten_id' => 2],
            ['nama' => 'Way Tenong', 'kabupaten_id' => 2],
        ];

        foreach ($kecamatanList as $kec) {
            \App\Models\Kecamatan::create($kec);
        }
    }
}
