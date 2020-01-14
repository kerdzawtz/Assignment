<?php

use Carbon\Carbon;
use App\Helpers\Helper;

$helper = new Helper();
$redirect = auth()->user() ? '' :  redirect()->to('/login');
$userFullname = $helper->getNameById();
$userEmail = $helper->getEmailById();
$currentGender = $helper->getCurrentGender();
// $today = Carbon::now();
$routeName = explode('.', Route::currentRouteName()); 
echo $redirect;
/* echo "<pre>";
print_r($routeName);
die('hit'); */
?>
@extends('layout-master')
@section('css')

<!-- Font Face -->
<link href="{{ URL::asset('/css/font-face.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/fonts.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/all.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/fontawesome.min.css') }}" rel="stylesheet">

<link href="{{ URL::asset('/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

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

<link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">

@yield('css-override')

@endsection

@section('content')

<div class="page-wrapper">

    @include('app.navbar')
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <div class="nav-btn">
                            <a href="#" id="nav-btn">
                            </a>
                            <span class="tooltip"></span>
                        </div>
                        <div class="logo">

                            <a href="{{'/'}}">
                                <img style="width: auto;" class="img-fluid" src=" ">
                            </a>
                        </div>


                        <div class="form-header">
                        </div>
                        <div class="header-button">
                            <div id="date" class="col">
                            </div>
                            <div id="time" class="col" style="width: 150px;"></div>
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src='/img/<?= ($currentGender == 1) ? "default_avatar_m.svg" : "default_avatar_f.svg" ?>' />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{$userFullname}}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <img src='/img/<?= ($currentGender == 1) ? "default_avatar_m.svg" : "default_avatar_f.svg" ?>' />
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{$userFullname}}</a>
                                                </h5>
                                                <span class="email">{{$userEmail}}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ '/logout' }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                <!-- <a href="/user/profile">
                                                    <i class="zmdi zmdi-account"></i>Profile</a> -->
                                            </div>
                                            <!-- <div class="change_password account-dropdown__item" href="/user/changepassword">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Change Password</a>
                                            </div> -->
                                        </div>
                                        <div class="account-dropdown__footer">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
            {{-- <div data-simplebar style="height: 100vh;"> --}}
            <div class="main-content" style=" height: 100%;">
                <!-- MC Background Condition -->
                <div class="bg"></div>
                <!-- MC Background Condition -->
                <div class="section__content section__content--p30">
                    @yield('main-content')
                </div>
            </div>
            {{-- </div> --}}
        <!-- END MAIN CONTENT-->

        <!-- END PAGE CONTAINER-->
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


</div>
@endsection

@section('body-class', 'gd animsition')

@section('js')
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

@switch($routeName[0])
    @case('dashboard')
        <script type="text/javascript" src="{{ URL::asset('js/scripts-news.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/dataTables.buttons.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap4.min.js') }}"></script>
    @break
    @default
        @isset($routeName[0])
            @switch($routeName[1])
                @case('user')
                    <script type="text/javascript" src="{{ URL::asset('js/scripts-user.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/datatables.min.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/dataTables.buttons.min.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap4.min.js') }}"></script>
                    @break
            @endswitch
        @endisset
    @break
@endswitch

@endsection