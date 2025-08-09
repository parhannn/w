<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pendataan Penyandang Disabilitas</title>
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
    <style>
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

            .h2-title {
                text-align: center;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900 title">Sistem Informasi Pendataan Penyandang
                        Disabilitas HWDI LAMPUNG</h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="flex flex-wrap justify-center space-x-4 sm:space-x-6 lg:space-x-8 h-12 sm:h-14">
                <a href="{{ route('dashboard.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Ringkasan</a>
                <a href="{{ route('data.admin') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Admin</a>
                <a href="{{ route('data.anggota.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Hotline</a>
            </div>
        </div>
    </nav>
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">

            {{-- Notif sukses dipindah ke sini --}}
            @if (session('success'))
                <div id="success-alert"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4">
                    <span class="block sm:inline text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Daftar Laporan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kabupaten/Kota
                            </th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Isi Laporan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($laporans as $index => $laporan)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $laporan->kabupaten }}</td>
                                <td class="px-4 py-2 whitespace-normal max-w-md">{{ $laporan->isi_laporan }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm">
                                    @if ($laporan->status === 'Menunggu')
                                        <form action="{{ route('laporan.terima', $laporan->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 focus:outline-none text-xs">
                                                <i class="fas fa-check-circle mr-1"></i> Terima Laporan
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-green-600 font-semibold">Laporan sudah diterima.</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if ($laporans->isEmpty())
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">Tidak ada laporan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4 text-center text-sm text-gray-500">
                © 2024 HWDI Lampung. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</body>

</html>
