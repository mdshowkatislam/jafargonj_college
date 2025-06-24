@extends('backend.layouts.app')
@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<style>
.active{
    color: black !important;
}
</style>

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
          <li class="breadcrumb-item"><a href="{{route('butex_builder')}}">Site Settings</a></li>
          <li class="breadcrumb-item active">Butex Builder</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <div class="d-flex">
              <div class="flex-grow-1">
                <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Butex Builder</h5>
              </div>
              <div class="">
                @if($sections->isNotEmpty())
                  <button type="button" role="button" data-toggle="modal" data-target="#pageStatus" data-action="1" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-danger page-status">Draft</button>
                  <button type="button" role="button" data-toggle="modal" data-target="#pageStatus" data-action="2" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-success page-status">Publish</button>
                  <button type="button" role="button" data-toggle="modal" data-target="#saveThemes" data-action="2" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-primary page-status">Save Theme</button>
                  
                  @if(@$page_id == 1)
                    <a href="/" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 2)
                    <a href="{{ url('faculty_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 3)
                    <a href="{{ url('department_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 4)
                    <a href="{{ url('office_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @endif

                @endif
              </div>
            </div>
          </div>

          <div class="card-body">
            <a href="{{ url('site-settings/theme_builder/3') }}" class="d-none">
              <button class="@if(@$page_id == 3) active-menu @else button-1 @endif" role="button">Create Themes</button>
            </a>

            <a href="{{ url('site-settings/butex_builder/2') }}" class="d-none"><button class="@if(@$page_id == 2) active-menu @else button-1 @endif" role="button">About</button></a>
            <a href="{{ url('site-settings/butex_builder/3') }}" class="d-none"><button class="@if(@$page_id == 3) active-menu @else button-1 @endif" role="button">Academic</button></a>
            <a href="{{ url('site-settings/butex_builder/4') }}" class="d-none"><button class="@if(@$page_id == 4) active-menu @else button-1 @endif" role="button">Administrator</button></a>
            <a href="{{ url('site-settings/butex_builder/5') }}" class="d-none"><button class="@if(@$page_id == 5) active-menu @else button-1 @endif" role="button">Students</button></a>
            <a href="{{ url('site-settings/butex_builder/6') }}" class="d-none"><button class="@if(@$page_id == 6) active-menu @else button-1 @endif" role="button">Research</button></a>
            <a href="{{ url('site-settings/butex_builder/7') }}" class="d-none"><button class="@if(@$page_id == 7) active-menu @else button-1 @endif" role="button">Likes</button></a>
           
            <!-- end page link here -->

            {{-- start tab section --}}

            <!-- start section & component create page -->
            @include('backend.butex-builder.section-page')
            <!-- end section & component create page -->

            <div id="sortable">
            <!-- start section  -->
            @foreach (@$sections as $key => $section)
            <li class="ui-state-default" style="list-style-type: none; border: none;" data-id="{{ @$section->id }}">
              <div class="data-row" data-id="{{ @$section->id }}">
                <div class="section-wrapper section-color mb-3 component-item">
                  <div class="text-center text-dark mb-2">
                    <h5 class="text-center">{{ @$section->section_title }}</h5>
                    <i class="fas fa-pen custom-pen-icon-style pointer edit-section"
                      data-id="{{ @$section->id }}"
                      data-title="{{ @$section->section_title }}"
                      data-col="{{ @$section->number_of_column }}"
                      data-order="{{ @$section->section_order }}"
                      data-status="{{ @$section->status }}"
                      data-col1="{{ @$section->col1_name }}"
                      data-col2="{{ @$section->col2_name }}"
                      data-col3="{{ @$section->col3_name }}"
                      data-col4="{{ @$section->col4_name }}"
                      data-col5="{{ @$section->col5_name }}"
                      data-col6="{{ @$section->col6_name }}"
                      data-toggle="modal" data-target="#sectionCreate"></i>
                    <a href="{{ url('site-settings/design-section', ['id' => @$section->id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                    <i class="fas fa-trash custom-delete-icon-style pointer delete-section" data-toggle="modal" data-target="#deleteSection" data-sid="{{ @$section->id }}"></i>
                  </div>
              
                    @php
                      $data = @$section->number_of_column;
                      $col_1 = ''; $col_2 = ''; $col_3 = ''; $col_4 = ''; $col_5 = ''; $col_6 = '';
                      if($data === '01'){
                        $col_1 = 'col-12';
                        $col_2 = 'd-none';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '02') {
                        $col_1 = 'col-2';
                        $col_2 = 'col-10';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '03') {
                        $col_1 = 'col-3';
                        $col_2 = 'col-9';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '04') {
                        $col_1 = 'col-4';
                        $col_2 = 'col-8';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '05') {
                        $col_1 = 'col-5';
                        $col_2 = 'col-7';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '06') {
                        $col_1 = 'col-6';
                        $col_2 = 'col-6';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '07') {
                        $col_1 = 'col-10';
                        $col_2 = 'col-2';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '08') {
                        $col_1 = 'col-9';
                        $col_2 = 'col-3';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '09') {
                        $col_1 = 'col-8';
                        $col_2 = 'col-4';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '10') {
                        $col_1 = 'col-7';
                        $col_2 = 'col-5';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '11') {
                        $col_1 = 'col-4';
                        $col_2 = 'col-4';
                        $col_3 = 'col-4';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '12') {
                        $col_1 = 'col-3';
                        $col_2 = 'col-3';
                        $col_3 = 'col-3';
                        $col_4 = 'col-3';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '13') {
                        $col_1 = 'col-2';
                        $col_2 = 'col-2';
                        $col_3 = 'col-2';
                        $col_4 = 'col-2';
                        $col_5 = 'col-2';
                        $col_6 = 'col-2';
                      }elseif($data === '14') {
                        $col_1 = 'col-3';
                        $col_2 = 'col-6';
                        $col_3 = 'col-3';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }
                    @endphp

                    <div class="row data-col" data-id="{{ @$section->id }}">
                      @if (!empty(@$section->col1_name))
                      <div class="{{ @$col_1 }}">
                        <button class="button-43" role="button">{{ @$section->col1_name }} <br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col_id }}" style="font-size: 18px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '1')->latest()->first();
                            @endphp
                            @if (!empty($component))
                              @if ($component->component_id == 0)
                                <a href="{{ url('site-settings/edit-component', ['id' => @$component->id, 'col' => @$component->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                              @endif
                                <a href="{{ url('site-settings/design-component', ['id' => @$component->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                            @endif
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif

                      @if (!empty(@$section->col2_name))
                      <div class="{{ @$col_2 }}">
                        <button class="button-43" role="button">{{ @$section->col2_name }}<br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col2_id }}" style="font-size: 19px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component2 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '2')->latest()->first();
                            @endphp
                          @if (!empty($component2))
                            @if ($component2->component_id == 0)
                              <a href="{{ url('site-settings/edit-component', ['id' => @$component2->id, 'col' => @$component2->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                            @endif
                            <a href="{{ url('site-settings/design-component', ['id' => @$component2->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                          @endif
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col2_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif

                      @if (!empty(@$section->col3_name))
                      <div class="{{ @$col_3 }}">
                        <button class="button-43" role="button">{{ @$section->col3_name }}<br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col3_id }}" style="font-size: 19px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component3 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '3')->latest()->first();
                            @endphp
                            @if (!empty($component3))
                              @if ($component3->component_id == 0)
                                <a href="{{ url('site-settings/edit-component', ['id' => @$component3->id, 'col' => @$component3->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                              @endif
                              <a href="{{ url('site-settings/design-component', ['id' => @$component3->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                            @endif             
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col3_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif

                      @if (!empty(@$section->col4_name))
                      <div class="{{ @$col_4 }}">
                        <button class="button-43" role="button">{{ @$section->col4_name }}<br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col4_id }}" style="font-size: 19px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component4 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '4')->latest()->first();
                            @endphp
                            @if (!empty($component4))
                              @if ($component4->component_id == 0)
                                <a href="{{ url('site-settings/edit-component', ['id' => @$component4->id, 'col' => @$component4->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                              @endif
                              <a href="{{ url('site-settings/design-component', ['id' => @$component4->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                            @endif
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col4_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif

                      @if (!empty(@$section->col5_name))
                      <div class="{{ @$col_5 }}">
                        <button class="button-43" role="button">{{ @$section->col5_name }}<br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col5_id }}" style="font-size: 19px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component5 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '5')->latest()->first();
                            @endphp
                            @if (!empty($component5))
                              @if ($component5->component_id == 0)
                                <a href="{{ url('site-settings/edit-component', ['id' => @$component5->id, 'col' => @$component5->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                              @endif
                              <a href="{{ url('site-settings/design-component', ['id' => @$component5->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                            @endif
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col5_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif

                      @if (!empty(@$section->col6_name))
                      <div class="{{ @$col_6 }}">
                        <button class="button-43" role="button">{{ @$section->col6_name }}<br/>
                          <div class="">
                            <i class="fas fa-plus open-component" data-section="{{ @$section->rand_id }}" data-column="{{ @$section->col6_id }}" style="font-size: 19px;" data-toggle="modal" data-target="#addComponent"></i>
                            @php
                                $component6 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '6')->latest()->first();
                            @endphp
                            @if (!empty($component6))
                              @if ($component6->component_id == 0)
                                <a href="{{ url('site-settings/edit-component', ['id' => @$component6->id, 'col' => @$component6->column_id, 'page' => $page_id, 'page_tab' => $page_tab_id]) }}"><i class="fas fa-eye custom-eye-icon-style"></i></a>
                              @endif
                              <a href="{{ url('site-settings/design-component', ['id' => @$component6->id, 'page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><i class="nav-icon ion-settings custom-setting-icon-style pointer"></i></a>
                            @endif 
                            <i class="fas fa-trash custom-delete-icon-style delete-column" data-toggle="modal" data-target="#deleteColumn" data-cid="{{ @$section->id }}" data-ccol="{{ @$section->col6_id }}"></i>
                          </div>
                        </button>
                      </div>
                      @endif
                    </div>

                </div>
              </div>
            </li>
            @endforeach
            <!-- end section  -->
            </div>

            @if($sections->isNotEmpty())
              <button type="button" role="button" data-toggle="modal" data-target="#pageStatus" data-action="1" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-danger page-status">Draft</button>
              <button type="button" role="button" data-toggle="modal" data-target="#pageStatus" data-action="2" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-success page-status">Publish</button>
              <button type="button" role="button" data-toggle="modal" data-target="#saveThemes" data-action="2" data-id="{{ @$page_id }}" data-tab="{{ @$page_tab_id }}" class="btn btn-primary page-status">Save Theme</button>
              
              @if(@$page_id == 1)
                    <a href="/" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 2)
                    <a href="{{ url('faculty_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 3)
                    <a href="{{ url('department_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @elseif (@$page_id == 4)
                    <a href="{{ url('office_home/'. $page_tab_id ) }}" target="_blank">
                      <button type="button" class="btn btn-success">Preview</button>
                    </a>
                  @endif
              @endif

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!--/. container-fluid -->
</section>

