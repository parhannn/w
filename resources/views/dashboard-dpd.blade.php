<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HWDI Lampung</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://ai-public.creatie.ai/gen_page/tailwind-custom.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
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
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Ringkasan</a>
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
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-lg font-medium mb-4">Statistik Utama</h2>
            <div class="grid grid-cols-2 gap-8">
                <div id="pieChart" style="height: 300px">
                    <div id="pieChart" style="height: 300px"></div>
                </div>
                <div id="barChart" style="height: 300px"></div>
            </div>
        </div>
        <div class="space-y-8">
            <div class="bg-white rounded-lg shadow" id="tunanetra">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunanetra</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kota Bandar
                            Lampung</span><span class="text-sm text-gray-900">156</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kota Metro</span><span
                            class="text-sm text-gray-900">124</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Lampung
                            Barat</span><span class="text-sm text-gray-900">198</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Lampung
                            Selatan</span><span class="text-sm text-gray-900">245</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Lampung
                            Tengah</span><span class="text-sm text-gray-900">267</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Lampung
                            Timur</span><span class="text-sm text-gray-900">234</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Lampung
                            Utara</span><span class="text-sm text-gray-900">212</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten
                            Mesuji</span><span class="text-sm text-gray-900">167</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten
                            Pesawaran</span><span class="text-sm text-gray-900">178</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Pesisir
                            Barat</span><span class="text-sm text-gray-900">145</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten
                            Pringsewu</span><span class="text-sm text-gray-900">156</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten
                            Tanggamus</span><span class="text-sm text-gray-900">134</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Tulang
                            Bawang</span><span class="text-sm text-gray-900">167</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Tulang Bawang
                            Barat</span><span class="text-sm text-gray-900">145</span></div>
                    <div class="grid grid-cols-2 px-6 py-3"><span class="text-sm text-gray-600">Kabupaten Way
                            Kanan</span><span class="text-sm text-gray-900">156</span></div>
                    <div class="bg-gray-50 grid grid-cols-2 px-6 py-3"><span class="font-medium">Total Anggota
                            Tunanetra</span><span class="font-medium">2340</span></div>
                </div>
            </div>
            <!-- Repeat similar structure for other disability types -->
            <div class="bg-white rounded-lg shadow" id="tunarungu">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunarungu</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure as tunanetra with 1890 total --></div>
            </div>
            <div class="bg-white rounded-lg shadow" id="tunawicara">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunawicara</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure with 1560 total --></div>
            </div>
            <div class="bg-white rounded-lg shadow" id="tunagrahita">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunagrahita</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure with 2100 total --></div>
            </div>
            <div class="bg-white rounded-lg shadow" id="tunadaksa">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunadaksa</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure with 1780 total --></div>
            </div>
            <div class="bg-white rounded-lg shadow" id="tunalaras">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Tunalaras</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure with 1450 total --></div>
            </div>
            <div class="bg-white rounded-lg shadow" id="disabilitasganda">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium">Data Jenis Disabilitas Ganda</h3>
                </div>
                <div class="divide-y divide-gray-200"><!-- Similar structure with 890 total --></div>
            </div>
    </main>
    <script>
        // Pie Chart
        const pieChart = echarts.init(document.getElementById('pieChart'));
        pieChart.setOption({
            animation: false,
            tooltip: {
                trigger: 'item'
            },
            series: [{
                type: 'pie',
                radius: '60%',
                data: [{
                        value: 2340,
                        name: 'Tunanetra'
                    },
                    {
                        value: 1890,
                        name: 'Tunarungu'
                    },
                    {
                        value: 1560,
                        name: 'Tunawicara'
                    },
                    {
                        value: 2100,
                        name: 'Tunagrahita'
                    },
                    {
                        value: 1780,
                        name: 'Tunadaksa'
                    },
                    {
                        value: 1450,
                        name: 'Tunalaras'
                    },
                    {
                        value: 890,
                        name: 'Disabilitas Ganda'
                    },
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });
        // Bar Chart
        const barChart = echarts.init(document.getElementById('barChart'));
        barChart.setOption({
            animation: false,
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: ['Tunanetra', 'Tunarungu', 'Tunawicara', 'Tunagrahita', 'Tunadaksa', 'Tunalaras',
                    'Disabilitas Ganda'
                ],
                axisLabel: {
                    rotate: 45
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: [2340, 1890, 1560, 2100, 1780, 1450, 890, 760, 850, 920, 680, 550],
                type: 'bar',
                color: '#1F4690'
            }]
        });
        window.addEventListener('resize', function() {
            pieChart.resize();
            barChart.resize();
        });
    </script>
