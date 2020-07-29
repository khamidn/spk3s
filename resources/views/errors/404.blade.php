<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SPK3S | Errors</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{URL::asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{URL::asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="five-zero-zero">
    <div class="five-zero-zero-container">
        <div class="error-message">Maaf, halaman yang ada cari tidak dapat ditemukan</div>
        <div class="button-place">
            <a href="{{route('dashboard.index')}}" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{URL::asset('plugins/node-waves/waves.js')}}"></script>
</body>

</html>