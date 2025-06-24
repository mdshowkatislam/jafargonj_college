@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Journal Paper</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Journal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="col-md-12">
                        <h5 class="m-0 text-dark float-left">Add Journal Paper</h5>
                        <a href="{{ route('news.journal_paper.list') }}" class="btn btn-info btn-sm float-right"><i
                                class="fas fa-stream"></i> View Journal Paper</a>
                    </div>
                </div>
                {{-- @dd($editData) --}}
                <form id="myForm"
                    action="{{ !empty($editData) ? route('news.journal_paper.update', $editData->id) : route('news.journal_paper.store') }}"
                    method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Journal For <span class="text-red">*</span></label>
                                <select name="journal_for" id="journal_for" class="form-control select2">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->journal_for == 1 ? 'selected' : '' }}>Faculty
                                    </option>
                                    <option value="2" {{ @$editData->journal_for == 2 ? 'selected' : '' }}>CHSR
                                    </option>
                                    <option value="3" {{ @$editData->journal_for == 3 ? 'selected' : '' }}>Bangabandhu
                                        Chair
                                    </option>
                                    <option value="4" {{ @$editData->journal_for == 4 ? 'selected' : '' }}>IQAC
                                    </option>
                                </select>
                                @error('journal_for')
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6" id="ref_div" style="display:none;">
                                <label class="control-label">Please Select Faculty</label>
                                <select id="" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="ref_id" style="width:100%">
                                    <option value="" selected>Please Select Faculty</option>
                                    @foreach ($faculties as $list)
                                        <option value="{{ $list->id }}"
                                            {{ @$editData->ref_id == $list->id ? 'selected' : '' }}>{{ $list->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Title <span class="text-red">*</span></label>
                                <input id="paper_title" type="text"
                                    value="{{ !empty($editData->paper_title) ? $editData->paper_title : old('paper_title') }}"
                                    class="form-control @error('paper_title') is-invalid @enderror" name="paper_title"
                                    placeholder="Title"> @error('paper_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Research Area</label>
                                <input type="text" class="form-control @error('research_area') is-invalid @enderror"
                                    name="research_area" id="research_area" autocomplete="off" placeholder="Research Area"
                                    value="{{ !empty($editData->research_area) ? $editData->research_area : old('research_area') }}">
                                @error('research_area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror textarea"
                                    name="description">{{ !empty($editData->description) ? $editData->description : old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-sm-6">
                                <label>Chief Patron</label>
                                <input type="text" class="form-control @error('authors') is-invalid @enderror"
                                    name="authors" id="authors" autocomplete="off" placeholder="Chief Patron"
                                    value="{{ !empty($editData->authors) ? $editData->authors : old('authors') }}">
                                @error('authors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Editor</label>
                                <input type="text" class="form-control @error('editor') is-invalid @enderror"
                                    name="editor" id="editor" autocomplete="off" placeholder="Editor"
                                    value="{{ !empty($editData->editor) ? $editData->editor : old('editor') }}">
                                @error('editor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>ISSN</label>
                                <input type="text" class="form-control @error('issn') is-invalid @enderror"
                                    name="issn" id="issn" autocomplete="off" placeholder="ISSN"
                                    value="{{ !empty($editData->issn) ? $editData->issn : old('issn') }}">
                                @error('issn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Volume</label>
                                <input type="text" class="form-control @error('volume') is-invalid @enderror"
                                    name="volume" id="volume" autocomplete="off" placeholder="Volume"
                                    value="{{ !empty($editData->volume) ? $editData->volume : old('volume') }}">
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Issue</label>
                                <input type="text" class="form-control @error('issue') is-invalid @enderror"
                                    name="issue" id="issue" autocomplete="off" placeholder="Issue"
                                    value="{{ !empty($editData->issue) ? $editData->issue : old('issue') }}">
                                @error('issue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Date</label>
                                <input id="date" type="text"
                                    value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}"
                                    class="form-control singledatepicker @error('date') is-invalid @enderror"
                                    name="date" placeholder="Date"> @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group col-sm-4">
                            <label>Status</label>
                            <select name="status" class="form-control form-control-sm select2">
                                <option value="">Select Type</option>
                                <option {{ !empty($editData) && $editData->status == 1 ? "selected" : ""}}
                                    value="1">Active</option>
                                <option {{ !empty($editData) && $editData->status == 0 ? "selected" : ""}}
                                    value="0">Inactive</option>
                            </select>
                        </div> --}}

                            <div class="form-group col-sm-6">
                                <label>Upload Image<small style="color: brown"> (Max 2 mb,Preferred file: jpg, jpeg,png)</small></label>
                                <input id="attachment1" type="file" value=""
                                    class="form-control @error('attachment1') is-invalid @enderror" name="attachment1">
                                @error('attachment1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Upload File<small style="color: brown"> (Max 10 mb,Preferred file: pdf,doc,docx)</small></label>
                                <input id="attachment2" type="file" value=""
                                    class="form-control @error('attachment2') is-invalid @enderror" name="attachment2">
                                @error('attachment2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>

                    </div>
                </form>

            </div>
            <!--/. container-fluid -->
    </section>

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

        $(document).on('change', '#journal_for', function() {
            var journal_for = $('#journal_for').val();

            if (journal_for == 1) {
                $('#ref_div').show();
            }
            else{
                $('#ref_div').hide();
            }
        });
        $(function(){
            $('#journal_for').trigger('change');
        })
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
                    journal_for: {
                        required: true,
                    },
                    paper_title: {
                        required: true,
                    },
                    attachment1: {                  
                        extension: "jpg|jpeg|png",
                    },
                    attachment2: {                  
                    extension: "pdf|doc|docx",
                }
                },
                messages: {
                    journal_for: {
                        required: "Journal is required",
                    },
                    paper_title: {
                        required: "Title is required",
                    },
                    attachment1: {
                       
                        extension: "Please upload file in these format only (jpg, jpeg, png)."
                    },
                    attachment2: {
                        
                        extension: "Please upload file in these format only (pdf,doc,docx)."
                    }
                },
              //  errorElement: 'span',
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
