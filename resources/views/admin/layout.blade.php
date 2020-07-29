<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Skripsi | Semangat</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ URL::asset('favicon.ico')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core Css -->
    <link href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ URL::asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="{{ URL::asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ URL::asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('css/themes/all-themes.css') }}" rel="stylesheet" />
   
    
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    @include('admin.header.header')
    @include('admin.sidebar.sidebar')
    <section class="content">
          @if(session('status-suksess'))
          <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{session('status-suksess')}}
          </div>
          @endif
          @if(session('status-danger'))
           <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{session('status-danger')}}
          </div>
          @endif

          @if(session()->has('status'))
          <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {!!session('status')!!}
          </div>
          @endif

          @yield('content')
        </div>
        @stack("modal")

        

    </section>
    <script src="{{ URL::asset('plugins/jquery/jquery.js') }}"></script>
    <!-- Jquery Core Js -->
    <script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ URL::asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{URL::asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('plugins/node-waves/waves.js') }}"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{URL::asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>
    <!-- Moment Plugin Js -->
   <script src="{{ URL::asset('plugins/momentjs/moment.js') }}"></script>
   <!-- Bootstrap Material Datetime Picker Plugin Js -->
   <script src="{{ URL::asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
   @yield("js-chart-donut")
    

    <!-- Flot Charts Plugin Js -->
    <!-- <script src="{{URL::asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('plugins/flot-charts/jquery.flot.time.js')}}"></script> -->

     <!-- Sparkline Chart Plugin Js -->
    <!-- <script src="{{URL::asset('gins/jquery-sparkline/jquery.sparkline.js')}}"></script> -->

   <!-- Bootstrap Datepicker Plugin Js -->
   <script src="{{ URL::asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-datatable/jquery.dataTables.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }} "></script>
    <script src="{{ URL::asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }} "></script>
    <!-- Custom Js -->
    <script src="{{ URL::asset('js/admin.js') }} "></script>
    <script src="{{ URL::asset('js/pages/forms/form-validation.js')}}"></script>
    <script src="{{ URL::asset('js/pages/tables/jquery-datatable.js') }} "></script>
    <script src="{{URL::asset('js/pages/ui/notifications.js')}}"></script>
    <!-- Demo Js -->
    <script src="{{ URL::asset('js/demo.js') }} "></script>

    
</body>
@yield("js-custom")
</html>
