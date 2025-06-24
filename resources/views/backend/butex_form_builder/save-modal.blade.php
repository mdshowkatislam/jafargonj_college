<div class="modal fade" id="save" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
          <div class="">
            
                <h3 class="text-center p-2">Are you sure to save this template?</h3>
                <div class="text-start p-3">
                  <div class="form-group col-sm-12">
                    <label class="mt-2">Template Title</label>
                    <input type="text" class="form-control" id="template_title" name="template_title" style="border:1px solid #13aa52;" required>
                  </div>

                  <div class="row d-none">
                    <div class="col-sm-6">
                      <div class="form-group col-sm-12">
                        <label class="mt-2">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" style="border:1px solid #13aa52;">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group col-sm-12">
                        <label class="mt-2">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" style="border:1px solid #13aa52;">
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <div class="text-center p-2">
                      <button type="button" id="save-form" role="button" class="btn btn-success">Continue</button>
                    </div>
                  </div>
                </div>

            <div class="modal-footer">
                <div id="spinner" class="spinner" style="display:none;"></div>
                <button class="btn btn-sm btn-danger" role="button" data-dismiss="modal">Close</button>
              </div>
            </div>
            
        </div>
      </div>
    </div>
</div>