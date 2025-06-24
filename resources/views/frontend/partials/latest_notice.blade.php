  {{-- <!-- News -->
  <div class="col-md-4">
    <div class="d-flex justify-content-between align-items-end">
      <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">Latest Notice
      </h1>
      <a href="{{ route('notice.all') }}" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
    </div>
    <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
      <div class="position-absolute"
        style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
      </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-light">
        @foreach ($notice as $n)
        <div class="d-flex latest_newsevents justify-content-start align-items-center mt-3">
            <div class="col-lg-4">
              <a href="{{ route('news.details', $n->id) }}">
                <img class="" src="{{asset('upload/news/'.$n['image']) }}"
                    style="width: 70px; height: 70px" />
              </a>
            </div>
            <div class="col-lg-8">
              <a href="{{ route('news.details', $n->id) }}">
                <p class="mb-0">{{@$n->author}} - {{date("d M Y",strtotime(@$n->date))}}</p>
                <h1 class="fs-5" style="overflow: hidden;">{{@$n->title}}</h1>
              </a>
            </div>
        </div>
        @endforeach
    </div>
  </div> --}}

  <div class="col-lg-4  h-auto d-inline-block">
      <div class="latest-news shadow p-3 rounded">
          <h1 class="fs-4 text-primary fw-bold mb-3 pb-3 border-bottom">Latest Notice</h1>
          {{-- @foreach ($events as $event)
             <div class="d-flex justify-content-center align-items-center mt-3 pb-3 border-bottom">
                 <div class="col-lg-4">
                     <a href="{{ route('events.details', $event->id) }}">
                         <img class="rounded-circle shadow" src="{{ asset('upload/news/' . $event['image']) }}"
                         style="width: 70px; height: 70px"  />
                     </a>
                 </div>
                 <div class="col-lg-8">
                     <a href="{{ route('events.details', $event->id) }}" >
                         <p class="mb-1 fs-7">{{ @$event->author }} - {{ date('d M Y', strtotime(@$event->date)) }}</p>
                         <h1 class="fs-6 m-0" style="overflow: hidden;">{{ Str::limit(@$event->title, 50, '...') }}</h1>
                     </a>
                 </div>
             </div>
         @endforeach --}}
          @foreach ($notice as $n)
              <div class="d-flex justify-content-center align-items-center mt-3 pb-3 border-bottom">
 
                  <div class="col-lg-12">
                      <a href="{{ route('notice.details', $n->id) }}">
                          <p class="mb-1 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$n->date)) }}</p>
                          <h4 class="fs-6 m-0" style="overflow: hidden;">{{ @$n->title }}</h4>
                      </a>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
