@extends('frontend.dashboard.layouts.app')

@section('title','Dashboard')
@push('styles')
	<link href="{{ asset('frontend/dashboard/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('frontend/dashboard/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
	<div class="widget widget-chart-one">
		<div class="widget-header">
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					<h4>Last 7 Days Clicks</h4>
				</div>
			</div>
		</div>
		<div class="widget-content widget-content-area">
			<div id="s-line" class=""></div>
		</div>
	</div>
@endsection
@push('scripts')
	<script src="{{ asset('frontend/dashboard/plugins/apex/apexcharts.min.js') }}"></script>
	<script>
       let clicks = [];
		 @foreach($clicks as $click)
       clicks.push({{ $click }});
		 @endforeach
       var sline = {
           chart: {
               height: 350,
               type: 'line',
               zoom: {
                   enabled: false
               },
               toolbar: {
                   show: false,
               }
           },
           dataLabels: {
               enabled: false
           },
           stroke: {
               curve: 'straight'
           },
           series: [{
               name: "Clicks",
               data: clicks,
           }],
           title: {
               text: '',
               align: 'left'
           },
           grid: {
               row: {
                   colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
                   opacity: 0.5
               },
           },
           xaxis: {
               categories: ['Day1', 'Day2', 'Day3', 'Day4', 'Day5', 'Day6', 'Day7'],
           }
       }

       var chart = new ApexCharts(
           document.querySelector("#s-line"),
           sline
       );

       chart.render();
	</script>
@endpush
