<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <img class="h-12" src="hwdi.jpg" />
            </div>
            <a href="/login" class="bg-black text-white px-4 py-2 rounded">
                Login
            </a>
        </div>
        <h1 class="text-center text-2xl font-bold mb-6">
            Selamat Datang Administrator HWDI LAMPUNG
        </h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">No</th>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Nama DPC</th>
                        <th class="py-2 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-700">Jumlah Anggota
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">DPC {{ $item->kabupaten }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->jumlah }}</td>
                    </tr>
                    @endforeach
                    @if($data->isEmpty())
                    <tr>
                        <td colspan="3" class="py-2 px-4 text-center">Tidak ada data anggota</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td class="py-2 px-4 text-right font-semibold" colspan="3">
                            Total Anggota: {{ $data->sum('jumlah') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
