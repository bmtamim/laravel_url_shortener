@extends('frontend.dashboard.layouts.app')

@section('title','Profile')

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/dashboard/plugins/dropify/dropify.min.css') }}">
	<link href="{{ asset('frontend/dashboard/assets/css/users/account-setting.css') }}" rel="stylesheet"
			type="text/css"/>
@endpush
@section('content')
	<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
		<form id="general-info" class="section general-info" action="{{ route('user.profile.update',auth()->id()) }}"
				method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="info">
				<h6 class="">{{ __('General Information') }}</h6>
				<div class="row">
					<div class="col-lg-11 mx-auto">
						<div class="row">
							<div class="col-lg-8 col-md-8 mt-md-0 mt-4">
								<div class="form">
									<div class="form-group">
										<label for="profession">Name</label>
										<input type="text" class="form-control mb-4" id="name" name="name" placeholder="Name"
												 value="{{ old('name') ?? auth()->user()->name }}">
										@error('name')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="profession">Email</label>
										<input type="text" class="form-control mb-4" id="email" name="email" placeholder="Email"
												 value="{{ old('email') ?? auth()->user()->email }}">
										@error('email')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
									<div class="form-gtoup">
										<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4">
								<div class="pr-md-4">
									<input type="file" id="input-file-max-fs" name="image" class="dropify"
											 data-default-file="{{ asset('frontend/dashboard/assets/img/200x200.jpg') }}"
											 data-max-file-size="1M"/>
									@error('image')
									<p class="text-danger m-0">{{ $message }}</p>
									@enderror
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection
@push('scripts')
	<script src="{{ asset('frontend/dashboard/plugins/dropify/dropify.min.js') }}"></script>
	<script src="{{ asset('frontend/dashboard/assets/js/users/account-settings.js') }}"></script>
@endpush
