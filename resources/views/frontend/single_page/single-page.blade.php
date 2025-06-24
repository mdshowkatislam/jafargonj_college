@extends('frontend.landing')
@php
    $page_title = 'Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

@php
    $urll = request()->fullUrl();
    if($urll) {
        $url = explode('=',$urll);
        if(sizeOf($url) >= 3)
        {
            $ur = $url[2];
            $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
        }
    }
@endphp





<section id="partnership" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 30px; @endif">
 
    <div class="course-details-area default-padding">
      @if(@$find_post['image'])
        <div class="container mb-3">
          <div style="text-align: center;">
            @if(@$find_post->getTable() == 'directors')
            <img src="{{asset('upload/director/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'news')
            <img src="{{asset('upload/news/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'facilities')
            <img src="{{asset('upload/facility/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'activities')
            <img src="{{asset('upload/activity/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_researches')
            <img src="{{asset('upload/our_research/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_developments')
            <img src="{{asset('upload/our_development/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_libraries')
            <img src="{{asset('upload/our_library/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_campuses')
            <img src="{{asset('upload/our_campus/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @endif
          </div>
        </div>
        @endif
        @if(@$find_post['date'])
        <div class="container mb-3">
          <div style="text-align: center;margin-top: 2px;">
            {{date('d-M-Y',strtotime(@$find_post['date']))}}
            </div>
        </div>
        @endif
      <div class="container">
          <div class="row">
              <!-- Start Course Info -->
              <div class="col-md-12">

                  <div class="top-author">
                      <div class="author-items"
                          style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">
                          <div class="col-sm-3 col-lg-2">
                              
                          </div>
                          <div class="col-lg-10 col-sm-9">
                              <div class="row">
                                  <div class="col-md-8">
                                      <div class="margin-top-30px">
                                         
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
                            

                            @if(@$find_post['description'])
                            <div class="container mb-3" style="max-width: 100%;width: 100%; min-height: 450px;">
                              <div style="text-align: justify;" style="max-width: 100%;width: 100%;">
                              {!! @$find_post['description'] !!}
                              </div>
                            </div>
                            @endif
                    
                          
                    
                            @if(@$find_post['long_description'])
                            <div class="container">
                              <div style="text-align: justify;">
                              {!! @$find_post['long_description'] !!}
                              </div>
                            </div>
                            @endif
                              
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
</section>


@endsection
