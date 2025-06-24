
    <div class="home-academics">
        <div class=" container">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
                    Laboratory
                </h1>
                {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div>

            <div class="row">
                @forelse ($labs as $item)
                    <div class="col-md-3 mt-3">
                        <div class="card rounded-0 overflow-hidden lab" style=" height: 26rem;">
                            <img class="department-image w-100" {{-- src="{{ asset('upload/lab/COMPUTER_LAB.jpg') }}" --}} src="{{ asset('upload/lab/' . @$item->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="" />
                            <div class="card-body lab_text">
                                <a href="{{ route('lab.details', @$item->id) }}">
                                    <h3 class="card-title fs-5 text-center fw-bolder custom-font-titillium-web">
                                        {{ @$item->title }}
                                    </h3>
                                </a>
                                {{-- <p class="card-text"> --}}
                                {!! Str::limit(@$item->description, 140) !!}
                                {{-- </p> --}}
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-md-12">
                    <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no activities at the moment..</h2>
                </div>
                @endforelse

            </div>
        </div>
    </div>