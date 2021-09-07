@extends('frontend.auth.layouts.auth')

@section('title','Login')

@section('content')
	<div class="form-content">

		<h1 class="">Sign In</h1>
		<p class="">Log in to your account to continue.</p>

		<form action="{{ route('login') }}" class="text-left" method="POST">
			@csrf
			<div class="form">

				<div id="email-field" class="field-wrapper input">
					<label for="email">EMAIL</label>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						  class="feather feather-at-sign register">
						<circle cx="12" cy="12" r="4"></circle>
						<path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
					</svg>
					<input id="email" name="email" type="text" value="" class="form-control" placeholder="Email" value="{{ old('email') }}">
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

				<div class="d-sm-flex justify-content-between">
					<div class="field-wrapper">
						<button type="submit" class="btn btn-primary" value="">Log In</button>
					</div>
				</div>

				<p class="signup-link">Not registered ? <a href="{{ route('register') }}">Create an account</a>
				</p>

			</div>
		</form>

	</div>
@endsection
