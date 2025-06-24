@extends('frontend.landing')
@php
    $page_title = 'Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>


    <!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">

                    <div class="top-author">
                        <div class="author-items"
                            style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                            <div class="col-sm-3 col-lg-2">
                                <img src="{{asset('frontend/images/all-vc/29th_Maksud_Kamal.jpg')}}" alt="Thumb"
                                    class="img-thumbnail image-showing">
                            </div>
                            <div class="col-lg-10 col-sm-9">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="margin-top-30px">
                                            <h2 class="font-weight-bold">Prof. Dr. A. S. M. Maksud Kamal</h2>
                                            <div class="clearfix"></div>
                                            <h3 class="">Vice Chancellor</h3>
                                            <h4 style="all: revert;color:#002147">
                                                University of BUTEX
                                            </h4>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 vh-100 d-flex justify-content-center align-items-center">
                                        <a data-toggle="modal" data-target="#exampleModalLong" href="#" target="_blank"
                                            class="btn btn-theme effect btnhome"><i class="fas fa-book-open"></i> Full
                                            Biography</a>
                                        </br>
                                        <a data-toggle="modal" data-target="#modalBiographyEng"
                                            style="margin-top: 20px;" href="#" target="_blank"
                                            class="btn btn-theme effect btnhome padding-5px"><i
                                                class="fas fa-book-open"></i> Short Biography (English)</a>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 text-justify margin-top-30px">
                                <p>Respected members of the university community,</p>

                                <p>I am deeply honored and filled with immense enthusiasm as I assume the esteemed
                                    position of Vice Chancellor at this illustrious institution. In this capacity, I am
                                    aware of the diverse and dynamic spectrum of stakeholders that this university
                                    serves, including current and prospective students, dedicated faculty members,
                                    accomplished researchers, revered members of the senate and the syndicate, esteemed
                                    alumni, and our valued international partners.</p>

                                <p>To our esteemed faculty members, I extend my heartfelt appreciation for your
                                    unwavering dedication to the pursuit of knowledge and the nurturing of young minds.
                                    Your guidance not only molds the intellect of future generations but also ignites a
                                    passion for lifelong learning. Together, let us collaborate to cultivate an
                                    environment that fosters creativity, critical thinking, and inclusivity. Your
                                    enduring commitment has been the cornerstone of our university’s strength, and we
                                    are committed to further elevating the standard of academic excellence with your
                                    continued dedication.</p>

                                <p>To our distinguished researchers, your pioneering contributions stand at the vanguard
                                    of our institutional mission. Your groundbreaking discoveries have the potential to
                                    transform lives and shape the future of our nation, Bangladesh. I pledge firm
                                    support for the enhancement and empowerment of our research ecosystem, ensuring that
                                    our institution remains a bastion of innovation and intellectual exploration. To
                                    this end, we are committed to mobilizing the necessary resources for research and
                                    development from various quarters, including government support, private sector
                                    collaboration, and the enduring commitment of our cherished alumni.</p>

                                <p>To our students, you are the lifeblood of this university, and your boundless passion
                                    for knowledge, innate curiosity, and untiring pursuit of excellence serve as the
                                    driving forces behind our collective success. The sacrifices made by your
                                    predecessors and their active involvement in myriad social, intellectual, and
                                    political movements have made our university uniquely distinguished in the academic
                                    realm. I urge each of you to seize every opportunity for intellectual growth, to
                                    challenge yourselves, and to collaborate with your peers in strengthening this
                                    cherished legacy. Remember, your time here is not merely about earning a degree; it
                                    is about shaping yourselves into the leaders and innovators of tomorrow. The
                                    university equips you with the most potent tools to confront the various challenges
                                    of life, and it is a privilege to have access to the remarkable faculty resources
                                    this institution offers.</p>

                                <p>To our future students, I extend a warm and wholehearted welcome. Your journey with
                                    us is a blank canvas, awaiting the vibrant strokes of new experiences, friendships,
                                    and knowledge. Embrace the opportunities that come your way, and let this chapter of
                                    your life be one of profound growth and self-discovery.</p>

                                <p>For our international students, your presence enriches our academic community with
                                    diversity that is truly invaluable. You enhance the global perspective of our
                                    institution, and I am committed to fostering an inclusive environment where every
                                    individual feels genuinely welcome and supported.</p>

                                <p>Let us embark together on an expedition of academic excellence, collaboration, and
                                    positive transformation. I am filled with excitement for the endless possibilities
                                    that lie ahead, and I have full confidence that, as a united community, we will
                                    ascend to new pinnacles of achievement, making our university a desired source of
                                    great pride.<br />
                                    Sincerely,<br />
                                    &nbsp;<br />
                                    Professor Dr. A. S. M. Maksud Kamal<br />
                                    Vice Chancellor<br />
                                    University of BUTEX<br />
                                    &nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="text-align: center"> Full Biography of
                        Prof. Dr. A. S. M. Maksud Kamal</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Honorable-Vice_Chancellor_full_Biography.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBiographyEng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="text-align: center"> Short Biography of
                        Prof. Dr. A. S. M. Maksud Kamal</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Honorable-Vice_Chancellor_short_Biography.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalPVCALong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalPVCALongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalPVCALongTitle" style="text-align: center"> Full Biography of
                        Prof. Dr. A. S. M. Maksud Kamal</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="../biography/Full_Biography_Sitesh_Chandra_Bachar.pdf" width="100%"
                        height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End content ============================================= -->

@endsection







