<style>
    .breadcrumb-cover-bg {
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(121, 71, 9, 1) 100%, rgba(0, 212, 255, 1) 100%);
        background-repeat: no-repeat;
        background-size: cover;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* margin-top: 10px; */
        position: relative;
    }

    .breadcrumb-cover-bg .text-center h2 {
        color: #fff;
        margin-bottom: 20px;
    }

    .breadcrumb {
        background: none;
        margin-bottom: 0;
    }
    .breadcrumb-item.active{
        color: #fff;
    }
</style>


@php
    //$banner = DB::table('banners')->where('ref_id',1)->get();
    //$bannerImageLink = $banner->image ? $banner->image : null;
@endphp
<nav class="breadcrumb-cover-bg"
    style="--bs-breadcrumb-divider: '>'; background: url({{ @$bannerImageLink ? asset('upload/banner/' . @$bannerImageLink) : asset('frontend/banner/hall-banner2.png') }})"
    aria-label="breadcrumb">
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>/
        <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
    </ol>
</nav>
