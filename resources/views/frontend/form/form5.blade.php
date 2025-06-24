@extends('frontend.layouts.master-landing')

@php
    $page_title = 'বোর্ড বৃত্তিপ্রাপ্ত শিক্ষার্থীর তথ্য ফরমঃ';
@endphp

@section('title')
    {{ $page_title }}
@endsection

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<div class="container mt-3 mb-3">
    <form action="{{ route('butex_form.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="form_type" value="5">

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
                            <label for="" class="form-label">ভর্তির শিক্ষাবর্ষ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data1" name="data1" placeholder="ভর্তির শিক্ষাবর্ষ" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">অর্থ বছর <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data2" name="data2" placeholder="অর্থ বছর" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বৃত্তির পরীক্ষা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data3" name="data3" value="এইচএসসি" placeholder="বৃত্তির পরীক্ষা" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">বৃত্তির ধরন <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data4" name="data4" placeholder="বৃত্তির ধরন" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">অধ্যয়নরত লেভেল ও টার্ম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data5" name="data5" placeholder="অধ্যয়নরত লেভেল ও টার্ম" required>
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>(ব্যক্তিগত তথ্য):</h5>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data6" name="data6" placeholder="শিক্ষার্থীর নাম (বাংলা)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর নাম (ইংরেজী) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data7" name="data7" placeholder="শিক্ষার্থীর নাম (ইংরেজী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পিতার নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data8" name="data8" placeholder="পিতার নাম (বাংলা)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">পিতার নাম (ইংরেজী) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data9" name="data9" placeholder="পিতার নাম (ইংরেজী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">মাতার নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data10" name="data10" placeholder="মাতার নাম (বাংলা)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">মাতার নাম (ইংরেজী) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data11" name="data11" placeholder="মাতার নাম (ইংরেজী)" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর জেন্ডার <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data12" name="data12" placeholder="শিক্ষার্থীর জেন্ডার" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর জন্ম তারিখ <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="data13" name="data13" placeholder="শিক্ষার্থীর জন্ম তারিখ" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর ফোন নম্বর <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data14" name="data14" placeholder="শিক্ষার্থীর ফোন নম্বর" required>
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>স্থায়ী ঠিকানাঃ</h5>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data15" name="data15" placeholder="বিভাগ" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data16" name="data16" placeholder="জেলা" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">উপজেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data17" name="data17" placeholder="উপজেলা" required>
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>শিক্ষা সংক্রান্ত তথ্য (পূর্ববর্তী শিক্ষাগত তথ্য):</h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">পূর্ববর্তী শিক্ষার নামঃ এইচএসসি, রেজিষ্ট্রেশন নম্বর</label>
                            <input type="text" class="form-control" id="data18" name="data18" placeholder="পূর্ববর্তী শিক্ষার নামঃ এইচএসসি, রেজিষ্ট্রেশন নম্বর">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">ফলাফল</label>
                            <input type="text" class="form-control" id="data19" name="data19" placeholder="ফলাফল">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">উত্তীর্ণ হওয়ার বছর</label>
                            <input type="text" class="form-control" id="data20" name="data20" placeholder="উত্তীর্ণ হওয়ার বছর">
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>(বর্তমান শিক্ষাগত তথ্য):</h5>
                <h6 class="mb-2">বিভাগ: ঢাকা, জেলা: ঢাকা, উপজেলাঃ তেজগাঁও থানা।</h6>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">প্রতিষ্ঠানের নাম: বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়, লেভেল ও টার্ম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data21" name="data21" placeholder="প্রতিষ্ঠানের নাম: বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়, লেভেল ও টার্ম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর আইডি নম্বর <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data22" name="data22" placeholder="শিক্ষার্থীর আইডি নম্বর" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শিক্ষার্থীর বিভাগের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data23" name="data23" placeholder="শিক্ষার্থীর বিভাগের নাম" required>
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>(অভিভাবকের তথ্য):</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">সম্পর্ক <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data24" name="data24" placeholder="সম্পর্ক" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data25" name="data25" placeholder="নাম (বাংলা)" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">নাম (ইংরেজী) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data26" name="data26" placeholder="নাম (ইংরেজী)" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data27" name="data27" placeholder="মোবাইল নম্বর" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5>স্থায়ী ঠিকানা:</h5>
                        <div class="mb-3">
                            <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data28" name="data28" placeholder="বিভাগ" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data29" name="data29" placeholder="জেলা" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">উপজেলা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data30" name="data30" placeholder="উপজেলা" required>
                        </div>
                    </div>
                </div>

                <hr/>

                <h5>(পেমেন্টের তথ্য):</h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">পেমেন্টের ধরনঃ ব্যাংকিং, ব্যাংকের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data31" name="data31" placeholder="পেমেন্টের ধরনঃ ব্যাংকিং, ব্যাংকের নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">শাখা <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data32" name="data32" placeholder="শাখা" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">রাউটিং নাম্বার <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data33" name="data33" placeholder="রাউটিং নাম্বার" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">হিসাবের ধরন <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data34" name="data34" placeholder="হিসাবের ধরন" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">হিসাবধারীর নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data35" name="data35" placeholder="হিসাবধারীর নাম" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label">হিসাব নং <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="data36" name="data36" placeholder="হিসাব নং" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </div>
        </div>
    </form>
</div>

@endsection