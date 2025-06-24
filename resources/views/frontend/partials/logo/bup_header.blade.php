<div class="navbar-brand d-flex align-items-center">
    @if (@$bupLogo)
        <a href="{{ route('index') }}"><img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo"
                class="d-inline-block align-text-top me-2" />
        </a>
    @else
        <a href="{{ route('index') }}"><img src="{{ asset('frontend/assets/img/bup/logo.svg') }}" alt="Logo"
                class="d-inline-block align-text-top me-2" />
        </a>
    @endif
    <a href="{{ route(@$route) }}" class="common-font-color fs-6 fw-bold mb-0 logo-title  me-2"><span
            class="text-white">{!! @$logo_title !!}</span></a>
    {{-- @if (@$mujib100)
        <a href="#"><img src="{{ asset('upload/logo/' . $mujib100->image) }}" alt="mujib100"
                class="d-inline-block align-text-top " /></a>
    @endif --}}

</div>
