<div class="row">
    <div class="col-lg-8">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Notices
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        <div class="row mx-0 upcoming-events ">
            @if (count($notices) > 0)
                @foreach ($notices as $notice)
                    <div class="col-md-12 mt-3 p-3 notice-div bg-light rounded">
                        <a href="{{ route('type.details', ["id"=>$notice->id,"type"=>'notice',"url"=>$url]) }}">
                            <p class="mb-0 fs-7 fw-bold"><i class="fas fa-calendar-alt"></i>
                                {{ date('M d, Y', strtotime(@$notice->date)) }}</p>
                            <h2 class="fs-5 hover-on-text pt-2 ">{{ @$notice->title }}</h2>
                        </a> 
                    </div>
                    {{-- <div class="col-md-3 my-3 notice-div">
                        <a class="btn btn-info btn-sm" href="#" role="button"><i class="fas fa-download me-1" download="Certificate"></i> Download</a>
                    </div> --}}
                @endforeach
            @else
                <h2 class="fs-5 p-3 mt-3  mb-0 bg-light rounded">There are no notices at the moment..</h2>
            @endif

        </div>
    </div>

    <div class="col-lg-4">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading">
                Upcoming Events
            </h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
        </div>
        @include('frontend.partials.sections.events_new')
    </div>
</div>
