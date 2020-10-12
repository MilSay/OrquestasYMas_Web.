<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>appOrquesta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.app.css')}}">
    <!--agregado -->
    <link rel="stylesheet" href="{{asset('fontawesome/all.css')}}">

    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">

    <link rel="stylesheet" href="{{asset('timePicker/bootstrap-clockpicker.min.css')}}">
<!-- end agregado -->

    <link rel="stylesheet" href="{{asset('css/fileuploader.scss')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>O</b>R</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>appOrquesta</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->       
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                   <img src="/persona/fotos/{{Auth::user()->Foto }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                   {{Auth::user()->Nombres }} {{Auth::user()->Apellidos }}<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{'url'('seguridad/perfil')}} "><i class="fa fa-btn fa-user"></i>Profile</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </li>                   
        </ul>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
           
            <li class="treeview">
              @if(Auth::user()->idRol == '29' || Auth::user()->idRol == '26' || Auth::user()->idRol == '27' )
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Contrato</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              @endif
              <ul class="treeview-menu">
              @if(Auth::user()->idRol == '29' || Auth::user()->idRol == '26' || Auth::user()->idRol == '27')
                <li><a href="{{'url'('contrato/contrato')}}"><i class="far fa-circle"></i></i> Contratos</a></li>
              @endif
              @if(Auth::user()->idRol == '29' || Auth::user()->idRol == '27')
                <li><a href="{{'url'('contrato/agrupacion')}}"><i class="far fa-circle"></i> Agrupación</a></li>
              @endif
              @if( Auth::user()->idRol == '29' || Auth::user()->idRol == '26' || Auth::user()->idRol == '27')
                <li><a href="{{'url'('contrato/evento')}}"><i class="far fa-circle"></i> Eventos</a></li>
              @endif
              </ul>
            </li>
            
            <li class="treeview">
            @if(Auth::user()->idRol == '29')
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Item</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              @endif
              @if(Auth::user()->idRol == '29')
              <ul class="treeview-menu">
                <li><a href="{{'url'('item/enumerado')}}"><i class="far fa-circle"></i> Enumerados</a></li>                
              </ul>
              @endif
            </li>    
            <li class="treeview">
            @if(Auth::user()->idRol == '29' || Auth::user()->idRol == '27')       
             <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              @endif 
              @if(Auth::user()->idRol == '29' || Auth::user()->idRol == '27') 
              <ul class="treeview-menu">
                <li><a href="{{'url'('seguridad/persona')}}"><i class="far fa-circle"></i> Personas</a></li>                
              </ul>  
              @endif 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Orquesta</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div >
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2019 <a href="">appOrquesta</a>.</strong> All rights reserved.
      </footer>
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/FileUploader.js')}}"></script>
      @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
   <!-- Scripts -->
   <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <script src="{{asset('timePicker/bootstrap-clockpicker.min.js')}}"></script>

  </body>
</html>
