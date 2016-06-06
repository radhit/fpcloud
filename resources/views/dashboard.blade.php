<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOCOLINE | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <script src="swal/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="swal/dist/sweetalert.css">

    <script type="text/javascript">
  function notifkeren(){
  swal("Sukses", "Kontributor Berhasil Ditambahkan", "success")
  }
   function notifkeren2(){
  swal("Sukses", "file berhasil dihapus", "success")
  }
    function notifkerengagal(){
  swal("gagal", "Username yang anda masukan tidak terdaftar", "error")
  }
  </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
  @if (Session::has('berhasil'))
        <script type="text/javascript">notifkeren();</script>
   @elseif (Session::has('berhasildelete'))
        <script type="text/javascript">notifkeren2();</script>
    
    
    @elseif (Session::has('gagal'))
        <script type="text/javascript">notifkerengagal();</script>
    @endif
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">
        		<div class="col-md-4">
        			<div class="box box-info">
        				<div class="box-header with-border">
        					<h3 class="box-title">Status Pengguna</h3>
        				</div>
        				<div class="box-body">
                  @if($status==NULL)
        					<h4>FREE</h4>
                  @else
                  <h4>PREMIUM USER</h4>
                  @endif

        				</div>
        			</div>
        		</div>
        		<div class="col-md-4">
        			<div class="box box-info">
        				<div class="box-header with-border">
        					<h3 class="box-title">Jumlah Dokumen</h3>
        				</div>
        				<div class="box-body">
        					<h4>{{$jumlah}}</h4>
        				</div>
        			</div>
        		</div>

            @if($status==NULL)
        		<div class="col-md-4">
        			<div class="box box-info">
        				<div class="box-header with-border">
        					<h3 class="box-title">Upgrade Paket</h3>
        				</div>
        				<div class="box-body">
                <a href="{{URL::to('profile')}}"class="btn btn-sm btn-warning btn-flat pull-right" style="margin-left:1%" >UPGRADE PREMIUM</a>
        				</div>
        			</div>
        		</div>
        	</div>
          @endif
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Dokumen</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>ID Dokumen</th>
                          <th>Nama Dokumen</th>
                          <th>Terakhir edit</th>
                          <th>Edit</th>
                          <th>Tambah Kontributor</th>
                          <th>Hapus</th>

                        </tr>
                      </thead>
                      <tbody>

                      @foreach($nama as $key)
                        <tr>

                          <td>{{$key['id']}}</td>
                          <td>{{$key['judul']}}</td>
                          <td>{{$key['timestamp']}}</td>
                          <?php $id=$key['id'];?>
                          <td>
                          <?php $flag=$key['flag'];?>
                            @if($flag==NULL||$flag==0)
                            <a href="{{URL::to('editdokumen')}}/{{$key['id']}}" class="btn btn-warning" style="margin-left:1%">EDIT DOKUMEN</a>
                            @else
                            Dokumen sedang dikelola akun lain
                            @endif
                          </td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkontributor{{$id}}" data-id="{{$id}}">Tambah Kontributor</button></td>
                          <td><a href="{{URL::to('deletefile')}}/{{$key['id']}}" class="btn btn-danger" style="margin-left:1%">HAPUS DOKUMEN</a></td>
                        </tr>

                     @endforeach
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix nav nav-tabs">
               
                  <a class="btn btn-sm btn-info btn-flat pull-right" style="margin-left:1%" data-toggle="modal" data-target="#tambahmodal">TAMBAH DOKUMEN</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div id="tambahmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"  style="text-align:center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dokumen Baru</h4>
      </div>
      <div class="modal-body">

      @if(($jumlah<5 && $status==NULL)  || $status!=NULL )

   <form action="http://localhost:5000/tambahdokumen" method="POST">
        <div class="form-group">
          <input name="judul" type="text" placeholder="Judul Dokumen" class="form-control">
        </div>
        <div class="form-group">
          <input name="password" type="password" placeholder="password" class="form-control">
        </div>
         <input name="author" type="hidden" value="{{Auth::user()->id}}">
       
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Tambahkan</button>
    
      </form>
  
  @else
      Batas maksimal pembuatan dokumen anda telah habis silahkan lakukan pembayaran
      @endif

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

   @foreach($nama as $key)
   <div id="tambahkontributor{{$key['id']}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header"  style="text-align:center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kontributor</h4>
      </div>
      <div class="modal-body">
   <form action="{{URL::to('tambahkontributor')}}" method="POST">
        <div class="form-group">
          <input name="kontributor" type="text" placeholder="Masukan username kontributor" class="form-control">
        </div>
        </div>
      <div class="modal-footer">
      <input type="hidden" value="{{$key['id']}}" name="idfile">
      {{csrf_field()}}
       <button type="submit" class="btn btn-primary">Tambahkan</button>
      
      
      </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
