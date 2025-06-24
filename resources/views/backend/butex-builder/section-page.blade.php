<div class="section-create">
  <div class="d-flex">
    <div class="p-1">
      <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Page
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item @if (@$page_id == 1) active-tab @endif" href="{{ url('site-settings/butex_builder/1/1') }}">Home</a>
            <a class="dropdown-item @if (@$page_id == 2) active-tab @endif" href="{{ url('site-settings/butex_builder/2/0') }}">Faculty</a>
            <a class="dropdown-item @if (@$page_id == 3) active-tab @endif" href="{{ url('site-settings/butex_builder/3/0') }}">Department</a>
            <a class="dropdown-item @if (@$page_id == 4) active-tab @endif" href="{{ url('site-settings/butex_builder/4/0') }}">Office</a>
            <a class="dropdown-item @if (@$page_id == 5) active-tab @endif" href="{{ url('site-settings/butex_builder/5/0') }}">Club</a>
            <a class="dropdown-item @if (@$page_id == 6) active-tab @endif" href="{{ url('site-settings/butex_builder/6/1') }}">Conference</a>
        </div>
      </div>
    </div>

      @if($page_id == '2')
        <div class="p-1">
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Faculty
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach ($faculties as $faculty)
                <a class="dropdown-item @if (@$page_tab_id == $faculty->id) active-tab @endif" href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $faculty->id) }}">{{ $faculty->name }}</a>
              @endforeach
            </div>
          </div>
        </div>
      @elseif ($page_id == '3')
        <div class="p-1">
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Department
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach ($departments as $department)
                <a class="dropdown-item @if (@$page_tab_id == $department->id) active-tab @endif" href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $department->id) }}">{{ $department->name }}</a>
              @endforeach
            </div>
          </div>
        </div>
      @elseif ($page_id == '4')
        <div class="p-1">
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Office
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach ($offices as $office)
                <a class="dropdown-item @if (@$page_tab_id == $office->id) active-tab @endif" href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $office->id) }}">{{ $office->name }}</a>
              @endforeach
            </div>
          </div>
        </div>
      @elseif ($page_id == '5')
        <div class="p-1">
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Club
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach ($clubs as $club)
                <a class="dropdown-item @if (@$page_tab_id == $club->id) active-tab @endif" href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $club->id) }}">{{ $club->name }}</a>
              @endforeach
            </div>
          </div>
        </div>
      @endif

      @if (@$page_tab_id)
        <div class="p-1">
          <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target="#sectionCreate"><i class="fas fa-plus"></i> Create Section</button>
        </div>

        <div class="p-1">
          <a href="{{ url('site-settings/butex_themes', ['page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><button class="btn btn-success" role="button">My Themes</button></a>
        </div>

        <div class="p-1">
          <a href="{{ url('site-settings/theme_builder', ['page_id' => @$page_id, 'page_tab_id' => @$page_tab_id]) }}"><button type="button" class="btn btn-success" role="button"><i class="nav-icon ion-settings"></i> Theme Design</button></a>
        </div>
      @endif

      @if($page_id == '6')
        <div class="mt-1">
          <select class="form-control form-control-sm select2" id="top_menu" name="top_menu">
            <option value="">Select Top Menu</option>               
                @foreach ($menu_types as $item)
                  <option value="{{ $item->id }}" @if(@$menu->top_menu === $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
          </select>
        </div>

        <div class="mt-1">
          <select class="form-control form-control-sm select2" id="nav_menu" name="nav_menu">
            <option value="">Select Nav Menu</option>               
                @foreach ($menu_types as $item)
                  <option value="{{ $item->id }}" @if(@$menu->nav_menu == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
          </select>
        </div>
      @endif


  </div>
</div>

<hr/>

<!-- Modal Create Section-->
@include('backend.butex-builder.section-create-modal')

<script>
  $(document).ready(function() {
      // Event listener for both dropdowns
      $('select[name="top_menu"], select[name="nav_menu"]').change(function() {
          const topMenu = $('select[name="top_menu"]').val();
          const navMenu = $('select[name="nav_menu"]').val();

          // Send Ajax request to store menu selections
          $.ajax({
              url: "{{ route('conferences.storeMenu') }}",
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  top_menu: topMenu,
                  nav_menu: navMenu,
              },
              success: function(response) {
                  if(response.success) {
                      toastr.success(response.message)
                  }
              },
              error: function(xhr) {
                  //alert('An error occurred. Please try again.');
                  toastr.error('An error occurred. Please try again.')
              }
          });
      });
  });
</script>


<script>
  $('.create-section').click(function() {
    $('.id').val('');
    $('.action').val('insert');
    $('#insertDataForm')[0].reset();
  });

  function addData(){
        var page_id           = $('#page_id').val(); 
        var page_tab_id       = $('#page_tab_id').val(); 
        var action            = $('#action').val(); 
        var id                = $('#id').val(); 
        var section_title     = $('#section_title').val(); 
        var number_of_column  = $('#number_of_column').val(); 
        var section_order     = $('#section_order').val(); 
        var container         = $('#container').val(); 
        var token             = $('meta[name="csrf-token"]').attr('content');

        var status = $('input[name="status"]:checked').val();

        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');

        submitBtn.style.display = 'none';
        spinner.style.display   = 'inline-block';

        $.ajax({
           type: 'post',
           url: '{{ route("section.store") }}',
           data: {
            page_id: page_id,
            page_tab_id: page_tab_id,
            action: action,
            id: id,
            section_title: section_title,
            number_of_column: number_of_column,
            section_order: section_order,
            container: container,
            status: status,
             _token: token,
           },
           success: function (data) {
               submitBtn.style.display = 'block';
               spinner.style.display = 'none';
               
               $('#sectionCreate').modal('hide');

               if(action === 'insert'){
                toastr.success(data.message)
                $('#insertDataForm')[0].reset();
                //setTimeout(function () { window.location.reload(); }, 1500);
                window.location.reload(); 
               }else if(action === 'update'){
                toastr.success(data.message)
                //setTimeout(function () { window.location.reload(); }, 1500);
                window.location.reload(); 
               }
           },
           error: function (error) {
             toastr.error("Anything Wrong! Please try again.");
           }
        });
  }

</script>
