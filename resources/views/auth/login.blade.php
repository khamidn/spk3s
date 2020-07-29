<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | SPK Kenaikan Kelas Siswa</title>
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

    <!-- Animation Css -->
    <link href="{{ URL::asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <!-- <a href="javascript:void(0);"><b>S</b>istem <b>P</b>endukung <b>K</b>eputusan</a>
            <small>Kenaikan Kelas Siswa SMK Widya Dharma Turen</small> -->
            <div style="display: flex; justify-content: center;">
                <img src="{{URL::asset('images/logo-spk3s.png')}}"/ style="width:85%; height:40%;">
            </div>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{route('login')}}">
                    {{csrf_field()}}
                    <div class="msg">Silakan Login untuk memulai</div>

                   @if(session('status-danger'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 {{session('status-danger')}}
                         </div>
                    @endif

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
     <script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ URL::asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ URL::asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('js/admin.js') }} "></script>
    <script src="{{ URL::asset('js/pages/examples/sign-in.js')}}"></script>
</body>

</html>