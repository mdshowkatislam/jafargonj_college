<div class="p-2">
    
    <div class="d-flex justify-content-between align-items-end">
        <h2 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">
            Departments
        </h2>
        <a class="my-auto home-content-heading custom-font-titillium-web" href="{{ route('faculty_department', $faculty->id) }}">All</a>
    </div>

    <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;"></div>

    <div class="row">
        @foreach ($departments as $department)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card rounded-0 overflow-hidden bg-light shadow faculty_department ">
                    <div class="department-image">
                        <img class="h-100 w-100 object-cover" src="{{ asset('upload/department/' . @$department->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="" />
                    </div>
                    <div class="card-body faculty_department_text" style="height: 200px;">
                        <a href="{{ route('department_home', $department->id) }}">
                            <h3 class="card-title custom-font-titillium-web fs-5 text-center fw-bolder overflow-hidden" style="height:48px;">
                                {{ $department->name }}
                            </h3>
                        </a>
                       <span class="custom-font-titillium-web"> {!! Str::limit(@$department->about, 160) !!} </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
