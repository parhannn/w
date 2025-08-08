<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HWDI Lampung</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script
        src="https://cdn.tailwindcss.com/3.4.5?plugins=forms@0.5.7,typography@0.5.13,aspect-ratio@0.4.2,container-queries@0.1.1">
    </script>
    <script src="https://ai-public.creatie.ai/gen_page/tailwind-config.min.js" data-color="#000000"
        data-border-radius="small"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">Sistem Informasi Pendataan Penyandang
                        Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.admin') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Admin</a>
                <a href="{{ route('data.anggota.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    <main class="flex-1 py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6 space-y-6">
                <form method="GET" action="{{ route('downloaddpd.export') }}" id="filterForm" class="space-y-4">
                    <!-- Pilih Kabupaten -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Wilayah</label>
                        <select name="kabupaten" id="kabupaten"
                            class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option value="">Semua Kabupaten/Kota</option>
                            @php
                                $kabupatenList = [
                                    'Bandar Lampung',
                                    'Metro',
                                    'Lampung Selatan',
                                    'Lampung Tengah',
                                    'Lampung Utara',
                                    'Lampung Barat',
                                    'Lampung Timur',
                                    'Way Kanan',
                                    'Tulang Bawang',
                                    'Pesawaran',
                                    'Pringsewu',
                                    'Mesuji',
                                    'Tulang Bawang Barat',
                                    'Pesisir Barat',
                                    'Tanggamus',
                                ];
                            @endphp
                            @foreach ($kabupatenList as $item)
                                <option value="{{ $item }}"
                                    {{ request('kabupaten') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Kecamatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option value="">Semua Kecamatan</option>
                        </select>
                    </div>

                    <!-- Pilih Jenis Disabilitas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Jenis Disabilitas</label>
                        <select name="jenis_disabilitas"
                            class="!rounded-button w-full border-gray-300 focus:border-custom focus:ring-custom">
                            <option value="">Semua Jenis Disabilitas</option>
                            @foreach (['Tunanetra', 'Tunawicara', 'Tunarungu', 'Tunalaras', 'Tunagrahita', 'Tunadaksa', 'Disabilitas Ganda'] as $jenis)
                                <option value="{{ $jenis }}"
                                    {{ request('jenis_disabilitas') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Submit -->
                    <div>
                        <div class="flex justify-end">
                            <button
                                class="!rounded-button bg-custom text-white px-6 py-2 hover:bg-custom/90 transition-colors flex items-center gap-2">
                                <i class="fas fa-download"></i>
                                Download
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-gray-100 mt-auto">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-center text-gray-600 text-sm">© 2024 HWDI Lampung. Hak Cipta Dilindungi.</p>
        </div>
    </footer>
    </div>
    <script>
        document.getElementById('kabupaten').addEventListener('change', function() {
            let kabupaten = this.value;
            let kecamatanSelect = document.getElementById('kecamatan');

            kecamatanSelect.innerHTML = '<option value="">Loading...</option>';

            if (kabupaten) {
                fetch(`/dpd/kecamatan?kabupaten=${encodeURIComponent(kabupaten)}`)
                    .then(res => res.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(function(kec) {
                            kecamatanSelect.innerHTML +=
                                `<option value="${kec.nama}">${kec.nama}</option>`;
                        });
                    })
                    .catch(err => {
                        kecamatanSelect.innerHTML = '<option value="">Gagal memuat data</option>';
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kabupaten terlebih dahulu</option>';
            }
        });
    </script>
</body>
