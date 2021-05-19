<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title > Trazabilidad Viña</title>
    
        <!-- Custom fonts for this template-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    @livewireStyles
    </head>
    <body id="page-top">
      
        <div class="flex-center position-ref full-height">
        </div>
            <!-- Page Wrapper -->
            <div id="wrapper" >
        
                <!-- Sidebar -->
                <ul class="navbar-nav font-weight-bold bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        
             
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-wine-bottle"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Trazabilidad de Vino</div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        <h5>Administración</h5>
                    </div>
                    
        
         

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('carga')}}" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-cash-register"></i>
                            <span>Generar Código</span>
                        </a>
                    </li>

                      <!-- Nav Item - Tables -->
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('tablas')}}">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Informes</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('graficos')}}">
                            <i class="fas  fa-chart-area "></i>
                            <span>Gráficos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vina') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Utilidades</span>
                        </a> 
                    </li>
                    
                </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                    
            <div id="content-wrapper" class="d-flex flex-column">
                <div class="content fondo">

                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <h1 class="h3 mb-0 text-gray-800">Sistema de Trazabilidad</h1> 
                    </nav>
                    <div class="container-fluid">
                        <div id="contenido" class="card-body">
                         
                            @yield('contentCosecha')
                            @yield('Carga')
                            @yield('Bodega')

                            @yield('presentacion')
                            @yield('contentVina')
                            
                        </div>

                                                    
                            <div id="cuerpo" class="card-body">
                                @yield('codigo')
                            </div>
                    </div>
                </div>
            </div>
                </div>
            </div>


    <script>    
    </script>



          <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
       @livewireScripts
    </body>
</html>
