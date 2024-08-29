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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">
                        <!-- Card DHT11 Sensor -->
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Temperatura y Humedad (DHT11)</h6>

                                </div>
                                <div class="card-body">
                                    <p>Temperatura: {{ $data->temperature ?? 'No disponible' }} °C</p>
                                    <p>Humedad: {{ $data->humidity ?? 'No disponible' }} %</p>
                                    <p>Estado Sensor: {{ $data->status_read_sensor_dht11 ?? 'No conectado' }}</p>

                                </div>
                            </div>
                        </div>

                        <!-- Card Rain Module -->
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sensor de Lluvia</h6>

                                </div>
                                <div class="card-body">
                                    <p>Nivel Luvia: {{ $data->rain ?? 'No disponible' }}</p>
                                    <p>Estado Sensor: {{ $data->status_read_sensor_rain ?? 'No conectado' }}</p>

                                </div>
                            </div>
                        </div>

                        <!-- Card Ground Humidity -->
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Humedad del Suelo</h6>

                                </div>
                                <div class="card-body">
                                    <p>Humedad Suelo: {{ $data->ground ?? 'No disponible' }} </p>
                                    <p>Estado Sensor: {{ $data->status_read_sensor_ground ?? 'No conectado' }}</p>

                                </div>
                            </div>
                        </div>

                        <!-- Card Lux Sensor -->
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sensor de Luz (Lux)</h6>

                                </div>
                                <div class="card-body">
                                    <p>Luminosidad: {{ $data->lux ?? 'No disponible' }} </p>
                                    <p>Estado Sensor: {{ $data->status_read_sensor_lux ?? 'No conectado' }}</p>

                                </div>
                            </div>
                        </div>

                        <!-- Card Water Level Sensor -->
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nivel de Agua</h6>

                                </div>
                                <div class="card-body">
                                    <p>Nivel de agua: {{ $data->water ?? 'No disponible' }} </p>
                                    <p>Estado Sensor: {{ $data->status_read_sensor_water ?? 'No conectado' }}</p>

                                </div>
                            </div>
                        </div>
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




    <!-- Bootstrap core JavaScript-->
@endsection
