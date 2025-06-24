@extends('frontend.layouts.master-landing')

@php
    $page_title = 'আবেদন ফরম';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    <form action="{{ route('butex_form.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="form_type" value="1">
        <div class="card">
            <div class="card-body custom-font-titillium-web">
                <h3 class="text-center">{{ $page_title }}</h3>
                <hr/>
                <br/>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার্থীর আইডি <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data56" name="data56" placeholder="পরীক্ষার্থীর আইডি" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">প্রোগ্রাম লেভেল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data57" name="data57" placeholder="প্রোগ্রাম লেভেল" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">টার্ম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data61" name="data61" placeholder="টার্ম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পরিক্ষা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data62" name="data62" placeholder="২০২২" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                            <select class="form-select" name="data63" id="data63" aria-label="Engineering Departments" required>
                                <option value="">বিভাগ নির্বাচন করুন...</option>
                                <option value="ইয়ার্ণ ইঞ্জিনিয়ারিং">ইয়ার্ণ ইঞ্জিনিয়ারিং</option>
                                <option value="ফেব্রিক ইঞ্জিনিয়ারিং">ফেব্রিক ইঞ্জিনিয়ারিং</option>
                                <option value="ওয়েট প্রসেস ইঞ্জিনিয়ারিং">ওয়েট প্রসেস ইঞ্জিনিয়ারিং</option>
                                <option value="এ্যাপারেল ইঞ্জিনিয়ারিং">এ্যাপারেল ইঞ্জিনিয়ারিং</option>
                                <option value="টেক্সটাইল ইঞ্জিনিয়ারিং ম্যানেজমেন্ট">টেক্সটাইল ইঞ্জিনিয়ারিং ম্যানেজমেন্ট</option>
                                <option value="টেক্সটাইল ফ্যাশন এন্ড ডিজাইন">টেক্সটাইল ফ্যাশন এন্ড ডিজাইন</option>
                                <option value="ইন্ডাষ্ট্রিয়াল এন্ড প্রোডাকশন ইঞ্জিনিয়ারিং">ইন্ডাষ্ট্রিয়াল এন্ড প্রোডাকশন ইঞ্জিনিয়ারিং</option>
                                <option value="টেক্সটাইল মেশিনারী ডিজাইন এন্ড মেইনটেনেন্স">টেক্সটাইল মেশিনারী ডিজাইন এন্ড মেইনটেনেন্স</option>
                                <option value="ডাইজ এন্ড কেমিক্যালস ইঞ্জিনিয়ারিং">ডাইজ এন্ড কেমিক্যালস ইঞ্জিনিয়ারিং</option>
                                <option value="এনভায়রনমেন্টাল সাইন্স এন্ড ইঞ্জিনিয়ারিং">এনভায়রনমেন্টাল সাইন্স এন্ড ইঞ্জিনিয়ারিং</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার্থীর পূর্ণ নাম (বাংলায়) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data1" name="data1" placeholder="(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার্থীর পূর্ণ নাম (ইংরেজী বড় অক্ষরে) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data2" name="data2" placeholder="(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পিতার নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data3" name="data3" placeholder="পিতার নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">মাতার নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data4" name="data4" placeholder="মাতার নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">মোবাইল নং <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data64" name="data64" placeholder="মোবাইল নং" required>
                        </div>
                    </div>
                </div>

                <h6 class="mb-2">স্থায়ী ঠিকানাঃ</h6>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">গ্রাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data5" name="data5" placeholder="গ্রাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পোঃ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data6" name="data6" placeholder="পোঃ" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">থানা/উপজেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data7" name="data7" placeholder="থানা/উপজেলা" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data8" name="data8" placeholder="জেলা" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">জন্ম তারিখ (এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী) <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data9" name="data9" placeholder="জন্ম তারিখ (এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">জাতীয়তা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data10" name="data10" placeholder="জাতীয়তা" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">ধর্ম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data11" name="data11" placeholder="ধর্ম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বর্ণ/সম্প্রদায়</label>
                            <input type="text" class="form-control" id="data12" name="data12" placeholder="বর্ণ/সম্প্রদায়">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">এসএসসি/সমমান পরীক্ষা পাশের সন <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data13" name="data13" placeholder="এসএসসি/সমমান পরীক্ষা পাশের সন" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">রোল নং <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data14" name="data14" placeholder="রোল নং" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">ফলাফল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data15" name="data15" placeholder="ফলাফল" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বোর্ডের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data16" name="data16" placeholder="বোর্ডের নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষা প্রতিষ্ঠানের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data17" name="data17" placeholder="শিক্ষা প্রতিষ্ঠানের নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">এইচএসসি/সমমান পরীক্ষা পাশের সন <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data18" name="data18" placeholder="এইচএসসি/সমমান পরীক্ষা পাশের সন" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">রোল নং <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data19" name="data19" placeholder="রোল নং" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">ফলাফল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data20" name="data20" placeholder="ফলাফল" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বোর্ডের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data21" name="data21" placeholder="বোর্ডের নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষা প্রতিষ্ঠানের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data22" name="data22" placeholder="শিক্ষা প্রতিষ্ঠানের নাম" required>
                        </div>
                    </div>
                </div>

                <h6 class="mb-2">পরীক্ষার্থী বিশ্ববিদ্যালয়ের কোন পরীক্ষায় অংশগ্রহন করে কখনও বহিষ্কৃত হয়ে থাকলে, শান্তির মেয়াদ উল্লেখ করতে হবে।</h6>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার নাম</label>
                            <input type="text" class="form-control" id="data23" name="data23" placeholder="পরীক্ষার নাম">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="" class="form-label">লেভেল</label>
                            <input type="text" class="form-control" id="data24" name="data24" placeholder="লেভেল">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="" class="form-label">টার্ম</label>
                            <input type="text" class="form-control" id="data25" name="data25" placeholder="টার্ম">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার সন</label>
                            <input type="text" class="form-control" id="data26" name="data26" placeholder="পরীক্ষার সন">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="" class="form-label">শান্তির মেয়াদ</label>
                            <input type="text" class="form-control" id="data27" name="data27" placeholder="শান্তির মেয়াদ">
                        </div>
                    </div>
                </div>

                <h6 class="mb-2">পরীক্ষায় অবতীর্ণ হওয়ার বিষয় কোড ও বিষয়</h6>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ক্রম</th>
                            <th>বিষয় কোড</th>
                            <th>বিষয়ের নাম</th>
                            <th>ক্রম</th>
                            <th>বিষয় কোড</th>
                            <th>বিষয়ের নাম</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>১.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data28" name="data28" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data29" name="data29" placeholder=""></td>
                            <td>৮.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data30" name="data30" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data31" name="data31" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>২.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data32" name="data32" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data33" name="data33" placeholder=""></td>
                            <td>৯.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data34" name="data34" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data35" name="data35" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>৩.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data36" name="data36" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data37" name="data37" placeholder=""></td>
                            <td>১০.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data38" name="data38" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data39" name="data39" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>৪.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data40" name="data40" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data41" name="data41" placeholder=""></td>
                            <td>১১.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data42" name="data42" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data43" name="data43" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>৫.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data44" name="data44" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data45" name="data45" placeholder=""></td>
                            <td>১২.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data46" name="data46" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data47" name="data47" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>৬.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data48" name="data48" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data49" name="data49" placeholder=""></td>
                            <td>১৩.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data50" name="data50" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data51" name="data51" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>৭.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data52" name="data52" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data53" name="data53" placeholder=""></td>
                            <td>১৪.</td>
                            <td><input type="text" class="form-control form-control-sm" id="data54" name="data54" placeholder=""></td>
                            <td><input type="text" class="form-control form-control-sm" id="data55" name="data55" placeholder=""></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">১ কপি পিপি সাইজের সত্যায়িত ছবি সংযুক্ত করুন <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="data59" name="data59" placeholder="১ কপি পিপি সাইজের সত্যায়িত ছবি সংযুক্ত করুন" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">পরীক্ষার্থীর স্বাক্ষর <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="data60" name="data60" placeholder="পরীক্ষার্থীর স্বাক্ষর" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">তারিখ <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data58" name="data58" placeholder="তারিখ" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </div>
        </div>
    </form>
</div>

@endsection