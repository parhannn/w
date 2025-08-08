<!DOCTYPE html>
<html>

<head>
    <title>Data Anggota Himpunan Wanita Disabilitas Indonesia Lampung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 60px;
            height: auto;
        }

        .line {
            border-top: 2px solid black;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .logo {
            width: 60px;
            height: 60px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img class="logo" src="{{ public_path('hwdi.jpg') }}" />
        <h2>Data Anggota HWDI Lampung</h2>
    </div>
    <p>Kabupaten: {{ $kabupaten ?? 'Semua' }}, Kecamatan: {{ $kecamatan ?? 'Semua' }}, Jenis Disabilitas:
        {{ $jenis_disabilitas ?? 'Semua' }}</p>
    <div class="line"></div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Disabilitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $index => $anggota)
                <tr>
                    <td class="border px-4 py-3">{{ $index + 1 }}</td>
                    <td class="border px-4 py-3">{{ $anggota->nama }}</td>
                    <td class="border px-4 py-3">{{ $anggota->nik }}</td>
                    <td class="border px-4 py-3">{{ $anggota->alamat }}</td>
                    <td class="border px-4 py-3">
                        {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td class="border px-4 py-3">{{ $anggota->jenis_disabilitas }}</td>
                </tr>
            @endforeach
            @if ($anggotas->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data {{ $jenis_disabilitas }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
