<header class="header fixed-top hall-header">
  <div class="container-fluid top-header d-none" style="background-color: #ffffff;">
    <div class="row">
      <div class="col-12">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center d-flex justify-content-center py-1">
              <a href="{{route('index')}}">
                @php
                $logoNav =
                DB::table('logos')->where('type_id',1)->first();
                @endphp
                <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display" alt="Logo" style="height: 70px;">
               
              </a>
        {{-- <div style="margin-top: 8px;
    color: black;
    font-weight: 700;" class="d-flex flex-column mb-3 university_description">
            <p class="bd-highlight fw-bold">BUTEX</p>
            <span class="bd-highlight fw-bold">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</span>
            <span class="bd-highlight fw-bold">Bangladesh University Of Textiles</span>
        </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="navigation w-100">
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
    <a href="{{route('index')}}">
      @php
      $logoNav =
      DB::table('logos')->where('type_id',3)->first();
      @endphp
      <img src="{{ asset('upload/logo/' . @$logoNav->image) }}" class="logo logo-display" alt="Logo" style="height: 70px;">
     
    </a>
    <a class="navbar-brand text-white" href="{{ route('hall_details', $halls->id) }}">{{ @$halls->name }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item @@blog">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item @@blog">
          <a class="nav-link" href="{{ route('hall_details', $halls->id) }}">Hall Home</a>
        </li>
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		   <a class="dropdown-item" href="{{ route('hall_history', $halls->id) }}">History</a>
		    @if ($halls->provost)
			<a class="dropdown-item" href="{{ route('all_hall_provost', $halls->id) }}">Provost</a>
			@endif
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		   @if ($halls->provost)
           <li>
				<a class="dropdown-item" href="{{ route('provost_message', $halls->id) }}">Provost Message</a>
			</li>
		   @endif
            <li>
            <a class="dropdown-item" href="{{ route('house_tutor', $halls->id) }}">Hall Members</a>
			</li>
			<li>
           <a class="dropdown-item" href="{{ route('administrative_staff', $halls->id) }}">Officers & Staff</a>
			</li>
          </ul>
        </li>
		 <li class="nav-item @@blog">
              <a class="nav-link" href="{{ route('hall_contact',$halls->id) }}">Contact</a>
         </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</header>
<!-- /header -->