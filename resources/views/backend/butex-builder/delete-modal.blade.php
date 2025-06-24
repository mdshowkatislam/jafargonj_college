<!-- Modal Delete Column Confirmation-->
<div class="modal fade" id="deleteColumn" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
          <div class="">
              <h3 class="text-center p-2">Are you sure to delete this column?</h3>
              <div class="text-center p-3">
                <input type="hidden" name="cid" class="cid" id="cid">
                <input type="hidden" name="ccol" class="ccol" id="ccol">
                <button type="button" role="button" class="btn btn-danger" onclick="deleteColumn()">YES</button>
                <button class="btn btn-success" role="button" data-dismiss="modal">NO</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
  
<!-- Modal Delete Section Confirmation-->
<div class="modal fade" id="deleteSection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
          <div class="">
              <h3 class="text-center p-2">Are you sure to delete this section?</h3>
              <div class="text-center p-3">
                <input type="hidden" name="sid" class="sid" id="sid">
                <button type="button" role="button" class="btn btn-success" onclick="deleteSection()">YES</button>
                <button class="btn btn-danger" role="button" data-dismiss="modal">NO</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Delete Section Confirmation-->
<div class="modal fade" id="deleteSection" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="border: none;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="">
            <h3 class="text-center p-2">Are you sure to delete this section?</h3>
            <div class="text-center p-3">
              <input type="hidden" name="sid" class="sid" id="sid">
              <button type="button" role="button" class="btn btn-success" onclick="deleteSection()">YES</button>
              <button class="btn btn-danger" role="button" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Page Stataus Confirmation-->
<div class="modal fade" id="pageStatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="border: none;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="">
            <h3 class="text-center p-2">Are you sure to <span class="action_value"></span> this page ?</h3>
            <div class="text-center p-3">
              <input type="hidden" name="page_id" class="page_id" id="page_id">
              <input type="hidden" name="tab_id" class="tab_id" id="tab_id">
              <input type="hidden" name="action" class="action" id="action">
              <button type="button" role="button" class="btn btn-success" onclick="changeStatus()">YES</button>
              <button class="btn btn-danger" role="button" data-dismiss="modal">NO</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Save Themes-->
<div class="modal fade" id="saveThemes" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="border: none;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="">
            <h3 class="text-center p-2">Are you sure to save this theme ?</h3>
              <div class="p-1">
                <form method="post" action="{{ route('store.themes') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="page_id" class="page_id" id="page_id">
                  <input type="hidden" name="tab_id" class="tab_id" id="tab_id">
                  <input type="hidden" name="action" class="action" id="action">

                  <div class="p-1">
                      <div class="form-group">
                        <label for="">Create Theme Name</label>
                        <input type="text" class="form-control" name="theme_name" id="theme_name" placeholder="Theme Name" required>
                      </div>
                      <div class="form-group">
                        <label for="">Thumbnail Image</label>
                        <input type="file" class="form-control" name="file" id="file">
                      </div>
                  </div>

                  <div class="text-center p-2">
                    <button type="submit" role="button" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" role="button" data-dismiss="modal">Close</button>
                  </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>