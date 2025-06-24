
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
<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-12">

                <div class="top-author">
                    <div class="author-items"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                        <div class="du_heading">ঢাকা বিশ্ববিদ্যালয়</div>
                        <div class="title-heading"> সিন্ডিকেট সদস্যদের তালিকা</div>
                        <div class="table-responsive">
                            <table id="table-list" class="table table-border" rules="all"
                                style="border:1px solid #d0d0d0;width:100%">
                                <thead>
                                    <tr>
                                        <td class="width5per text-center bold" nowrap>
                                            ক্র: নং
                                        </td>
                                        <td class="width40per text-center bold">
                                            নাম ও পদবী
                                        </td>
                                        <td class="width15per text-center bold">
                                            ফোন (অফিস)
                                        </td>
                                        <td class="width15per text-center bold">
                                            ফোন (বাসা)
                                        </td>
                                        <td class="width20per">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membersList['profiles'] as $index => $member)
                                        <tr>
                                            <td class="text-center">
                                                {{ $index + 1 }}
                                            </td>
                                            <td>{{ $member['nameBn'] }} </br> {{ $member['designation'] }}</td>
                                            <td>{{ $member['mobile']}}, {{ $member['phone']}}</td>
                                            
                                        
                                        </tr>
                                    @endforeach
                                   
                                </tbody>      
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection