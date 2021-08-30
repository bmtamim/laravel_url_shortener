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
							</div>
							<div class="column">
								<button class="button button-outline" id="copy-url-btn">Copy Url</button>
							</div>
						</div>
					</div>
					<div class="card">
						<p class="text-center text-dark">Lorem ipsum dolor sit amet.</p>
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
				</div>
			</div>
		</div>
	</div>
@endsection
