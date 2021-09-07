@extends('frontend.layouts.app')

@section('title','Checkout')
@push('styles')
	<style>
       .card-number-box {
           position: relative;
       }

       span.card-icon-label {
           position: absolute;
           width: 42px;
           height: 30px;
           background: #fff;
           top: 2px;
           right: 3px;
           padding: 1px 1px;
       }

       i.card-icon-img {
           background-image: url("{{ asset('frontend/assets/images/card_sprite.png') }}");
           background-repeat: no-repeat;
           width: 100%;
           height: 100%;
           display: none;
           padding: 0;
       }

       i.card-icon-img.visa {
           display: inline-block;
           background-position: 0 -37px;
       }

       i.card-icon-img.mastercard {
           display: inline-block;
           background-position: 0 -70px;
       }

       .spinner-border {
           display: none;
       }
	</style>
@endpush
@section('content')
	<div class="container pt-5 mt-3">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<ul>
							<li>Package Name : <strong>{{ $package->name ?? 'Package' }}</strong></li>
							<li>Package Price : <strong>${{ $package->price ?? 0 }}</strong></li>
							<li>Package Links Limit : <strong>{{ $package->links_limit ?? 0 }} <sub>/per month</sub></strong>
							</li>
							<li>Package Billing Type : <strong>{{ $package->billing_type ?? 'Monthly' }}</strong></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card">

					@if($errors->any())
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif
					<form action="{{ route('pricing.checkout.store',$package->id) }}" method="POST" id="payment-form">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name"
										 value="{{ old('name') ?? auth()->user()->name }}">
								@error('name')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email"
										 value="{{ old('email') ?? auth()->user()->email }}">
								@error('email')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St"
									 value="{{ old('address') }}">
							@error('address')
							<p class="text-danger m-0">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-row mb-4">
							<div class="form-group col-md-3">
								<label for="city">City</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="Ex: Dhaka"
										 value="{{ old('city') }}">
								@error('city')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group col-md-3">
								<label for="state">State/Province</label>
								<input type="text" class="form-control" id="state" name="state" placeholder="Ex: Dhaka"
										 value="{{ old('state') }}">
								@error('state')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group col-md-3">
								<label for="country">Country</label>
								<select id="country" class="form-control" name="country">
									<option selected>Choose...</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Pakistan">Pakistan</option>
								</select>
								@error('country')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
							<div class="form-group col-md-3">
								<label for="zip" name="zip" value="{{ old('zip') }}">Zip</label>
								<input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
								@error('zip')
								<p class="text-danger m-0">{{ $message }}</p>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="card_number">{{ __('Card Number') }}</label>
										<div class="card-number-box">
											<input type="tel" id="card_number" name="card_number" class="form-control"
													 placeholder="4242 4242 4242 4242">
											<span class="card-icon-label">
                                                                <i class="card-icon-img null"></i>
                                                            </span>
										</div>
										@error('card_number')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
										<p class="text-danger error card_error">Card Number is invalid!</p>
										@if(session()->has('card_error'))
											<p class="text-danger m-0">{{ session()->get('card_error') }}</p>
										@endif
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="card_expiry">{{ __('Card Expiration') }}</label>
										<input type="tel" id="card_expiry" name="card_expiry" class="form-control"
												 placeholder="02 / 22">
										@error('card_expiry')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="card_cvc">{{ __('Card CVC') }}</label>
										<input type="tel" id="card_cvc" name="card_cvc" class="form-control"
												 placeholder="111">
										@error('card_cvc')
										<p class="text-danger m-0">{{ $message }}</p>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" type="button" id="submit">
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							<span>Pay Now</span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
	<script src="{{ asset('frontend/plugins/payment/jquery.payment.js') }}"></script>
	<script>
       $('#card_number').payment('formatCardNumber');
       $('#card_expiry').payment('formatCardExpiry');
       $('#card_cvc').payment('formatCardCVC');

       $('#card_number').on('keyup', function () {
           let icon = $(this).siblings('.card-icon-label').children('.card-icon-img');
           let iconLastClass = icon.attr('class').split(' ').pop();
           if (icon.attr('class').split(' ').length > 1) {
               icon.removeClass(iconLastClass);
           }
           icon.addClass($.payment.cardType($(this).val()));
       });

       $('#card_number').on('blur', function () {
           let cardError = $('.card_error');
           if ('' != $(this).val()) {
               if (!$.payment.validateCardNumber($(this).val())) {
                   cardError.text('Card Number is Invalid!!');
                   cardError.show();
               } else {
                   cardError.hide();
               }
           }
       });

       $('#card_expiry').on('blur', function () {
           let cardError = $('.card_error');
           if ('' != $(this).val()) {
               let crsExpireVal = $.payment.cardExpiryVal($(this).val());
               if (!$.payment.validateCardExpiry(crsExpireVal.month, crsExpireVal.year)) {
                   cardError.text('Card Expiry is Invalid!!');
                   cardError.show();
               } else {
                   cardError.hide();
               }
           }
       });

       $('#card_cvc').on('blur', function () {
           let cardError = $('.card_error');
           if ('' != $(this).val()) {
               if (!$.payment.validateCardCVC($(this).val())) {
                   cardError.text('Card CVC is Invalid!!');
                   cardError.show();
               } else {
                   cardError.hide();
               }
           }
       });
	</script>
	<script>
       /* $('#payment-form').on('submit', function (e) {
           e.preventDefault();
           let formData = $(this).serialize();
           console.log(formData);
       });*/
	</script>
@endpush
