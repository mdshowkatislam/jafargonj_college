@php
$logoFooterCenter = DB::table('logos')->where('type_id',3)->first();
@endphp

<style>
    footer{
        overflow: hidden;
    }
    footer.bg-dark {
        border-top: 2px solid #ffb606;
    }

    footer.bg-dark .footer-bottom {
        background: rgba(255, 255, 255, 0.06);
        border: none;
    }

    .footer-default-padding {
        padding-top: 20px;
        padding-bottom: 15px;
    }

    .top-course-items .footer-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid #e7e7e7;
        margin-top: 20px;
        padding-top: 25px;
    }

    .top-course-items .footer-meta h4 {
        margin: 0;
    }

    footer.top-padding {
        padding-top: 110px;
    }

    footer .f-items .f-item h4 {
        /* text-transform: capitalize;*/
        font-weight: 600;
        margin-bottom: 30px;
    }

    footer .f-items .about ul {
        padding-top: 30px;
        border-top: 1px solid #e7e7e7;
        margin-top: 25px;
    }

    footer.bg-dark .f-items .about ul {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    footer .f-items .about ul li {
        display: flex;
        align-items: center;
        font-family: "Titillium Web", sans-serif;
        margin-bottom: 15px;
    }

    footer .f-items .about ul li p {
        margin: 0;
        padding-left: 0;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.6px;
    }

    footer .f-items .about ul li span {
        display: block;
        text-transform: lowercase;
        letter-spacing: inherit;
        font-weight: 400;
        font-family: "Titillium Web", sans-serif;
    }

    footer .f-items .about ul li i {
        font-size: 45px;
        min-width: 55px;
        color: #21e7f9;
    }

    footer .f-items .about ul li:last-child {
        margin-bottom: 0;
    }

    footer .f-items .f-item.link li {
        margin-bottom: 20px;
        list-style-type: none;
    }

    footer .f-items .f-item.link li:last-child {
        margin-bottom: 0;
    }

    footer .f-items .f-item.link li i {
        font-size: 10px;
        margin-right: 2px;
        color: #5df3ee;
    }

    footer .f-items .f-item.link li a:hover,
    footer .f-items .f-item.link li a:hover i {
        color: #00c5bf;
    }

    footer .f-item.popular-courses li a {
        color: #cccccc;
        display: block;
        font-size: 15px;
        font-weight: 500;
        /* text-transform: capitalize;*/
    }

    footer.bg-fixed .f-item.popular-courses li a {
        color: #ffffff;
    }

    footer.bg-light .f-item.popular-courses li a {
        color: #002147;
    }

    footer .f-item.popular-courses li a:last-child {
        display: inline-block;
        font-weight: 400;
    }

    footer .f-item.popular-courses .meta-title {
        color: #cccccc;
        font-family: "Titillium Web", sans-serif;
        margin-top: 10px;
    }

    footer.bg-light .f-item.popular-courses .meta-title {
        color: #666666;
    }

    footer.bg-fixed .f-item.popular-courses .meta-title {
        color: #ffffff;
    }

    footer.bg-fixed .f-item.popular-courses .meta-title {
        color: #ffffff;
    }

    footer .f-item.popular-courses li a:hover {
        color: #ffb606;
    }

    footer .f-item.popular-courses li a span {
        display: inline-block;
        color: #cccccc;
    }

    footer .f-item.popular-courses li span {
        display: inline-block;
        /* text-transform: capitalize;*/
    }

    footer .f-item.popular-courses .meta-title a {
        /* text-transform: capitalize;*/
    }

    footer .f-item.popular-courses li {
        color: #cccccc;
    }
    a{
        text-decoration: none !important;
    }
    footer.bg-fixed .f-item.popular-courses li {
        color: #ffffff;
    }

    footer.bg-light .f-item.popular-courses li {
        color: #666666;
    }

    footer .f-item.popular-courses>ul>li {
        border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
        margin-bottom: 15px;
        padding-bottom: 15px;
    }

    footer.bg-fixed .f-item.popular-courses>ul>li {
        border-bottom: 1px dashed rgba(255, 255, 255, 0.3);
    }

    footer .f-item.popular-courses li:last-child {
        border: medium none;
        margin: 0;
        padding: 0;
    }

    footer .f-item.popular-courses li:last-child {
        margin: 0;
    }

    footer .f-item.popular-courses li .thumb {
        display: table-cell;
        padding-top: 5px;
        vertical-align: top;
        width: 80px;
    }

    footer .f-item .thumb img {
        width: 100%;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    footer .f-item.popular-courses li .info {
        display: table-cell;
        padding-left: 20px;
        vertical-align: top;
        line-height: 26px;
        color: #837f7e;
    }

    footer .f-items .f-item.popular-courses .info ul {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    footer .f-items .f-item.popular-courses .info ul li {
        margin-right: 10px;
        padding-right: 10px;
        position: relative;
        z-index: 1;
    }

    footer .f-items .f-item.popular-courses .info ul li i {
        color: #ffb606;
        font-size: 12px;
    }

    footer .f-items .f-item.popular-courses .info ul li::after {
        position: absolute;
        right: 0;
        top: 7px;
        content: "";
        height: 15px;
        width: 1px;
        background: rgba(255, 255, 255, 0.2);
    }

    footer.bg-light .f-items .f-item.popular-courses .info ul li::after {
        background: #e7e7e7;
    }

    footer .f-items .f-item.popular-courses .info ul li:last-child {
        margin: 0;
        padding: 0;
    }

    footer .f-items .f-item.popular-courses .info ul li:last-child::after {
        display: none;
    }


    footer .footer-bottom .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    footer .footer-bottom {
        border-top: 1px solid #e7e7e7;
        padding: 20px 0;
        margin-top: 40px;
    }


    footer .footer-bottom li {
        display: inline-block;
    }

    footer .footer-bottom p {
        margin: 0;
    }

    footer .footer-bottom p a {
        font-weight: 600;
        color: #ffb606;
    }

    footer .footer-bottom .text-right li {
        margin-left: 20px;
    }

    footer .footer-bottom .text-right li:first-child {
        margin: 0;
    }

    footer .footer-bottom .link li a {
        font-weight: 600;
        color: #ffffff;
    }

    footer ul li a {
        color: #ffffff;
    }

    .background-container{
        position: relative; 
        background-image: url('{{ asset('login_background.jpg') }}');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        z-index: 1;
    }


    .text-light.background-container::before {
        content: ""; 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #035045eb;
        z-index: -1; 
        pointer-events: none; 
    }

    .footer-margin{
        margin-left: 0px;
    }

    .footer-text{
        text-align: right;
    }

    @media only screen and (max-width: 1200px) {
        .footer-margin {
            padding-left: 2rem;
            margin-top: 1rem;
        }
    }

    @media only screen and (min-width:200px ) and (max-width:979px){
        .footer-margin{
            padding: 10px;
            margin-left: 20px;
            margin-top: 20px;
        }

        .footer-text{
            text-align: center;
        }
    }
</style>

<footer class="text-light background-container">
    <div class="container logo">
        <div class="f-items footer-default-padding">
            <div class="row">
                <!-- Single item -->
                <div class="col-sm-6 col-xl-3 col-md-6 item equal-height">
                    <div class="f-item link" data-aos="" data-aos-duration="3000" style="line-height:18px">
                        <h4 class="custom-font-titillium-web">Useful Links</h4>
                        <ul>
                            @php
                            $position_id =
                            DB::table('menu_types')->where('position','Footer1')->pluck('id')->first();
                            $footer1 =
                            DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id)->orderBy('sort_order','asc')->take(6)->get();
                            @endphp
                            @foreach($footer1 as $f1)
                                <li class=""><a href="{{$f1->url_link }}" target="{{ $f1->target }}" class="custom-font-titillium-web"><i class="ti-angle-right" style="margin-left: -15px !important;"></i> {{ $f1->title_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Single item -->
                <!-- Single item -->
                <div class="col-sm-6 col-xl-3 col-md-6 item equal-height">
                    <div class="f-item link" data-aos="" data-aos-duration="3000" style="line-height:18px">
                        <h4>&nbsp;</h4>
                        <ul>
                            @php
                            $position_id2 =
                            DB::table('menu_types')->where('position','Footer2')->pluck('id')->first();
                            $footer2 =
                            DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id2)->orderBy('sort_order','asc')->take(6)->get();
                            @endphp
                            @foreach($footer2 as $f2)
                            <li ><a class="custom-font-titillium-web" href="{{$f2->url_link }}" target="{{ $f2->target }}"><i class="ti-angle-right" style="margin-left: -15px !important;" ></i> {{ $f2->title_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Single item -->
                <div class="col-sm-6 col-xl-3 col-md-6 item equal-height">
                    <div class="f-item link" data-aos="" data-aos-duration="3000" style="line-height:18px">
                        <h4>&nbsp;</h4>
                        <ul>
                            @php
                            $position_id3 =
                            DB::table('menu_types')->where('position','Footer3')->pluck('id')->first();
                            $footer3 =
                            DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id3)->orderBy('sort_order','asc')->take(6)->get();
                            @endphp
                            @foreach($footer3 as $f3)
                            @if($f3->pages_id != null)
                            <li><a href="{{ $f3->url_link ? url('/pages/' . $f3->url_link . '/' . $f3->pages_id) : '#' }}" target="{{ $f3->target }}"><i class="ti-angle-right" style="margin-left: -15px !important;"></i> {{ $f3->title_en }}</a></li>
                            @else
                            <li><a href="{{$f3->url_link }}" target="{{ $f3->target }}"><i class="ti-angle-right" style="margin-left: -15px !important;"></i> {{ $f3->title_en }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Single item -->
                <!-- End Single item -->
                <!-- Single item -->
                <div class="col-sm-6 col-xl-3 col-md-6 item footer-margin">
                    <div class="">
                    @php
                    $logoFooterRightLeft =
                    DB::table('logos')->where('type_id',4)->first();
                    $logoFooterRightRight =
                    DB::table('logos')->where('type_id',5)->first();

                    $contact_info = DB::table('contacts')->first();
                    @endphp
                       
                        <div class="col-sm-8">
                            <h4 class="custom-font-titillium-web">Contact Us</h4>
                            {{-- <img src="{{ asset('upload/logo/' . @$logoFooterRightRight->image) }}" class="mb-3" alt="Logo"
                                style="width: 280px; height: auto;"> --}}
                        </div>
                        <div class="clearfix"></div>
                        <div class="footer-content urgent-need" data-aos="" data-aos-duration="3000">
                            <p class="custom-font-titillium-web" style="font-size:13px;">
                                {{-- <i class="fa fa-map-marker"></i> --}}
                                <span style="font-size: 15px;">Jafargonj Mir Abdul Gafur College</span> <br/>
                                {{@$contact_info->location}}
                            </p>
                            <p>
                                <a class="telephone custom-font-titillium-web">
                                    <span>Phone :</span> {{@$contact_info->phone}}</a>
                                <br>
                                <a class="telephone custom-font-titillium-web">
                                    <span>Fax :</span> {{@$contact_info->fax}}</a>
                                <br>
                                <a href="#">
                                    <span class="custom-font-titillium-web">Email :</span> {{@$contact_info->email}}
                                </a>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Bottom -->
    <div class="py-2 align-items-center" style="{{ @$design->css_preview_bottom }}">
        <div class="container" style="{{ @$json_style['bottom_text_color'] }}">
            <div class="row">
                <div class="col-sm-6">
                    <p class="mb-0 fs-7 custom-font-titillium-web">All Rights Reserved © Jafargonj Mir Abdul Gafur College- 2025</p>
                </div>
                <div class="col-sm-6 footer-text">
                    <p class="mb-0 fs-7 custom-font-titillium-web">
                        Developed by
                        <a rel="nofollow" href="http://www.nanoit.biz/" target="_blank" class="text-white fw-bold">
                            <span>Nanosoft</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Footer Bottom -->
    {{--  <a class="btn btn-danger" id="back2Top" title="Back to top" href="#">&#10148;</a>  --}}
</footer>