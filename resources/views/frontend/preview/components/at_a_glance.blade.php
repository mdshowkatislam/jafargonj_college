
<script>
    $(document).ready(function() {
        var imagePath = "{{ asset('upload/banner/' . $banner->image) }}"; // Construct the full image path
        $('.fun-factor-area').css('background-image', 'url("' + imagePath + '")');
    });
</script>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center site-heading">
            <h2 class="custom-font-titillium-web mycolorgreen">Jafargonj Mir Abdul Gafur College</h2>
        </div>
    </div>
</div>

<div class="fun-factor-area default-padding text-center my-background shadow dark-hard">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 item">
                <div class="fun-fact">
                    <div class="icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="info">
                        <span id="founded" class="countup" cup-end="1986" cup-duration="2000"></span>
                        <span class="medium custom-font-titillium-web ">Founded </span>
                    </div>
                </div>
            </div>
            @php
                // $facultynumber =  App\Models\Profile::where('personnel_type', 1)->count();
                $facultynumber =  App\Models\PersonnelsToFaculty::all()->count();
            @endphp
            <div class="col-md-3 col-sm-6 item">
                <div class="fun-fact">
                    <div class="icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="info" style="text-align: center">
                        <div class="d-flex justify-content-center gap-2">
                            {{-- <span id="founded_Members" class="countup" cup-end="{{ @$at_a_glance->faculty_member_number }}" cup-duration="2000"></span> --}}
                            <span id="founded_Members" class="countup" cup-end="{{ @$facultynumber }}" cup-duration="2000"></span>
                            <span style="display:inline;font-size: 20px">+</span>
                        </div>
                        <div class="clearfix"></div>
                        <span class="medium custom-font-titillium-web ">Department Members</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 item">
                <div class="fun-fact">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="info" style="text-align: center">
                        <div class="d-flex justify-content-center gap-2">
                            <span id="Regular_Students" class="countup" cup-end="{{ @$at_a_glance->student_number }}" cup-duration="2000"></span>
                            <span style="display:inline;font-size: 20px">+</span>
                        </div>
                        <span class="medium custom-font-titillium-web">Regular Students</span>
                    </div>
                </div>
            </div>
            @php
                $affiliationNumber =  App\Models\Affiliation::all()->count();
            @endphp
            <div class="col-md-3 col-sm-6 item">
                <div class="fun-fact">
                    <div class="icon">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="info" style="text-align: center">
                        {{-- <span id="Affiliated_Colleges" class="countup" cup-end="{{ @$at_a_glance->phd_number }}" cup-duration="1000"></span> --}}
                        <span id="Affiliated_Colleges" class="countup" cup-end="{{ @$affiliationNumber }}" cup-duration="1000"></span>
                        <span class="medium custom-font-titillium-web ">Courses Offered</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>