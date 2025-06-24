<style>
    .my-border {
        border: 2px dashed #b6b6b6;
        border-radius: 10px;
        padding: 5px;
        cursor: pointer;
    }
    .my-border-hover{
        border: 2px dashed #b6b6b6;
        border-radius: 10px;
        padding: 5px;
        cursor: pointer;
    }
    .my-border-hover:hover {
        border: 2px dashed #1b1b1b;
        border-radius: 10px;
        padding: 5px;
        cursor: pointer;
    }

    .row-wrapper{
        cursor: pointer;
    }

    .active-form {
        border: 2px dashed #1b1b1b;
    }

</style>

<div class="modal fade" id="form_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
          <div class="">
                <h3 class="text-center p-2">Select Form Layout</h3>
                <div class="text-start p-3">
                  
                    <div class="row mb-2 mt-2 row-wrapper" data-id="1">
                        <div class="col-sm-12">
                            <div class="my-border-hover @if(@$editData->form_layout == '1') active-form @else '' @endif">
                                <div class="text-center">Col-12 (Form)</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 mt-2 row-wrapper" data-id="2">
                        <div class="col-sm-2">
                            <div class="my-border">
                                <div class="text-center">Col-2</div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="my-border-hover @if(@$editData->form_layout == '2') active-form @else '' @endif">
                                <div class="text-center">Col-8 (Form)</div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="my-border">
                                <div class="text-center">Col-2</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 mt-2 row-wrapper" data-id="3">
                        <div class="col-sm-3">
                            <div class="my-border">
                                <div class="text-center">Col-3</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="my-border-hover @if(@$editData->form_layout == '3') active-form @else '' @endif">
                                <div class="text-center">Col-6 (Form)</div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="my-border">
                                <div class="text-center">Col-3</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 mt-2 row-wrapper" data-id="4">
                        <div class="col-sm-4">
                            <div class="my-border">
                                <div class="text-center">Col-4</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="my-border-hover @if(@$editData->form_layout == '4') active-form @else '' @endif">
                                <div class="text-center">Col-4 (Form)</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="my-border">
                                <div class="text-center">Col-4</div>
                            </div>
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

<script>
    $('.row-wrapper').click(function() {
        var id     = $(this).data('id');
        $('.form_layout').val(id);
        $('#form_modal').modal('hide');
    });

    $(document).ready(function() {
        $('.my-border-hover').click(function() {
            // Remove the 'active' class from all columns
            $('.my-border-hover').removeClass('active-form');

            // Add the 'active' class to the clicked column
            $(this).addClass('active-form');
        });
    });

</script>

