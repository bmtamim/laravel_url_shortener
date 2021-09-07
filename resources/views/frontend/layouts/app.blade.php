<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>@yield('title') {{ !request()->routeIs('user.dashboard') ? ' - '.__('Dashboard') : '' }}</title>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	@stack('styles')
</head>
<body>
<div id="app">
	@include('frontend.layouts.partials.header')
	@section('content')

	@show
</div>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('frontend/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('frontend/js/axios.min.js') }}"></script>
<script src="{{ asset('frontend/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
