
<form id="ajaxForm" method="POST" action="{{ route('submit.Dynamicform') }}"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_id" value="{{ @$formTemplate->id }}">
    @if(!empty($formTemplate->form_data))
        @foreach ($formTemplate->form_data as $field)
            <div class="form-group">
                @switch($field['type'])
                    @case('autocomplete')                 
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @if ($field['required'] == true) required @endif>
                        </div>
                    @break

                    @case('checkbox-group')
                        <div class="form-group mt-2">
                            <div class="form-check" type="{{ $field['type'] ?? '' }}" @if ($field['required'] == true) required @endif>
                                <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label><br/>
                                @foreach ($field['values'] as $option)
                                    <input type="checkbox" id="vehicle1" name="{{ $field['label'] ?? '' }}" value="{{ $option['value'] ?? '' }}">
                                    <label for="vehicle1">{!! $option['label'] ?? '' !!}</label><br>
                                @endforeach
                            </div>
                        </div>
                    @break

                    @case('date')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @if ($field['required'] == true) required @endif>
                        </div>
                    @break

                    @case('file')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="files[]" @if ($field['multiple'] == true) multiple @endif @if ($field['required'] == true) required @endif >
                        </div>
                    @break

                    @case('header')
                        <div class="form-group mt-2 text-center">
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
                        </div>
                    @break

                    @case('number')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @if ($field['required'] == true) required @endif>
                        </div>
                    @break

                    @case('text')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <input type="{{ $field['type'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @if ($field['required'] == true) required @endif>
                        </div>
                    @break

                    @case('textarea')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <textarea type="{{ $field['type'] ?? '' }}" rows="{{ $field['rows'] ?? '' }}" class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}" @if ($field['required'] == true) required @endif></textarea>
                        </div>
                    @break

                    @case('hidden')
                        <div class="form-group mt-2">
                            <input type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}" value="{{ $field['value'] ?? '' }}">
                        </div>
                    @break

                    @case('paragraph')
                        <div class="form-group mt-2">
                            <p class="{{ $field['className'] ?? '' }}">{!! $field['label'] ?? '' !!}</p>
                        </div>
                    @break

                    @case('select')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            <select type="{{ $field['type'] ?? '' }}"  class="{{ $field['className'] ?? '' }}" name="{{ $field['label'] ?? '' }}" @if ($field['required'] == true) required @endif>
                                @foreach ($field['values'] as $option)
                                    <option value="{{ $option['value'] ?? '' }}" selected={{ $option['selected'] ?? '' }}>{!! $option['label'] ?? '' !!}</option>
                                @endforeach
                            </select>
                        </div>
                    @break

                    @case('radio-group')
                        <div class="form-group mt-2">
                            <label>{!! $field['label'] ?? '' !!} @if($field['required'] == true) <span class="text-danger">*</span> @endif</label>
                            @foreach ($field['values'] as $option)
                                <div class="form-check" type="{{ $field['type'] ?? '' }}" @if ($field['required'] == true) required @endif>
                                    <input class="form-check-input" type="radio" name="Radio Button" value="{{ $option['value'] ?? '' }}" selected={{ $option['selected'] ?? '' }}>
                                    <label class="form-check-label">{!! $option['label'] ?? '' !!}</label>
                                </div>
                            @endforeach
                        </div>
                    @break
                    
                    @case('button')

                    <div class="text-center mt-3">
                        <button type="{{ $field['subtype'] ?? '' }}" class="btn btn-theme effect btn-md custom-font-titillium-web">{!! $field['label'] ?? '' !!}</button>
                        {{-- <label>{{ $field['label'] ?? '' }}</label><br/> --}}
                        {{-- <input type="{{ $field['subtype'] ?? '' }}"  name="{{ $field['name'] ?? '' }}"  > --}}
                    
                        <div id="message"></div>
                    </div>

                    @break

                    @default
                        <p>Unsupported field type: {!! $field['type'] !!}</p>
                @endswitch
            </div>
        @endforeach
    @endif

    

</form>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#ajaxForm').on('submit', function(e) {
            e.preventDefault();
    
            var formData = new FormData(this);
    
            // Disable the submit button and show a loading message
            var submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).text('Uploading...');
            $('#message').html('<p>Data is uploading. Please wait...</p>');
    
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show success message
                    $('#message').html('<p>' + response.message + '</p>');
                    
                    // Reset the form and re-enable the button
                    $('#ajaxForm')[0].reset();
                    submitButton.prop('disabled', false).text('Submit');
    
                    // Clear the message after 3 seconds
                    setTimeout(function() {
                        $('#message').text('');
                    }, 3000);
                },
                error: function(xhr) {
                    // Show error message
                    $('#message').html('<p>Error: ' + xhr.responseText + '</p>');
                    
                    // Re-enable the button
                    submitButton.prop('disabled', false).text('Submit');
    
                    // Clear the message after 3 seconds
                    setTimeout(function() {
                        $('#message').text('');
                    }, 3000);
                }
            });
        });
    });
    </script>
    
