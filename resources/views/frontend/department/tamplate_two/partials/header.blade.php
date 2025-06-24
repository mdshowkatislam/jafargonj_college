<div class="header">
  <div class="fixed-top">
    <!-- Top Bar -->
    <section id="topbar" class="d-flex align-items-center bg-secondary d-none d-md-block">
      <div class="container topbar text-end">
        <a href="#" class="fw-bold">Student</a>
        <a href="#" class="fw-bold">Faculty & Staff</a>
        <a href="#" class="fw-bold">Alumni</a>
      </div>
    </section>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" id="main-menu">
      <div class="container">
        @include('frontend.partials.logo.bup_header')
        <a class="navbar-brand d-flex align-items-center" href="{{ route('department_home', $department->id) }}">
          <span class="text-secondary text-uppercase fs-6 fw-bold mb-0 d-none d-sm-block">{{$department->name}}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" aria-current="page" href="{{ route('department_home', $department->id) }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="{{ route('department_research', $department->id) }}">
                Research & Publication<span class=" ms-2 dropdown-toggle d-lg-none"></span>
              </a>
            </li>
            <li class=" nav-item">
              <a class="nav-link text-uppercase" href="{{ route('department_notice', $department->id) }}">Notice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="{{ route('department_program', $department->id) }}">Program</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">Research</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>