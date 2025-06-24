
<div class="modal fade" id="viewComponent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="border: none;">
      <div class="modal-content">
        <form method="post" action="{{ route('store.component') }}">
          @csrf
          <div class="header-custom">
            <h5 class="text-effect2 text-center">My Component</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="">
                <input type="hidden" name="action" class="action" id="action" value="insert">
                <input type="hidden" name="id" class="id" id="id">
                <input type="hidden" name="col" class="col" id="col">

                <div class="form-group col-sm-12">
                  <label class="mt-2">Description</label>
                  <textarea type="text" id="texteditor" name="component_description" class="form-control component_description"></textarea>
                  @error('long_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" role="button" class="button-1" id="submitBtn"><i class="fas fa-arrow-up"></i> Save</button>
            <div id="spinner" class="spinner" style="display:none;"></div>
            <button class="button-111" role="button" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
</div>

