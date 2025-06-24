@extends('frontend.landing')
@php
    $page_title = 'Procurement';
@endphp
@section('title')
    {{ $page_title }}
@endsection

<style>
    .search-section {
        background: #e9ecef;
        text-align: justify;
        height: 250px;
        width: 100%;
    }

    .search-section .headline {
        font-size: 40px;
        color: #275d38;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }

    .search-section p {
        color: #313a45
    }

    .search-section .search-bar {
        width: 96%;
    }

    .search-section .search-bar #input-field {
        width: 96%;
        outline-style: inset;
        background: #f2cd00;
        color: wheat;
        height: 50px;
        font-size: 20px;
        padding-left: 20px;
        outline: none;
        border: 0;
    }

    .search-bar #input-field::placeholder {
        color: white;
    }

    .search-bar i {
        font-weight: 900;
        margin-left: -41px;
    }

    .content {
        background: #e9ecef;
    }


</style>

@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <section class="my-5">
        <div class="container">
            <div class="search-section p-5 rounded shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h3 class="headline">Procurement Search</h3>
                        <p class="m-0">Use the filters below to find procurement!</p>
                    </div>
                    <div class="col-md-8">
                        <div class="search-bar">
                            <input type="text" placeholder="Search for Procurement" id="input-field">
                            <span><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="content-area">
            <div class="container">
                @foreach ($procurement as $item)
                    <div class="content p-3 mt-3">
                        <h3 class="content-title">{{ $item->title }}</h3>
                        <h3 class="fs-6 fw-bold">
                            <i class="fas fa-calendar-alt"></i>
                                {{ date('d M Y', strtotime(@$item->start_date)) }}
                        </h3>
                        <p>{!! \Illuminate\Support\Str::limit($item->short_desc, 200, $end = '...') !!}</p>
                        <a href="{{ url('procurement/' . $item->id) }}">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        const searchInput = document.getElementById('input-field');
        const dataList = document.querySelectorAll('.content-title');
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            for (let i = 0; i < dataList.length; i++) {
                const itemText = dataList[i].textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    dataList[i].parentNode.style.display = 'block';
                } else {
                    dataList[i].parentNode.style.display = 'none';
                }
            }
        });
    </script>
@endsection
