<html lang="">

<head>
    <title>Login || Jafargonj</title>
    <link rel="icon"
          href="{{ asset('images/logo/favicon.ico') }}" />
    {{-- <link rel="icon" href="{{ asset('backend/images/logo2.png') }}" type="image/x-icon" sizes="16x16" /> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="{{ asset('css/login.css') }}"
          rel="stylesheet">
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('frontend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/notify.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('frontend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @if (session()->has('success'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('success') }}", {
                    globalPosition: 'top right',
                    className: 'success'
                });
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('error') }}", {
                    globalPosition: 'top right',
                    className: 'error'
                });
            });
        </script>
    @endif

    @if (session()->has('warning'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('warning') }}", {
                    globalPosition: 'top right',
                    className: 'warn'
                });
            });
        </script>
    @endif
    @if (session()->has('swal-success'))
        <script type="text/javascript">
            $(function() {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: '{{ session()->get('swal-success') }}',
                });
            });
        </script>
    @endif

    <style>
        body {
            background-image: url(login_background.jpg) !important;
            background-repeat: no-repeat !important;
            background-size: 100% 100% !important;
            /* overflow: hidden; */
        }

        .btn-signin:hover {
            background-color: #1BCC7A !important;
            color: white;
            border-radius: 9px;
           
        
        }

        .shimmer-wrapper {
            position: relative;
            display: inline-block;
            height: 120px;
            width: 120px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }

        .logo-img {
            height: 100%;
            width: 100%;
            border-radius: 50%;
            display: block;
        }

        /* Light sweep effect */
        .shimmer-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(120deg,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.8) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: skewX(-20deg);
            animation: shimmerMove 2.5s infinite;
        }

        @keyframes shimmerMove {
            0% {
                left: -75%;
            }

            100% {
                left: 125%;
            }
        }
    </style>
</head>
@php
    $logoFooterCenter = DB::table('logos')->where('type_id', 3)->first();
@endphp

<body>
    <div class="container"
         style="background-color: rgba(0, 0, 0, 0.438); height: 100%; width: 100%; top:0; left:0; position:relative">
        <div class="card card-container text-center"
             style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            @if (@$logoFooterCenter)
                <div class="shimmer-wrapper">
                    <img src="{{ asset('upload/logo/' . $logoFooterCenter->image) }}"
                         alt="Logo"
                         class="logo-img" />
                </div>
            @else
                <a href="{{ route('index') }}">
                    <img src="{{ asset('iamges/default_logo.png') }}"
                         alt="Logo"
                         id="profile-img"
                         class="profile-img-card"
                         style="height: 120px; width: 120px" />
                </a>
            @endif
            <p id="profile-name"
               class="profile-name-card "
               style="color:#1BCC7A; text-shadow: 0 1px 48px rgb(255 255 255 / 20%); font-size: 24px;">Jafargonj Mir
                Abdul Gafur College</p>
            <br>
            <form class="form-signin"
                  action="{{ route('post.login') }}"
                  method="post">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="text"
                           class="form-control"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email Address"
                           required
                           autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password"
                           class="form-control"
                           placeholder="Password"
                           required
                           name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin"
                        type="submit">Login</button>
            </form>

            <div class="text-center"><a href="{{ url('/') }}"
                   style="color: #050505;"> Back to Home Page </a>
            </div>
            <div class="form-group row mb-0 text-center">
                @if (Route::has('password.request'))
                    <a class="btn btn-link"
                       href="{{ route('password.request') }}"
                       style="cursor: pointer;color: #050505;">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

            </div>
            <!-- /form -->
            <!-- <a href="#" class="forgot-password">
            Forgot the password?
        </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>

</html>
