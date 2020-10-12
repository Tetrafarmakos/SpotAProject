<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App title -->
    <title>SpotAProject</title>
    <!-- Timepicker css -->
    <link href="{{ asset('uplon/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- App CSS -->
    <link href="{{ asset('uplon/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Modernizr js -->
    <script src="{{asset('uplon/assets/js/modernizr.min.js')}}"></script>

</head>
<body class="fixed-left-void">
    <div id="wrapper" class="forced">
            @yield('content')
    </div>

    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <script src="{{asset('uplon/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('uplon/assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
    <script src="{{asset('uplon/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('uplon/assets/js/fastclick.js')}}"></script>

    <!-- Timepicker dependancies -->
    <script src="{{asset('uplon/assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('uplon/assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('uplon/assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('uplon/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('uplon/assets/pages/jquery.form-pickers.init.js')}}"></script>
    <script src="{{asset('uplon/assets/plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
    <script src="{{asset('uplon/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('uplon/assets/js/jquery.core.js')}}"></script>
    <script src="{{asset('uplon/assets/js/jquery.app.js')}}"></script>



    @yield('page_scripts')
</body>
</html>
