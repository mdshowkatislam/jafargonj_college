<!-- Modal Delete Column Confirmation-->
<div class="modal fade" id="deleteTheme" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
          <div class="">
            <form id="deleteThemes">
                <h3 class="text-center p-2">Are you sure to delete this theme?</h3>
                <div class="text-center p-3">
                  <input type="hidden" name="theme_id" class="theme_id" id="theme_id">
                  <input type="hidden" name="num1" class="num1" id="num1">
                  <input type="hidden" name="num2" class="num2" id="num2">
                  
                  <div class="form-group text-center">
                    <label class=""><h3>Sum of <span class="number1"></span> + <span class="number2"></span> </h3></label>
                        <div style="width: 50%; margin: auto;">
                            <input type="number" class="form-control sum" id="sum" name="sum">
                        </div>
                  </div>

                  <div class="text-center">
                    <div class="text-center p-1" id="delete_submitButton">
                      <button type="button" id="updateStatusButtonDelete" role="button" class="btn btn-success">Continue</button>
                    </div>

                    <div id="delete_progressBar" style="display: none;">
                      <div  class="spinner-border text-success" role="status"></div><br/>
                      <span class="">Deleting...</span>
                    </div>
                  </div>

                </div>
            </form>

            <div class="modal-footer">
                <div id="spinner" class="spinner" style="display:none;"></div>
                <button class="btn btn-danger" role="button" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('#updateStatusButtonDelete').on('click', function(e) {
        e.preventDefault();

        let num1     = $('#num1').val();
        let num2     = $('#num2').val();

        function sumConvertedNumbers(value1, value2) {
            const num1 = parseInt(value1, 10); // Convert value1 to an integer
            const num2 = parseInt(value2, 10); // Convert value2 to an integer
            return num1 + num2;
        }

        let add = sumConvertedNumbers(num1, num2);

        let theme_id = $('#theme_id').val();
       
        let sum      = $('#sum').val();
        let page_id  = '';
        let tab_id   = '';
        let action   = 'delete';

        let progressBar  = $('#delete_progressBar');
        let submitButton = $('#delete_submitButton');
        let modal        = $('#deleteTheme');

            if(sum == add){
                $.ajax({
                    url: "{{ route('store.install') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        theme_id: theme_id,
                        page_id: page_id,
                        tab_id: tab_id,
                        action: action,
                    },
                    beforeSend: function() {
                        // Show progress bar
                        progressBar.show();
                        submitButton.hide();
                    },
                    success: function(response) {
                        if (response.success) {
                            //alert(response.message);
                            toastr.success(response.message)
                            //swal({ title: response.message, type: "success" }),
                            // Hide modal
                            modal.modal('hide');
                            location.reload();
                        }
                    },
                    complete: function() {
                        // Hide progress bar
                        progressBar.hide();
                        submitButton.show();
                    },
                    error: function(xhr) {
                        toastr.error('Installation Failed! Please try again')
                    }
                });
            }else{
                toastr.error('The sum is wrong!')
            }
       
    });
});
</script>