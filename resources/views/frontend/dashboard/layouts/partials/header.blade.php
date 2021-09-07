<div class="header-container fixed-top">
	<header class="header navbar navbar-expand-sm">

		<ul class="navbar-item theme-brand flex-row  text-center">
			<li class="nav-item theme-logo">
				<a href="{{ route('home') }}">
					<img src="{{ asset('frontend/dashboard/assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
				</a>
			</li>
			<li class="nav-item theme-text">
				<a href="{{ route('home') }}" class="nav-link"> URL </a>
			</li>
		</ul>

		<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				  class="feather feather-menu">
				<line x1="3" y1="12" x2="21" y2="12"></line>
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<line x1="3" y1="18" x2="21" y2="18"></line>
			</svg>
		</a>

		<ul class="navbar-item flex-row ml-md-auto">
			<li class="nav-item dropdown user-profile-dropdown">
				<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<img src="{{ asset('frontend/dashboard/assets/img/90x90.jpg') }}" alt="avatar">
				</a>
				<div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
					<div class="">
						<div class="dropdown-item">
							<a class="" href="{{ route('user.profile.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									  class="feather feather-user">
									<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
									<circle cx="12" cy="7" r="4"></circle>
								</svg>
								Profile</a>
						</div>
						<div class="dropdown-item">
							<a class="" href="auth_lockscreen.html">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									  class="feather feather-lock">
									<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
									<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
								</svg>
								Lock Screen</a>
						</div>
						<div class="dropdown-item">
							<a class="" href="{{ route('logout') }}"
								onclick="event.preventDefault(); document.getElementById('user-logout').submit();">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									  class="feather feather-log-out">
									<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
									<polyline points="16 17 21 12 16 7"></polyline>
									<line x1="21" y1="12" x2="9" y2="12"></line>
								</svg>
								Sign Out</a>
							<form action="{{ route('logout') }}" method="POST" id="user-logout" class="d-none">
								@csrf
							</form>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</header>
</div>
