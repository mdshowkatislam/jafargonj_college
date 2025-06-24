<style>
    .card-header-facultys {
        background-color: #00c5bf;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        /* margin-top: 20px; */
        color: white;
        font-weight: 600;
    }
    .academics-card-icon p {
        transition: all 0.2s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        color: #000000;
    }
    .academics-card-icon {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        /* background: linear-gradient(0deg, #00c5bf 0%, rgba(4, 124, 59, 0.3) 100%); */
        padding: 8px;
    }
    .academics-card-icon:hover {
        -webkit-transform: scale(1.08);
        transform: scale(1.08);
        cursor: pointer;
    }
    .bg-info {
        background-color: #00c5bf !important;
    }
    .academics-card {
        position: relative;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }
    .border-one:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-one:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:before {
        position: absolute;
        content: '';
        left: 0px;
        top: 0px;
        width: 2px;
        height: 0px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }

    .border-two:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 2px;
        background-color: #00c5bf;
        transition: all 900ms ease;
        -moz-transition: all 900ms ease;
        -webkit-transition: all 900ms ease;
        -ms-transition: all 900ms ease;
        -o-transition: all 900ms ease;
    }
    .academics-card:hover .border-one:before {
        width: 100%;
    }

    .academics-card:hover .border-one:after {
        height: 100%;
    }

    .academics-card:hover .border-two:before {
        height: 100%;
    }

    .academics-card:hover .border-two:after {
        width: 100%;
    }
    .accordion-header > button {
        border-color: #ddd;
    }
    .accordion-button:not(.collapsed) {
        color: #ffffff;
        background-color: #B5212D;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
    }
    .accordion-button:focus {
        box-shadow: none;
    }
</style>

<div class="col-lg-4">
    <h5 class="card-header-facultys">Program Type</h5>
    <div class="shadow p-3 mb-3 bg-light rounded program-type">
        <form class="filter-form">
            <ul class="list-group">
                @php
                    $pall = App\Models\Program::count('program_category_id');
                @endphp
                <li class="list-group-item">
                    <div class="program-text mt-3 d-flex align-items-center">
                        <label for="program_id2222" class="d-flex me-2">
                            <input type="radio" ref="program" checked value="" name="program_category_id"
                                   id="program_id2222">
                        </label>
                        <span class="title me-2">All</span>
                        <span class="badge bg-info text-light ms-auto">{{ $pall }}</span>
                    </div>
                </li>


                @foreach ($program_categories as $key => $pc)
                    @php
                        $a = App\Models\Program::where('program_category_id', $pc->id)->count('program_category_id');
                    @endphp
                    @if($a > 0)
                    <li class="list-group-item">
                        <div class="program-text mt-3 d-flex align-items-center">
                            <input type="radio" ref="program" value="{{ $pc->id }}" name="program_category_id"
                                   id="program_id{{ $key }}">
                            <label for="program_id{{ $key }}" class="me-2"></label>
                            <span class="title me-2">{{ $pc->program_category }}</span>
                            <span class="badge bg-info text-light ms-auto">{{ $a }}</span>
                        </div>
                    </li>
                    @endif
                @endforeach
            </ul>

    </div>

    <div class="shadow p-3 mb-3 bg-light rounded program-type mt-4">
        <h5 class="mt-3 card-header-facultys">Faculty</h5>
        <ul class="list-group">
            @php
                $fall = App\Models\Program::count('faculty_id');
            @endphp
            <li class="list-group-item">
                <div class="program-text d-flex align-items-center mt-3">
                    <div class="d-flex align-items-center">
                        <input type="radio" ref="faculty" checked value="" name="faculty_id" id="faculty_id2222">
                        <label for="faculty_id2222" class="ms-2 mb-0">
                            <span class="title">All</span>
                        </label>
                    </div>
                    <span class="badge bg-info text-light ms-auto">{{ $pall }}</span>
                </div>
            </li>


            @foreach ($faculties as $key => $f)
                @php
                    $b = App\Models\Program::where('faculty_id', $f->id)->count('faculty_id');
                @endphp
                <li class="list-group-item">
                    <div class="program-text d-flex align-items-center mt-3">
                        <input type="radio" ref="faculty" value="{{ $f->id }}" name="faculty_id"
                               id="faculty_id{{ $key }}">
                        <label for="faculty_id{{ $key }}" class="ms-2"></label>
                        <span class="title me-2">{{ $f->name }}</span>
                        <span class="badge bg-info text-light ms-auto">{{ $b }}</span>

                    </div>
                </li>

            @endforeach
        </ul>

        </form>

    </div>
</div>

