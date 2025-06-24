@extends('frontend.landing')
@php
    $page_title = '.Message from the Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>


<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Course Info -->
            <div class="col-md-12">

                <div class="top-author">
                    <div class="author-items"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                        <div class="col-sm-12 text-center">
                            <h3>Message from the Vice Chancellor..</h3>
                        </div>
                        <div class="col-sm-3 col-lg-2">
                            <img src="{{asset('frontend/images/1705294221ASM_Maksud_Kamal.jpg')}}" alt="Thumb"
                                class="img-thumbnail image-showing">
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="margin-top-30px">
                                <h2 class="font-weight-bold" style="color:rgb(191 25 51)">Prof. Dr. A. S. M. Maksud
                                    Kamal</h2>
                                <div class="clearfix"></div>
                                <h3 class="shadowLevel2">Vice Chancellor </h3>
                                <h3>University of Dhaka </h3>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12 text-justify margin-top-30px">
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
                                University of Dhaka<br />
                                &nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







