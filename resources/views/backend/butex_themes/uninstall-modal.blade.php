
<!-- Modal Page Stataus Confirmation-->
<div class="modal fade" id="uninstall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="border: none;">
      <div class="modal-content">
        <div class="modal-body">
            <div class="">
                <h3 class="text-center p-2">Are you sure to uninstall this theme?</h3>
                <form id="statusFormUnInstall">
                    @csrf
                    <div class="text-center p-3">
                        <input type="hidden" id="uninstall_theme_id" class="uninstall_theme_id">
                        <input type="hidden" id="uninstall_page_id" class="uninstall_page_id">
                        <input type="hidden" id="uninstall_tab_id" class="uninstall_tab_id">
                        <input type="hidden" id="uninstall_action" value="uninstall">

                        <div id="uninstall_submitButton">
                            <button type="button" id="updateStatusButtonUnInstall" role="button" class="button-1">YES</button>
                            <button class="button-111" role="button" data-dismiss="modal">NO</button>
                        </div>

                        <div id="uninstall_progressBar" style="display: none;">
                            <div  class="spinner-border text-success" role="status"></div><br/>
                            <span class="">Uninstalling...</span>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('#updateStatusButtonUnInstall').on('click', function(e) {
        e.preventDefault();

        let theme_id = $('#uninstall_theme_id').val();
        let page_id  = $('#uninstall_page_id').val();
        let tab_id   = $('#uninstall_tab_id').val();
        let action   = $('#uninstall_action').val();

        let progressBar  = $('#uninstall_progressBar');
        let submitButton = $('#uninstall_submitButton');
        let modal        = $('#uninstall');

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
                toastr.error('Uninstallation Failed! Please try again')
            }
        });
    });
});
</script>