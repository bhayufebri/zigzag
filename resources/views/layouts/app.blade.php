<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <title>ESEMINAR CMS</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">

    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/feather-icons/feather.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/add-css.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/imagezoom.css') }}">


    

    <!-- Datetime Picker CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('datepicker/datepicker3.css') }}" /> -->
    <!-- <link rel="stylesheet" href="{{ asset('js/bootstrap-datetimepicker/css/datetimepicker.css') }}" /> -->


    <!-- Multiselect -->
    <link rel="stylesheet" href="{{ asset('js/jquery-multi-select/css/multi-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/select2/select2.css') }}" />

    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <!-- <link rel="stylesheet" href="{{ asset('datepicker/datepicker3.css') }}"> -->
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('timepicker/bootstrap-timepicker.min.css') }}">

    <!-- PACE JS -->
    <link rel="stylesheet" href="{{ asset('assets/pace-theme-minimal.min.css') }}">
    <script src="{{ asset('assets/pace.min.js') }}"></script>

      <!-- JS -->
    <script src="{{ asset('assets/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/popper.min.js') }}" ></script>
    <script src="{{ asset('assets/bootstrap.min.js') }}"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

</head>
@yield('customcss')
<body class="app">

@include('layouts.header')


<div class="row row-app m-0">
@include('layouts.sidebar')
<div class="col main p-4">
@include('layouts.breadcrumb')
@include('flash::message')
@yield('content') 
</div>
</div>
      <script src="{{ asset('sweetalert/sweetalert.js') }}"></script>

      <script src="{{ asset('js/aiqqon.js') }}"></script>

      <!-- datatable -->
      <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
      <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->
      <!-- <script type="text/javascript" src="{{ asset('datepicker/bootstrap-datepicker.js')}}"></script> -->
      <!-- <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script> -->

      <!-- penyebab error -->
      <script src="{{ asset('js/advanced-form.js')}}"></script>



      <script src="{{ asset('js/select2/select2.js') }}"></script>
      <script src="{{ asset('js/select-init.js') }}"></script>
      <script src="{{ asset('js/jquery.mask.js')}}"></script>
      <script>
          // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
          $(document).ready(function(){
              $('div.alert').not('.alert-important').fadeIn().delay(3000).fadeOut();
              $('.help-block').fadeIn().delay(1500).fadeOut();
                });
      </script>

      <!-- datatable -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        
      <!-- Select2 -->
      <script type="text/javascript" src="{{ asset('select2/select2.full.min.js') }}"></script>

      <!-- DATEPICKER -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
      <!-- date-range-picker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
      <script type="text/javascript" src="{{ asset('daterangepicker/daterangepicker.js') }}"></script>
      <!-- bootstrap datepicker -->
      <script type="text/javascript" src="{{ asset('datepicker/bootstrap-datepicker.js') }}"></script>
      <!-- bootstrap time picker -->
      <script type="text/javascript" src="{{ asset('timepicker/bootstrap-timepicker.min.js') }}"></script>
      


@yield('customjs')
</body>
</html>
        

	