<!-- start show all components -->
@include('backend.butex-builder.components-modal')
<!-- end show all components -->

<!-- start show text editor components -->
@include('backend.butex-builder.text-editor')
<!-- end show all components -->

<!-- start delete section & component -->
@include('backend.butex-builder.delete-modal')
<!-- end delete section & component -->

<script>
  $('.edit-section').click(function() {
        var id            = $(this).data('id');
        var section_title = $(this).data('title');
        var row_number    = $(this).data('col');
        var section_order = $(this).data('order');
        var section_status= $(this).data('status');

        $('.row_number').removeClass('section-select-color');
        var button = $('#' + row_number);
        if (button.length) {
            button.addClass('section-select-color');
        }

        if (section_status == '1') {
            $('#status_active').prop('checked', true);
        } else {
            $('#status_inactive').prop('checked', true);
        }

        $('.id').val(id);
        $('.action').val('update');
        $('.section_title').val(section_title);
        $('.number_of_column').val(row_number);
        $('.section_order').val(section_order);
        $('.section_status').val(section_status);
  });

  $('.delete-column').click(function() {
    var cid     = $(this).data('cid');
    var ccol    = $(this).data('ccol');
    $('.cid').val(cid);
    $('.ccol').val(ccol);
  });

  $('.page-status').click(function() {
    var page_id     = $(this).data('id');
    var page_tab    = $(this).data('tab');
    var action      = $(this).data('action');
    if(action==1){
      $('.action_value').text('draft');
    }else if(action==2){
      $('.action_value').text('publish');
    }
    $('.page_id').val(page_id);
    $('.tab_id').val(page_tab);
    $('.action').val(action);
  });


  // open component and select components
  $('.open-component').click(function() {
    var section_id = $(this).data('section');
    var column_id  = $(this).data('column');
    $('.section').val(section_id);
    $('.column').val(column_id);

    get_component();
    function get_component(){
        $.ajax({
            type: 'GET',
            url: '{{ route("show.component") }}',
            data: {
                section_id: section_id,
                column_id: column_id,
            },
            success: function(data){
                //console.log('Data: ', data);
                //alert(data.component.id);
                if(data.component === null){
                  $('.component_id').val('');
                  $('.add-component').removeClass('button-79');
                }else{
                  $('.component_id').val(data.component.component_id);
                  $('.add-component').removeClass('button-79');
                  var button = $('#' + data.component.component_id);
                  if (button.length) {
                      button.addClass('button-79');
                  }
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
  });

  // open text editor
  $('.view-component').click(function() {
    var componentid     = $(this).data('componentid');
    var column          = $(this).data('column');
    $('.id').val(componentid);
    $('.col').val(column);
 
    get_component_data();
    function get_component_data(){
        $.ajax({
            type: 'GET',
            url: '#',
            data: {
                id: componentid,
                col: column,
            },
            success: function(data){
              console.log(data.component);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
  });

  function deleteColumn() {
        var row = $(this).closest('.data-col');
        var id  = $('#cid').val(); 
        var col = $('#ccol').val(); 

            $.ajax({
                type: 'get',
                url: '{{ route("column.delete") }}',
                data: {
                  id: id,
                  col: col,
                },
                success: function (data) {
                 // toastr.success(data.message)
                  $('#deleteColumn').modal('hide');
                  location.reload();
                  //setTimeout(function () { window.location.reload(); }, 1500);
                  //$('.data-col[data-id="' + id + '"]').hide();
                },
                error: function (error) {
                  toastr.error("Anything Wrong! Please try again.");
                }
            });
  }

  $('.delete-section').click(function() {
    var sid     = $(this).data('sid');
    $('.sid').val(sid);
  });

  function deleteSection(id) {
        var row = $(this).closest('.data-row');
        var id  = $('#sid').val(); 
            $.ajax({
                type: 'get',
                url: '{{ route("section.delete") }}',
                data: {
                  id: id,
                },
                success: function (data) {
                 // toastr.success(data.message)
                  //location.reload();
                  //row.hide();
                  $('#deleteSection').modal('hide');
                  //setTimeout(function () { window.location.reload(); }, 1500);
                  location.reload();
                  //$('.data-row[data-id="' + id + '"]').hide();
                },
                error: function (error) {
                  toastr.error("Anything Wrong! Please try again.");
                }
            });
  }

  function changeStatus(){
    var page_id = $('#page_id').val();
    var tab_id  = $('#tab_id').val();
    var action  = $('#action').val();
    var token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'post',
                url: '{{ route("page.status") }}',
                data: {
                  page_id: page_id,
                  tab_id: tab_id,
                  action: action,
                  _token: token,
                },
                success: function (data) {
                  toastr.success(data.message)
                  $('#pageStatus').modal('hide');
                  location.reload();
                  //setTimeout(function () { window.location.reload(); }, 1500);
                  //$('.data-col[data-id="' + id + '"]').hide();
                },
                error: function (error) {
                  toastr.error("Anything Wrong! Please try again.");
                }
            });

  }

</script>

<script>
  $(function() {
      $("#sortable").sortable({
          update: function(event, ui) {
              var order = [];
              $('#sortable li').each(function(index, element) {
                  order.push({
                      id: $(this).data('id'),
                      position: index + 1
                  });
              });

              $.ajax({
                  url: '{{ route("components.updateOrder") }}',
                  method: 'POST',
                  data: {
                      order: order,
                      _token: $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(response) {
                      if (response.success) {
                        toastr.success(response.message)
                      } else {
                        toastr.error('Failed to update order')
                      }
                  },
                  error: function() {
                      console.log('Error occurred while updating order');
                  }
              });
          }
      });
  });
</script>

@endsection