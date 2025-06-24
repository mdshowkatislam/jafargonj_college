<style>
    .mission-card{
        height: auto;
        border-radius: 5px;
        background-color: #ffffff;
    }

    .text-wrapper-style{
        line-height: 1.5; 
        font-size: 18px; 
        height: 130px;
        text-align:justify;
    }

    @media only screen and (max-width: 767px) {
        .mission-card{
            height: auto;
            border-radius: 5px;
            background-color: #ffffff;
        }

        .text-wrapper-style{
            line-height: 1.5; 
            font-size: 18px; 
            height: auto;
        }
    }

    @media only screen and (min-width: 481px) and (max-width: 767px) {
        .mission-card{
            height: auto;
            border-radius: 5px;
            background-color: #ffffff;
        }
        .text-wrapper-style{
            line-height: 1.5; 
            font-size: 18px; 
            height: auto;
        }
    }

    ul {
        list-style: none;
    }

</style>

<section>
    <div class="mt-4 mb-3">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="shadow custom-font-titillium-web mission-card">
                        <div class="card-body">
                            <h3>Our Mission</h3>
                            <div class="text-wrapper-style">
                                {{-- Check if content is longer than 200 characters --}}
                                @if(Str::length(@$aboutUni->mission) > 200)
                                    {{-- Show truncated content initially --}}
                                    {!! Str::limit(@$aboutUni->mission, 200) !!}
                                    <a href="/mission_vision">[<u>Read more</u>]</a>
                                @else
                                    {{-- Show full content if it's within 200 characters --}}
                                    {!! @$aboutUni->mission !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="shadow custom-font-titillium-web mission-card">
                        <div class="card-body">
                            <h3>Our Vision</h3>
                            <div class="text-wrapper-style">
                                {{-- Check if content is longer than 200 characters --}}
                                @if(Str::length(@$aboutUni->vision) > 200)
                                    {{-- Show truncated content initially --}}
                                    {!! Str::limit(@$aboutUni->vision, 200) !!}
                                    <a href="/mission_vision">[<u>Read more</u>]</a>
                                @else
                                    {{-- Show full content if it's within 200 characters --}}
                                    {!! @$aboutUni->vision !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="shadow custom-font-titillium-web mission-card">
                        <div class="card-body">
                            <h3>Our Objective</h3>
                            <div class="text-wrapper-style">
                                {{-- Check if content is longer than 200 characters --}}
                                @if(Str::length(@$aboutUni->objective) > 200)
                                    {{-- Show truncated content initially --}}
                                    {!! Str::limit(@$aboutUni->objective, 200) !!}
                                    <a href="/mission_vision">[<u>Read more</u>]</a>
                                @else
                                    {{-- Show full content if it's within 200 characters --}}
                                    {!! @$aboutUni->objective !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
