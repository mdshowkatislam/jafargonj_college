@extends('frontend.layouts.master-landing')
@php
$page_title = 'Butex E-Library';
@endphp
@section('title')
{{ $page_title }}
@endsection
@section('content')

{{-- @include('frontend.partials.sections.banner-cover5', ['page_title' => $page_title]) --}}
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section>
    <div class="default-padding">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#ea6060;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">ScienceDirect</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://www.sciencedirect.com/browse/journals-and-books?contentType=BK&contentType=TB&contentType=HB&contentType=RW&contentType=BS&accessType=subscribed" target="_blank"><button class="btn border p-2 text-white r"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#56ccc8;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">JSTOR</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://www.jstor.org/" target="_blank"><button class="btn border-dark p-2 b"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#ea6060;">
                        <div class="row px-3">
                            <div class="col-md-7">
                                <h5 class="text-white fs-4">Emerald Emerald</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-5 my-auto">
                                <a href="https://www.emerald.com/insight/" target="_blank"><button class="btn border p-2 text-white r"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#56ccc8;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">ACM</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://dl.acm.org/" target="_blank"><button class="btn border-dark p-2 b"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#ea6060;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">IEEE</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://www.ieeexplore.ieee.org/" target="_blank"><button class="btn border p-2 text-white r"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#56ccc8;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">SPRINGER</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://link.springer.com/" target="_blank"><button class="btn border-dark p-2 b"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#ea6060;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">Wiley</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://www.wileyindia.com/Wiley_Online_Resources/UGC%20Bangladesh/UGC%20Bangladesh.html" target="_blank"><button class="btn border p-2 text-white r"><i class="fas fa-eye"></i> Visit Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card py-4" style="background-color:#56ccc8;">
                        <div class="row px-3">
                            <div class="col-md-6">
                                <h5 class="text-white fs-4">SAGE</h5>
                                <p class="text-white fs-6">Available from campus network.</p>
                            </div>
                            <div class="col-md-6 my-auto">
                                <a href="https://sk.sagepub.com/signin-oidc/autologin" target="_blank"><button class="btn border-dark p-2 b"><i class="fas fa-eye"></i> Visit Now</button></a>
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
    h1, h2, h3, h4, h5, h6 {
        font-family: "Titillium Web", sans-serif !important;
    }
    .r, .b {
        
    }
    .r:hover {
        background: white;
        color: black !important;
    }
    .b:hover {
        background: black;
        color: white !important;
    }
</style>
@endpush

@push('scripts')
<script>

</script>
@endpush