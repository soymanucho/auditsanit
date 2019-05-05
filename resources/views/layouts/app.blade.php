<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Auditoría Sanitaria') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="{{ asset('css/loader.css') }}"  rel="stylesheet">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
  .ui-datepicker{z-index:1151 !important;}
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-stethoscope "></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Auditoría Sanitaria <b class="fa fa-stethoscope"></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Mostrar navegación</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          @guest
            <li class="nav-item">
                @if (Route::has('login'))
                    <a class="nav-link" href={!! route('login') !!}>Iniciar Sesión</a>
                @endif
            </li>
          @else

            @include('layouts.notifications')

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user-o"></i>
                <span class="hidden-xs">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="\img\avatar.svg" class="img-circle" alt="User Image">

                  <p>
                    {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} -  {{Auth::user()->email}}
                    <small>Miembro desde {{ Auth::user()->created_at}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Usuarios</a>
                    </div>
                    <div class="col-xs-8 text-center">
                      <a href="#">Estadísticas de Uso</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{route('profile-show')}}" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">

                    <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> {{ __('Cerrar Sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                  </div>
                </li>
              </ul>
            </li>
          @endguest
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @guest
      Iniciar Sesión
    @else
      <section class="sidebar">

          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ PRINCIPAL</li>

            <li>
              <a href="{{route('home')}}">
                <i class="fa fa-chart-line"></i> <span> INICIO</span>
              </a>
            </li>

            <li>
              <a href="{{route('show-audits')}}">
                <i class="fa fa-search"></i> <span> Auditorías</span>
              </a>
            </li>
            @hasanyrole('Administrador|Backoffice')
              <li class=" treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span> Personas</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('show-medics')}}"><i class="fa fa-search"></i> Medicos</a></li>
                  <li><a href="{{route('show-auditors')}}"><i class="fa fa-plus-circle "></i> Auditores</a></li>
                  <li><a href="{{route('show-patients')}}"><i class="fa fa-plus-circle "></i> Afiliados</a></li>
                  <li><a href="{{route('show-vendors')}}"><i class="fa fa-search "></i> Prestadores</a></li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-search"></i> <span>Usuarios</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{route('users-show')}}"><i class="fa fa-search "></i> Usuarios</a></li>
                      <li><a href="{{route('invite')}}"><i class="fa fa-plus "></i> Invitar</a></li>
                    </ul>
                  </li>

                  {{-- <li><a href="{{route('show-users')}}"><i class="fa fa-plus-circle "></i> Usuarios</a></li> --}}
                  {{-- <li><a href=""><i class="fa fa-plus-circle "></i> Prestadores</a></li> --}}
                </ul>
              </li>

              <li class=" treeview">
                <a href="#">
                  <i class="fas fa-boxes"></i> <span> Datos Maestros</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                {{-- <li><a href=""><i class="fa fa-search"></i> Tipos de Diagnosticos</a></li>
                <li><a href=""><i class="fa fa-search"></i> Tipos de Indicaciones</a></li>
                <li><a href=""><i class="fa fa-search"></i> Estados de Auditoria</a></li> --}}
                <li><a href="{{route('show-instructions')}}"><i class="fa fa-search"></i> Instrucciones</a></li>
                 <li><a href="{{route('show-objectives')}}"><i class="fa fa-search"></i> Objetivos</a></li>
                <li><a href="{{route('show-recommendations')}}"><i class="fa fa-search"></i> Recomendaciones</a></li>
                <li><a href="{{route('show-status')}}"><i class="fa fa-search"></i> Estados</a></li>
                <li><a href="{{route('show-diagnosisType')}}"><i class="fa fa-search"></i> Tipo Diagnostico</a></li>
                <li><a href="{{route('show-indicationType')}}"><i class="fa fa-search"></i> Tipo Indicacion</a></li>
                <li><a href="{!! route('show-clients') !!}"><i class="fa fa-search"></i> Clientes</a></li>

                {{-- <li><a href=""><i class="fa fa-search"></i> Tipos de Prestaciones</a></li> --}}

                </ul>
              </li>

              <li class=" treeview">
                <a href="#">
                  <i class="fas fa-sitemap"></i> <span> Modulo</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('show-moduletypes')}}"><i class="fa fa-search"></i> Tipos de modulo</a></li>
                   <li><a href="{{route('show-modulecategories')}}"><i class="fa fa-search"></i> Categorias de Modulos</a></li>
                <li><a href="{{route('show-module')}}"><i class="fa fa-search"></i> Modulos</a></li>
                </ul>
              </li>
            @endhasanyrole
            @role('Auditor')
              <li class=" treeview">
                <a href="#">
                  <i class="fas fa-sitemap"></i> <span>Auditor</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                   <li><a href="{{route('show-audior-asigned-services')}}"><i class="fa fa-search"></i> Pendientes de Aceptar</a></li>

                </ul>
              </li>
            @endrole

      </section>
    @endguest

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('content-header')
      <ol class="breadcrumb">
        @yield('breadcrumb-items')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="preloaders" class="preloader"
        style="position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('img/sliding_square_loader_view.gif') 50% 50% no-repeat rgb(74,72,75);
                opacity: .8;"
        ></div>
        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href=""{{route('home')}}"">Auditoría sanitaria</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab"></div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab"></div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- ./wrapper -->
<script type="text/javascript">
  $(window).on('load', function()
  {
   $("#preloaders").fadeOut(100);
   // $('body').removeClass('#preloaders');
  });
</script>
<!-- jQuery 3 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!-- Sparkline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/1.2.2/jquery-jvectormap.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.js"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/amd/bootstrap3-wysihtml5.all.min.js"></script> --}}
<!-- Slimscroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.5/js/demo.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready( function () {

  $('#myTable').DataTable( {
        "scrollX": true,
        "select": true,
        "responsive": true,
         "order": [],
         "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    } );



} );
$('.select2').select2({
  placeholder: 'Seleccioná una opción',
  theme: "classic"
  });

</script>
<script type="text/javascript">
  window.addEventListener('load',function() {
  	$(".fancybox").fancybox({
  		maxWidth	: 1600,
      minWidth	: 1000,
  		maxHeight	: 300,
  		fitToView	: true,
  		width		: '100%',
  		height		: '50%',
  		autoSize	: true,
  		closeClick	: false,
  		openEffect	: 'none',
  		closeEffect	: 'none',
      type: 'ajax',
      afterClose: function(){
        window.location.reload(true);
        console.log('holi?');
      }
  	});
  });
</script>
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'report',{
  removeButtons: '',
  uiColor: '#d1cfc7',
  });
CKEDITOR.config.height = '500px'
// CKEDITOR.config.toolbarLocation = 'bottom';
// CKEDITOR.config.readOnly = true;
</script>
<script>
CKEDITOR.replace( 'report1',{
  removeButtons: '',
  uiColor: '#d1cfc7',
  });
CKEDITOR.config.height = '500px'
// CKEDITOR.config.toolbarLocation = 'bottom';
// CKEDITOR.config.readOnly = true;
</script>

</body>
</html>
