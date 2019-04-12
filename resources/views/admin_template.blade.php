<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ url("/gentelella") }}/production/images/favicon.ico" type="image/ico" />

    <!-- Bootstrap -->
    <link href="{{ url("/gentelella") }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url("/gentelella") }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url("/gentelella") }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url("/gentelella") }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ url("/gentelella") }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ url("/gentelella") }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url("/gentelella") }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url("/gentelella") }}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

@section('title', 'aaaa')

@section('sidebar')
    @include('sidebar')
@endsection

@section('header')
    @include('header')
@endsection

@section('content')
    @include('content')
@endsection

@section('footer')
    @include('footer')
@endsection
    </div>
</div>

<!-- jQuery -->
<script src="{{ url("/gentelella") }}/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ url("/gentelella") }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ url("/gentelella") }}/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{ url("/gentelella") }}/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="{{ url("/gentelella") }}/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="{{ url("/gentelella") }}/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{ url("/gentelella") }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{ url("/gentelella") }}/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="{{ url("/gentelella") }}/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="{{ url("/gentelella") }}/vendors/Flot/jquery.flot.js"></script>
<script src="{{ url("/gentelella") }}/vendors/Flot/jquery.flot.pie.js"></script>
<script src="{{ url("/gentelella") }}/vendors/Flot/jquery.flot.time.js"></script>
<script src="{{ url("/gentelella") }}/vendors/Flot/jquery.flot.stack.js"></script>
<script src="{{ url("/gentelella") }}/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="{{ url("/gentelella") }}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="{{ url("/gentelella") }}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="{{ url("/gentelella") }}/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="{{ url("/gentelella") }}/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="{{ url("/gentelella") }}/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="{{ url("/gentelella") }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="{{ url("/gentelella") }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ url("/gentelella") }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ url("/gentelella") }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{ url("/gentelella") }}/build/js/custom.min.js"></script>

</body>
</html>