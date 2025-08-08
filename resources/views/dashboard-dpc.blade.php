<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin DPC - Sistem Informasi Pendataan Penyandang Disabilitas</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <header class="bg-white shadow">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="hwdi.jpg" class="h-8 w-auto" />
                    <h1 class="ml-3 text-xl font-semibold text-gray-900">
                        Sistem Informasi Pendataan Penyandang Disabilitas HWDI LAMPUNG
                    </h1>
                </div>
                <a href="{{ route('logout') }}"
                    class="rounded bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>
    <nav class="bg-white shadow-sm">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-8 h-14">
                <a href="{{ route('dashboard.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-custom text-sm font-medium text-gray-900">Ringkasan</a>
                <a href="{{ route('data.anggota.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Data
                    Anggota</a>
                <a href="{{ route('download.data.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Download
                    Data Anggota</a>
                <a href="{{ route('hotline.dpc') }}"
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Hotline</a>
            </div>
        </div>
    </nav>
    </header>
    <main class="container mx-auto px-4 py-6">
        <div class="bg-white rounded shadow-sm p-6 mb-6">
            <h2 class="text-xl font-semibold mb-6">
                Statistik Utama {{ Auth::user()->kabupaten ?? '-' }}
            </h2>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <div id="pieChart" class="h-80 w-full"></div>
                </div>
                <div class="w-full md:w-1/2">
                    <div id="barChart" class="h-80 w-full"></div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kecamatanSummary = @json($dataPerKecamatan);
            const pieChart = echarts.init(document.getElementById('pieChart'));
            const pieOption = {
                animation: false,
                tooltip: {
                    trigger: 'item',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                legend: {
                    orient: 'vertical',
                    left: 10,
                    top: 'center',
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                series: [{
                    name: 'Kecamatan',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    center: ['65%', '50%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 8,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: kecamatanSummary
                }]
            };
            pieChart.setOption(pieOption);
            // Bar Chart
            const disabilitasSummary = @json($disabilitasSummary);
            const jenisDisabilitas = ['Tunanetra', 'Tunarungu', 'Tunawicara', 'Tunagrahita', 'Tunadaksa',
                'Tunalaras', 'Disabilitas Ganda'
            ];

            // Ambil label kecamatan
            const kecamatanLabels = disabilitasSummary.map(item => item.kecamatan);

            // Ambil data per jenis disabilitas
            const seriesData = jenisDisabilitas.map(jenis => ({
                name: jenis,
                type: 'bar',
                stack: 'total',
                emphasis: {
                    focus: 'series'
                },
                data: disabilitasSummary.map(item => item[jenis])
            }));

            const barChart = echarts.init(document.getElementById('barChart'));
            const barOption = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    }
                },
                legend: {
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: kecamatanLabels,
                    axisLabel: {
                        rotate: 45,
                        color: '#1f2937'
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        color: '#1f2937'
                    }
                },
                series: seriesData
            };
            barChart.setOption(barOption);
            window.addEventListener('resize', function() {
                pieChart.resize();
                barChart.resize();
            });
        });
    </script>
    </body>

</html>
