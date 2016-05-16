<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOCOLINE</title>

    <!--Google web fonts-->   
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,300italic,400italic,600,700,600italic,200,200italic' rel='stylesheet' type='text/css'>    
    <link href='http://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/skillset.css">


    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css"> 
    <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="{{URL::to('js/jquery.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!--preloader-->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div> 

<header class="main_header sticky transp">
  <div class="row">
    <div class="content"> <a class="logo" href="#">DOCOLINE</a>
      <div class="mobile-toggle"> <span></span> <span></span> <span></span></div>
      <nav>
        <ul class="main_menu">
          <li><a href="body">Home</a></li>
          <li><a href=".service_area">Fitur</a></li>
          <li><a href=".price_area">Paket</a></li>
          <li class="masuk"><a href="{{URL::to('login')}}">Masuk</a></li>                    
        </ul>
      </nav>
    </div>
  </div>
  <!-- END row --> 
</header>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="2000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1><span>Docoline</span></h1>        
            <h3>Buat dokumen baru anda sekarang!</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">Mulai sekarang</button>
      </div>
    </div>

  </div> 
</div>

<div class="service_area">
  <div class="container">
    <div class="row">
      <div class="service_section wow bounceInLeft animated">
          <div class="col-md-3">
            <div class="single_service">        
              <div class="ico"><i class="fa fa-file"></i></div>
              <h2>Buat Dokumen Baru</h2>
            </div>
          </div>

          <div class="col-md-3">
            <div class="single_service">        
              <div class="ico"><i class="fa fa-pencil"></i></div>          
              <h2>Ubah Dokumen</h2>
            </div>
          </div>

          <div class="col-md-3">
            <div class="single_service">        
              <div class="ico"><i class="fa fa-share"></i></div>         
              <h2>Bagikan Dokumen</h2>
            </div>
          </div>

          <div class="col-md-3">
            <div class="single_service">        
              <div class="ico"><i class="fa fa-mobile"></i></div>        
              <h2>Akses Lewat Mobile</h2>
            </div>
          </div>

      </div>
    </div>
  </div>
</div><!-- service area end   -->

<div class="getit_area">
  <div class="container">
    <div class="row">
      <div class="getit_section">
        <h1>Promosiin Docoline. Ga ada kata-kata yang meyakinkan.</h1>
      </div>  
    </div>
  </div>
</div><!--  getit area end -->


<div class="price_area">
  <div class="container">
    <div class="row">
      <div class="price_section">
          <h1>Pilih Paket Anda Sekarang!</h1>
              <div class="col-md-10 col-md-offset-1">
                <div class="pricing-table">
                  <div class="col-md-6 col-sm-6 col-xs-12 pricing-box first wow bounceInUp animated">
                    <ul>
                      <li class="plan-title">
                        Batu Pualam
                      </li>
                      <li class="subscription-price oswald">
                        <span class="currency oswald">Rp</span>
                        <span class="price">0</span>
                        /bulan
                      </li>
                      <li class="ptop10">
                        5 Dokumen
                      </li>
                      <li>
                        24 / 7 Full Support
                      </li>
                      <li>
                        Cloud Backup
                      </li>
                      <li class="last border-none pbottom40">
                        Free Trials
                      </li>
                      <li class="sing-up">
                        <a href="{{URL::to('daftar')}}" class="animate">Daftar</a>
                      </li>
                    </ul>
                  </div><!-- end pricing-box -->

                  <div class="col-md-6 col-sm-6 col-xs-12 pricing-box first wow bounceInUp animated">
                    <ul>
                      <li class="plan-title">
                        Batu Akik
                      </li>
                      <li class="subscription-price oswald">
                        <span class="currency oswald">Rp</span>
                        <span class="price">25.000 </span>
                        /bulan
                      </li>
                      <li class="ptop10">
                        Dokumen yang tidak terbatas
                      </li>
                      <li>
                        24 / 7 Full Support
                      </li>
                      <li>
                        Cloud Backup
                      </li>
                      <li class="last border-none pbottom40">
                        Bebas Berbagi Dokumen
                      </li>
                      <li class="sing-up">
                        <a href="{{URL::to('regispaid')}}" class="animate">Daftar</a>
                      </li>
                    </ul>
                  </div><!-- end pricing-box -->

                </div>
              </div>
          
      </div>
    </div>
  </div>
</div><!-- price area end   -->

<div class="contact_area">
  <div class="container">
    <div class="row">
      <div class="contact_section">
          <h1>DOCOLINE</h1>
          <p>2016</p>
      </div>
    </div>
  </div> 
</div><!-- contact area end   -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/wow.js"></script>

    <script src="js/jquery.nicescroll.js"></script>
    
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>  
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>

   <script src="js/skillset.js"></script>

   <script src="js/owl.carousel.js"></script> 


   <script src="js/scrollupto.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
