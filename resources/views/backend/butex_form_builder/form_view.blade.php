@extends('backend.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('site-settings/butex_form_builder') }}">Back to Form Builder Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h3>Form Preview</h3>
                    </div>
                    <div class="me-auto">
                        <a href="{{ url('site-settings/butex_form_builder') }}"><button type="button" class="btn btn-danger">Back</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form>
                    @if(!empty($formTemplate->form_data))
                        @foreach ($formTemplate->form_data as $field)
                            <div class="form-group">
                                @switch($field['type'])
                                    @case('autocomplete')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                    @break

                                    @case('button')
                                        <input type="button" class="btn btn-success" name="{{ $field['name'] ?? '' }}" value="{{ $field['label'] ?? '' }}" style="{{ $field['style'] ?? '' }}">
                                    @break

                                    @case('checkbox-group')
                                        <div class="form-check" type="{{ $field['type'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                            <label>{!! $field['label'] ?? '' !!}</label><br/>
                                            @foreach ($field['values'] as $option)
                                                <input type="checkbox" id="vehicle1" name="{{ $option['name'] ?? '' }}" value="{{ $option['value'] ?? '' }}">
                                                <label for="vehicle1">{!! $option['label'] ?? '' !!}</label><br>
                                            @endforeach
                                        </div>
                                    @break

                                    @case('date')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                    @break

                                    @case('file')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                    @break

                                    @case('header')
                                        @if ($field['subtype'] == 'h1')
                                            <h1 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h1>
                                        @elseif ($field['subtype'] == 'h2')
                                            <h2 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h2>
                                        @elseif ($field['subtype'] == 'h3')
                                            <h3 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h3>
                                        @elseif ($field['subtype'] == 'h4')
                                            <h4 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h4>
                                        @elseif ($field['subtype'] == 'h5')
                                            <h5 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h5>
                                        @elseif ($field['subtype'] == 'h6')
                                            <h6 class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</h6>
                                        @endif
                                    @break

                                    @case('number')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                    @break

                                    @case('text')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                    @break

                                    @case('textarea')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <textarea type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" required="{{ $field['required'] ?? '' }}"></textarea>
                                    @break

                                    @case('hidden')
                                        <input type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}">
                                        @break

                                    @case('paragraph')
                                        <p class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</p>
                                        @break

                                    @case('select')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        <select type="{{ $field['type'] ?? '' }}"  class="{{ $field['className'] ?? '' }}" name="{{ $field['name'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                            @foreach ($field['values'] as $option)
                                                <option value="{{ $option['value'] ?? '' }}" selected={{ $option['selected'] ?? '' }}>{{ $option['label'] ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @break

                                    @case('radio-group')
                                        <label>{!! $field['label'] ?? '' !!}</label>
                                        @foreach ($field['values'] as $option)
                                            <div class="form-check" type="{{ $field['type'] ?? '' }}" required="{{ $field['required'] ?? '' }}">
                                                <input class="form-check-input" type="radio" name="{{ $field['name'] ?? '' }}" value="{{ $option['value'] ?? '' }}" selected={{ $option['selected'] ?? '' }}>
                                                <label class="form-check-label">{!! $option['label'] ?? '' !!}</label>
                                            </div>
                                        @endforeach
                                        @break

                                    @default
                                        <p>Unsupported field type: {!! $field['type'] !!}</p>
                                @endswitch
                            </div>
                        @endforeach
                    @else
                        <p>No form data available.</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

@endsection