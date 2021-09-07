@extends('frontend.layouts.app')

@section('title')
	{{ config('app.name') }}
@endsection

@section('content')
	<div class="section hero">
		<div class="container">
			<h2 class="section-title text-white text-center">Short Your Large URL</h2>
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-10 col-md-11">
					<div class="card" id="copy-url-box">
						<div class="row">
							<div class="col-lg-10 col-md-9">
								<input type="text" class="form-control" id="shorted-url" value="test.com" readonly>
								<p class="text-success success m-0" id="copy_success"></p>
							</div>
							<div class="col-lg-2 col-md-3">
								<button class="btn btn-outline-info" id="copy-url-btn">Copy Url</button>
							</div>
						</div>
					</div>
					<div class="card">
						<h5 class="text-center text-dark mb-4">Paste and get shorted url.</h5>
						<div class="form">
							<form action="{{ route('short.url.store') }}" method="POST" id="link-form">
								@csrf
								<div class="row">
									<div class="col-lg-10 col-md-9">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="url" id="link" name="link" placeholder="Enter Your Url here"
												 class="form-control" required>
										<p class="text-danger error" id="link_error"></p>
										@error('link')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
									<div class="col-lg-2 col-md-3">
										<button type="submit" class="btn btn-primary text-uppercase" id="shorten-btn">Shorten
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="card counter total-links text-center py-30">
								<h5 class="font-500 m-0 mb-10 text-dark">{{ __('Total Links') }}</h5>
								<h2 class="font-600 m-0">{{ $totalLinks ?? 0 }}</h2>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="card counter total-clicks text-center py-30">
								<h5 class="font-500 m-0 mb-10 text-dark">{{ __('Total Clicks') }}</h5>
								<h2 class="font-600 m-0">{{ $totalClicks ?? 00 }}</h2>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="card counter today-clicks text-center py-30">
								<h5 class="font-500 m-0 mb-10 text-dark">{{ __('Today\'s Clicks') }}</h5>
								<h2 class="font-600 m-0">{{ $todayClicks ?? 00 }}</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
