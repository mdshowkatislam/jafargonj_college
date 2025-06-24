@extends('frontend.layouts.master-landing')
@php
    $page_title = 'No Objection Certificate/GO';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

   
    <!-- <div class="clearfix"></div>
  
    <div class="breadcrumb-area shadow dark text-center text-light"
        style="background-image: url(http://localhost/butex-website/upload/banner/banner-butex.png); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2>Approved NOC / GO</h2>
                    <ul class="breadcrumb d-flex justify-content-center mx-auto w-25">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active text-dark">Approved NOC / GO</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    @include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])
    
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="courses-info">
                        <div class="tab-info">
                            <div class="panel panel-primary">
                                {{-- <div class="panel-heading mb-2" id="heading-gradiant">NOC / GO</div> --}}
                                <div class="panel-body text-justify">
                                    {{-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <b>Type:</b> &nbsp;&nbsp;
                                                    <input type="radio" class="form-check-input applyType"
                                                        id="applyType_All" name="applyType" value="ALL" checked>
                                                    <label class="form-check-label" for="applyType_All">All</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" class="form-check-input applyType"
                                                        id="applyType_NOC" name="applyType" value="NOC">
                                                    <label class="form-check-label"
                                                        for="applyType_NOC">NOC</label>&nbsp;&nbsp;

                                                    <input type="radio" class="form-check-input applyType"
                                                        id="applyType_GO" name="applyType" value="GO">
                                                    <label class="form-check-label" for="applyType_GO">GO</label>

                                                </div>
                                            </div>

                                        </div>
                                    </div> --}}

                                    <form method="GET" action="{{ url('/noc-filter') }}">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-sm-8">
                                                <a href="/noc"><button type="button" class="btn btn-theme effect">Show All</button></a>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                        <input type="text" class="form-control mx-1" placeholder="Search..." value="{{ @$title }}" name="search_data">  
                                                    </div>
                                                    <div class="ms-2 flex-grow-1">
                                                        <button type="submit" class="btn btn-theme">Search</button>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="">
                                        @if(@$title)
                                            <h5 class="text-center"><span style="color: #228f8b;">Search result for</span> <span style="color: #BA313D; ">'{{ @$title }}'</span></h5>
                                        @endif
                                    </div>

                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S/L</th>
                                                    <th>Noc title</th>
                                                    {{-- <th class="width-20per">Name</th>
                                                    <th class="width-20per">Department/Office</th> --}}
                                                    <th class="width-5per">Type</th> 
                                                    <th style="width: 200px;">Publish Date</th>
                                                    <th>Attachment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($nocs->isNotEmpty())  
                                                    @foreach ($nocs as $item )
                                                        <tr>  
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->title }}</td>
                                                            {{-- <td>{{ $item->pname }}</td>
                                                            <td>{{ $item->dname }}</td>--}}
                                                            <td>{{ $item->noc_type }}</td> 
                                                            <td>{{ date('d M, Y',strtotime($item->publish_date)) }}</td>
                                                            <td>
                                                                <a href="{{ asset('/upload/office_order/' . $item['attachment']) }}" class="btn btn-theme effect" target="_blank"><i class="fa fa-share"></i> View </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $nocs->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content ============================================= -->

    <p></p>
    <p></p>

  @endsection

    <!-- jQuery Frameworks -->
    {{-- <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/loopcounter.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/spotlight/script.js"></script>
    <script src="assets/modules/du_home3860.js?v=1"></script>
    <script src="assets/modules/custom.js"></script> --}}



