<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php 
// $user = "";
// if(Auth::user())
// {
//     $user = Auth::user();
// }
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>State Argo Company</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{ URL::asset('fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ URL::asset('fonts/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/material_style.css') }}">
    <link href="{{ URL::asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- Jquery Toast css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-toast/dist/jquery.toast.min.css') }}">

    <!-- Theme Styles -->
    @if(Session('dark') == 1)
    <link href="{{ URL::asset('assets/css/theme/dark/theme_style.css') }}" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="{{ URL::asset('assets/css/theme/dark/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/theme/dark/theme-color.css') }}" rel="stylesheet" type="text/css" />
    @else 

    <link href="{{ URL::asset('assets/css/theme/light/theme_style.css') }}" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="{{ URL::asset('assets/css/theme/light/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ URL::asset('assets/css/theme/light/theme-color.css') }}" rel="stylesheet" type="text/css" />



    @endif
    <link href="{{ URL::asset('assets/css/pages/formlayout.css') }}" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/taleo/taleo.png') }}" /> 
</head>
<!-- END HEAD -->
@if(Session('dark') == 1)
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
    @else 
    <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">

    @endif
    <div class="page-wrapper">
        <!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.html">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                    <span class="logo-default" >State Argo Company</span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>

                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                        @if(Session('Access') == 1)
                    	<!-- start language menu -->
             <!--    <li class="dropdown language-switch">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="" class="position-left" alt=""> Export <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                <a href="{{route('exportSubmittedXL')}}" class="deutsch">Export Submitted</a>
                                </li>

                                <li>
                                        <a href="{{route('exportFinalXL')}}" class="deutsch">Export Final</a>
                                </li>

                                <li>
                                        <a href="{{route('exportRejectedXL')}}" class="deutsch">Export Rejected</a>
                                </li>

                                <li>
                                        <a href="{{route('exportPreXL')}}" class="deutsch">Export Pre-Scanned</a>
                                </li>

                                <li>
                                        <a href="{{route('exportScanned')}}" class="deutsch">Export Scanned</a>
                                </li>

                                <li>
                                        <a href="{{route('exportHired')}}" class="deutsch">Export Hired</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- end language menu -->

                        @endif
                        
                        <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1" id="noti2"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Applicants</span></h3>
                                    <span class="notification-label purple-bgcolor">New <span id="notification"></span></span>
                                </li>
                            <!--    <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                <span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-check"></i></span> Congratulations!. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                <span class="notification-icon circle purple-bgcolor"><i class="fa fa-user o"></i></span>
                                                <b>John Micle </b>is now following you. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">7 mins</span>
                                                <span class="details">
                                                <span class="notification-icon circle blue-bgcolor"><i class="fa fa-comments-o"></i></span>
                                                <b>Sneha Jogi </b>sent you a message. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">12 mins</span>
                                                <span class="details">
                                                <span class="notification-icon circle pink"><i class="fa fa-heart"></i></span>
                                                <b>Ravi Patel </b>like your photo. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">15 mins</span>
                                                <span class="details">
                                                <span class="notification-icon circle yellow"><i class="fa fa-warning"></i></span> Warning! </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 hrs</span>
                                                <span class="details">
                                                <span class="notification-icon circle red"><i class="fa fa-times"></i></span> Application error. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)"> All notifications </a>
                                    </div>
                                </li> -->
                            </ul>
                        </li>
                        <!-- end notification dropdown -->

 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="../assets/img/dp.jpg" />
                                <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('profile')}}">
                                        <i class="icon-settings"></i> My Profile
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                <a href="{{route('logout')}}">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                             <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
	                           <i class="material-icons">more_vert</i>
	                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start color quick setting -->
        <div class="quick-setting-main">
			<button class="control-sidebar-btn btn" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></button>
			<div class="quick-setting display-none">
				<ul id="themecolors" >
				<li><p class="selector-title">Main Layouts</p></li>
				<li class="complete"><div class="theme-color layout-theme">
                <a href="{{ route('light') }}" data-theme="light"><span class="head"></span><span class="cont"></span></a>
				<a href="{{ route('dark') }}" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
				</div></li>	
				<li><p class="selector-title">Sidebar Color</p></li>
				<li class="complete"><div class="theme-color sidebar-theme">
				<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
				</div></li>
             	<li><p class="selector-title">Header Brand color</p></li>
             	<li class="theme-option"><div class="theme-color logo-theme">
             	<a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
             	</div></li>
             	<li><p class="selector-title">Header color</p></li>
             	<li class="theme-option"><div class="theme-color header-theme">
             	<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
             	</div></li>
			</ul>
			</div>
        </div>

		<!-- end color quick setting -->