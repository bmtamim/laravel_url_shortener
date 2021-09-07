@extends('frontend.dashboard.layouts.app')

@section('title','Short Link')

@section('content')
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="card">
				<div class="card-body">
					<h5 class="text-center mb-3">Paste and get shorted url.</h5>
					<form action="{{ route('user.links.store') }}" method="POST">
						<div class="row">
							<div class="col-lg-10 col-md-9">
								<div class="form-group m-lg-0 m-md-0">
									<input type="url" class="form-control" id="link" name="link" placeholder="Enter Your Link">
									<p id="link-error" class="text-danger m-0" style="display: none"></p>
								</div>
							</div>
							<div class="col-lg-2 col-md-3">
								<div class="form-group m-lg-0 m-md-0">
									<button type="submit" class="btn btn-primary text-uppercase"
											  id="link-btn">{{ __('Shorten') }}</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
	<script>
       $('#link-btn').on('click', function (e) {
           e.preventDefault();
           let link = $('#link');
           let linkBtn = $(this);
           let linkError = $('#link-error');
           $.ajax({
               url: "{{ route('user.links.store') }}",
               method: 'POST',
               data: {"link": link.val(), "_token": "{{ csrf_token() }}"},
               statusCode: {
                   422: function (data) {
                       link.addClass('is-invalid');
                       linkError.html(data.responseJSON.errors.link);
                       linkError.show();
                       linkBtn.attr('disabled', false);
                   }
               },
               beforeSend: function (xhr) {
                   xhr.setRequestHeader('Accept', 'application/json');
                   linkBtn.attr('disabled', true);
               },
               success: function (response) {
                   alert(response.link);
               },
           });
       });
	</script>
@endpush
