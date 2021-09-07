@extends('frontend.dashboard.layouts.app')

@section('title','Package')

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/dashboard/assets/css/forms/switches.css') }}">
	<link href="{{ asset('frontend/dashboard/plugins/pricing-table/css/component.css') }}" rel="stylesheet"
			type="text/css"/>
@endpush
@section('content')
	<div class="pricing-plans-container mt-5 d-md-flex d-block">
		<!-- Plan -->
		@foreach($packages as $package)
			<div class="pricing-plan mb-5 {{ $loop->iteration == 2 ? 'mt-md-0 recommended' : '' }}">
				@if($loop->iteration == 2)
					<div class="recommended-badge">Most Popular</div>
				@endif
				<h3>{{ $package->name ?? __('Package') }}</h3>
				<p class="margin-top-10">{{ $package->description ?? __('Description') }}</p>
				<div class="pricing-plan-label billed-monthly-label"><strong>${{ $package->price ?? 0 }}</strong>/ monthly
				</div>
				<div class="pricing-plan-features mb-4">
					<strong>Cloud Hosting Features</strong>
					<ul>
						<li>Single Domain</li>
						<li>50 GB SSD</li>
						<li>1 TB Premium Bandwidth</li>
					</ul>
				</div>
				<a href="javascript:void(0);"
					class="button btn {{ $loop->iteration == 2 ? 'btn-default' : 'btn-primary' }} btn-block margin-top-20">Buy
					Now</a>
			</div>
		@endforeach
	</div>
@endsection
