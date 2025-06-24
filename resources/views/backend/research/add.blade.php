@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">
                    {{ !empty($editData) ? 'Update Research' : 'Add Research' }}
                </h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Research</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left">
                        {{ !empty($editData) ? 'Update Research' : 'Add Research' }}
                    </h5>
                    <a href="{{ route('news.research') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Research</a>
                </div>
                <div class="card-body">
                    <form  id="myForm" action="{{ !empty($editData) ? route('news.research.update', $editData->id) : route('news.research.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Research Type <span class="text-red">*</span></label>
                                <select name="research_type" id="research_type" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->research_type == 1 ? 'selected' : '' }}>Funded
                                    </option>
                                    <option value="2" {{ @$editData->research_type == 2 ? 'selected' : '' }}>Academic
                                    </option>
                                    <option value="3" {{ @$editData->research_type == 3 ? 'selected' : '' }}>Other
                                    {{-- <option value="4" {{ @$editData->research_type == 4 ? 'selected' : '' }}>Media
                                    </option> --}}
                                </select>
                                @error('research_type')
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Research For <span class="text-red">*</span></label>
                                <select name="research_for" id="research_for" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->research_for == 1 ? 'selected' : '' }}>CHSR
                                    </option>
                                    <option value="2" {{ @$editData->research_for == 2 ? 'selected' : '' }}>Department
                                    </option>
                                    <option value="3" {{ @$editData->research_for == 3 ? 'selected' : '' }}>Faculty
                                    </option>
                                </select>
                                @error('research_for')
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6" id="ref_div" style="display:none;">
                                <label class="control-label">Please Select Department</label>
                                <select class="form-control form-control-sm select2" name="department_id" id="department_id" style="width:100%">
                                    <option value="" selected>Select Department</option>
                                    @foreach ($departments as $list)
                                        <option value="{{ $list->id }}" {{ @$editData->ref_id == $list->id &&  @$editData->research_for == '2' ? 'selected' : '' }}>{{ $list->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6" id="ref_div_3" style="display:none;">
                                <label class="control-label">Please Select Faculty</label>
                                <select class="form-control form-control-sm select2" name="faculty_id" id="faculty_id" style="width:100%">
                                    <option value="" selected>Select Faculty</option>
                                    @foreach ($faculties as $list)
                                        <option value="{{ $list->id }}" {{ @$editData->ref_id == $list->id &&  @$editData->research_for == '3' ? 'selected' : '' }}>{{ $list->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6" id="ref_div_2" style="display:none;">
                                <label class="control-label">MPhil/PhD</label>
                                <select class="form-control form-control-sm select2" name="program_id" id="program_id" style="width:100%">
                                    <option value="" >Please Select</option>
                                    <option value="1" {{ @$editData->ref_id == '1' && @$editData->research_for == '1' ? 'selected' : '' }} >MPhil</option>
                                    <option value="2" {{ @$editData->ref_id == '2' && @$editData->research_for == '1' ? 'selected' : '' }}>PhD</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Research Title <span class="text-red">*</span></label>
                                <input id="title" type="text" value="{{ !empty($editData->title) ? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Research Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="mr-5">Project Director</label>
                                <input class="form-check-input" type="checkbox" value="1" id="director_check" name="director_bup">
                                <label class="form-check-label" for="director_check">
                                    Not BUTEX Member
                                </label>
                                <div class="">
                                    <select name="director_id" id="director_profile_id" class="form-control select2">
                                        <option value="">Please Select</option>
                                        @foreach ($profiles as $profile)
                                            <option {{ @$editData->director_id == $profile->id ? 'selected' : '' }} value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('director_profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="director_name" 
                                type="text" 
                                style="display:none;" 
                                value="{{ !empty($editData->director_name) ? $editData->director_name : old('director_name') }}" 
                                class="form-control @error('director_name') is-invalid @enderror"
                                 name="director_name" 
                                 placeholder="Write Project Director Name">
                                             @error('director_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                {{--  ====================  --}}
                            <div class="form-group col-sm-6">
                                <label class="mr-5">Project Supervisor</label>
                                <input class="form-check-input" type="checkbox" value="1" id="supervisor_check" name="supervisor_bup">
                                <label class="form-check-label" for="supervisor_check">
                                    Not BUTEX Member
                                </label>
                                <div class="">
                                    <select name="supervisor_id" id="supervisor_profile_id" class="form-control select2">
                                        <option value="">Please Select</option>
                                        @foreach ($profiles as $profile)
                                            <option {{ @$editData->supervisor_id == $profile->id ? 'selected' : '' }} value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('supervisor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="supervisor_name" type="text" value="{{ !empty($editData->supervisor_name) ? $editData->supervisor_name : old('supervisor_name') }}" class="form-control @error('supervisor_name') is-invalid @enderror" name="supervisor_name" placeholder="Write Project Supervisor Name" style="display:none;">
                                @error('supervisor_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-sm-6" style="display:none;">
                                <label class="mr-5">Supervisor Profile URL</label>
                                <input id="supervisor_url" name="supervisor_url" type="url" value="{{ !empty($editData->supervisor_url) ? $editData->supervisor_url : old('supervisor_url') }}" class="form-control @error('supervisor_url') is-invalid @enderror" placeholder="URL">
                            </div>
                            <div class="form-group col-sm-6" style="display:none;">
                                <label class="mr-5">Attachment</label>
                                <input id="attachment" name="attachment" type="file" value="{{ !empty($editData->attachment) ? $editData->attachment : old('attachment') }}" class="form-control @error('attachment') is-invalid @enderror" placeholder="Attachment">
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Co Author</label>
                                <textarea id="co_author" type="text" class="form-control @error('co_author') is-invalid @enderror" name="co_author">{{ !empty($editData->co_author) ? $editData->co_author : old('co_author') }}</textarea>
                                @error('co_author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror textarea" name="description">{{ !empty($editData->description) ? $editData->description : old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group col-sm-12">
                                <label>Journal and Publisher Name</label>
                                <textarea id="journal_name" type="text" class="form-control @error('journal_name') is-invalid @enderror" name="journal_name">{{ !empty($editData->journal_name) ? $editData->journal_name : old('journal_name') }}</textarea>
                                @error('journal_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Journal Index</label>
                                <input id="journal_index" type="text" placeholder="Journal Index" value="{{ !empty($editData->journal_index) ? $editData->journal_index : old('journal_index') }}" class="form-control @error('journal_index') is-invalid @enderror" name="journal_index" placeholder=""> @error('journal_index')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Journal Category</label>
                                <input id="journal_category" type="text" placeholder="Journal Category" value="{{ !empty($editData->journal_category) ? $editData->journal_category : old('journal_category') }}" class="form-control @error('journal_category') is-invalid @enderror" name="journal_category" placeholder=""> @error('journal_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Article Link</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" placeholder="Article Link" value="{{ !empty($editData->url) ? $editData->url : old('url') }}" name="url">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>ISSN</label>
                                <input type="text" class="form-control @error('issn') is-invalid @enderror" name="issn" id="issn" autocomplete="off" placeholder="ISSN" value="{{ !empty($editData->issn) ? $editData->issn : old('issn') }}">
                                @error('issn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Volume</label>
                                <input type="text" class="form-control @error('volume') is-invalid @enderror" name="volume" id="volume" autocomplete="off" placeholder="Volume" value="{{ !empty($editData->volume) ? $editData->volume : old('volume') }}">
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Issue</label>
                                <input type="text" class="form-control @error('issue') is-invalid @enderror" name="issue" id="issue" autocomplete="off" placeholder="Issue" value="{{ !empty($editData->issue) ? $editData->issue : old('issue') }}">
                                @error('issue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Year <span class="text-red">*</span></label>
                                <select class="form-control select2  @error('year') is-invalid @enderror" name="year" required>
                                    <option value="">Please Select Year</option>
                                    @for ($i = date('Y'); $i >= 1971; $i--)
                                        <option @if (!empty($editData->year) && $editData->year == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                    

                            <div class="form-group col-sm-6">
                                <label>Status <span class="text-red">*</span></label>
                                <select name="status" id="status" class="form-control select2" required>
                                    <option value="">Please Select</option>
                                    @foreach ($statuses as $item)
                                        <option value="{{ $item->id }}" {{ @$editData->publish_status == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach

                                    {{-- <option value="Published" {{ @$editData->publish_status == 'Published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="Completed"
                                        {{ @$editData->publish_status == 'Completed' ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="Accepted"
                                        {{ @$editData->publish_status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="Under Review"
                                        {{ @$editData->publish_status == 'Under Review' ? 'selected' : '' }}>
                                        Under Review
                                    </option>
                                    <option value="Submitted"
                                        {{ @$editData->publish_status == 'Submitted' ? 'selected' : '' }}>Submitted
                                    </option>
                                    <option value="Abstract accepted"
                                        {{ @$editData->publish_status == 'Abstract Accepted' ? 'selected' : '' }}>
                                        Abstract accepted</option> --}}
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Date</label>
                                <input id="date" type="text" value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}" class="form-control singledatepicker @error('date') is-invalid @enderror" name="date" placeholder="Date"> @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Upload Image<small style="color: brown"> (Max 2 mb,Preferred file: jpg,jpeg,png)</small></label>
                                <input id="image" type="file" value="" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group col-sm-6">
                            <label>File Title</label>
                            <input type="text" class="form-control @error('file_title') is-invalid @enderror"
                                value="{{ !empty($editData->file_title) ? $editData->file_title : old('file_title') }}"
                                name="file_title">
                            @error('file_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-5">
                            <label>Upload File<small style="color: brown"> (Max 10 mb)</small></label>
                            <input id="file" type="file" value=""
                                class="form-control @error('file') is-invalid @enderror" name="file">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> --}}

                            {{-- #################################################################### --}}
                        </div>
                        <div class="" id="add_file_extra_div">
                            @if (!empty($files))
                                @foreach ($files as $key => $item)
                                    <div class="row remove_file_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                                        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                            <div class="row">
                                                <input type="hidden" value="{{ !empty($item->id) ? $item->id : '' }}" name="file_id[{{ $key }}]">
                                                <div class="form-group col-sm-6">
                                                    <label>File Title</label>
                                                    <input type="text" class="form-control @error('file_title') is-invalid @enderror" value="{{ !empty($item->file_title) ? $item->file_title : old('file_title') }}" name="file_title[{{ $key }}]">
                                                    @error('file_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label>Upload File<small style="color: brown"> (Max 10
                                                            mb)</small></label>
                                                    <input id="file" type="file" value="" class="form-control @error('file') is-invalid @enderror" name="file[{{ $key }}]">
                                                    @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

                                            <div class="form-group col-md-2">
                                                <i class="btn btn-info fa fa-plus-circle add_file_extra"></i>

                                                <i class="btn btn-danger fa fa-minus-circle remove_file_extra" style="display:{{ $key != 0 ? '' : 'none' }}"> </i>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if (empty($files) || count($files) == 0)
                                <div class="row remove_file_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                                    <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>File Title</label>
                                                <input type="text" class="form-control @error('file_title') is-invalid @enderror" value="{{ !empty($editData->file_title) ? $editData->file_title : old('file_title') }}" name="file_title[5000]">
                                                @error('file_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label>Upload File<small style="color: brown"> (Max 10 mb,Preferred file: pdf,doc,docx,xlsx )</small></label>
                                                <input id="file" type="file" value="" class="form-control @error('file') is-invalid @enderror" name="file[5000]">
                                                @error('file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

                                        <div class="form-group col-md-2">
                                            <i class="btn btn-info fa fa-plus-circle add_file_extra"></i>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>

                        <button class="btn bg-gradient-info btn-sm mt-3"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update' : 'Save' }}</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script id="extra_file_templete" type="text/x-handlebars-template">

    <div class="row remove_file_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
              <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                  <div class="row">
                      <div class="form-group col-sm-6">
                        <label>File Title</label>
                        <input type="text" class="form-control @error('file_title') is-invalid @enderror"
                            value="{{ !empty($editData->file_title) ? $editData->file_title : old('file_title') }}" name="file_title[@{{counter}}]">
                        @error('file_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Upload File<small style="color: brown"> (Max 10 mb, Preferred file:pdf,doc,docx,xlsx)</small></label>
                        <input id="file" type="file" value=""
                            class="form-control @error('file') is-invalid @enderror" name="file[@{{counter}}]">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
              </div>
              <div class="col-1" style="text-align: center;writing-mode: vertical-lr; background: #e6e6b9;border-radius: 0px 10px 10px 0px;">
                  <div class="form-group col-md-2">
                      <i class="btn btn-info fa fa-plus-circle add_file_extra"></i>
                      <i class="btn btn-danger fa fa-minus-circle remove_file_extra"> </i>
                  </div>
      
              </div>
          </div>
      </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 10000;
            $(document).on("click", ".add_file_extra", function() {
                var source = $("#extra_file_templete").html();
                var template = Handlebars.compile(source);
                var data = {
                    counter: counter
                };
                var html = template(data);
                console.log(html);
                $("#add_file_extra_div").append(html);
                $('.select2').select2();
                counter++;

                if ($('.remove_file_extra').length <= 0) {
                    $('.remove_file_extra').hide();
                } else {
                    $('.remove_file_extra').show();
                }
            });

            $(document).on("click", ".remove_file_extra", function(event) {
                $(this).closest(".remove_file_extra_div").remove();
                if ($('.remove_file_extra').length <= 1) {
                    $('.remove_file_extra').hide();
                } else {
                    $('.remove_file_extra').show();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });

        $(document).on('change', '#research_for', function() {
            var research_for = $('#research_for').val();

            if (research_for == 2) {
                $('#ref_div').show();
                $('#ref_div_2').hide();
                $('#ref_div_3').hide();
            }
            else if(research_for == 1){
                $('#ref_div_2').show();
                $('#ref_div').hide();
                $('#ref_div_3').hide();
            } 
            else if(research_for == 3){
                $('#ref_div_3').show();
                $('#ref_div_2').hide();
                $('#ref_div').hide();
            }
            else {
                $('#ref_div').hide();
                $('#ref_div_2').hide();
                $('#ref_div_3').hide();
            }
        });
        $(document).ready(function() {
            var research_for = $('#research_for').val();

            if (research_for == 2) {
                $('#ref_div').show();
                $('#ref_div_2').hide();
                $('#ref_div_3').hide();
            } 
            else if(research_for == 1){
                $('#ref_div_2').show();
                $('#ref_div').hide();
                $('#ref_div_3').hide();
            } 
            else if(research_for == 3){
                $('#ref_div_3').show();
                $('#ref_div_2').hide();
                $('#ref_div').hide();
            }
            else {
                $('#ref_div').hide();
                $('#ref_div_2').hide();
                $('#ref_div_3').hide();
            }
            // $('#category_id').trigger('change');
            // $('input[id="director_check"]').click(function() {
            $(document).on('click', 'input[id="director_check"]', function() {
                if ($(this).is(":checked")) {
                    $('#director_profile_id').parent().hide();
                    $('#director_name').show();

                } else if ($(this).is(":not(:checked)")) {
                    $('#director_profile_id').parent().show();
                    $('#director_name').hide();
                    $('.select2').select2();
                }
            });
            $(document).on('click', 'input[id="supervisor_check"]', function() {
                if ($(this).is(":checked")) {
                    $('#supervisor_profile_id').parent().hide();
                    $('#supervisor_name').show();
                    $('#supervisor_url').parent().show();
                    $('#attachment').parent().show();

                } else if ($(this).is(":not(:checked)")) {
                    $('#supervisor_profile_id').parent().show();
                    $('#supervisor_name').hide();
                    $('#supervisor_url').parent().hide();
                    $('#attachment').parent().hide();
                    $('.select2').select2();
                }
            });
            var director_check = "{{ @$editData->director_bup }}";
            if (director_check == '1') {
                $('input[id="director_check"]').trigger('click');
            }
            var supervisor_check = "{{ @$editData->supervisor_bup }}";
            if (supervisor_check == '1') {
                $('input[id="supervisor_check"]').trigger('click');
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    research_type: {
                        required: true,
                    },
                    research_for: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    year: {
                        required: true,
                    },
                    image: {                  
                        extension: "jpg|jpeg|png",
                    },
                    file: {                  
                    extension: "pdf|doc|docx",
                    },
                    attachment: {                  
                    extension: "pdf|doc|docx|xlsx",
                   }
                },
                messages: {
                    research_type: {
                        required: "Research Type is required",
                    },
                    research_for: {
                        required: "Research For is required",
                    },
                    title: {
                        required: "Research For is required",
                    },
                    status: {
                        required: "Please select a Status",
                    },
                    year: {
                        required: "Year is required.",
                    },
                    image: {
                       
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    },
                    file: {
                        
                        extension: "Please upload file in these format only (pdf,doc,docx)."
                    
                    },
                    attachment: {
                        
                        extension: "Please upload file in these format only (pdf,doc,docx,xlsx)."
                    }
                },
            //    errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
