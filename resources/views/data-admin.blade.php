<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Admin - HWDI LAMPUNG</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
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
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Admin DPC
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kabupaten/Kota
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Password
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $index => $item)
                            <tr data-id="{{ $item->id }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kabupaten }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="password-mask">********</span>
                                    <span class="password-real hidden">{{ $item->plain_password }}</span>
                                    <button type="button"
                                        class="toggle-password text-blue-600 hover:text-blue-900 ml-2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900 edit-btn" title="Edit"
                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                        data-email="{{ $item->email }}" data-kabupaten="{{ $item->kabupaten }}"
                                        data-password="{{ $item->plain_password }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 delete-btn" title="Hapus"
                                        data-id="{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
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
    <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-user-line text-2xl text-primary"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Form Edit Admin</h1>
                </div>
                <form id="editForm" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Nama Admin DPC</label>
                            <input name="name" type="text" id="editName"
                                class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2"
                                placeholder="Masukkan nama admin" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                            <select name="kabupaten" id="editKabupaten"
                                class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2">
                                <option value="">Pilih Kabupaten/Kota</option>
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
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input name="email" type="email" id="editEmail"
                                class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2"
                                placeholder="Masukkan email" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input name="password" type="password" id="editPassword"
                                class="block w-full !rounded-button border-gray-300 focus:border-custom focus:ring-custom text-lg py-2"
                                placeholder="Masukkan password" />
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit"
                            class="bg-custom text-white px-6 py-2 !rounded-button shadow-md hover:bg-custom-dark transition">
                            Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg w-full">
                        <div class="p-6 border-b">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold">Konfirmasi Hapus</h3>
                                <button id="closeDeleteModal"
                                    class="text-gray-500 hover:text-gray-700 cursor-pointer">
                                    <i class="ri-close-line ri-lg"></i>
                                </button>
                            </div>
                        </div>

                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="p-6">
                                <p class="mb-6">Apakah Anda yakin ingin menghapus data anggota ini? Tindakan ini
                                    tidak
                                    dapat
                                    dibatalkan.</p>
                                <div class="flex justify-end space-x-3">
                                    <button id="cancelDelete"
                                        class="px-4 py-2 border border-gray-300 rounded-button text-gray-700 hover:bg-gray-50 whitespace-nowrap cursor-pointer"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button id="confirmDelete"
                                        class="px-4 py-2 bg-red-600 text-white !rounded-button whitespace-nowrap cursor-pointer"
                                        type="submit">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        $(document).ready(function() {
            function showNotification(message, type) {
                var notification = $('<div class="alert alert-' + type +
                    ' alert-dismissible fade show" role="alert">' + message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );
                $('.container').prepend(notification);
                setTimeout(function() {
                    notification.alert('close');
                }, 3000);
            }

            $('.edit-btn').click(function() {
                $('#editId').val($(this).data('id'));
                $('#editName').val($(this).data('name'));
                $('#editKabupaten').val($(this).data('kabupaten'));
                $('#editEmail').val($(this).data('email'));
                $('#editPassword').val($(this).data('password'));
                $('#editForm').attr('action', '/tambah-admin/' + $(this).data('id'));
                $('#ubahModal').modal('show');
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let formData = form.serializeArray();

                formData.push({
                    name: '_method',
                    value: 'PUT'
                });
                formData.push({
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                });

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#ubahModal').modal('hide');
                        var row = $('tr[data-id="' + $('#editId').val() + '"]');
                        row.find('td:nth-child(1)').text($('#editName').val());
                        row.find('td:nth-child(2)').text($('#editEmail').val());
                        row.find('td:nth-child(3)').text($('#editKabupaten').val());
                        row.find('td:nth-child(4)').text($('#editPassword').val());
                        showNotification('Data berhasil diperbarui.', 'success');

                        location.reload();
                    },
                    error: function(xhr) {
                        $('#ubahModal').modal('hide');
                        showNotification('Gagal memperbarui data.', 'danger');
                    }
                });
            });

            $('.delete-btn').click(function() {
                $('#editId').val($(this).data('id'));
                $('#editName').val($(this).data('name'));
                $('#editKabupaten').val($(this).data('kabupaten'));
                $('#editEmail').val($(this).data('email'));
                $('#editPassword').val($(this).data('password'));
                $('#editForm').attr('action', '/tambah-admin/' + $(this).data('id'));
                $('#hapusModal').modal('show');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const url = `/tambah-admin/${id}`;
                    deleteForm.setAttribute('action', url);
                });
            });
        });
    </script>
</body>

</html>
