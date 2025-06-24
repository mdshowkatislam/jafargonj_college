    <!-- Member List -->
    @if (count($club_members) > 0)
        <section class="my-5">
            <div class="container">
                <h1 class="text-uppercase mb-0 home-content-heading custom-font-titillium-web">Club Member List</h1>
                <div class="position-relative w-100 common-bg-color mt-1" style="height: 4px;">
                </div>
                <div class="row">
                    @foreach ($club_members as $index => $club_member)
                        <div class="col-12 col-md-6 col-lg-3 mt-3">
                            <div class="card rounded-0 bg-success member-list-card">
                                <img class="object-cover" src="{{ asset('upload/club/member/image/' . $club_member->image) }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center custom-font-titillium-web">

                                        {{ $club_member->member_name }}
                                    </h5>
                                    <p class="card-text text-white text-center custom-font-titillium-web">
                                        {{ isset($club_member->d_name) ? $club_member->d_name : 'Not Assign' }}

                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
