@extends('frontend.journal.layouts.jurnal-landing')
@php
$page_title = 'Butex Journal';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
<div class="container-md my-4">
    <div class="row">
        <div class="col-8">
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                        </svg>
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>BUTEX JURNAL </h1>
                                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                        </svg>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>BUTEX JURNAL </h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                        </svg>
                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>BUTEX JURNAL </h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-4">
            <form method="get" action="">
                <div class="input-group">
                    <label style="width:85%">
                        <input class="form-control" type="text" name="SearchTerm">
                    </label>
                    <div class="input-group-append">
                        <button type="submit" class="btn" style="background-color: #00c5bf;"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    NEWS AND RELEASES
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

</div>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div style="width: 75%; margin: 0 auto;" class="card shadow-sm">
                    <img class="card-img-top" src="{{ asset('dummy/research-paper2.jpg') }}" height="200px" alt="research-paper">

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View Details</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            <div style="width: 75%; margin: 0 auto;" class="card shadow-sm">
                    <img class="card-img-top" src="{{ asset('dummy/research-paper2.jpg') }}" height="200px" alt="research-paper">

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View Details</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            <div style="width: 75%; margin: 0 auto;" class="card shadow-sm">
                    <img class="card-img-top" src="{{ asset('dummy/research-paper2.jpg') }}" height="200px" alt="research-paper">
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View Details</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<section>
    <div class="journal-details my-5">
        <div class="container">
            <div class="row">
                <h2>TRENDING ARTICLES</h2>
                <div class="col-md-12" id="affiliate-list">
                    <div class="row">
                    <div class="affiliate-content col-12 mb-4">
                            <div class="border rounded shadow-sm p-3 affiliate-text">
                                <h6 class="content-title fs-5">
                                    <a href="#" style="text-decoration: none">Application of Strength-Based Social Vulnerability Index (SSVI) in Vulnerability Assessment: Bangladesh Perspective</a>
                                </h6>
                               <p>Author: 1. Jinat Ara Nasrin 2. Saadmaan Jubayer Khan 3. Dr. Md. Mostafizur RahmanDOI: Publish Date: June 1, 2024</p>
                               <p>BUTEX JOURNAL Paper, Volume - 8, Issue - 1, June - 2020</p>
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
    /* Carousel base class */
    .carousel {
        margin-bottom: 2rem;
    }

    /* Since positioning the image, we need to help out the caption */
    .carousel-caption {
        bottom: 1rem;
        z-index: 10;
    }

    /* Declare heights because of positioning of img element */
    .carousel-item {
        height: 22rem;
    }
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush