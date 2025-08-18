@extends('frontend.layouts.master-landing')
@php
$page_title = 'List Of Honour Board 2025';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

{{-- @dd($vc_list) --}}

<section>
	<div class="container">
		<div class="mt-4">
			<div class="text-center" style="background-color: #00c5bf;">
				<h3 class="title-text  my-font text-white p-3" style="font-size: 25px">List of Honour Board 2025</h3>
			</div>
		</div>
	</div>
</section>

<section>
    <div class="about-wrap pt-3">
        <div class="container">
            <div class="row">
                @forelse ($vc_list as $person)
                    <div class="col-12 col-md-6 col-lg-3 my-3">
                        <div class="card rounded-0 border-0 d-block text-center pt-3 dean_staff" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                            <div class="border-one"></div>
                            <div class="border-two"></div>
                            <img class="mx-2 mt-2 shadow-lg image-circle" src="{{ asset('upload/vc_honor_board/' . $person->image) }}" height="200" width="200" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="" />
                            <div class="card-body" style="min-height: 7.75rem;">
                                <h5 class="custom-font-titillium-web card-title fs-5 text-center text-capitalize border-top pt-3">
                                    {{ $person->name }}
                                </h5>
                                <p class="text-center common-font-color fs-6 custom-font-titillium-web">
                                    {{ Carbon\Carbon::parse($person->start_date)->format('d-m-Y') }} - 
                                    {{ isset($person->end_date) ? Carbon\Carbon::parse($person->end_date)->format('d-m-Y') : 'present' }}
                                </p>                                
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-6 col-lg-3 mt-3 mb-5">
                        <div class="card rounded-0 member-list-card zoom_in_hover" style="background-color: #00c5bf;">
                            <img class="mb-0"
                                src="{{ asset('upload/profiles/' . $person->image) }}"
                                onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';"
                                alt="Image" />
                            <div class="card-body" style="min-height: 100px;">
                                <h5 class="card-title text-white fs-6 mt-0 text-center">
                                    {{ $person->name }}
                                </h5>
                                <p class="card-text text-white text-center">
                                    {{ $person->start_date }} - {{ $person->end_date }}
                                </p>
                            </div>
                        </div>
                    </div> --}}
                @empty
                <div class="col-md-12">
                    <h2 class="fs-5 p-3 mt-3 mb-5 bg-light rounded">No information found at the moment..</h2>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>


@endsection
@push('styles')
<style>
    .dean_staff{
        /* cursor:pointer; */
        position:relative;
        padding:10px 20px;
        background:white;
        font-size:28px;
        border-top-right-radius:10px;
        border-bottom-left-radius:10px;
        transition:all 1s;
        &:after,&:before{
            content:" ";
            width:10px;
            height:10px;
            position:absolute;
            border :0px solid #fff;
            transition:all 1s;
            }
        &:after{
            top:-1px;
            left:-1px;
            border-top:5px solid #00c5bf;
            border-left:5px solid #00c5bf;
        }
        &:before{
            bottom:-1px;
            right:-1px;
            border-bottom:5px solid #00c5bf;
            border-right:5px solid #00c5bf;
        }
        &:hover{
            border-top-right-radius:0px;
            border-bottom-left-radius:0px;
            /* background:rgba(0,0,0,.5); */
            /* color:white; */
            &:before,&:after{
                width:100%;
                height:100%;
                /* border-color:white; */
            }
        }
    }
    /* .dean_staff {
        position: relative;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    } */

    .image-circle {
        border-radius: 100%;
        border: 5px solid #00c5bf;
        padding: 5px;
    }

    /* .border-one:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-one:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    } */
</style>
@endpush

@push('scripts')
<script>
    
</script>
@endpush