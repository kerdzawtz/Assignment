<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@isset($title)
                - {{ $title }}
           @endisset()
    </title>
    <!-- Font Face -->
    <link href="{{ URL::asset('/css/font-face.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/fontawesome.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/fonts.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ URL::asset('/css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/slick.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/editor.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/editor.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('/css/timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('/css/timepicki.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/simplebar.css') }}">

    <!-- Theme CSS -->
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/theme.css') }}" rel="stylesheet">

    <!-- <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet"> -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @yield('login')
            </div>
        </nav>
        @if (count($errors) > 0)
            <div class="alert alert-danger errmsg animated fadeIn-8 col-md-4 offset-md-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong class="animated flash">Whoops!</strong> <p>There were some problems with your input.</p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <main class="py-4">
            @include('register.register')
        </main>
    </div>
    <div class='modal fade' tabindex='-1' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='myModalLabel'></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body pt-2'>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- Boostrap JS -->
    <script type="text/javascript" src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
    <script type="text/javascript" src="{{ URL::asset('js/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-progressbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/circle-progress.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/perfect-scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/Chart.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-progressbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/timepicki.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/simplebar.js') }}"></script>

    <!-- Main JS -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

    <!-- Layout JS -->
    <script type="text/javascript" src="{{ URL::asset('js/app-layout.js') }}"></script>

    <!-- Notify JS -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scripts-auth.js') }}"></script>
</body>
</html>
