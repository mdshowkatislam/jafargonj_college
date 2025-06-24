    <div class="research-activitics about-area">
        <div class="container">
            <div class="row" style="height: auto;">
                <div class="col-md-5">
                    <h4 class="fs-4 custom-font-titillium-web fw-bold">RESEARCH & PUBLICATION ACTIVITIES</h4>
                        <img src="{{ asset('upload/about/researchgraph_03.png') }}" width="100%" alt="researchgraph_03">
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center">
                    <div class="col-md-6 mt-1">
                        <img src="{{ asset('upload/about/BJTSE-Logo.png') }}" height="auto" width="100%" alt="BJTSE-Logo">
                    </div>
                    <div class="col-md-6 m-2 w-100">
                        <div class="p-4" style="background-color:#ec7063; border-color:#ec7063; margin: 0.8rem;">
                            <p class="text-white" style="font-size: 1.2rem; custom-font-titillium-web">BUTEX Journal of Textile Science and Engineering</p>
                            <a href="https://www.butex.edu.bd/bjtse/" target="_blank" class="text-white custom-font-titillium-web"><u>Manuscript Submission Open</u></a><br>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex flex-column">
                    <div class="col-md-6 w-100">
                        <img src="{{ asset('upload/about/Convocation-Coun.jpg') }}" height="auto" width="100%" alt="Convocation-Coun">
                    </div>
                    <div class="col-md-6 w-100">
                        <div class="clock mt-3 ms-0 ms-md-3">
                            <div id="time">
                                <div class="circle" style="--clr:#ff00ff;">
                                    <svg>
                                        <circle cx="40" cy="40" r="40"></circle>
                                        <circle id="dd" cx="40" cy="40" r="40"></circle>
                                    </svg>
                                    <div class="title">Days</div>
                                    <div id="days">00</div>
                                </div>
                                <div class="circle" style="--clr:red;">
                                    <svg>
                                        <circle cx="40" cy="40" r="40"></circle>
                                        <circle id="hh" cx="40" cy="40" r="40"></circle>
                                    </svg>
                                    <div class="title">Hours</div>
                                    <div id="hours">00</div>
                                </div>
                                <div class="circle" style="--clr:#04fc43;">
                                    <svg>
                                        <circle cx="40" cy="40" r="40"></circle>
                                        <circle id="mm" cx="40" cy="40" r="40"></circle>
                                    </svg>
                                    <div class="title">Minutes</div>
                                    <div id="minutes">00</div>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

@push('scripts')
    <script>
       function time() {
            var second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
    
            let dd = document.getElementById("dd");
            let hh = document.getElementById("hh");
            let mm = document.getElementById("mm");
            // let ss = document.getElementById("ss");
            //upper section used for circle anim id call
    
            let day_dot = document.querySelector(".day_dot");
            let hr_dot = document.querySelector(".hr_dot");
            let min_dot = document.querySelector(".min_dot");
            let sec_dot = document.querySelector(".sec_dot");
            //upper section used for circle anim dots class call
    
    
            var second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            var time = @json($time);
            var countDown = new Date(time).getTime(),
                x = setInterval(function() {
    
                    var now = new Date().getTime();
                    if(countDown <= now) {
                        distance = 0;
                    } else {
                        distance = countDown - now;
                    }
    
                    document.getElementById('days').innerText = Math.floor(distance / (day)),
                        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute));
                    // document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
    
                    var d = Math.floor(distance / (day));
                    var h = Math.floor((distance % (day)) / (hour));
                    var m = Math.floor((distance % (hour)) / (minute));
    
    
                    dd.style.strokeDashoffset = 252 - (252 * d) / 100;
                    hh.style.strokeDashoffset = 252 - (252 * h) / 24;
                    mm.style.strokeDashoffset = 252 - (252 * m) / 60;
                    // ss.style.strokeDashoffset = 252 - (252 * s) / 60;
    
                }, second)
        }
        let run = setInterval(time, 1000); 
    </script>
@endpush