<style>
    .vc-message{
        text-align: justify; 
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; 
        height: 18.5rem;
    }
    @media only screen and (max-width: 768px) {
        .vc-message{
            margin-top: 50px;
        }
    }
    @media only screen and (max-width: 900px) {
        .vc-message{
            text-align: justify; 
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; 
            height: auto;
        }
    }

    @media only screen and (max-width: 1200px) {
        .vc-message{
            text-align: justify; 
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; 
            height: auto;
        }
    }
</style>

<div class="equal-height aos-init features" style="width: 100%">
    <div class="item p-5 vc-message" style="">
        @php
        
        $truncatedDescription = str_limit(@$vcInfo->long_description, 600);
        // dd(@$truncatedDescription);
        // dd($vcInfo);
        @endphp
        
            <div style="overflow: hidden;" class="info">
                <div class="site-heading">
                    <h5 class="custom-font-titillium-web mycolorgreen">Message from the Principle</h5>
                </div>
                @if (@$vcInfo->profile)
                {{-- <p>Respected members of the university community</p> --}}
                <span class="custom-font-titillium-web">{!! $truncatedDescription !!}</span>
                <a href="{{ route('vc_info') }}" style="text-decoration: underline;"><u>[Read more]</u></a>
                <!-- <button class="btn circle btn-dark border btn-sm text-center pull-right custom-font-titillium-web">Read more...</button> -->
                @else
                <h5 class="text-center custom-font-titillium-web">Vc Message Not Found</h5>
                @endif
            </div>
       
    </div>
</div>