@php
$logoFooterCenter =
DB::table('logos')->where('type_id',3)->first();
@endphp


<style>
    footer.bg-dark {
   
    background: rgba(0, 33, 71, 1) !important;
    border-top: 2px solid #ffb606;
}
footer.bg-dark .footer-bottom {
    background: rgba(255, 255, 255, 0.06);
    border: none;
}

.footer-default-padding {
    padding-top: 50px;
    / padding-bottom: 60px; /
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
    font-family: "Poppins", sans-serif;
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
    / font-family: 'Open Sans', sans-serif; /
    font-family: "Poppins", sans-serif;
}

footer .f-items .about ul li i {
    font-size: 45px;
    min-width: 55px;
    color: #ffb606;
}

footer .f-items .about ul li:last-child {
    margin-bottom: 0;
}

footer .f-items .f-item.link li {
    margin-bottom: 20px;
}

footer .f-items .f-item.link li:last-child {
    margin-bottom: 0;
}

footer .f-items .f-item.link li i {
    font-size: 10px;
    margin-right: 2px;
    color: #666666;
}

footer .f-items .f-item.link li a:hover,
footer .f-items .f-item.link li a:hover i {
    color: #ffb606;
}

/ Recent Post /
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
    font-family: "Poppins", sans-serif;
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

/ Footer Bottom /
footer .footer-bottom .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

footer .footer-bottom {
    border-top: 1px solid #e7e7e7;
    padding: 20px 0;
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
}

</style>
<footer class="bg-dark text-light" style="background-image: url('upload/logo/{{@$logoFooterCenter->image}}');
    background-position: center center;background-size: 250px;background-repeat: no-repeat;">
    <div class="container logo">
        <div class="f-items footer-default-padding">
            <div class="row">
                <!-- Single item -->
                <div class="col-sm-6 col-xl-2 col-md-6 item equal-height">
                    <div class="f-item link" data-aos="" data-aos-duration="3000" style="line-height:18px">
                        <h4>Useful Links</h4>
                        <ul>
                            @php
                            $position_id =
                            DB::table('menu_types')->where('position','Footer1')->pluck('id')->first();
                            $footer1 =
                            DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id)->orderBy('sort_order','asc')->take(6)->get();
                            @endphp
                            @foreach($footer1 as $f1)
                            <li><a href="{{$f1->url_link }}"><i class="ti-angle-right" style="margin-left: -15px !important;"></i> {{ $f1->title_en }}</a></li>
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
                            <li ><a href="{{$f2->url_link }}"><i class="ti-angle-right" style="margin-left: -15px !important;" ></i> {{ $f2->title_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Single item -->
                <div class="col-sm-6 col-xl-4 col-md-6 item equal-height">
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
                            <li><a href="{{$f3->url_link }}"><i class="ti-angle-right" style="margin-left: -15px !important;"></i> {{ $f3->title_en }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Single item -->
                <!-- End Single item -->
                <!-- Single item -->
                <div class="col-md-3 col-sm-6">
                    <div class="col-sm-12">
                    @php
                    $logoFooterRightLeft =
                    DB::table('logos')->where('type_id',4)->first();
                    $logoFooterRightRight =
                    DB::table('logos')->where('type_id',5)->first();
                    @endphp
                        <div class="col-sm-4">
                            <img src="{{ asset('upload/logo/' . @$logoFooterRightLeft->image) }}" class="logo" alt="Logo">
                        </div>
                        <div class="col-sm-8">
                            <img src="{{ asset('upload/logo/' . @$logoFooterRightRight->image) }}" class="logo" alt="Logo"
                                style="width: 270px; height: 50px;">
                        </div>
                        <div class="clearfix"></div>
                        <div class="footer-content urgent-need" data-aos="" data-aos-duration="3000">
                            <p style="font-size:13px;">
                                <i class="fa fa-map-marker"></i>
                                {{@$contact_infos->location}}
                            </p>
                            <p>
                                <a class="telephone">
                                    <b>Phone :</b> {{@$contact_infos->phone}}</a>
                                <br>
                                <a class="telephone">
                                    <b>Fax :</b> {{@$contact_infos->fax}}</a>
                                <br>
                                <a href="#">
                                    <b>Email :</b> {{@$contact_infos->email}}
                                </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>

                        <li style="padding-top:20px;color: #fff;"></li>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p>&copy; 2024 Bangladesh University of Textiles. All Rights Reserved. Design, Development and
                        Maintenance
                        by <a href="#">ICT Cell</a></p>
                </div>
                <div class="col-md-4 text-right link">
                    <ul>
                            @php
                            $position_id4 =
                            DB::table('menu_types')->where('position','Footer4')->pluck('id')->first();
                            $footer4 =
                            DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id4)->orderBy('sort_order','asc')->take(3)->get();
                            @endphp
                            @foreach($footer4 as $f4)
                            <li><a href="#" target="_blank"> {{ $f4->title_en }}</a></li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
    <a class="btn btn-danger" id="back2Top" title="Back to top" href="#">&#10148;</a>
</footer>