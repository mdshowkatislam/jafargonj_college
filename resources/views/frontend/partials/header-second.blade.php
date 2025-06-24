
<style type="text/css">
    .dropdown-large{ padding:1rem; }
    .dropdown-menu h6{font-weight: 600 !important;}
    #main_nav .nav-link{
        color: #fff !important;
    }
    .list-unstyled a{
        color: #000;
        font-weight: 400;
        line-height: 32px;
    }
    .list-unstyled a:hover{
        color: #ffb606 !important;
    }
    .dropdown-menu a:hover{
        color: #ffb606 !important;
    }
    .dropdown-item:active{
        background-color: #01803d !important;
    }
    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {
        .dropdown-large{min-width:991px;}
    }
    /* ============ desktop view .end// ============ */
</style>

<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        {{-- <section id="topbar" class="d-flex justify-content-center align-items-center d-md-block" style="background: #179bd7 !important"> --}}
            {{-- <div class="topbar text-end container-fluid">
                @foreach ($top_menus as $item)
                    @if (isset($item->url_link_type) && $item->url_link_type == 1)
                        <a href="{{ route($item->url_link) }}">{{ $item->title_en }}</a>
                    @elseif (isset($item->url_link_type) && $item->url_link_type == 3)
                        <a href="{{ $item->url_link }}" target="_blank">{{ $item->title_en }}</a>
                    @endif
                @endforeach
            </div> --}}
            {{-- <div class="topbar text-end container-fluid">
                <a href="https://old.bup.edu.bd/" target="_blank">Old Website</a>
                <a href="https://forms.office.com/r/0VeZTuBMEZ" target="_blank" >Alumni</a>
                <a href="https://webportal.bup.edu.bd/" target="_blank">UCAM</a>
                <a href="https://login.microsoftonline.com/" target="_blank">Webmail</a>
                <a href="https://admission.bup.edu.bd/" target="_blank">Current Admissions</a>
                <a href="{{ route('career_list') }}">Career</a>
                <a href="{{ route('gallery_list') }}">Gallery</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('suggestion') }}">Suggestion</a>
            </div> --}}
        {{-- </section> --}}
        {{-- <div class="container"> --}}
            <div class="">
                <nav class="navbar navbar-expand-lg navbar-dark bg-light py-0 shadow" style="background: #253b80 !important">
                    <div class="container-fluid">
                        <div class="logo">
                            @include('frontend.partials.logo.bup_header', ['logo_title'=>'BANGLADESH UNIVERSITY OF <br/>TEXTILES', 'route'=>'index'])
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" style="background: #16501d;"  aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ms-auto align-items-center">
                                @php
$position_id =
DB::table('menu_types')->where('position','Header Nav Bar')->pluck('id')->first();
$parents =
DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id)->orderBy('sort_order','asc')->get();

@endphp
@foreach($parents as $parent)
    @php
    $lastparentsEmpty =
    DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();
    @endphp
            @if ($lastparentsEmpty->isEmpty())
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" href="{{ menuUrl($parent) }}"> {{ $parent->title_en }} </a>
                </li>
            @elseif (!$lastparentsEmpty->isEmpty())
            @php
            $subparents =
            DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();
            @endphp
            @foreach($subparents as $subparentEmpty)
                @php
                $lastparentsEmpty2 =
                DB::table('frontend_menus')->where('status',1)->where('parent_id',$subparentEmpty->rand_id)->orderBy('sort_order','asc')->get();
                @endphp
            @endforeach
            @if ($lastparentsEmpty2->isEmpty())
            <li class="nav-item dropdown">
                <a href="{{ menuUrl($parent) }}" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">
                {{ $parent->title_en }}
                    <span></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                @foreach($subparents as $subparent)

                <li>
                    <a class="dropdown-item" href="{{ menuUrl($subparent) }}"><i class="fas fa-angle-double-right"></i>
                    {{ $subparent->title_en }}</a>
                </li>
                @endforeach
                </ul>

            @elseif (!$lastparentsEmpty2->isEmpty())
            <li class="nav-item dropdown">
            <a href="{{ menuUrl($parent) }}" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">
            {{ $parent->title_en }}
                <span></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                <li>
                @foreach($subparents as $subparent)
                        @php
                        $lastparents =
                        DB::table('frontend_menus')->where('status',1)->where('parent_id',$subparent->rand_id)->orderBy('sort_order','asc')->get();
                        @endphp
                        <div class="col-menu col-md-4">
                        <h6 class="title menuTitle">{{ $subparent->title_en }}</h6>
                            <div class="content">

                                <ul class="menu-col">
                                @foreach($lastparents as $lastparent)
                                    <li><a href="{{ menuUrl($lastparent) }}">
                                        <i class="fas fa-angle-double-right"></i> {{$lastparent->title_en }}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        @endforeach

                    <!-- end row -->
                </li>

        </ul>
    </li>
    @endif
    @endif
@endforeach
                            </ul>
                        </div> <!-- navbar-collapse.// -->
                    </div>
                    {{-- <a class="navbar-brand" href="#">Brand</a> --}}

                    {{-- <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"> --}}
                        {{-- <span class="common-font-color fs-6 fw-bold mb-0 logo-title">BANGLADESH UNIVERSITY OF <br/>PROFESSIONALS</span> --}}
                    {{-- </a> --}}

                </nav>
            </div>
    {{-- </div> --}}
    </div>
</div>

<script>
        $(function(){
            var href = "{{ url()->current()}}";
            var thisUrl = $('.dropdown-item[href="'+href+'"]');
            $(thisUrl).parents('.highlight-nav').find('.nav-bar-item-menu').css('borderBottom','3px solid #006a4e');
            $(thisUrl).css('backgroundColor','#006a4e').css('color', '#fff');
        });
</script>

<!-- ===== Header section end ===== -->
