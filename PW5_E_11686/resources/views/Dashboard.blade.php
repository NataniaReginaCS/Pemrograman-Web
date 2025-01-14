<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content= "width=device-width, initial-scale=1.0" >
    <title>PW5_E_11686</title>

    <style>
        /* Warna sidebar dengan gradasi */
        .main-sidebar {
            background: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);
        }

        /* Mengubah navbar dengan bayangan */
        .main-header {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover pada sidebar menu */
        .nav-sidebar .nav-item .nav-link {
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .nav-sidebar .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Gaya card lebih modern */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        /* Efek interaktif pada modal */
        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #3498db;
            color: white;
        }

        .btn-close {
         background-color: white;
        }

        /* Footer styling */
        .main-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
    </style>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro: 300, 400, 400i, 700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    <!-- Boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GASXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-right-from-bracket"></i>  
                        Logout  
                    </button>

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>

        </nav>
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('img/primefit.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Primefit Indonesia</span>
            </a>
            
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Natania Regina C.S.</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('gyms/index') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p> Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('gyms/presensi') }}" class="nav-link">
                                <i class="fa-solid fa-check" style="margin-left: 6px;"></i>
                                <p style="margin-left: 10px;"> Presensi</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
                
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>
                
        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                220711686
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Primefit</a>. </strong> All rights reserved.
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header" style="background-color: blue;">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah ingin Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-footer">         
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href= "{{ url('/') }}">
                    <button type="button" class="btn btn-danger">Logout</button>
                </a>
            </div>
        </div>
    </div>
            
    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh950GNyZPhcTNXj1NW7RuBCsyN/o0j1pcV8Qyq46cDfL"
          crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminlte.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')

        if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
        }
    </script>
</body>
</html>