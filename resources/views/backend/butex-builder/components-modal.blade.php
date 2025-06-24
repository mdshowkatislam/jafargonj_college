<!-- Modal Add Components-->
<div class="modal fade" id="addComponent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" style="border: none;">
      <div class="modal-content">
        <div class="header-custom">
          <h5 class="text-effect2 text-center">Select Component</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="">
            <form>
              @csrf
              <input type="hidden" class="section" id="section" name="section">
              <input type="hidden" class="column" id="column" name="column">
              <input type="hidden" class="component_id" id="component_id" name="component_id">
              
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="0" class="button-77 add-component" onclick="addComponent(0, 0)" style="width:100%;">Text Editor</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c1" class="button-77 add-component" onclick="addComponent('c1', 2)" style="width:100%;">Home Slider</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c13" class="button-77 add-component" onclick="addComponent('c13', 2)" style="width:100%;">Club Slider</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c2" class="button-77 add-component" onclick="addComponent('c2', 2)" style="width:100%;">VC Profile</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c3" class="button-77 add-component" onclick="addComponent('c3', 2)" style="width:100%;">VC Message</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c4" class="button-77 add-component" onclick="addComponent('c4', 2)" style="width:100%;">Welcome Message</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c5" class="button-77 add-component" onclick="addComponent('c5', 2)" style="width:100%;">Welcome Video</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c6" class="button-77 add-component" onclick="addComponent('c6', 2)" style="width:100%;">Latest News</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c7" class="button-77 add-component" onclick="addComponent('c7', 2)" style="width:100%;">Events & Notice</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c8" class="button-77 add-component" onclick="addComponent('c8', 2)" style="width:100%;">Events</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c9" class="button-77 add-component" onclick="addComponent('c9', 2)" style="width:100%;">Notice</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c41" class="button-77 add-component" onclick="addComponent('c41', 2)" style="width:100%;">Result & Notice</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c10" class="button-77 add-component" onclick="addComponent('c10', 2)" style="width:100%;">Research Activities</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c11" class="button-77 add-component" onclick="addComponent('c11', 2)" style="width:100%;">Video Activities</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c12" class="button-77 add-component" onclick="addComponent('c12', 2)" style="width:100%;">APA</button>
                  </div>
                </div>
  
              
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c14" class="button-77 add-component" onclick="addComponent('c14', 2)" style="width:100%;">Google Map</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c15" class="button-77 add-component" onclick="addComponent('c15', 2)" style="width:100%;">Research & Journal</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c16" class="button-77 add-component" onclick="addComponent('c16', 2)" style="width:100%;">Contact Us</button>
                  </div>
                </div>
  
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c17" class="button-77 add-component" onclick="addComponent('c17', 2)" style="width:100%;">At a Glance</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c18" class="button-77 add-component" onclick="addComponent('c18', 2)" style="width:100%;">Dean Profile</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c19" class="button-77 add-component" onclick="addComponent('c19', 2)" style="width:100%;">About Faculty</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c20" class="button-77 add-component" onclick="addComponent('c20', 2)" style="width:100%;">About Department</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c21" class="button-77 add-component" onclick="addComponent('c21', 2)" style="width:100%;">Faculty Member</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c22" class="button-77 add-component" onclick="addComponent('c22', 2)" style="width:100%;">Faculty Notice</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c23" class="button-77 add-component" onclick="addComponent('c23', 2)" style="width:100%;">Department Notice</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c24" class="button-77 add-component" onclick="addComponent('c24', 2)" style="width:100%;">Office Notice</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c25" class="button-77 add-component" onclick="addComponent('c25', 2)" style="width:100%;">Departments</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c26" class="button-77 add-component" onclick="addComponent('c26', 2)" style="width:100%;">Programs</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c27" class="button-77 add-component" onclick="addComponent('c27', 2)" style="width:100%;">Laboratory</button>
                  </div>
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c28" class="button-77 add-component" onclick="addComponent('c28', 2)" style="width:100%;">Clubs</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c29" class="button-77 add-component" onclick="addComponent('c29', 2)" style="width:100%;">Officers</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c30" class="button-77 add-component" onclick="addComponent('c30', 2)" style="width:100%;">Chairman Message</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c31" class="button-77 add-component" onclick="addComponent('c31', 2)" style="width:100%;">Academic Program</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c32" class="button-77 add-component" onclick="addComponent('c32', 2)" style="width:100%;">Office banner</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c33" class="button-77 add-component" onclick="addComponent('c33', 2)" style="width:100%;">All Offices</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c34" class="button-77 add-component" onclick="addComponent('c34', 2)" style="width:100%;">Club Overview</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c35" class="button-77 add-component" onclick="addComponent('c35', 2)" style="width:100%;">About Club</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c36" class="button-77 add-component" onclick="addComponent('c36', 2)" style="width:100%;">Club Activities</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c37" class="button-77 add-component" onclick="addComponent('c37', 2)" style="width:100%;">Album</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c38" class="button-77 add-component" onclick="addComponent('c38', 2)" style="width:100%;">Office About</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c42" class="button-77 add-component" onclick="addComponent('c42', 2)" style="width:100%;">Office Message</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c39" class="button-77 add-component" onclick="addComponent('c39', 2)" style="width:100%;">Mission & Vission</button>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <button type="button" role="button" id="c40" class="button-77 add-component" onclick="addComponent('c40', 2)" style="width:100%;">Office People</button>
                  </div>
                </div>


                {{-- (0, 1, 2) - 0 ckeditor & 2 means fixed component & 1 means custom components --}}
                @foreach (@$components as $key => $component)
                  <div class="col-sm-3">
                    <div class="form-group">
                      <button type="button" role="button" id="{{ @$component->id }}" class="button-77 add-component" onclick="addComponent({{ @$component->id }}, 1)" style="width:100%;">{{ @$component->title }}</button>
                    </div>
                  </div>
                @endforeach
  
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="submit" role="button" class="button-1"><i class="fas fa-arrow-up"></i> Save</button> --}}
          <button class="btn btn-danger btn-sm" role="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<script>
  function addComponent(id, type) {
    var section  = $('#section').val(); 
    var column   = $('#column').val(); 
    var token    = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'post',
            url: '{{ route("add.component") }}',
            data: {
              section: section,
              column: column,
              id: id,
              type: type,
              _token: token,
            },
            success: function (data) {
            toastr.success(data.message)
            // location.reload();
            //row.hide();
            $('#addComponent').modal('hide');
            //setTimeout(function () { window.location.reload(); }, 1500);
              location.reload();
                //$('.data-row[data-id="' + id + '"]').hide();
            },
              error: function (error) {
                toastr.error("Anything Wrong! Please try again.");
              }
        });
  }
  
</script>


