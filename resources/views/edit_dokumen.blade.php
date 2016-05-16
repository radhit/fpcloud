<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Docoline | Edit Dokumen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{URL::to ('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::to ('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to ('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::to ('dist/css/skins/_all-skins.min.css')}}">
    <script type="text/javascript" src="{{URL::to ('ckeditor/ckeditor.js')}}"></script>
     <script src="{{URL::to ('swal/dist/sweetalert.min.js')}}"></script> 
    <link rel="stylesheet" type="text/css" href="{{URL::to ('swal/dist/sweetalert.css')}}">

  <script type="text/javascript">
  function notifkeren(){
  swal("Sukses", "Dokumen berhasil disimpan", "success")
  }
  </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index_dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Docoline</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">{{Auth::user()->username}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{URL::to('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="{{URL::to('dashboard')}}">
                <i class="fa fa-files-o"></i> <span>Dokumen</span>
              </a>
            </li>
             <li>
              <a href="{{URL::to('sharedfile')}}">
                <i class="fa fa-files-o"></i> <span>Dokumen Berbagi</span>
              </a>
            </li>
            <li>
              <a href="{{URL::to('profile')}}">
                <i class="fa fa-laptop"></i> <span>Profil</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  @if (Session::has('berhasilsave'))
        <script type="text/javascript">notifkeren();</script>
    
    @elseif (Session::has('gagal'))
        <script type="text/javascript">notifkerengagal();</script>
    @endif
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kelola Dokumen
            <small>Docoline</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
               <form action="{{URL::to('updatekonten')}}" method="post" enctype="multipart/form-data">
                <hr/>
                @foreach($konten as $key)

                  

                  <h3>Nama Dokumen : {{$key->judul}}</h3>
                   <textarea class="ckeditor" name="editor">{{$key->konten}}</textarea>
                  <!-- Dropdown id dan nama dokumen-->
                 </select>
                 <br>
                  {{csrf_field()}}
                  <input type="hidden" value="{{$key->id}}" name="id">
                   <input type="hidden" value="{{$key->judul}}" name="username">
                <button type="submit" class="btn btn-sm btn-success btn-flat pull-right">Simpan</button>
               </form>
                <form action="{{URL::to('savefile')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" value="{{$key->judul}}" name="username">
                  
                   {{csrf_field()}}
                <button type="submit" class="btn btn-sm btn-warning btn-flat pull-right">Download</button>
                </form>
               @endforeach
              
              
                
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{URL::to ('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{URL::to ('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{URL::to ('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="{{URL::to ('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{URL::to ('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{URL::to ('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{URL::to ('plugins/chartjs/Chart.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{URL::to ('dist/js/pages/dashboard2.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to ('dist/js/demo.js')}}"></script>
  </body>
</html>
