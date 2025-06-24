
@extends('frontend.landing')
@php
    $page_title = 'সিনেট সদস্যদের তালিকা';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>


    <!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">

                    <div class="top-author">
                        <div class="author-items"
                            style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                            <div class="du_heading">ঢাকা বিশ্ববিদ্যালয়</div>
                            <div class="title-heading"> সিনেট সদস্যদের তালিকা</div>
                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(এ)(বি)(সি) অনুযায়ী</u></strong></p>

                            <div class="table-responsive">
                                <table id="table-list" class="table table-bordered"
                                    style="border:1px solid #d0d0d0;width:100%">
                                    <thead>
                                        <tr>
                                            <td class="bold text-center" width="5%">
                                                ক্রমিক&nbsp;
                                            </td>
                                            <td class="bold text-center" width="50%">
                                                নাম, পদবী ও ঠিকানা
                                            </td>
                                            <td class="bold text-center">
                                                ফোন ও ই-মেইল নম্বর
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                ১.
                                            </td>
                                            <td>
                                                <strong>অধ্যাপক ড. এ এস এম মাকসুদ কামাল</strong></br>
                                                ভাইস-চ্যান্সেলর</br>
                                                ঢাকা বিশ্ববিদ্যালয়<br />
                                            </td>
                                            <td class="text-center">
                                                ৯৬৭২৫৩৩/, ৯৬৭২৫৪৫<br />
                                                ৯৬৭২৫৩৪, ৯৬৭২৫৪৮<br />
                                                ৯৬৭৪৫৮০(বা/অ), ৯৬৭৫২৩৩(বা/অ)<br>
                                                vcoffice@du.ac.bd
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ২.
                                            </td>
                                            <td>
                                                <strong>অধ্যাপক ড. মুহাম্মদ সামাদ </strong></br>
                                                প্রো-ভাইস চ্যান্সেলর (প্রশাসন)</br>
                                                ঢাকা বিশ্ববিদ্যালয়<br />
                                            </td>
                                            <td class="text-center">
                                                ৫৮৬১৫১৪৭/৪০১০/, ৪০১১<br />
                                                ৯৬৭০৪৩৮/৫০১০, /৫০১১<br>
                                                provc@du.ac.bd
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ৩.
                                            </td>




                                            </td>
                                            <td class="text-center">



                                            </td>


                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                ৪.<br />
                                            </td>
                                            <td>
                                                <strong>অধ্যাপক মমতাজ উদ্দিন আহমেদ <br /></strong>
                                                কোষাধ্যক্ষ<br />
                                                ঢাকা বিশ্ববিদ্যালয়<br />
                                            </td>
                                            <td class="text-center">
                                                ৯৬৭০৪৫৩/, ৪০১৫<br />
                                                ৯৬৭০৩৪৮<br />
                                                /৫০১৫, /৫০১৭<br />
                                                treasurer@du.ac.bd
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(ডি) অনুযায়ী সরকার কর্তৃক মনোনীত ৫ জন সরকারী কর্মকর্তা</u></strong></p>
                            <div class="table-responsive">
                                <table id="table-list" class="table table-bordered" rules="all"
                                    style="border:1px solid #d0d0d0;width:100%">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" width="5%">
                                                ৫.<br />
                                            </td>
                                            <td width="50%">
                                                <span class="bold">অতিরিক্ত সচিব (প্রশাসন ও অর্থ) </span><br />
                                                মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ<br />
                                                শিক্ষা মন্ত্রণালয় <br />
                                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার, ঢাকা
                                            </td>
                                            <td class="text-center">
                                                ৯৫৭৬৬৩৬ <br />
                                                ফ্যাক্স: ৯৭৬৬৩৬ <br />
                                                addsec_admn@moedu.gov.bd
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ৬.<br />
                                            </td>
                                            <td>
                                                <span class="bold">অতিরিক্ত সচিব (কলেজ) </span><br />
                                                মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ <br />
                                                শিক্ষা মন্ত্রণালয়<br />
                                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার, ঢাকা <br />
                                            </td>
                                            <td class="text-center">
                                                ৯৫৬১৫৭৪ <br />
                                                js_audit.law@moedu.gov.bd
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ৭.<br />
                                            </td>
                                            <td>
                                                <span class="bold">অতিরিক্ত সচিব (বাজেট-২) </span><br />
                                                অর্থ বিভাগ, অর্থ মন্ত্রণালয়<br />
                                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার, ঢাকা <br />
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ৮.<br />
                                            </td>
                                            <td>
                                                <span class="bold">প্রধানমন্ত্রীর একান্ত সচিব-২</span><br />
                                                প্রধানমন্ত্রীর কার্যালয়, ঢাকা<br />
                                            </td>
                                            <td class="text-center">&nbsp;

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ৯.<br />
                                            </td>
                                            <td>
                                                <span class="bold">যুগ্মসচিব (বিশ্ববিদ্যালয় অধিশাখা-১) </span><br />
                                                মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ,<br />
                                                শিক্ষা মন্ত্রণালয়<br />
                                                গণপ্রজাতন্ত্রী বাংলাদেশ সরকার, ঢাকা<br />
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল ২০(১)(ই)
                                        অনুযায়ী মাননীয় স্পীকার কর্তৃক মনোনীত ৫ জন সংসদ সদস্য</u></strong></p>
                            <div class="table-responsive">
                                <table id="table-list" class="table table-bordered" rules="all"
                                    style="border:1px solid #d0d0d0;width:100%">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" width="5%">
                                                ১০.<br />
                                            </td>
                                            <td width="50%">
                                                <strong>জনাব র.আ.ম উবায়দুল মোকতাদির চৌধুরী</strong><br />
                                                মাননীয় সংসদ সদস্য (২৪৫ ব্রাহ্মণবাড়িয়া-৩)<br />
                                                (ক) ব্লক-২/৬, মন্ত্রী হোস্টেল<br />
                                                শেরে বাংলা নগর, ঢাকা-১২১৫<br />
                                                (খ) বাসা # ২০২, বাড়ী # ১৪, সড়ক # ১২২<br />
                                                গুলশান # ০২, ঢাকা-১২১২<br />
                                                (গ) শেখড়, চিনাইর, চিনাইর দক্ষিণ, ভাতশালা-৩৪৫০<br />
                                                ব্রাহ্মণবাড়িয়া সদর, ব্রাহ্মণবাড়িয়া।<br />
                                            </td>
                                            <td class="text-center">
                                                ০১৭১১৮৩৫৫১৫<br />
                                                ৮৮৩৫৭০০<br />
                                                brahmanbaria.3@parlament.gov.bd</br>
                                                muktadir.chowdhury@yahoo.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১১.<br />
                                            </td>
                                            <td>
                                                <strong>জনাব নুরুল ইসলাম নাহিদ</strong><br />
                                                মাননীয় সংসদ সদস্য (২৩৪ সিলেট-৬)<br />
                                                (ক) বাড়ি-৪, ফ্ল্যাট-৩/এ, রোড-২০/এ, সেক্টর-৩, উত্তরা, ঢাকা-১২৩০<br />
                                                (খ) ফ্ল্যাট-৫০৪, ভবন-০৫, সংসদ সদস্য ভবন, মানিকমিয়া এভিনিউ,<br />
                                                শেরে বাংলা নগর, ঢাকা।<br />
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১২.<br />
                                            </td>
                                            <td>
                                                <strong>বেগম মেহের আফরোজ</strong><br />
                                                মাননীয় সংসদ সদস্য (১৯৮ গাজীপুর-৫)<br />
                                                (ক) রিমা ভবন, ১০ ইস্কাটন গার্ডেন, রমনা, ঢাকা<br />
                                                (খ) গ্রাম-বড়হরা, ডাকঘর-ভাওয়াল নওয়াপড়া, কালিগঞ্জ, গাজীপুর<br />
                                            </td>
                                            <td class="text-center">
                                                ০১৭৩৩৬৩২৫৫৫<br />
                                                ০১৭১১৬৯৯৪৬০<br />
                                                gazipur.4@parlament.gov.bd</br>
                                                meherchumki2@hotmail.com </br>
                                                m.islam@yahoo.com </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৩.<br />
                                            </td>
                                            <td>
                                                <strong>জনাব মোঃ আবদুস সোবহান মিয়া</strong><br />
                                                মাননীয় সংসদ সদস্য (২২০ মাদারীপুর-৩)<br />
                                                (ক) স্থায়ী: গ্রাম+ডাকঘর-উত্তর রমজানপুর<br />
                                                উপজেলা-কালকিনি, জেলা-মাদারীপুর<br />
                                                (খ) ৪২ মিন্টো রোড, রমনা, ঢাকা-১০০০
                                            </td>
                                            <td class="text-center">
                                                ০১৭৩০৩৩৬৭৮১<br />
                                                rosegarder_35@yahoo.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৪.<br />
                                            </td>
                                            <td>
                                                <strong>জনাব মনজুর হোসেন</strong><br />
                                                মাননীয় সংসদ সদস্য (২১১ ফরিদপুর-১)<br />
                                                (ক) গ্রাম ও ডাকঘর-পানাইল, উপজেলা-আলফাডাঙ্গা, জেলা-ফরিদপুর <br>
                                                (খ) ফ্ল্যাট-৯০৪, ভবন-০৬, সংসদ সদস্য ভবন, মানিকমিয়া এভিনিউ,<br />
                                                শেরে বাংলা নগর, ঢাকা
                                            </td>
                                            <td class="text-center">
                                                ০১৭৬৬৬৯৬০৯৯<br />
                                                ০১৭১৫২৪০০৭৭<br />
                                                monzurhossain.srs@gmail.com
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-center" style="text-underline-position: under"> <strong><u>আর্টিক্যাল
                                        ২০(১)(এফ) অনুযায়ী মাননীয় চ্যান্সেলর কর্তৃক মনোনীত ৫ জন শিক্ষাবিদ</u></strong>
                            </p>
                            <div class="table-responsive">
                                <table id="table-list" class="table table-bordered" rules="all"
                                    style="border:1px solid #d0d0d0;width:100%">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" width="5%">
                                                ১৫.<br />
                                            </td>
                                            <td width="50%">
                                                <strong>অধ্যাপক ড. ফারজানা ইসলাম</strong><br />
                                                নৃ-বিজ্ঞান বিভাগ, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়, সাভার, ঢাকা

                                            </td>
                                            <td class="text-center">
                                                farzanaislam@juniv.edu
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৬.<br />
                                            </td>
                                            <td>
                                                <strong>ড. ফকরুল আলম </strong><br />
                                                সংখ্যাতিরিক্ত অধ্যাপক, ইংরেজি বিভাগ ও পরিচালক, বঙ্গবন্ধু শেখ মুজিব
                                                রিসার্চ <br>
                                                ইনস্টিটিউট ফর পিচ এন্ড লিবার্টি, ঢাকা বিশ্ববিদ্যালয় <br>
                                                বাসা: দিনান্তে আলো, ফ্ল্যাট-বি/৫, হাউস-২৬, রোড:১৪/এ, ধানমন্ডি, ঢাকা
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৭.<br />
                                            </td>
                                            <td>
                                                <strong>ড. খন্দকার বজলুল হক </strong><br />
                                                অনারারি অধ্যাপক, ইন্টারন্যাশনাল বিজনেস বিভাগ বিভাগ, ঢাকা বিশ্ববিদ্যালয়
                                                <br>
                                                বাসা: করবী, ১৫/ই, দিগন্ত, পরিবাগ, ঢাকা-১০০০
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৮.<br />
                                            </td>
                                            <td>
                                                <strong>অধ্যাপক মাহফুজা খানম</strong><br />
                                                সভাপতি, বিশ্ব শিক্ষক ফেডারেশন, ঢাকা <br>
                                                বাসা: ৮২/১, ইন্দিরা রোড, ঢাকা -১২১৫
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ১৯.<br />
                                            </td>
                                            <td>
                                                <strong>অধ্যাপক ড. গোলাম কিবরিয়া ভূঁইয়া </strong><br />
                                                ইসলামের ইতিহাস ও সংস্কৃতি বিভাগ, চট্টগ্রাম বিশ্ববিদ্যালয় ও <br>
                                                উপাচার্য, কক্সবাজার ইন্টারন্যাশনাল ইউনিভার্সিটি, কক্সবাজার
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(জি) অনুযায়ী সিন্ডিকেট কর্তৃক মনোনীত গবেষণা সংস্থার ৫ জন
                                        প্রতিনিধি</u></strong></p>
                            <div class="table-responsive">
                                <table id="table-list" class="table table-bordered" rules="all"
                                    style="border:1px solid #d0d0d0;width:100%">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" width="5%">
                                                ২০.<br />
                                            </td>
                                            <td>
                                                <span class="bold">অধ্যাপক ড. মোস্তাফিজুর রহমান </span><br />
                                                সম্মানীয় ফেলো, সেন্টার ফর পলিসি ডায়ালগ (সিপিডি)<br />
                                                বাড়ি: ৪০/সি, রোড-১১ (নতুন), ধানমন্ডি আ/এ, ঢাকা-১২০৫<br />
                                            </td>
                                            <td>
                                                ৯১৪১৭৩৪<br />
                                                ০১৭১৩০১১০০৭<br />
                                                mustafiz@cpd.org.bd<br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ২১.<br />
                                            </td>
                                            <td>
                                                <span class="bold">মিসেস সেলিনা হোসেন</span><br />
                                                সভাপতি <br>
                                                বাংলা একাডেমি, ঢাকা।
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ২২.<br />
                                            </td>
                                            <td>
                                                <span class="bold">ড. কাজী খলীকুজ্জামান আহমদ </span><br />
                                                চেয়ারম্যান, পল্লী কর্ম-সহায়ক ফাউন্ডেশন ও <br />
                                                চেয়ারম্যান, গভর্ণিং কাউন্সিল <br />
                                                ঢাকা স্কুল অব ইকোনমিক্স, ৪/সি, ইস্কাটন গার্ডেন রোড, ঢাকা।
                                            </td>

                                            <td>
                                                ০১৭৩০৪৪১৭১৪ <br>
                                                ৯৩৫৯৬২৮-৯

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ২৩.<br />
                                            </td>
                                            <td>
                                                <span class="bold">অধ্যাপক ড. মোঃ আফতাব আলী শেখ </span><br />
                                                চেয়ারম্যান, বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ <br>
                                                (বিসিএসআইআর), ঢাকা।
                                            </td>
                                            <td>
                                                ০১৭২৫৩৭৫৫৫২ <br>
                                                aftabshaikh@du.ac.bd
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                ২৪.<br />
                                            </td>
                                            <td>
                                                <span class="bold">অধ্যাপক ডাঃ মোঃ শারফুদ্দিন আহমেদ</span><br />
                                                উপাচার্য<br />
                                                বঙ্গবন্ধু শেখ মুজিব মেডিকেল বিশ্ববিদ্যালয়, ঢাকা।<br />
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(এইচ) অনুযায়ী একাডেমিক পরিষদ কর্তৃক মনোনীত অধিভূক্ত ও উপাদানকল্প কলেজসমূহের
                                        ৫জন অধ্যক্ষ</u></strong></p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">

                                <tbody>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ২৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যক্ষ </span><br />
                                            ইডেন মহিলা কলেজ<br />
                                            আজিমপুর, ঢাকা।<br />
                                        </td>
                                        <td>
                                            ০১৩১১২২৫৬৮৮
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ২৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যক্ষ </span><br />
                                            সরকারি বাঙলা কলেজ <br />
                                            মিরপুর, ঢাকা।<br />
                                        </td>
                                        <td>
                                            ০১৭১১৫৩৩৪২৭
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ২৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যক্ষ </span><br />
                                            বেগম বদরুন্নেসা সরকারি মহিলা কলেজ<br />
                                            ঢাকা।<br />
                                        </td>
                                        <td>
                                            ০১৭৩১৪৯৩৩৮০
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ২৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যক্ষ </span><br />
                                            কবি নজরুল সরকারি কলেজ<br />
                                            ঢাকা।<br />
                                        </td>
                                        <td>
                                            ০১৭১৬০৬৮৪১৮
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ২৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যক্ষ </span><br />
                                            হলি ফ্যামিলি রেড ক্রিসেন্ট মেডিকেল কলেজ<br />
                                            ইস্কাটন, ঢাকা<br />
                                        </td>
                                        <td>
                                            ০১৭১১৬২৬৪৭৪
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(আই) অনুযায়ী একাডেমিক পরিষদ কর্তৃক মনোনীত অধিভূক্ত ও উপাদানকল্প কলেজসমূহের
                                        ১০জন শিক্ষক</u></strong></p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="width: 5%">
                                            ৩০.<br />
                                        </td>
                                        <td>
                                            <span class="bold"> অধ্যাপক মোহসীন কবির </span><br />
                                            অধ্যক্ষ, সরকারি শহীদ সোহরাওয়ার্দী কলেজ, ঢাকা<br />
                                        </td>
                                        <td>
                                            ০১৭১১৭৮৭৪১৫
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩১.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ডা. মো. আশরাফুল হক কাজল</span><br />
                                            শিশু সার্জারি বিভাগ, ঢাকা মেডিকেল কলেজ, ঢাকা<br />
                                        </td>
                                        <td>
                                            ০১৭১১৭৪৭২৭৫
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩২.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ইসমত রুমিনা</span><br />
                                            অধ্যক্ষ, কলেজ অব অ্যাপ্লাইড হিউম্যান সায়েন্স, আজিমপুর, ঢাকা<br />
                                        </td>

                                        <td>
                                            ০১৫৫২৪০৭৭২২
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৩.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক পুরঞ্জয় বিশ্বাস</span><br />
                                            ইংরেজি বিভাগ, ঢাকা কলেজ, ঢাকা<br />
                                        </td>
                                        <td>&nbsp;
                                            ০১৭১২১৮৯৩৪০
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৪.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক মো. আবদুল মান্নান </span><br />
                                            বিভাগীয় প্রধান, রসায়ন বিভাগ, সরকারি তিতুমীর কলেজ, ঢাকা<br />
                                        </td>
                                        <td>
                                            ০১৭৭৭৮৩৮৩৮৩
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ডাঃ মোঃ মরিুজ্জামান শাহীন </span><br />
                                            বিভাগীয় প্রধান, অর্থোপেডিক বিভাগ, শের-ই-বাংলা মেডিকেল কলেজ, বরিশাল<br />
                                        </td>
                                        <td>
                                            ০১৭১১৩১২৭৬৪
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. ইঞ্জিনিয়ার মো. মিজানুর রহমান</span><br />
                                            সিভিল ইঞ্জিনিয়ারিং বিভাগ, ফরিদপুর ইঞ্জিনিয়ারিং কলেজ, ফরিদপুর<br />
                                        </td>
                                        <td>
                                            ০১৫৫৮৪৫০৯০০
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">ডা. শাহরিয়ার নবী </span><br />
                                            সহযোগী অধ্যাপক, রেডিওলজি এন্ড ইমেজিং বিভাগ, ঢাকা মেডিকেল কলেজ<br />
                                            এবং ডিন, চিকিৎসা অনুষদ ঢাকা বিশ্ববিদ্যালয়<br />
                                        </td>
                                        <td>
                                            ০১৭১১৬৩২৮১০
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">ড. মো. আব্দুল কুদ্দুস শিকদার </span><br />
                                            সহযোগী অধ্যাপক, ইতিহাস বিভাগ, ঢাকা কলেজ, ঢাকা<br />
                                        </td>

                                        <td>
                                            ০১৯১২৫৭০৪০১
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ৩৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">জনাব আসমা উল হোসনা চেীধুরী</span><br />
                                            সহযোগী অধ্যাপক, বাংলা বিভাগ, বেগম বদরুন্নেসা সরকারি মহিলা কলেজ, ঢাকা<br />
                                        </td>
                                        <td>
                                            ০১৭১১১১২৮৯৫
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(জে) অনুযায়ী</u></strong></p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪০.<br />
                                        </td>
                                        <td>
                                            <span class="bold">চেয়ারম্যান </span><br />
                                            মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা বোর্ড<br />
                                            ঢাকা<br />
                                        </td>

                                        <td>
                                            ৯৬৬৯৮১২<br>
                                            ৯৬৬১১১২<br>
                                            ৮৬১০০৪২<br>
                                            ০১৭১১৫৯২০৬৬<br>
                                            chairmanbboard@gmail.com
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="text-center" style="text-underline-position: under"> <strong><u>আর্টিক্যাল
                                        ২০(১)(কে) অনুযায়ী রেজিস্টার্ড গ্র্যাজুয়েট কর্তৃক নির্বাচিত ২৫ জন
                                        প্রতিনিধি</u></strong></p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪১.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. আশফাক হোসেন</span> <br />
                                            ইতিহাস বিভাগ
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td style="width: 35%;">
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪২.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. এ. কে. এম. গোলাম রব্বানী</span> <br />
                                            ইসলামের ইতিহাস ও সংস্কৃতি বিভাগ
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৩.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ডা. নুজহাত চৌধুরী</span> <br />
                                            বাসা-১০৯, সড়ক-৪, ব্লক-বি
                                            <br />
                                            বনানী, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৪.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. অহিদুজ্জামান</span> <br />
                                            শিক্ষা ও গবেষণা ইনস্টিটিউট
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৫.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব এস. এম. বাহালুল মজনুন</span> <br />
                                            ২৮৭, এলিফ্যান্ট রোড, ফ্ল্যাট-১০/সি
                                            <br />
                                            শেলটেক আসিয়া গার্ডেন, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৬.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মো. আতাউর রহমান প্রধান</span> <br />
                                            ৫৫/১, সিদ্বেশ্বরী, ভবন-০৪, ফ্ল্যাট-আই-৫
                                            <br />
                                            রুপায়ন টাওয়ার, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৭.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব এইচ. এম. বদিউজ্জামান</span> <br />
                                            হাউজ-১১, রোড-১০, ফ্ল্যাট-সি-১
                                            <br />
                                            ধানমন্ডি, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৮.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মো. মুরশেদুল কবীর</span> <br />
                                            বাড়ী-২২, রোড-৯, রূপনগর আবাসিক এলাকা
                                            <br />
                                            মিরপুর, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৪৯.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব এ. আর. এম. মঞ্জুরুল আহসান বুলবুল</span> <br />
                                            ফ্ল্যাট-১১/এফ, ইস্টার্ণ হাউজিং এপার্টমেন্ট
                                            <br />
                                            ১০২-১০৪, বড় মগবাজার, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫০.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. অসীম সরকার</span> <br />
                                            সংস্কৃত বিভাগ
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫১.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মীর্জা মো. আব্দুল বাছেত</span> <br />
                                            ৩২-ক, মায়াকানন, বাসাবো
                                            <br />
                                            সবুজবাগ, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫২.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. নাসির উদ্দিন মুন্সি</span> <br />
                                            তথ্যবিজ্ঞান ও গ্রন্থাগার ব্যবস্থাপনা বিভাগ
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৩.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. আনোয়ার হোসেন</span> <br />
                                            ই-৫, শহীদ মুনির চৌধুরী ভবন
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয় আ/এ, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৪.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. জেড. এম. পারভেজ সাজ্জাদ</span> <br />
                                            ১৩৯/ডি, ঈশা খাঁ আবাসিক এলাকা
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৫.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মোহাম্মদ ইকবাল মাহমুদ</span> <br />
                                            ফ্ল্যাট-জি/৫, হাসিনুর গ্রীন কটেজ
                                            <br />
                                            ৬/৪, সেগুনবাগিচা, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৬.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ডা. মোহাম্মদ হোসেন</span> <br />
                                            বাড়ী-২, রোড-৮
                                            <br />
                                            ধানমন্ডি আ/এ, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৭.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. সাবিতা রিজওয়ানা রহমান</span> <br />
                                            রোড-৮৪, হাউজ-৫৪, এপার্টমেন্ট-২০২
                                            <br />
                                            গুলশান-২, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৮.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব নিজাম চৌধুরী</span> <br />
                                            হাউজ-১৬/জি, রোড-২/এ
                                            <br />
                                            ঢাকা ক্যান্টনমেন্ট, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৫৯.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. শারমিন মূসা</span> <br />
                                            ৫/২, ইকবাল রোড
                                            <br />
                                            মোহাম্মদপুর, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬০.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব এ. এইচ. এম. এনামুল হক চৌধুরী</span> <br />
                                            বাড়ি-৩৩৮, সড়ক-২৪, ডিওএইচএস
                                            <br />
                                            মহাখালী, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬১.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ডা. মো. কামরুল হাসান</span> <br />
                                            ৫/১, ব্লক-এ, স্যার সৈয়দ রোড, ওয়াসিস, সি-আই
                                            <br />
                                            মোহাম্মদপুর, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬২.
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মুহাম্মদ শফিক উল্যা</span> <br />
                                            সুইট-১৪-কে, মেহেরবা প্লাজা
                                            <br />
                                            ৩৩, তোপখানা রোড, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬৩.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক মোহাম্মদ আব্দুল বারী</span> <br />
                                            হাউজ-১৫, রোড-২৮, ব্লক-কে
                                            <br />
                                            বনানী, ঢাকা
                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬৪.
                                        </td>
                                        <td>
                                            <span class="bold">মি. রঞ্জিত কুমার সাহা</span> <br />
                                            ৩৩৫/১১, ভেলানগর
                                            <br />
                                            নরসিংদী

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬৫.
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. সীতেশ চন্দ্র বাছার</span> <br />
                                            ডিন, ফার্মেসী অনুষদ
                                            <br />
                                            ঢাকা বিশ্ববিদ্যালয়, ঢাকা

                                        </td>
                                        <td>
                                            <br>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>


                            <p class="text-center" style="text-underline-position: under"><strong><u>আর্টিক্যাল
                                        ২০(১)(এল) অনুযায়ী শিক্ষক কর্তৃক নির্বাচিত ৩৫ জন শিক্ষক প্রতিনিধি</u></strong>
                            </p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">

                                <tbody>
                                    <tr>
                                        <td class="text-center" width="5%">
                                            ৬৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. নিজামুল হক ভুইয়া</span> <br />
                                            পুষ্টি ও খাদ্যবিজ্ঞান ইনস্টিটিউট, ঢাকা বিশ্ববিদ্যালয়<br />
                                            বাসা: ডি-৫, শহীদ মুনীর চৌধুরী ভবন, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৯২৫৮০৭৮৪৭<br>
                                            bhuiyan.nizamulhoque@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৬৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. ইসতিয়াক মঈন সৈয়দ</span> <br />
                                            পদার্থ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয়<br />
                                            বাসা: প্রভোষ্ট বাংলো, অমর একুশে হল, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭২৬২৬১৮৮৫<br>
                                            imsyed@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৬৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. আবু জাফর মোঃ শফিউল আলম ভূইয়া</span> <br />
                                            টেলিভিশন, ফিল্ম এন্ড ফটোগ্রাফি বিভাগ, ঢাকা বিশ্ববিদ্যালয়<br />
                                            বাসা: ১১-সি, দক্ষিণ ফুলার রোড আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৩১৮০৩৬৩২<br>
                                            abhuiyan@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৬৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. লাফিফা জামাল</span> <br />
                                            রোবটিক্স এন্ড মেকাটনিক্স ইঞ্জিনিয়ারিং বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                            বাসা: প্রভোষ্ট বাংলো, শামসুন নাহার হল, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৮৩৬৮০০৮৬৪<br>
                                            lafifa@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭০.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. জিয়াউর রহমান</span> <br />
                                            ক্রিমিনোলজি বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                            বাসা: এফ-৮, শহীদ মুনীর চৌধুরী ভবন, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৭০৫২৩১৯<br>
                                            zia_soc71@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭১.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. আবদুল বাছির</span> <br />
                                            ইসলামের ইতিহাস ও সংস্কৃতি বিভাগ, ঢাকা বিশ্ববিদ্যালয়<br />
                                            বাসা: এ-৬, এ এন এম মুনীরউজ্জামান টাওয়ার, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১৫৫৫১৭৩৩<br>
                                            basir1965@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭২.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক, জনাব মো. লুৎফর রহমান</span> <br />
                                            পরিসংখ্যান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                            বাসা: বি-৫, শহীদ মুনীর চৌধুরী ভবন, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৮১৭৫৩০৯০৩<br>
                                            lutfor3021@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৩.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মিহির লাল সাহা</span> <br />
                                            উদ্ভিদ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                            বাসা: প্রভোষ্ট বাংলো, জগন্নাথ হল, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১১৬৬৭১০৪<br>
                                            sahaml@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৪.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. চন্দ্র নাথ পোদ্দার</span> <br />
                                            গণিত বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                        </td>
                                        <td>
                                            ০১৭৫৬২১৫৬৯৫<br>
                                            cpodder@du.ac.bd

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. আব্দুস ছামাদ</span> <br />
                                            ফলিত গণিত বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                            বাসা: এ-৮, এ এন এম মুনীরউজ্জামান টাওয়ার, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৫৫২৪৩৩৬৪২ <br />
                                            samad@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক, ড. হাফিজ মুহম্মদ হাসান বাবু</span> <br />
                                            কম্পিউটার সায়েন্স এন্ড ইঞ্জিনিয়ারিং বিভাগ, ঢাকা বিশ্ববিদ্যালয়
                                        </td>
                                        <td>
                                            ০১৭১১৩৫১০৫৫ <br>
                                            hafizbabu@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. জিনাত হুদা</span> <br />
                                            সমাজ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয়<br />
                                            বাসা: ৩১/এইচ, ঈশা খান রোড, ঢা: বি:

                                        </td>
                                        <td>
                                            ৮৬২১২৩৬ <br />
                                            zhudabd@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. এ কে এম মাহবুব হাসান</span> <br />
                                            প্রাণরসায়ন ও অণুপ্রাণ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: সি-৬, এ এন এম মুনীরউজ্জামান টাওয়ার, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৯৭১৭৪৭৮৪৭ <br />
                                            kmhasan47@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৭৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মুহাম্মাদ আব্দুল মঈন</span> <br />
                                            অর্গানাইজেশন স্ট্র্যাটেজি এন্ড লিডারশীপ বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br />
                                        </td>
                                        <td>
                                            ০১৭১১৫২১৫১১ <br>
                                            moyeenma@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮০.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মোহাম্মদ বিললাল হোসেন</span> <br />
                                            পপুলেশন সায়েন্সেস বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                        </td>
                                        <td>
                                            ০১৭৬৬৫১৭০০২ <br>
                                            bellal@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮১.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. সীমা জামান</span> <br />
                                            আইন বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                        </td>
                                        <td>
                                            ০১৭২৭৯৫৪৪০০ <br>
                                            zaman_shima@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮২.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. আ ক ম জামাল উদ্দীন</span> <br />
                                            সমাজ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                        </td>
                                        <td>
                                            ০১৯১৯৪০৯১০৯ <br>
                                            akmjamaluddin2001@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৩.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক নিসার হোসেন</span> <br />
                                            অঙ্কন ও চিত্রায়ন বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৩৪/ই, শহীদ মিনার আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৮১১৯৯৯৬১৭ <br>
                                            nisarhossainbd@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৪.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. ফিরোজ আহমেদ</span> <br />
                                            ফার্মেসী বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: বি-৭, এ এন এম মুনীরউজ্জামান টাওয়ার, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১১৯৭২৯৬৫ <br>
                                            firoj72@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মোহাম্মদ ফিরোজ জামান</span> <br />
                                            প্রাণিবিদ্যা বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ২০-এইচ, দক্ষিণ ফুলার রোড আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৩৩২৬৩৩২০ <br>
                                            mfjaman@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. তৌহিদা রশীদ</span> <br />
                                            আবহাওয়া বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                        </td>
                                        <td>
                                            ০১৭১১০১৪৬১০ <br>
                                            towhida_rashid@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">ড. মো. মিজানুর রহমান</span> <br />
                                            সহযোগী অধ্যাপক, অণুজীব বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ২২৮/১, দক্ষিণ গোড়ান, বাগান বাড়ি রোড, খিলগাঁও, ঢাকা -১২১৯
                                        </td>
                                        <td>
                                            ০১৭৯৬৫৮৫২৯০ <br>
                                            raju002@gmail.com<br>
                                            raju002@du.ac.bd

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. এস এম আব্দুর রহমান</span> <br />
                                            ক্লিনিক্যাল ফার্মেসী এন্ড ফার্মাকোলজী বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৩৯/এফ, ঈশা খান রোড, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৩২৪৭৭৩৪৩ <br>
                                            smarahman@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৮৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. কে এম সাইফুল ইসলাম খান</span> <br />
                                            ফারসি ভাষা ও সাহিত্য বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: প্রভোষ্ট বাংলো, এ এফ রহমান হল, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৫৫৫৭৬৬০৯ <br>
                                            kmsik2002@yahoo.com <br>
                                            kmsik2002.persian@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯০.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. জিল্লুর রহমান</span> <br />
                                            ডিজাস্টার সায়েন্স এন্ড ক্লাইমেট রেজিলিয়েন্স বিভাগ, ঢাকা বিশ্ববিদ্যালয়
                                        </td>
                                        <td>
                                            ০১৩০২৬৯১০৫৫ <br>
                                            zillur@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯১.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. মাসুদুর রহমান</span> <br />
                                            মার্কেটিং বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৭ নম্বর বাংলো, হাজী মুহম্মদ মুহসীন হল প্রভোষ্ট বাংলো, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭৩৩৫৫০০৫৭ <br>
                                            masudurrahman@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯২.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. আব্দুল্লাহ আল মাহমুদ</span> <br />
                                            ব্যাংকিং এন্ড ইন্সুরেন্স বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৪৮/আই, উত্তর ফুলার রোড আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৮১৯২৯১৬৬০<br>
                                            amahmud.bin@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৩.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. আব্দুর রহিম</span> <br />
                                            ইসলামের ইতিহাস ও সংস্কৃতি বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৩২/জি, ঈশা খান রোড, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১৬২৭২৭০৭<br>
                                            mrahim77@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৪.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক, ড. ফিরোজা ইয়াসমীন</span> <br />
                                            ভষাবিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ১৯/এফ, দক্ষিণ ফুলার রোড আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১০৯৭৪৫৬৪ <br>
                                            yferoza@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. এ বি এম ওবায়দুল ইসলাম</span> <br />
                                            পদার্থ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: এ-৯, এ এন এম মুনীরউজ্জামান টাওয়ার, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১২৬০৫০০৭ <br>
                                            obaid@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৬.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মামুন আহমেদ</span> <br />
                                            প্রাণরসায়ন ও অণুপ্রাণ বিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: এ-৩, শহীদ মুনীর চৌধুরী ভবন, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১৮৩৮৪০৬৪ <br>
                                            labaidpcr@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৭.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. সিকদার মনোয়ার মুর্শেদ</span> <br />
                                            ভাষাবিজ্ঞান বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৮৫/ডি, গিয়াস উদ্দিন আহমদ আবাসিক এলাকা, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১২৫০৪৩১২ <br>
                                            murshedsm@du.ac.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৮.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মুহাম্মদ আব্দুর রশীদ</span> <br />
                                            ইসলামিক স্টাডিজ বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৩য় তলা, প্রভোষ্ট কমপ্লেক্স, ঢা: বি:
                                        </td>
                                        <td>
                                            ০১৭১৩০০৩০৮২ <br>
                                            rashidnumani@du.ac.bd
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ৯৯.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. রফিকুল ইসলাম</span> <br />
                                            শান্তি ও সংঘর্ষ অধ্যয়ন বিভাগ, ঢাকা বিশ্ববিদ্যালয় <br>
                                            বাসা: ৪৫ নং ভবন, জহুরুল হক হল হাউজ টিউটর কোয়ার্টার, ঢা: বি:

                                        </td>
                                        <td>
                                            ০১৭২৬৫৯১৭৬৬ <br>
                                            umedpurbashi@yahoo.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center width5per">
                                            ১০০.<br />
                                        </td>
                                        <td>
                                            <span class="bold">অধ্যাপক ড. মো. শফিকুল ইসলাম</span> <br />
                                            ফলিত গণিত বিভাগ, ঢাকা বিশ্ববিদ্যালয়
                                        </td>
                                        <td>
                                            ০১৭১১৮৬৪৭২৫ <br>
                                            mdshafiqul@du.ac.bd
                                        </td>
                                    </tr>


                                </tbody>
                            </table>


                            <p class="text-center"><strong>আর্টিক্যাল ২০(১)(এম) অনুযায়ী ডাকসু কর্তৃক মনোনীত ৫ জন ছাত্র
                                    প্রতিনিধি</strong></p>
                            <table id="table-list" class="table table-bordered" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">
                                <tbody>


































                                    <tr>
                                        <td class="text-center">
                                            ১০৩.<br />
                                        </td>
                                        <td>
                                            <span class="bold">জনাব মো. সাদ্দাম হোসেন </span><br />
                                            সহ-সাধারণ সম্পাদক<br />
                                            ঢাকা বিশ্ববিদ্যালয় কেন্দ্রিয় ছাত্র সংসদ (ডাকসু)<br />
                                            (আইন বিভাগ, ঢাকা বিশ্ববিদ্যালয়)<br />
                                            স্যার এ এফ রহমান হল, ঢাকা বিশ্ববিদ্যালয়<br />
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            ০১৭৯৬২৫৬৮৫৯<br />
                                            hussainsaddamofficial@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ১০৪.<br />
                                        </td>
                                        <td>
                                            <span class="bold">মি. সনজিত চন্দ্র দাস </span><br />
                                            সভাপতি, বাংলাদেশ ছাত্রলীগ, ঢাকা বিশ্ববিদ্যালয় শাখা<br />
                                            (আইন বিভাগ, ঢাকা বিশ্ববিদ্যালয়)<br />
                                            জগন্নাথ হল, ঢাকা বিশ্ববিদ্যালয়<br />
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            ০১৭৬৩৬৮৪০২৪<br />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            ১০৫.<br />
                                        </td>
                                        <td>
                                            <span class="bold"> জনাব তিলোত্তমা শিকদার </span><br />
                                            সদস্য, ঢাকা বিশ্ববিদ্যালয় কেন্দ্রিয় ছাত্র সংসদ (ডাকসু)<br />
                                            (দূর্যোগ বিজ্ঞান ও ব্যবস্থাপনা বিভাগ, ঢাকা বিশ্ববিদ্যালয়)<br />
                                            কবি সুফিয়া কামাল হল, ঢাকা বিশ্ববিদ্যালয়<br />
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            ০১৭১১৯২৮৭৪৯<br />
                                            tilottamas10@gmail.com
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End content ============================================= -->

@endsection