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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
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
    @php
        $jenisDisabilitas = [
            'Tunanetra',
            'Tunarungu',
            'Tunawicara',
            'Tunagrahita',
            'Tunadaksa',
            'Tunalaras',
            'Disabilitas Ganda',
        ];
    @endphp

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-lg font-medium mb-4">Statistik Utama</h2>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2">
                <div id="pieChart" style="height: 300px" class="h-64 sm:h-72 md:h-80 w-full"></div>
            </div>
            <div class="w-full md:w-1/2">
                <div id="barChart" style="height: 300px" class="h-64 sm:h-72 md:h-80 w-full"></div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4 text-center text-sm text-gray-500">
                © 2024 HWDI Lampung. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        const pieChart = echarts.init(document.getElementById('pieChart'));
        const barChart = echarts.init(document.getElementById('barChart'));

        const disabilitasSummary = @json($disabilitasSummary);
        const kabupatenSummary = @json($jumlahKabupatenSummary);

        pieChart.setOption({
            title: {
                text: 'Jumlah Anggota per Kabupaten',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            series: [{
                type: 'pie',
                radius: '60%',
                data: kabupatenSummary,
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });

        barChart.setOption({
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: disabilitasSummary.map(item => item.name),
                axisLabel: {
                    rotate: 45
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: disabilitasSummary.map(item => item.value),
                type: 'bar',
                color: '#1F4690'
            }]
        });

        window.addEventListener('resize', function() {
            pieChart.resize();
            barChart.resize();
        });
    </script>
</body>

</html>
