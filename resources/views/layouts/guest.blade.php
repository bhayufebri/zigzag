<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <title>TIKETKU CMS</title>

    <!--Core CSS -->
    <!-- <link href="{{ asset('bucket/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bucket/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ asset('bucket/font-awesome/css/font-awesome.css') }}" rel="stylesheet" /> -->

    <!-- Custom styles for this template -->
    <!-- <link href="{{ asset('bucket/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('bucket/css/style-responsive.css') }}" rel="stylesheet" /> -->

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ asset('assets/plugins/feather-icons/feather.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- PACE JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</head>
    <body class="login">
	    <!-- Content Wrapper. Contains page content -->
	    <!-- <div class="wrapper" style="padding-top: 10px; padding-bottom: 70px;"> -->
		<!-- Main content -->
		<!-- <section class="content"> -->
        <!-- @include('flash::message') -->
		    @yield('content')
		<!-- </section> -->
		<!-- /.content -->
		
	    <!-- </div> -->
	   
	    <!-- /.content-wrapper -->
	    <!-- ./wrapper -->

	    <!-- jQuery 3 -->
		<!-- <script src="{{ asset('bucket/js/jquery.js') }}"></script>
    	<script src="{{ asset('bucket/bs3/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bucket/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bucket/js/bootstrap-daterangepicker/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bucket/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bucket/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bucket/js/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script> -->
        <!-- <script>
          // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
          $(document).ready(function(){
              $('div.alert').not('.alert-important').fadeIn().delay(3000).fadeOut();
              $('.help-block').fadeIn().delay(1500).fadeOut();
                });
      </script> -->
    </body>
</html>
