@extends('frontend.layouts.master-landing')
@php
$page_title = 'Affiliated College/Institutes';
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>
    .affiliate-content:last-child {
        margin-bottom: 0 !important;
    }

    .affiliate-text p,
    .affiliate-text {
        font-size: 14px;
        margin: 0;
    }

    .search-box {
        border-top-right-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
        font-size: 18px !important;
        background-color: #fff !important;
        border: none !important;
    }

    .search-box:focus {
        box-shadow: none !important;
    }

    .aff-search-icon {
        width: 50px;
        cursor: pointer;
        border-radius: 0 !important;
        background-color: #00c5bf !important;
        margin-left: -5px !important;
        color: #fff !important;
        justify-content: center;
    }
    #affiliate-notices{
        list-style-type: none;
    }
</style>
@section('content')
@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<section>
    <div class="container">
        <div class="row mt-5 rounded" style="height:200px; background-color: #f1f1f1">
            <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                <h3 class="fs-4 fw-bold">AFFILIATED INSTITUTE SEARCH</h3>
                <p class="fs-6">Use the filters to find affiliate institute!</p>
            </div>
            <div class="col-md-8 my-auto justify-content-center">
                <div class="input-group" style="height : 60px;">
                    <input type="search" class="form-control" placeholder="Enter Keywords ..." aria-label="Search" id="input-field" aria-describedby="search-addon" />
                    <span class="input-group-text rounded aff-search-icon" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <section>
        <div class="affiliate-details my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" id="affiliate-list">
                        <div class="row">
                            @foreach ($infos as $key => $info)
                            <div class="affiliate-content col-12 mb-4" >
                                <div class="rounded shadow-sm p-3 affiliate-text" style="border-left: 5px solid #009999;">
                                    <div class="row">
                                        <div class="col-2 affiliate-img">
                                            <img src="{{ asset('upload/affiliation/' . @$info->image) }}" alt="{{@$info->inst_name}}" class="img-thumbnail">
                                        </div>
                                        <div class="col-10">
                                            <h4 class="content-title fs-5 fw-bolder">
                                                <a href="{{ route('affiliation', $info->id) }}" style="text-decoration: none; color: #009999;">
                                                    {!! $info->inst_name !!}
                                                </a>
                                            </h4>
                                            {!! Str::limit($info->inst_description, 220) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-4" id="affiliate-notices">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="text-uppercase home-content-heading custom-font-titillium-web fw-bold">Notices</h5>
                            </div>
                            <div class="card-body" style="overflow-y: scroll; height: 30rem;">
                                @if (count($notices) > 0)
                                    @foreach (@$notices as $item)
                                        <h5 class="card-title" style="text-align: justify; font-size:15px;">
                                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">{{ $item->title }}</a>
                                        </h5>
                                        <li style="text-align: left;">
                                            <span>Published: {{ date('M d,Y', strtotime($item->date)) }}</span>
                                            
                                        </li>
                                        <li class="mb-2 mt-1">
                                            <a href="{{ route('type.details', ['id' => $item->id, 'type' => 'notice']) }}" target="_blank">
                                            <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                            </a>
                                        </li>
                                        <li class="border-top mb-2"></li>
                                    @endforeach
                                @else
                                No notice has been given yet
                                @endif
                            </div>
                        </div>
                        @if (count($notices) > 0)
                        <div class="text-center p-2">
                            <a href="{{ route('type.all', ['type' => 'notice', 'notices' => '5']) }}" class="btn btn-theme effect btn-md custom-font-titillium-web">View All Notices</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')

<script>
    const searchInput = document.getElementById('input-field');
    searchInput.addEventListener('input', () => {
        const dataList = document.querySelectorAll('.content-title');
        const dataListImg = document.querySelectorAll('.affiliate-img');
        const searchTerm = searchInput.value;
        for (let i = 0; i < dataList.length; i++) {
            const itemText = dataList[i].textContent;
            if ((itemText.toLowerCase()).includes((searchTerm.toLowerCase()))) {
                const result = [...itemText.matchAll(new RegExp(searchTerm, 'gi'))];
                var textsplit = itemText.split(new RegExp(searchTerm, 'gi'));
                var text = '';
                const textsplit_length = textsplit.length;
                for (let i = 0; i < textsplit_length; i++) {
                    if ((textsplit_length - 1) == i) {
                        text += textsplit[i];
                    } else {
                        text += textsplit[i] + "<span class='text-bold'>" + result[i]['0'] +
                            "</span>";
                    }
                }
                dataList[i].childNodes[1].innerHTML = text;
                dataList[i].parentNode.parentNode.parentNode.parentNode.style.display = 'block';
                // dataListImg[i].parentNode.parentNode.style.display = 'block';
            } else {
                dataList[i].parentNode.parentNode.parentNode.parentNode.style.display = 'none';
                // dataListImg[i].parentNode.parentNode.style.display = 'none';
            }
        }
    });
</script>
@endpush