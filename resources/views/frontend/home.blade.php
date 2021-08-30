@extends('frontend.layouts.app')

@section('title','URL Shorter')

@section('content')
	<div class="section hero">
		<div class="container">
			<h2 class="section-title text-white text-center">Short Your Large URL</h2>
			<div class="row justify-content-center align-items-center">
				<div class="column column-75">
					<div class="card" id="copy-url-box">
						<div class="row">
							<div class="column column-80">
								<input type="text" id="shorted-url" value="test.com" readonly>
								<p class="text-success success" id="copy_success"></p>
							</div>
							<div class="column">
								<button class="button button-outline" id="copy-url-btn">Copy Url</button>
							</div>
						</div>
					</div>
					<div class="card">
						<p class="text-center text-dark">Paste and get shorted url.</p>
						<div class="form">
							<form action="{{ route('short.url.store') }}" method="POST" id="link-form">
								@csrf
								<div class="row">
									<div class="column column-80">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="url" id="link" name="link" placeholder="Enter Your Url here" required>
										<p class="text-danger error" id="link_error"></p>
										@error('link')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
									<div class="column column-20">
										<button type="submit" class="button shorten" id="shorten-btn">Shorten</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="column column-33">
							<div class="card total-links text-center py-30">
								<h5 class="font-500 m-0 mb-10">{{ __('Total Links') }}</h5>
								<h2 class="font-600 m-0">{{ $totalLinks ?? 0 }}</h2>
							</div>
						</div>
						<div class="column column-33">
							<div class="card total-clicks text-center py-30">
								<h5 class="font-500 m-0 mb-10">{{ __('Total Clicks') }}</h5>
								<h2 class="font-600 m-0">{{ $totalClicks ?? 00 }}</h2>
							</div>
						</div>
						<div class="column column-33">
							<div class="card today-clicks text-center py-30">
								<h5 class="font-500 m-0 mb-10">{{ __('Today\'s Clicks') }}</h5>
								<h2 class="font-600 m-0">{{ $todayClicks ?? 00 }}</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
