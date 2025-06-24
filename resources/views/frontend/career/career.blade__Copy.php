@extends('frontend.layouts.master-landing')
@php
$page_title = 'Career';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')


@include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title])

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 my-2 bg-secondary text-white">
                <h3 class="title-text my-font text-white p-2" style="font-size: 20px;">Career Opportunities</h3>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-2">

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                        </li>
                        @foreach($job_categories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'status' : '' }}" id="pills-{{ $category->slug }}-tab" data-category="{{ $category->slug }}" data-bs-toggle="pill" data-bs-target="#pills-{{ $category->slug }}" type="button" role="tab" aria-controls="pills-{{ $category->slug }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">{{ $category->title }}</button>
                        </li>
                        @endforeach
                    </ul>


                    <div class="tab-content" id="pills-tabContent">
                        @foreach($job_categories as $index => $category)
                    
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="pills-{{ $category->slug }}" role="tabpanel" aria-labelledby="pills-{{ $category->slug }}-tab">
                        {{ $category->title }}
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>


@endsection

@push('styles')
<style>
    .nav-pills .nav-link {
        border: 1px solid transparent;
    }

    .nav-pills .nav-link.active {
        border-color: blue;
    }

    .nav-pills .nav-link:not(.active) {
        border-color: gray;
    }

    .nav-pills .nav-item {
        margin: 0px 6px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('[data-category]');
        const careerNotices = document.querySelectorAll('.career-notice');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                careerNotices.forEach(notice => {
                    if (category === 'all' || notice.getAttribute('data-category') === category) {
                        notice.style.display = 'block';
                    } else {
                        notice.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush