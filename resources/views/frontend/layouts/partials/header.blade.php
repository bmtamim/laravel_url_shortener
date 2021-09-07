<header id="main-header">
	<nav
		 class="navbar navbar-expand-lg navbar-dark {{ request()->is('/') ? 'bg-transparent' : 'bg-primary' }} fixed-top">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">URL Shortener</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
					  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('home') }}">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pricing.index') }}">Pricing</a>
					</li>
					@auth()
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">Register</a>
						</li>
					@endauth
				</ul>
			</div>
		</div>
	</nav>
</header>
