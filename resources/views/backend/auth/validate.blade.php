<html>

<head>
    <title>Login || BUP</title>
    <link rel="icon" href="{{ asset('backend/images/logo2.png') }}" type="image/x-icon" sizes="16x16" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/notify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
    </style>
</head>

<body>
    <div class="container" style="background-color: rgba(0, 0, 0, 0.438); height: 100%; width: 100%; top:0; left:0; position:relative">
        <div class="card card-container" style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            {{-- <img style="height: 120px; width: 120px" id="profile-img" class="profile-img-card" src="{{ asset('images/default_logo.png') }}" /> --}}
            {{-- <p id="profile-name" class="profile-name-card" style="text-shadow: 0 1px 48px rgb(255 255 255 / 20%); font-size: 24px;">Bangladesh University of Professionals</p> --}}
            @if (@$bupLogo)
                <a href="{{ route('index') }}" style="text-align: center">
                    <img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo" id="profile-img" class="profile-img-card" style="height: 120px; width: 120px" />
                </a>
            @else
                <a href="{{ route('index') }}">
                    <img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo" id="profile-img" class="profile-img-card" style="height: 120px; width: 120px" />
                </a>
            @endif
            <p id="profile-name" class="profile-name-card" style="text-shadow: 0 1px 48px rgb(255 255 255 / 20%); font-size: 24px;">Bangladesh University of
                Professionals</p>
            <br>
            <form class="form-signin" action="{{ route('post.verify.token') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('token') ? 'has-error' : '' }}">
                    <input type="text" class="form-control" name="token" value="{{ old('token') }}" placeholder="Write OTP" required autofocus>
                    @if ($errors->has('token'))
                        <span class="help-block">
                            <strong>{{ $errors->first('token') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
            </form>

            <div class="text-center"><a href="{{ url('/') }}" style="color: #050505;"> Back to Home Page </a></div>
            <!-- /form -->
            <!-- <a href="#" class="forgot-password">
            Forgot the password?
        </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>

</html>
