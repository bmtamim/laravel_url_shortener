@extends('frontend.auth.layouts.auth')

@section('title','Register')

@section('content')
	<div class="form-content">

		<h1 class="">Register</h1>
		<p class="signup-link register">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
		<form action="{{ route('register') }}" class="text-left" method="POST">
			@csrf
			<div class="form">

				<div id="username-field" class="field-wrapper input">
					<label for="name">Name</label>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-user">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12" cy="7" r="4"></circle>
					</svg>
					<input id="name" name="name" type="text" class="form-control" placeholder="Name"
							 value="{{ old('name') }}">
					@error('name')
					<p class="text-danger m-0">{{ $message }}</p>
					@enderror
				</div>

				<div id="email-field" class="field-wrapper input">
					<label for="email">EMAIL</label>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-at-sign register">
						<circle cx="12" cy="12" r="4"></circle>
						<path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
					</svg>
					<input id="email" name="email" type="text" value="" class="form-control" placeholder="Email"
							 value="{{ old('email') }}">
					@error('email')
					<p class="text-danger m-0">{{ $message }}</p>
					@enderror
				</div>

				<div id="password-field" class="field-wrapper input mb-2">
					<div class="d-flex justify-content-between">
						<label for="password">PASSWORD</label>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-lock">
						<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
						<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
					</svg>
					<input id="password" name="password" type="password" class="form-control" placeholder="Password">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  id="toggle-password" class="feather feather-eye">
						<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
						<circle cx="12" cy="12" r="3"></circle>
					</svg>
					@error('password')
					<p class="text-danger m-0">{{ $message }}</p>
					@enderror
				</div>
				<div id="password-field" class="field-wrapper input mb-2">
					<div class="d-flex justify-content-between">
						<label for="password_confirmation">CONFIRM PASSWORD</label>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-lock">
						<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
						<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
					</svg>
					<input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
							 placeholder="Password">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  id="toggle-password" class="feather feather-eye">
						<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
						<circle cx="12" cy="12" r="3"></circle>
					</svg>
					@error('password_confirmation')
					<p class="text-danger m-0">{{ $message }}</p>
					@enderror
				</div>

				<div class="field-wrapper terms_condition">
					<div class="n-chk">
						<label class="new-control new-checkbox checkbox-primary">
							<input type="checkbox" class="new-control-input">
							<span class="new-control-indicator"></span><span>I agree to the <a href="javascript:void(0);">  terms and conditions </a></span>
						</label>
					</div>

				</div>

				<div class="d-sm-flex justify-content-between">
					<div class="field-wrapper">
						<button type="submit" class="btn btn-primary" value="">Get Started!</button>
					</div>
				</div>

			</div>
		</form>

	</div>
@endsection
