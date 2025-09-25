<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HWDI Admin DPC | Hotline</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        custom: '#4169E1',
                    },
                    borderRadius: {
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        @media (max-width: 768px) {
            .max-w-8xl {
                max-width: 100%;
            }

            .container {
                padding: 0 1rem;
            }

            .title {
                display: none;
            }

            .btn-add {
                width: 100%;
                text-align: center;
                font-size: 14px;
            }

            .h2-title {
                display: none;
            }

            table {
                font-size: 12px;
            }
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900 h2-title">Sistem Informasi Pendataan Penyandang
                        Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="rounded bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center space-x-4 sm:space-x-6 lg:space-x-8 h-12 sm:h-14">
                <a href="{{ route('dashboard.dpc') }}"
                    class="inline-flex items-center px-1 sm:px-2 pt-1 border-b-2 border-transparent text-xs sm:text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.anggota.dpc') }}"
                    class="inline-flex items-center px-1 sm:px-2 pt-1 border-b-2 border-transparent text-xs sm:text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpc') }}"
                    class="inline-flex items-center px-1 sm:px-2 pt-1 border-b-2 border-transparent text-xs sm:text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpc') }}"
                    class="inline-flex items-center px-1 sm:px-2 pt-1 border-b-2 border-custom text-xs sm:text-sm font-medium text-gray-900">Layanan Pengaduan</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="px-6 py-8">
        <div class="max-w-7xl mx-auto space-y-6">
            <!-- Page Title + Actions -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                <!-- Judul -->
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 h2-title">
                    Daftar Laporan
                </h2>

                <div class="flex flex-col sm:flex-row sm:items-center gap-4 w-full md:w-auto">
                    <form action="{{ route('hotline.dpc') }}" method="GET"
                        class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <!-- Pencarian -->
                        <input type="text" name="isi_laporan" placeholder="🔎 Cari laporan..."
                            class="pl-4 pr-4 py-2 border rounded-lg w-full sm:w-64 text-sm">
                        
                        <!-- Filter Status -->
                        <select name="status" onchange="this.form.submit()" 
                            class="bg-white border border-gray-300 rounded-button px-4 py-2 pr-8 text-sm text-gray-700">
                            <option value="" {{ request('status')=='' ? 'selected' : '' }}>Semua Status</option>
                            <option value="Menunggu" {{ request('status')=='Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Dibaca" {{ request('status')=='Dibaca' ? 'selected' : '' }}>Ditindaklanjuti</option>
                            <option value="Ditolak" {{ request('status')=='Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </form>

                    <!-- Tombol Buat Laporan -->
                    <a href="{{ route('laporan.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-700 w-full sm:w-auto">
                        <i class="ri-add-line mr-2"></i> Buat Laporan Baru
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Isi Laporan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Kabupaten
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($laporans as $index => $laporan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $laporans->firstItem() + $index }}</td>
                                    <td class="px-6 py-4 whitespace-normal max-w-md">{{ $laporan->isi_laporan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-semibold
                                            {{ $laporan->status == 'Menunggu' ? 'text-yellow-600' : 
                                            ($laporan->status == 'Dibaca' ? 'text-green-600' : 
                                            ($laporan->status == 'Ditolak' ? 'text-red-600' : '')) }}">
                                            {{ $laporan->status == 'Dibaca' ? 'Ditindaklanjuti' : $laporan->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal max-w-md">{{ $laporan->kabupaten }}</td>
                                </tr>
                            @endforeach
                            @if ($laporans->isEmpty())
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada laporan
                                        ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
                <p class="text-sm text-gray-600 text-center sm:text-left">
                    Menampilkan {{ $laporans->firstItem() }} - {{ $laporans->lastItem() }} dari {{ $laporans->total() }} data
                </p>
                <div class="flex items-center space-x-2">
                    @if ($laporans->onFirstPage())
                        <button class="px-3 py-1 border rounded text-sm text-gray-400" disabled>Previous</button>
                    @else
                        <a href="{{ $laporans->previousPageUrl() }}"
                            class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">Previous</a>
                    @endif

                    @foreach ($laporans->getUrlRange(1, $laporans->lastPage()) as $page => $url)
                        @if ($page == $laporans->currentPage())
                            <span
                                class="px-3 py-1 border rounded bg-primary text-white text-sm">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($laporans->hasMorePages())
                        <a href="{{ $laporans->nextPageUrl() }}"
                            class="px-3 py-1 border rounded hover:bg-gray-50 text-sm">Next</a>
                    @else
                        <button class="px-3 py-1 border rounded text-sm text-gray-400" disabled>Next</button>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-100 mt-auto">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-center text-gray-600 text-sm">&copy; 2025 HWDI Lampung - WWN</p>
        </div>
    </footer>
</body>

</html>
