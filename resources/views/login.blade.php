<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Login</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{URL::asset('ts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{URL::asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
    <!-- bootstrap -->
	<link href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/pages/extra_pages.css') }}">
       <!-- The fav icon -->
       <link rel="shortcut icon" href="{{URL::asset('img/taleo/taleo.png') }}">


    <link href="{{ URL::asset('css/jquery.noty.css') }}" rel='stylesheet'>
    <link href="{{ URL::asset('css/noty_theme_default.css') }}" rel='stylesheet'>


	

</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{route('loginPost')}}" method="post">
					<!-- <span class="login100-form-logo">
						<img alt="" src="../assets/img/logo-2.png">
					</span> -->
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    @csrf
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <!-- bootstrap -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/js/pages/extra-pages/pages.js') }}" ></script>
    <!-- end js include path -->
    <script src="{{URL::asset('js/jquery.noty.js') }}"></script>
    @if(Session('error'))
<script>
    
noty({"text":"{{Session('error')}}","layout":"center","type":"error"});

    </script>
@endif
</body>