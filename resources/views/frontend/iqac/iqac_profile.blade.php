<div class="col-12 col-md-6 col-lg-3 mt-3">
    <div class="bg-success card rounded-0 member-list-card">
        <img class="mb-0" src="{{ $member->member->photo ? asset('upload/profiles/' . @$member->member->photo) : $member->member->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" alt="Image" />
        <div class="card-body">
            <h5 class="card-title text-white fs-6 mt-0 text-center">
                {{ @$member->member->nameEn }}
            </h5>
            <p class="card-text text-white text-center">
                {{ @$member->member->designation }}
            </p>
        </div>
    </div>
</div>