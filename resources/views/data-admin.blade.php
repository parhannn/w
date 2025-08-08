<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Admin - HWDI LAMPUNG</title>
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
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Data
                    Admin</a>
                <a href="{{ route('data.anggota.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpd') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <a href="{{ route('create.admin') }}">
                <button
                    class="!rounded-button bg-custom text-white px-4 py-2 text-sm font-medium hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-custom focus:ring-offset-2">
                    <i class="fas fa-plus mr-2"></i>Tambah Admin
                </button>
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden !rounded-button">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Admin DPC</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kabupaten/Kota</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Password</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($data as $index => $item)
                        <tr data-id="{{ $item->id }}"c>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kabupaten }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="password-mask">********</span>
                                <span class="password-real hidden">{{ $item->plain_password }}</span>
                                <button type="button" class="toggle-password text-blue-600 hover:text-blue-900 ml-2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 space-x-2">
                                <button class="text-blue-600 hover:text-blue-900" title="Edit"><i
                                        class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900" title="Hapus"><i
                                        class="fas fa-trash-alt"></i></button>
                                <button class="text-yellow-600 hover:text-yellow-900" title="Generate Password"><i
                                        class="fas fa-key"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
    <script>
        document.querySelectorAll('.toggle-password').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const row = btn.closest('td');
                const mask = row.querySelector('.password-mask');
                const real = row.querySelector('.password-real');

                if (mask.classList.contains('hidden')) {
                    mask.classList.remove('hidden');
                    real.classList.add('hidden');
                    btn.innerHTML = '<i class="fas fa-eye"></i>';
                } else {
                    mask.classList.add('hidden');
                    real.classList.remove('hidden');
                    btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                }
            });
        });
    </script>
</body>
</html>
