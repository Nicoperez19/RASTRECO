@extends('layouts.app')

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Nav Item - Dashboard -->
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" style="max-width: 100%">

                </div>
            </nav>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Inicio
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Datos
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Datos_dht11') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Temperatura y Humedad</span></a>
                <a class="nav-link" href="{{ route('Datos_ground') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Humedad Suelo</span></a>
                <a class="nav-link" href="{{ route('Datos_rain') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Lluvia</span></a>
                <a class="nav-link" href="{{ route('Datos_water') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Nivel Agua</span></a>
                <a class="nav-link" href="{{ route('Datos_lux') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Luminosidad</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column mt-2">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesión') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mt-2">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Tabla de Datos</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos Recolectados</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="row">
                                    <!-- Card con la DataTable (lado izquierdo) -->
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h6 class="m-0 font-weight-bold text-primary">Datos del Sensor DHT11</h6>
                                            </div>
                                            <div class="card-body">
                                                <table id="sensorDataTable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Arduino</th>
                                                            <th>Temperatura</th>
                                                            <th>Humedad</th>
                                                            <th>Estado Sensor</th>
                                                            <th>Hora</th>
                                                            <th>Fecha</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>{{ $item->id_arduino }}</td>
                                                                <td>{{ $item->temperature }}</td>
                                                                <td>{{ $item->humidity }}</td>
                                                                <td>{{ $item->status_read_sensor_dht11 }}</td>
                                                                <td>{{ $item->time }}</td>
                                                                <td>{{ $item->date }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card con el Gráfico (lado derecho) -->
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h6 class="m-0 font-weight-bold text-primary">Gráfico de Temperatura y
                                                    Humedad</h6>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="sensorChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Pie Chart -->

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RASTRECO 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $('#sensorDataTable').DataTable();

            // Datos para el gráfico
            const ctx = document.getElementById('sensorChart').getContext('2d');
            const sensorChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [], // Aquí puedes poner las etiquetas de tiempo
                    datasets: [{
                            label: 'Temperatura',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            data: [] // Aquí los datos de temperatura
                        },
                        {
                            label: 'Humedad',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            data: [] // Aquí los datos de humedad
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Actualizar el gráfico periódicamente
            function updateChart() {
                $.get('/api/sensor-data', function(data) {
                    // Actualizar los datos del gráfico
                    sensorChart.data.labels = data.labels;
                    sensorChart.data.datasets[0].data = data.temperature;
                    sensorChart.data.datasets[1].data = data.humidity;
                    sensorChart.update();
                });
            }

            setInterval(updateChart, 5000); // Actualiza cada 5 segundos
        });
    </script>
@endpush
