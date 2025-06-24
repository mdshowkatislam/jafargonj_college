@extends('frontend.layouts.master-landing')
@php
$page_title = 'Butex Vision & Mission';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section>
    <div class="mt-4 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="accordion mb-2" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapse1">
                                    Our Vision
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    {!! @$about->vision !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mb-2" id="accordionExample2">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10"
                                    aria-expanded="false" aria-controls="collapse10">
                                    Our Mission
                                </button>
                            </h2>
                            <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    {!! @$about->mission !!}
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="accordion mb-2" id="accordionExample3">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse100"
                                    aria-expanded="false" aria-controls="collapse100">
                                    Our Objective
                                </button>
                            </h2>
                            <div id="collapse100" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                <div class="accordion-body">
                                    {!! @$about->objective !!}
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('styles')
<style>
    .accordion-button{
        padding: 10px 15px;
    }
    .accordion-header > button {
        color: #000000;
        background-color: #00c5bf;
        border-color: #ddd;
        font-size: 1.2rem;
        font-weight: 500;
    }
    .accordion-button:not(.collapsed) {
        color: #ffffff;
        background-color: #B5212D;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
    }
    .accordion-body{
        color: #181818;
        font-size: 16px;
        line-height: 1.5;
    }
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush