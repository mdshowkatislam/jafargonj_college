<style>
    .program-cat-card .card-title {
        font-size: 24px;
        text-align: center;
        background-color: #00c5bf;
        color: #fff;
    }
    .program_icon {
        padding: 8px;
        border-radius: 100%;
        background: #00c5bf;
        color: #fff;
        text-align: center;
    }
    .program_icon i {
        font-size: 24px;
        line-height: 30px;
    }
</style>

<div class="p-2">
    <div class="d-flex justify-content-between align-items-end">
        <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
            Programs
        </h1>
        {{-- <a href="" class="text-uppercase text-decoration-none fw-bold common-font-color">All</a> --}}
    </div>

    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

    <div class="row">
        @foreach ($program_cat as $item)
            @php
                $programs = \App\Models\Program::where('faculty_id', $faculty->id)
                    ->where('program_category_id', $item->id)
                    ->where('status', 1)
                    ->get();
            @endphp
            @if (count($programs) > 0)
                <div class="col-lg-6 mt-3">
                    <div class="card program-cat-card border-0">
                        <div class="card-title py-4 fw-bolder custom-font-titillium-web">
                            {{ $item->program_category }}
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group border-0 rounded-0">
                                @foreach ($programs as $program)
                                    <a href="{{ route('academics.academics_details', $program->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3 align-items-center" aria-current="true">
                                        <div class="program_icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-0 hover-on-text custom-font-titillium-web">
                                                    {{ $program->program_title }}
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</div>