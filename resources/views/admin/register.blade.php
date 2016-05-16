<!DOCTYPE html>

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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="css/skillset.css">


    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css"> 
    <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="name-hero">
		DOCOLINE
	</div>
	<div class="login">
		<div class="login-header">
			DAFTAR
		</div>
		<div class="login-form">
			<form action="http://10.151.36.100:5000/Registeradmin" method="POST">
				
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
               
				<button type="submit" class="btn btn-login">Masuk</button>
			</form>
		</div>
	</div>
</body>
</html>