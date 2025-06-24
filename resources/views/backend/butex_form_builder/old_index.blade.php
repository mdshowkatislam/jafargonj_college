@extends('backend.layouts.app')
@section('content')

<style>
    .custom-ui-list {
        /* Remove default list styling */
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .custom-ui-list li {
        /* Add dotted border on all sides */
        border: 2px dotted #ccc;  /* Adjust color as desired */
        padding: 10px;  /* Adjust padding as desired */
        margin: 5px;  /* Adjust margin as desired */
        cursor: pointer;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Butex Form Builder</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  
<section class="content">
    <div class="container">

        <h2>Butex Form Builder</h2>

        <div class="row">
            <div class="col-md-4">
                <h4>Form Fields</h4>
                <ul id="form-fields" class="list-group custom-ui-list">
                    <li class="list-group-item" data-type="text">Text Input</li>
                    <li class="list-group-item" data-type="number">Number Input</li>
                    <li class="list-group-item" data-type="email">Email Input</li>
                    <li class="list-group-item" data-type="password">Password Input</li>
            
                    <li class="list-group-item" data-type="search">Search Input</li>
                    <li class="list-group-item" data-type="url">URL Input</li>
                    <li class="list-group-item" data-type="tel">Tel Input</li>
                    <li class="list-group-item" data-type="range">Range Input</li>
                    <li class="list-group-item" data-type="color">Color Input</li>

                    <li class="list-group-item" data-type="date">Date Input</li>
                    <li class="list-group-item" data-type="week">Week Input</li>
                    <li class="list-group-item" data-type="month">Month Input</li>
                    <li class="list-group-item" data-type="time">Time Input</li>
                    <li class="list-group-item" data-type="datetime">Date & Time Input</li>
                  
                    <li class="list-group-item" data-type="textarea">Textarea</li>
                    <li class="list-group-item" data-type="select">Select</li>
                    <li class="list-group-item" data-type="radio">Radio</li>
                    <li class="list-group-item" data-type="checkbox">Checkbox</li>
                </ul>
            </div>
            <div class="col-md-8">
                <h4>Form Preview</h4>
                <form id="form-preview" class="border p-3"></form>
                <button id="save-form" class="btn btn-success mt-3">Save Form</button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize SortableJS
        new Sortable(document.getElementById('form-fields'), {
            group: {
                name: 'shared',
                pull: 'clone',
                put: false
            },
            sort: false
        });

        new Sortable(document.getElementById('form-preview'), {
            group: 'shared',
            animation: 150,
            onAdd: function (event) {
                let type = event.item.dataset.type;
                let field;
                switch (type) {
                    case 'text':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Text Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="text" class="form-control" name="text_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'number':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Number Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="number" class="form-control" name="number_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'email':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Email Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="email" class="form-control" name="email_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'password':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Password Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="password" class="form-control" name="password_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    <div>   
                                </div>
                            </div>`;
                        break;
                    case 'search':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Search Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="search" class="form-control" name="search_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'url':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Url Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="url" class="form-control" name="url_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'tel':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Tel Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="tel" class="form-control" name="tel_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'range':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Range Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="range" class="form-control" name="range_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'color':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Color Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="color" class="form-control" name="color_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                <div>
                            </div>`;
                        break;
                    case 'date':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Date Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="color" class="form-control" name="date_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'week':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Week Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="week" class="form-control" name="week_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>    
                                </div>
                            </div>`;
                        break;
                    case 'month':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Month Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="month" class="form-control" name="month_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'time':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Time Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="time" class="form-control" name="time_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'datetime':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Datetime Field</label>
                                <div class="d-flex">
                                    <div>
                                        <input type="datetime" class="form-control" name="datetime_field[]" style="width: 600px;">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'textarea':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Textarea</label>
                                <div class="d-flex">
                                    <div>
                                        <textarea class="form-control" name="textarea_field[]" style="width: 600px;"></textarea>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'select':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Select Field</label>
                                    <div class="d-flex">
                                        <div>
                                            <select class="form-control" name="select_field[]" style="width: 600px;">
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                            </div>`;
                        break;
                    case 'radio':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Radio Field</label>
                                <div class="d-flex">
                                    <div>
                                        <div>
                                            <input type="radio" name="radio_field[]" value="option1" style="width: 600px;"> Option 1
                                        </div>
                                        <div>
                                            <input type="radio" name="radio_field[]" value="option2" style="width: 600px;"> Option 2
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case 'checkbox':
                        field = `
                            <div class="form-group draggable-field">
                                <label>Checkbox Field</label>
                                <div class="d-flex">
                                    <div>
                                        <div>
                                            <input type="checkbox" name="checkbox_field[]" value="option1" style="width: 600px;"> Option 1
                                        </div>
                                        <div>
                                            <input type="checkbox" name="checkbox_field[]" value="option2" style="width: 600px;"> Option 2
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-field" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>`;
                        break;
                }
                event.item.innerHTML = field;
                event.item.removeAttribute('data-type');
            }
        });

        // Remove field functionality
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-field')) {
                alert(event)
                event.target.closest('.draggable-field').remove();
            }
        });

        // Save form using Ajax
        document.getElementById('save-form').addEventListener('click', function () {
            let formPreview = document.getElementById('form-preview').innerHTML;

            fetch('{{ route('save.form') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ form: formPreview })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Form saved successfully!');
                }
            });
        });
    });
</script>

@endsection