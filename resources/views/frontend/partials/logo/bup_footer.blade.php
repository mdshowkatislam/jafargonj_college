@if (@$bupLogo)
    <a href="{{ route('index') }}">
        <img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo" class="me-2" width="72px" />
    </a>
@else
    <a href="{{ route('index') }}" >
        <img src="{{ asset('frontend/assets/img/butex/butex-logo.png') }}" alt="Logo" class="me-2" width="72px" />
    </a>
@endif