<script>
    $(function(){
        $(document).on('click','[ref="program"],[ref="faculty"]',function(){
            var cate = document.querySelector('input[name="program_category_id"]:checked').value;
            $('#cate').val(cate);
            $.ajax({
                // url: 'academics_srch',
                url: "{{ route('academics_srch') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    program: document.querySelector('input[name="program_category_id"]:checked').value,
                    faculty: document.querySelector('input[name="faculty_id"]:checked').value,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    let html = '';
                    let htmlNotice = '';
                    let htmlFaq = '';
                    console.log(data);
                    data['programs'].data.forEach(program => {
                        html += `<div class="col-lg-4 col-md-6 d-flex">
                                    <div class="panel panel-default shadow p-3 mb-3 bg-light rounded custom-card academics-card w-100 d-flex flex-column">
                                        <div class="border-one"></div>
                                        <div class="border-two"></div>
                                        <div class="panel-body text-center academics-card-icon flex-grow-1">
                                            <a href="academics/academic_details/${program.id}">
                                                <img class="img-rounded" src="upload/program_icon/${program.image_icon}" height="80" width="80" onerror="this.onerror=null;this.src='{{ asset('frontend/images/fabrication.png') }}';" alt="icon">
                                                <h4 class="fs-6 mt-2">${program.program_title}</h4>
                                                <div style="font-size: 13px;">
                                                    <p class="m-0 lh-sm">${program.name}</p>
                                                    <p class="m-0">${program.program_category}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    
                    for (let j = 0; j < data['notices'].length; j++) {
                        let date = new Date(data['notices'][j]['date']);  // Create Date object

                        // Format the date as dd-mm-yyyy
                        let day = date.getDate().toString().padStart(2, '0'); // Add leading zero if day < 10
                        let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Add leading zero if month < 10
                        let year = date.getFullYear();

                        let formattedDate = `${day}-${month}-${year}`;  // Format the date
                        htmlNotice += `<li class="list-group-item">
                                            <div class="card-body">
                                                <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                                                    <a href="/archive/notice/details/${data['notices'][j]['id']}" target="_blank">${data['notices'][j]['title']}</a>
                                                </h5>
                                                <div class="card-text">
                                                    <span>Published: ${formattedDate}</span>
                                                </div>
                                                <a href="/archive/notice/details/${data['notices'][j]['id']}" target="_blank">
                                                <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                                                </a>
                                                
                                            </div>
                                        </li>`;
                    }
                    for (let k = 0; k < data['faq'].length; k++) {
                        htmlFaq +=  `<div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${k}"
                                                    aria-expanded="false" aria-controls="collapse${k}">
                                                    ${data['faq'][k]['question']}
                                                </button>
                                            </h2>
                                            <div id="collapse${k}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    ${data['faq'][k]['answer']}
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                    }

                    document.getElementById('display_services').innerHTML = html;

                    // Handle pagination links
                    let paginationHtml = '';
                    if (data['programs'].last_page > 1) {
                        paginationHtml += '<nav aria-label="Page navigation"><ul class="pagination">';

                        // Previous page link
                        if (data['programs'].current_page > 1) {
                            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${data['programs'].current_page - 1}">Previous</a></li>`;
                        }

                        // Page number links
                        for (let i = 1; i <= data['programs'].last_page; i++) {
                            if (i === data['programs'].current_page) {
                                paginationHtml += `<li class="page-item active"><span class="page-link" style="color: #ffffff !important;">${i}</span></li>`;
                            } else {
                                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                            }
                        }

                        // Next page link
                        if (data['programs'].current_page < data['programs'].last_page) {
                            paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${data['programs'].current_page + 1}">Next</a></li>`;
                        }

                        paginationHtml += '</ul></nav>';
                    }

                    // Append pagination links
                    document.getElementById('pagination_links').innerHTML = paginationHtml;
                    
                    document.getElementById('notice_service').innerHTML = htmlNotice;
                    document.getElementById('faq_service').innerHTML = htmlFaq;
                },
                error: function (response) {
                },
            });
        });

        var request_program = "{{request()->program}}";
        $('[ref="program"][value="'+request_program+'"]').trigger('click');
    })
</script>
<script>
    $(document).on('click', '.pagination .page-link', function(e) {
    e.preventDefault();
    const page = $(this).data('page');

    $.ajax({
        url: "{{ route('academics_srch') }}",
        type: 'POST',
        dataType: 'json',
        data: {
            program: document.querySelector('input[name="program_category_id"]:checked').value,
            faculty: document.querySelector('input[name="faculty_id"]:checked').value,
            _token: '{{ csrf_token() }}',
            page: page // Include page number
        },
        success: function (data) {
            // Update display_services with new programs
            let html = '';
            data['programs'].data.forEach(program => {
                html += `<div class="col-lg-4 col-md-6 d-flex">
                            <div class="panel panel-default shadow p-3 mb-3 bg-light rounded custom-card academics-card w-100 d-flex flex-column">
                                <div class="border-one"></div>
                                <div class="border-two"></div>
                                <div class="panel-body text-center academics-card-icon flex-grow-1">
                                    <a href="academics/academic_details/${program.id}">
                                        <img class="img-rounded" src="upload/program_icon/${program.image_icon}" height="80" width="80" onerror="this.onerror=null;this.src='{{ asset('frontend/images/fabrication.png') }}';" alt="icon">
                                        <h4 class="fs-6 mt-2">${program.program_title}</h4>
                                        <div style="font-size: 13px;">
                                            <p class="m-0 lh-sm">${program.name}</p>
                                            <p class="m-0">${program.program_category}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>`;
            });

            // Update the services display
            document.getElementById('display_services').innerHTML = html;

            // Update pagination links
            let paginationHtml = '';
            if (data['programs'].last_page > 1) {
                paginationHtml += '<nav aria-label="Page navigation"><ul class="pagination">';

                if (data['programs'].current_page > 1) {
                    paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${data['programs'].current_page - 1}">Previous</a></li>`;
                }

                for (let i = 1; i <= data['programs'].last_page; i++) {
                    if (i === data['programs'].current_page) {
                        paginationHtml += `<li class="page-item active"><span class="page-link" style="color: #ffffff !important;">${i}</span></li>`;
                    } else {
                        paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
                    }
                }

                if (data['programs'].current_page < data['programs'].last_page) {
                    paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${data['programs'].current_page + 1}">Next</a></li>`;
                }

                paginationHtml += '</ul></nav>';
            }

            document.getElementById('pagination_links').innerHTML = paginationHtml;
        },
        error: function (response) {
            console.error(response);
        },
    });
});

</script>