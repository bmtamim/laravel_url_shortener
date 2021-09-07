<nav id="sidebar">
	<div class="shadow-bottom"></div>
	<ul class="list-unstyled menu-categories" id="accordionExample">
		<li class="menu">
			<a href="{{ route('user.dashboard') }}" aria-expanded="false"
				class="dropdown-toggle" {{ request()->routeIs('user.dashboard') ? 'data-active=true' : '' }}>
				<div class="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-home">
						<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
						<polyline points="9 22 9 12 15 12 15 22"></polyline>
					</svg>
					<span>Dashboard</span>
				</div>
			</a>
		</li>
		<li class="menu">
			<a href="#links" data-toggle="collapse"
				class="dropdown-toggle" {{ request()->routeIs('user.links.index') || request()->is('dashboard/links/*') ? 'data-active=true aria-expanded=true' : '' }}>
				<div class="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-home">
						<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
						<polyline points="9 22 9 12 15 12 15 22"></polyline>
					</svg>
					<span>Links</span>
				</div>
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-chevron-right">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
				</div>
			</a>
			<ul class="submenu list-unstyled collapse {{ request()->routeIs('user.links.index') || request()->is('dashboard/links/*') ? 'show' : '' }}"
				 id="links" data-parent="#accordionExample" style="">
				<li>
					<a href="{{ route('user.links.index') }}"> {{ __('Links') }} </a>
				</li>
				<li>
					<a href="{{ route('user.links.create') }}"> {{ __('Create New') }} </a>
				</li>
			</ul>
		</li>
		<li class="menu">
			<a href="#links" aria-expanded="false" class="dropdown-toggle">
				<div class="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-map">
						<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
						<line x1="8" y1="2" x2="8" y2="18"></line>
						<line x1="16" y1="6" x2="16" y2="22"></line>
					</svg>
					<span>Links</span>
				</div>
			</a>
		</li>

		<li class="menu">
			<a href="charts_apex.html" aria-expanded="false" class="dropdown-toggle">
				<div class="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-pie-chart">
						<path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
						<path d="M22 12A10 10 0 0 0 12 2v10z"></path>
					</svg>
					<span>Charts</span>
				</div>
			</a>
		</li>
	</ul>
</nav>
