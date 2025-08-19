<!-- Program -->
@if (count($dept_programs) > 0)
    <section class="container">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="w-100 text-center">
                    <h1 class="fs-2 fw-bold custom-font-titillium-web">
                        Academic Programs
                    </h1>
                </div>
            </div>
        </div>
        <div class="position-relative common-bg-color mt-1" style="width:50px;height: 2px;margin: auto;">
        </div> --}}

        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Academic Programs</h1>
            {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
        </div>
        
        <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

        <div class="row pt-3">
            @foreach ($program_cat as $item)
                @php
                    $programs = \App\Models\Program::where('department_id', $department->id)
                        ->where('program_category_id', $item->id)
                        ->where('status', 1)
                        ->get();
                @endphp
                
                @if (count($programs) > 0)
                @foreach(@$programs as $prog)
                {{-- @dd($prog) --}}
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3">
                        <div class="single-news" style="box-shadow: 0 0 10px #cccccc;
                        background: #ffffff;">
                            <div class="single-news-thumb">
                                <a href="{{ route('academics.academics_details', $prog->id) }}">
                                    <img class="p-2 w-100 object-cover" height="250px"
                                        src="{{ asset('upload/program/' . $prog->image) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';"
                                        alt="" />
                                </a>
                            </div>
                            <div class="info">
                                <div class="px-4 pt-3 pb-5">
                                    <h4 class="text-left fs-4 mb-3" style="min-height: 5rem;">
                                        <a href="{{route('academics.academics_details', $prog->id)}}">{{ $prog->program_title }}</a>
                                    </h4>
                                    <hr>
                                    {{-- <span class="w-100 m-2 border-top border-light"></span> --}}
                                    <div class="text-center">
                                        <a class="latest-news-btn text-center custom-font-titillium-web" href="{{route('academics.academics_details', $prog->id)}}"><i
                                                class="fas fa-plus"></i> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            @endforeach
        </div>
    </section>
@endif