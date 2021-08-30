<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('frontend/plugins/milligram/milligram.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

</head>
<body>
<div id="app">
	@section('content')

	@show
</div>
<!-- Scripts -->
<script src="{{ asset('frontend/js/axios.min.js') }}"></script>
<script src="{{ asset('frontend/js/app.js') }}"></script>
</body>
</html>
