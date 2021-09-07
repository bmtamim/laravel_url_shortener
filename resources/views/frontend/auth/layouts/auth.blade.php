<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend/dashboard/assets/img/favicon.ico') }}"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="{{ asset('frontend/dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('frontend/dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('frontend/dashboard/assets/css/authentication/form-2.css') }}" rel="stylesheet"
			type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="stylesheet" type="text/css"
			href="{{ asset('frontend/dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/dashboard/assets/css/forms/switches.css') }}">
</head>
<body class="form">

<div class="form-container outer">
	<div class="form-form">
		<div class="form-form-wrap">
			<div class="form-container">
				@section('content')
				@show
			</div>
		</div>
	</div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('frontend/dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('frontend/dashboard/assets/js/authentication/form-2.js') }}"></script>

</body>
</html>
