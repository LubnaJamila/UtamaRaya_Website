@extends('backend.template')
@section('content')
    <style>
      
        .card {
            border-radius: 10px;
            border: 2px solid #FFA500;

        }

        .card-info {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #1E90FF;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-warning {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #FFA500;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-succes {
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            background: #28a745;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 700
        }

        .card-body {
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <div class="container dashboard-validasi mt-4">
        <h5 class="card-title mb-2">Data Langganan UMKM</h5>
        <div class="row mb-3">
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-info text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">Check In</h5>
                        <hr>
                        <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-succes text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">UMKM Aktif</h5>
                        <hr>
                         <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="card card-warning text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title-content">New Booking</h5>
                        <hr>
                         <h1 class="card-content">50</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6 mb-3">
                <div class="card mt-2">
                    <div class="card-body justify-content-center align-items-center">
                        <div class="text-center">
                            <h5 class="card-title">Total Booking per Bulan</h5>
                            <canvas id="bookingChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <div class="card mt-2">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <h5 class="card-title">Status UMKM</h5>
                            <canvas id="umkmChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const bookingData = @json($monthlyBookings);
        const bookingLabels = bookingData.map(item => item.month);
        const bookingValues = bookingData.map(item => item.total);

        const bookingCtx = document.getElementById('bookingChart').getContext('2d');
        const bookingChart = new Chart(bookingCtx, {
            type: 'line',
            data: {
                labels: bookingLabels,
                datasets: [{
                    label: 'Total Booking',
                    data: bookingValues,
                    backgroundColor: '#8B0000',
                    borderColor: '#8B0000',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 0.5)'
                        },
                        ticks: {
                            color: '#000'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 0.5)'
                        },
                        ticks: {
                            color: '#000'
                        }
                    }
                },
                layout: {
                    padding: 20
                },
                elements: {
                    line: {
                        borderWidth: 4
                    },
                    point: {
                        radius: 5
                    }
                }
            }
        });

        const umkmData = @json($umkmStatuses);
        const umkmLabels = umkmData.map(item => item.status);
        const umkmValues = umkmData.map(item => item.count);

        const umkmColors = [
            '#FFD700',
            '#1E90FF',
            '#ff0000'
        ];

        const umkmBorders = [
            '#FFD700',
            '#1E90FF',
            '#ff0000'
        ];

        const umkmCtx = document.getElementById('umkmChart').getContext('2d');
        const umkmChart = new Chart(umkmCtx, {
            type: 'pie',
            data: {
                labels: umkmLabels,
                datasets: [{
                    label: 'Status UMKM',
                    data: umkmValues,
                    backgroundColor: umkmColors,
                    borderColor: umkmBorders,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
