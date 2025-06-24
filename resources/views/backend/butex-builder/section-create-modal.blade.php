
<div class="modal fade" id="sectionCreate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="border: none;">
      <div class="modal-content">
        <form id="insertDataForm" onsubmit="event.preventDefault(); addData();" method="post">
          @csrf
          <div class="header-custom">
            <h5 class="text-effect2 text-center">Create Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="" style="overflow: scroll; height: 500px;">
                <input type="hidden" name="page_id" id="page_id" value="{{ @$page_id }}">
                <input type="hidden" name="page_tab_id" id="page_tab_id" value="{{ @$page_tab_id }}">
                <input type="hidden" name="action" class="action" id="action" value="insert">
                <input type="hidden" name="id" class="id" id="id">
                <input type="hidden" name="number_of_column" class="number_of_column" id="number_of_column">
                {{-- <input type="hidden" name="section_order" id="section_order" value="{{ @$count }}"> --}}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Section Title</label>
                      <input type="text" class="form-control section_title" id="section_title" name="section_title" placeholder="Example: Slider section" style="border:1px solid #13aa52;" required>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <label for="exampleFormControlInput1">Section Order</label>
                    <input type="text" class="form-control section_order" id="section_order" name="section_order" value="{{ @$count }}" placeholder="Example: 1" style="border:1px solid #13aa52;" required>
                  </div>

                  <div class="col-sm-3">
                    <div>
                      <label for="status">Status</label> <br/>
                      <div class="mt-1">
                        <input type="radio" id="status_active" name="status" value="1" checked required>
                        <label for="status_active">Active</label>
                        <input type="radio" id="status_inactive" name="status" value="0" required>
                        <label for="status_inactive">Inactive</label>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="col" id="col_1">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 1 Name</label>
                      <input type="text" class="form-control section_col1" id="col1_name" name="col1_name" placeholder="Column 1 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>
  
                  <div class="col" id="col_2">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 2 Name</label>
                      <input type="text" class="form-control section_col2" id="col2_name" name="col2_name" placeholder="Column 2 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>
  
                  <div class="col" id="col_3">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 3 Name</label>
                      <input type="text" class="form-control section_col3" id="col3_name" name="col3_name" placeholder="Column 3 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>
  
                  <div class="col" id="col_4">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 4 Name</label>
                      <input type="text" class="form-control section_col4" id="col4_name" name="col4_name" placeholder="Column 4 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>
  
                  <div class="col" id="col_5">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 5 Name</label>
                      <input type="text" class="form-control section_col5" id="col5_name" name="col5_name" placeholder="Column 5 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>
  
                  <div class="col" id="col_6">
                    <div class="mt-2">
                      <label for="exampleFormControlInput1">Column 6 Name</label>
                      <input type="text" class="form-control section_col6" id="col6_name" name="col6_name" placeholder="Column 6 Name" style="border:1px solid #13aa52;">
                    </div>
                  </div>    
                </div> --}}

                <hr/>

                <div class="p-2">
                  <div class="section-wrapper section-color mb-2 row_number" data-id="01" id="01">
                    {{-- <h6 class="text-center text-light">Row Pattern 1</h6> --}}
                    <div class="row">
                      <div class="col-sm-12">
                        <span class="button-44">Column - 12</span>
                        {{-- <span class="button-44">Column - 12</button> --}}
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="02" id="02">
                    {{-- <h6 class="text-center text-light">Row Pattern 2</h6> --}}
                    <div class="row">
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-10">
                        <span class="button-44">Column - 10</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="03" id="03">
                    {{-- <h6 class="text-center text-light">Row Pattern 3</h6> --}}
                    <div class="row">
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                      <div class="col-sm-9">
                        <span class="button-44">Column - 9</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color  mb-2 row_number" data-id="04" id="04">
                    {{-- <h6 class="text-center text-light">Row Pattern 4</h6> --}}
                    <div class="row">
                      <div class="col-sm-4">
                        <span class="button-44">Column - 4</span>
                      </div>
                      <div class="col-sm-8">
                        <span class="button-44">Column - 8</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color  mb-2 row_number" data-id="05" id="05">
                    {{-- <h6 class="text-center text-light">Row Pattern 5</h6> --}}
                    <div class="row">
                      <div class="col-sm-5">
                        <span class="button-44">Column - 5</span>
                      </div>
                      <div class="col-sm-7">
                        <span class="button-44">Column - 7</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color  mb-2 row_number" data-id="06" id="06">
                    {{-- <h6 class="text-center text-light">Row Pattern 6</h6> --}}
                    <div class="row">
                      <div class="col-sm-6">
                        <span class="button-44">Column - 6</span>
                      </div>
                      <div class="col-sm-6">
                        <span class="button-44">Column - 6</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color  mb-2 row_number" data-id="07" id="07">
                    {{-- <h6 class="text-center text-light">Row Pattern 7</h6> --}}
                    <div class="row">
                      <div class="col-sm-10">
                        <span class="button-44">Column - 10</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="08" id="08">
                    {{-- <h6 class="text-center text-light">Row Pattern 8</h6> --}}
                    <div class="row">
                      <div class="col-sm-9">
                        <span class="button-44">Column - 9</span>
                      </div>
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="09" id="09">
                    {{-- <h6 class="text-center text-light">Row Pattern 9</h6> --}}
                    <div class="row">
                      <div class="col-sm-8">
                        <span class="button-44">Column - 8</span>
                      </div>
                      <div class="col-sm-4">
                        <span class="button-44">Column - 4</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="10" id="10">
                    {{-- <h6 class="text-center text-light">Row Pattern 10</h6> --}}
                    <div class="row">
                      <div class="col-sm-7">
                        <span class="button-44">Column - 7</span>
                      </div>
                      <div class="col-sm-5">
                        <span class="button-44">Column - 5</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="11" id="11">
                    {{-- <h6 class="text-center text-light">Row Pattern 11</h6> --}}
                    <div class="row">
                      <div class="col-sm-4">
                        <span class="button-44">Column - 4</span>
                      </div>
                      <div class="col-sm-4">
                        <span class="button-44">Column - 4</span>
                      </div>
                      <div class="col-sm-4">
                        <span class="button-44">Column - 4</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="12" id="12">
                    {{-- <h6 class="text-center text-light">Row Pattern 12</h6> --}}
                    <div class="row">
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="13" id="13">
                    {{-- <h6 class="text-center text-light">Row Pattern 13</h6> --}}
                    <div class="row">
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                      <div class="col-sm-2">
                        <span class="button-44">Column - 2</span>
                      </div>
                    </div>
                  </div>

                  <div class="section-wrapper section-color mb-2 row_number" data-id="14" id="14">
                    {{-- <h6 class="text-center text-light">Row Pattern 13</h6> --}}
                    <div class="row">
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                      <div class="col-sm-6">
                        <span class="button-44">Column - 6</span>
                      </div>
                      <div class="col-sm-3">
                        <span class="button-44">Column - 3</span>
                      </div>
                    </div>
                  </div>

                </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" role="button" class="btn btn-success" id="submitBtn"><i class="fas fa-arrow-up"></i> Save</button>
            <div id="spinner" class="spinner" style="display:none;"></div>
            <button class="btn btn-danger" role="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){ 
      $(document).on('click', '.row_number', function(){
          //var row_number = $('#number_of_column').val();
          var id     = $(this).data('id');

          $('#number_of_column').val(id);

          $('.row_number').removeClass('section-select-color');

                  var button = $('#' + id);
                  if (button.length) {
                      button.addClass('section-select-color');
                  }

      });
    });
  </script>