<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>@yield('title') {{ !request()->routeIs('user.dashboard') ? ' - '.__('Dashboard') : '' }}</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend/dashboard/assets/img/favicon.ico') }}"/>
	<link href="{{ asset('frontend/dashboard/assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
	<script src="{{ asset('frontend/dashboard/assets/js/loader.js') }}"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
	<link href="{{ asset('frontend/dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('frontend/dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	@stack('styles')
</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
	<div class="loader">
		<div class="loader-content">
			<div class="spinner-grow align-self-center"></div>
		</div>
	</div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('frontend.dashboard.layouts.partials.header')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

	<div class="overlay"></div>
	<div class="search-overlay"></div>

	<!--  BEGIN SIDEBAR  -->
	<div class="sidebar-wrapper sidebar-theme">
		@include('frontend.dashboard.layouts.partials.sidebar')
	</div>
	<!--  END SIDEBAR  -->

	<!--  BEGIN CONTENT AREA  -->
	<div id="content" class="main-content">
		<div class="layout-px-spacing">
			<div class="row layout-top-spacing">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
					@section('content')
					@show
				</div>
			</div>
		</div>
		<div class="footer-wrapper">
			@include('frontend.dashboard.layouts.partials.footer')
		</div>
	</div>
	<!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('frontend/dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('frontend/dashboard/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{ asset('frontend/dashboard/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
@stack('scripts')
</body>
</html>
