<div class="col-lg-4 h-auto d-inline-block">
    <div class="latest-news shadow p-3 rounded">
        <h1 class="fs-4 text-primary fw-bold mb-3 pb-3 border-bottom">Latest Events</h1>
        @foreach ($events as $event)
             <div class="d-flex justify-content-center align-items-center mt-3 pb-3 border-bottom">
                 <div class="col-lg-4">
                     <a href="{{ route('events.details', $event->id) }}">
                         <img class="rounded-circle shadow" src="{{ asset('upload/news/' . $event->image) }}"
                         style="width: 70px; height: 70px"  />
                     </a>
                 </div>
                 <div class="col-lg-8">
                     <a href="{{ route('events.details', $event->id) }}" >
                         <p class="mb-1 fs-7"><i class="fas fa-calendar-alt pe-1"></i> {{ date('d M Y', strtotime(@$event->date)) }}</p>
                         <h3 class="fs-6 m-0" style="overflow: hidden;">{{ Str::limit(@$event->title, 50, '...') }}</h3>
                     </a>
                 </div>
             </div>
         @endforeach
    </div>
</div>
