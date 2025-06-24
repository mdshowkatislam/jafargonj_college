@extends('frontend.landing')
@php
    $page_title = $category->program_category . ' Program';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

<main class="container mt-5">
  <!-- Academics Card -->
  <section class="">
    <div class="row">

        <div class="col-lg-4 ">
            <div class="shadow-sm p-3 mb-3 bg-light rounded program-type">
                
                <form class="filter-form"> 
                    <input name="program_category_id" type="hidden" value="{{ request()->id }}">
                    <div class="shadow-sm p-3 mb-3 bg-light rounded program-type mt-4">
                        <h1 class="mt-3">Faculty</h1>
                        @php 
                            $fall = App\Models\Program::where('program_category_id',request()->id)->count('faculty_id');
                        @endphp
                        <div class="program-text d-flex justify-content-between align-items-center mt-3">
                            <label for="faculty_id2222" class=" d-flex">
                                <input type="radio" ref="faculty" checked value="" name="faculty_id" id="faculty_id2222">
                                <h1 class="title"> All</h1> 
                                <p class="number">{{$fall}}</p>
                            </label>
                        </div>
                        @foreach($faculties as $key => $f)
                            @php
                                $b = App\Models\Program::where('program_category_id',request()->id)->where('faculty_id', $f->id)->count('faculty_id');
                            @endphp
                            <div id="faculty_div{{$key}}" class="program-text d-flex justify-content-between align-items-center mt-3">
                                <input type="radio" ref="faculty" value="{{$f->id}}" name="faculty_id" id="faculty_id{{$key}}"> 
                                <label for="faculty_id{{$key}}" class=" d-flex">
                                    <h1 class="title">{{$f->name}}</h1>
                                    <p class="number">{{$b}}</p>
                                </label>
                            </div>
                            @php 
                                $dall = App\Models\Program::where('program_category_id',request()->id)->count('department_id');
                            @endphp
                            <script>
                                $(document).on('select change','[id^="faculty_id{{ isset($key) ? $key : '' }}"]',function(){
                                   var faculty_id = $('#faculty_id{{$key}}').val();
                                //    var faculty_id = $(this).val();
                                //    alert(faculty_id);
                                   $.ajax({
                                       url: "{{ route('faculty_wise_department_front') }}",
                                       type: "GET",
                                       data: { 
                                           faculty_id: faculty_id,
                                           program_category_id:document.querySelector('input[name="program_category_id"]').value,
                                        },
                                       success: function(data)
                                       {
                                           if(data != 'fail')
                                           {
                                                let html='';
                                                for(let i=0;i<data.facultyWiseDepartment.length;i++){
                                                    var departmentCount;
                                                    $.ajax({
                                                        url: "{{ route('department_wise_program_count') }}",
                                                        type: "GET",
                                                        data: { 
                                                            department_id: data.facultyWiseDepartment[i]['id'],
                                                            program_category_id:document.querySelector('input[name="program_category_id"]').value,
                                                        },
                                                        success: function(response) {
                                                            // Handle the response data here
                                                            departmentCount = response.countDepartment;
                                                            console.log(response.countDepartment);
                                                            console.log("count = "+departmentCount);
                                                            html+=`<div class="program-text d-flex justify-content-between align-items-center mt-3">
                                                                            <input type="radio" ref="department" value="${data.facultyWiseDepartment[i]['id']}" name="department_id" id="department_id${i}"> 
                                                                            <label for="department_id${i}" class=" d-flex">
                                                                                <h1 class="title">${data.facultyWiseDepartment[i]['name']}</h1>
                                                                                <p class="number">${departmentCount}</p>
                                                                            </label>
                                                                        </div>`

                                                            console.log(html);
                                                            htmlOuterDiv = `<h1 class="mt-3">Department</h1>
                                                                                <div class="program-text d-flex justify-content-between align-items-center mt-3">
                                                                                    <label for="department_id2222" class=" d-flex">
                                                                                        <input type="radio" ref="department" checked value="" name="department_id" id="department_id2222">
                                                                                        <h1 class="title"> All</h1> 
                                                                                        <p class="number">${data.countFacultyWiseAllProgram}</p>
                                                                                    </label>
                                                                                </div>
                                                                                ${html}`

                                                            document.getElementById('department_div').innerHTML=htmlOuterDiv;
                                                        }
                                                    });
                                                    
                                                }
                                           }
                                           else
                                           {
                                               console.log('failed');
                                           }
                                       }
                                   });
                               });
                            </script>
                        @endforeach
        
                    </div>
                    <div id="department_div" class="shadow-sm p-3 mb-3 bg-light rounded program-type mt-4">
                        <h1 class="mt-3">Department</h1>
                        @php 
                            $dall = App\Models\Program::where('program_category_id',request()->id)->count('department_id');
                        @endphp
                        <div class="program-text d-flex justify-content-between align-items-center mt-3">
                            <label for="department_id2222" class=" d-flex">
                                <input type="radio" ref="department" checked value="" name="department_id" id="department_id2222">
                                <h1 class="title"> All</h1> 
                                <p class="number">{{$dall}}</p>
                            </label>
                        </div>
                        @foreach($departments as $key => $d)
                        @php
                            $b = App\Models\Program::where('program_category_id',request()->id)->where('department_id', $d->id)->count('department_id');
                        @endphp
                            <div class="program-text d-flex justify-content-between align-items-center mt-3">
                                <input type="radio" ref="department" value="{{$d->id}}" name="department_id" id="department_id{{$key}}"> 
                                <label for="department_id{{$key}}" class=" d-flex">
                                    <h1 class="title">{{$d->name}}</h1>
                                    <p class="number">{{$b}}</p>
                                </label>
                            </div>
                        @endforeach
        
                    </div>
                </form>

            </div>
        </div>
 
        <div class="col-lg-8">
            <div id="display_services" class=" row d-flex justify-content-around">
                
                @foreach($programs as $pr)  
                    <div class="academics-card shadow-sm p-3 mb-3 bg-light rounded col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="academics-card-icon text-center mt-4">
                            <a href="{{ route('academics.academics_details', $pr->id) }}">
                                <img class="rounded" src="{{ asset('frontend/assets/img/academics/card-icon (5).png') }}" alt="icon">
                                <h1 class="fs-6 text-center text-primary mt-2">{{$pr->program_category}}</h1>
                                <p>{{$pr->program_title}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  </section>
</main>
 



<script>
    //  $(document).on('select change','#faculty_id',function(){
    //     var faculty_id = $('#faculty_id').val();
    //     $.ajax({
    //         url: "{{ route('faculty_wise_department') }}",
    //         type: "GET",
    //         data: { faculty_id: faculty_id },
    //         success: function(data)
    //         {
    //             if(data != 'fail')
    //             {
    //                 $('#department_id').empty();
    //                 $('#department_id').append('<option disabled selected value ="">Select Department</option>');
    //                 $.each(data,function(index,subcatObj){
    //                     $('#department_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
    //                 });
    //             }
    //             else
    //             {
    //                 console.log('failed');
    //             }
    //         }
    //     });
    // });

    
    addEventListener('click',(e)=>{
      if(e.target.getAttribute("ref")=="faculty" || e.target.getAttribute("ref")=="department"){
        //   console.log(e.target.value)
        if(e.target.getAttribute("ref")=="faculty")
        {
            document.querySelector('input[name="department_id"]:checked').value = null;
        }
        console.log("faculty id second"+document.querySelector('input[name="faculty_id"]:checked').value);
        console.log("department id second"+document.querySelector('input[name="department_id"]:checked').value);
          $.ajax({
            // url: 'academicsId_srch',
            url: "{{ route('academicsId_srch') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                faculty:document.querySelector('input[name="faculty_id"]:checked')==null ? null : document.querySelector('input[name="faculty_id"]:checked').value,
                department:document.querySelector('input[name="department_id"]:checked')==null ? null : document.querySelector('input[name="department_id"]:checked').value,
                program_category_id:document.querySelector('input[name="program_category_id"]').value,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                let html='';
                for(let i=0;i<data.length;i++){
                //   console.log(data[i]['program_title'])
                  html+=`<div class="academics-card shadow-sm p-3 mb-3 bg-light rounded col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="academics-card-icon text-center mt-4">
                            <a href="academics/academic_details/${data[i]['id']}">
                                <img class="rounded" src="{{ asset('frontend/assets/img/academics/card-icon (5).png') }}" alt="icon">
                                <h1 class="fs-6 text-center text-primary mt-2">${data[i]['program_category']}</h1>
                                <p>${data[i]['program_title']}</p>
                            </a>
                        </div>
                    </div>`
                }

                document.getElementById('display_services').innerHTML=html;
            },
            error: function(response) {
            },
        });
      }
    });
      
</script>
@endsection
