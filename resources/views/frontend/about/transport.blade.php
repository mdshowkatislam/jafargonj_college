@extends('frontend.layouts.master-landing')

@php
$page_title = 'Transport Facilities of Bangladesh University of Textiles';
@endphp

@section('title', $page_title)


@push('styles')
	<style type="text/css">
		.title-text{
		    padding: 15px;
		    color: #fff;
		}
		
		.card1 {
			display: block;
			position: relative;
			max-width: 28rem; /* 28rem */
			background-color: #f2f8f9;
			border-radius: 4px;
			padding: 32px 24px;
			margin: 12px;
			text-decoration: none;
			z-index: 0;
			overflow: hidden;

			&:before {
				content: "";
				position: absolute;
				z-index: -1;
				top: -16px;
				right: -16px;
				background: #00c5bf;
				height: 32px;
				width: 32px;
				border-radius: 32px;
				transform: scale(1);
				transform-origin: 85% 15%;
				transition: transform 0.25s ease-out;
				-webkit-transition: transform 0.25s ease-out; /* Safari */
				-moz-transition: transform 0.25s ease-out; /* Firefox */
				-o-transition: transform 0.25s ease-out; /* Opera */
			}

			&:hover:before {
				transform: scale(21);
				-webkit-transform: scale(21); /* Safari */
				-moz-transform: scale(21); /* Firefox */
				-o-transform: scale(21); /* Opera */
			}
			}

			.card1:hover {
				p {
					transition: all 0.3s ease-out;
					-webkit-transition: all 0.3s ease-out; /* Safari */
					-moz-transition: all 0.3s ease-out; /* Firefox */
					-o-transition: all 0.3s ease-out; /* Opera */
					color: rgba(255, 255, 255, 0.8);
				}
				td, th {
					transition: all 0.3s ease-out;
					-webkit-transition: all 0.3s ease-out; /* Safari */
					-moz-transition: all 0.3s ease-out; /* Firefox */
					-o-transition: all 0.3s ease-out; /* Opera */
					color: #ffffff;
				}
			}
	</style>
@endpush

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
{{-- <section class="counter-numbers" style="background: url({{ asset('public/frontend/images/banner.png') }}); background-position: center center; background-size:cover; margin-top: 95px;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center font_four text-white">University Transport</h3>
    </div>
  </div>
</section> --}}


<section>
	@foreach($transports as $i => $item)
	  <div class="container-fluid">
	    <div class="row d-flex justify-content-center">
	      <div class="col-12">
	        <div class="row d-flex justify-content-center">
	          <div class="col-12 col-sm-6 p-2" style="background-color: #00c5bf; margin: 40px 0;">
	            {{-- <div class="row d-flex justify-content-center">
	              <div class="col-10 offset-0 offset-sm-2"> --}}
	                  <h3 class="title-text my-font text-center">{{ $item->route_title }}</h3>
	              {{-- </div>
	            </div> --}}
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="container">
	  	<div class="row my-4">
	  		<div class="col-12 col-sm-6">
	  			<div class="table-responsive">
	  				<table class="table table-bordered card1">
	  					<tr>
	  						<td colspan="2">Up Route</td>
	  					</tr>
	  					<tr>
	  						<td colspan="2">{{ $item->transport_up_root }}</td>
	  					</tr>
	  					<tr>
	  						<th>Start Time</th>
	  						<th>Arrival Time</th>
	  					</tr>
	  					@foreach($item->up as $up)
	  					<tr>
	  						<td>{{ $up->start_time }}</td>
	  						<td>{{ $up->end_time }}</td>
	  					</tr>
	  					@endforeach
	  				</table>
	  			</div>
	  		</div>
	  		<div class="col-12 col-sm-6">
	  			<div class="table-responsive">
	  				<table class="table table-bordered card1">
	  					<tr>
	  						<td colspan="2">Down Route</td>
	  					</tr>
	  					<tr>
	  						<td colspan="2">{{ $item->transport_down_root }}</td>
	  					</tr>
	  					<tr>
	  						<th>Start Time</th>
	  						<th>Arrival Time</th>
	  					</tr>
	  					@foreach($item->down as $down)
	  					<tr>
	  						<td>{{ $down->start_time }}</td>
	  						<td>{{ $down->end_time }}</td>
	  					</tr>
	  					@endforeach
	  				</table>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	@endforeach
</section>



@endsection
