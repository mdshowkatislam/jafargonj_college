<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header rounded d-flex align-items-center justify-content-between"
                style="background: #00c5bf ; border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;">
                <div class="logo d-flex align-items-center">
                    @if (@$bupLogos)
                        <a href="#"><img src="{{ asset('upload/logo/' . $bupLogo->image) }}" alt="Logo"
                                class="d-inline-block me-2" style="width: 50px;" />
                        </a>
                    @else
                        <a href="#"><img src="{{ asset('frontend/assets/img/butex/butex-logo.png') }}"
                                alt="Logo" class="d-inline-block  me-2" style="width: 50px;" />
                        </a>
                    @endif
                    <a href="#" class="text-white fs-6 fw-bold mb-0  me-2"><span class="">BANGLADESH UNIVERSITY OF TEXTILES</span></a>

                </div>
                <div class="close">
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <h1 class="fs-5 fw-bold border-bottom pb-3">{{ @$modal->name }}</h1>
                @if (@$modal->image)
                    <div class="text-center py-3">
                        <img class="rounded shadow"
                            src="{{ asset('upload/modal/' . $modal->image) }}" alt=""
                            style="width: 100%; height:260px;">
                    </div>
                @endif
                {!! @$modal->description !!}

            </div>
            {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> --}}
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#exampleModal').modal('show');
    };
</script>
