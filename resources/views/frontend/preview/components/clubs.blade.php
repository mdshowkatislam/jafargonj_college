<style>
    .over-container {
        position: relative;
    }

    .over-img {
        display: block;
        width: 100%;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: 0.5s ease;
        background-color: #00c5bf;
    }

    .over-container:hover .overlay {
        opacity: 1;
    }

    .over-container:hover .campus-title {
        display: none;
    }

    .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

</style>

    <div class="" style="background-image: url({{ asset('frontend/assets/img/bup/oncampus_banner.png') }}); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
                    Clubs
                </h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>

            <div class="w-100 common-bg-color mt-1" style="height: 4px; position: relative;"></div>

            <div class="row">
                @forelse ($clubs as $item)
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mt-3">
                        <a href="{{ route('club.index', $item->slug) }}">
                            <div class="over-container">
                                <img src="{{ asset('upload/banner/' . $item['banner']) }}" style="height: 242px; object-fit: cover;" onerror="this.onerror=null; this.src='{{ asset('upload/no-image.png') }}';" class="shadow-1-strong over-img" alt="Student Life" />
                                <div class="campus-title" style="right:0px; bottom: 20px; position: absolute;">
                                    <div class="text-white d-flex justify-content-center custom-font-titillium-web" style="width: 200px; height: 40px; background: #B60404; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                        <p class="mt-2 text-right text-white custom-font-titillium-web"> {{ Str::limit(@$item->name, 18, '...') }} </p>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="text custom-font-titillium-web">{{ @$item->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                <div class="col-md-12">
                    <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                </div>
                @endforelse
            </div>

        </div>
    </div>
