@extends('frontend.landing')
@php
    $page_title = 'Suggestion';
@endphp
@section('title')
    {{ $page_title }}
@endsection
<style>
    .captcha span img{
        border-radius: .3rem;
    }
</style>
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <section class="py-5" style="background: #57a8dc33">
        <div class="container overview">
            {{-- <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase home-content-heading mb-0">
                    Suggestion Form
                </h1>
            </div>
            <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
            </div> --}}
            <div class="row justify-content-center">
                <div class="text-center mb-2">BUP is progressing with expected pace. <br>
                    Kindly suggest wherever you like to see the improvement.</div>
                <div class="col-md-6">
                    <div class="card p-4 shadow border-0" style="background: #57a8dc33">
                        @if (Session::has('message'))
                            <div class="alert alert-primary" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('suggestion_store') }}" id="suggestionForm">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                <label for="floatingName">Full Name</label>

                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                                <label for="floatingEmail">Email <span style="color:red;">*</span></label>
                                <span id="email_error" class="error invalid-feedback" style="font-weight: 600;" role="alert">
                                    @error('email')
                                        {{ @$message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phpne" id="phpne" value="{{ old('phpne') }}" placeholder="Phone">
                                <label>Phone</label>

                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Subject">
                                <label>Subject <span style="color:red;">*</span></label>
                                <span id="subject_error" class="error invalid-feedback" style="font-weight: 600;">{{ @$message }}</span>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a suggestion here" name="description" id="description" style="height: 200px">{{ old('description') }}</textarea>
                                <label for="description">Description <span style="color:red;">*</span></label>
                                <span id="description_error" class="error invalid-feedback" style="font-weight: 600;">{{ @$message }}</span>
                            </div>
                            <div class="captcha d-flex mb-3">
                                <span>{!! captcha_img('flat') !!}</span>
                                <button type="button" class="btn btn-danger ms-3 text-white" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <div class="form-floating mb-3">
                                <input id="captcha" type="text" class="form-control @error('captcha') 'is-invalid' @enderror" placeholder="Enter Captcha" name="captcha">
                                <label>Enter Captcha <span style="color:red;">*</span></label>
                                <span id="captcha_error" class="error invalid-feedback" style="font-weight: 600; {{ $errors->has('captcha') ? 'display:block' : '' }}">
                                    {{ $errors->has('captcha') ? $errors->first('captcha') : '' }}
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script>
        document.getElementById('email').addEventListener('input', function() {
            validate_field('email', 'email_error', 'Email is required.');
        });

        document.getElementById('subject').addEventListener('input', function() {
            validate_field('subject', 'subject_error', 'Subject is required.');
        });


        document.getElementById('description').addEventListener('input', function() {
            validate_field('description', 'description_error', 'Description is required.');
        });

        document.getElementById('captcha').addEventListener('input', function() {
            validate_field('captcha', 'captcha_error', 'Captcha is required.');
        });

        document.getElementById('suggestionForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            validate_field('email', 'email_error', 'Email is required.');
            validate_field('subject', 'subject_error', 'Subject is required.');
            validate_field('description', 'description_error', 'Description is required.');
            validate_field('captcha', 'captcha_error', 'Captcha is required.');

            // Check if any input fields have the 'is-invalid' class
            var invalidInputs = document.querySelectorAll('.is-invalid');
            if (invalidInputs.length === 0) {
                // No invalid inputs, submit the form
                event.target.submit();
            }
        });

        function validate_field(input_name, error_name, error_msg) {
            var input = document.getElementById(input_name);
            var error = document.getElementById(error_name);

            if (input.value.trim() === '') {
                error.textContent = error_msg;
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                error.textContent = '';
            }
        }
    </script>

    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('reload.captcha') }}",
                success: function(data) {
                    $(".captcha span").html(data);
                }
            });
        });
    </script>
@endsection
