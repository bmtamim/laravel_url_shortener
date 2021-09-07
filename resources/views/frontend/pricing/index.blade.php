@extends('frontend.layouts.app')

@section('title','Package')
@push('styles')
	<link href="{{ asset('frontend/dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('frontend/dashboard/plugins/pricing-table/css/component.css') }}" rel="stylesheet"
			type="text/css"/>
@endpush
@section('content')
	<div class="container pt-5">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="mt-4 mb-5 text-center" style="font-size: 40px;line-height: 50px;">Pricing</h3>
			</div>
			<div class="col-lg-12">
				<div class="pricing-plans-container mt-5 d-md-flex d-block">
					<!-- Plan -->
					@foreach($packages as $package)
						<div class="pricing-plan mb-5 {{ $loop->iteration == 2 ? 'mt-md-0 recommended' : '' }}">
							@if($loop->iteration == 2)
								<div class="recommended-badge">Most Popular</div>
							@endif
							<h3>{{ $package->name ?? __('Package') }}</h3>
							<p class="margin-top-10">{{ $package->description ?? __('Description') }}</p>
							<div class="pricing-plan-label billed-monthly-label"><strong>${{ $package->price ?? 0 }}</strong>/
								monthly
							</div>
							<div class="pricing-plan-features mb-4">
								<strong>Cloud Hosting Features</strong>
								<ul>
									<li>Single Domain</li>
									<li>50 GB SSD</li>
									<li>1 TB Premium Bandwidth</li>
								</ul>
							</div>
							@if(auth()->check() && $package->name == auth()->user()->subscription->package_name)
								<button class="button btn btn-dark btn-block margin-top-20"
										  disabled>{{ __('Current Plan') }}</button>
							@else
								<a href="{{ $package->price <= 0 ? route('register') : route('pricing.checkout.index',$package->slug) }}"
									class="button btn {{ $loop->iteration == 2 ? 'btn-secondary' : 'btn-primary' }} btn-block margin-top-20">
									@auth()
										{{ __('Upgrade') }}
									@else
										{{ __('Buy Now') }}
									@endauth
								</a>
							@endif
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
