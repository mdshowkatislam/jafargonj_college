  <!-- Top Bar -->
  <div class="top-bar-area bg-dark-top inc-border text-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12 link text-right">
                  <ul style="margin-left:10%">
                      <li>
                          @php
                          $position_id =
                          DB::table('menu_types')->where('position','Header Top Bar')->pluck('id')->first();
                          $top =
                          DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id',$position_id)->orderBy('sort_order','asc')->take(5)->get();
                          @endphp

                          @foreach($top as $topmenu)
                          <a style="margin-left: 10px; font-size:12px" href="#">
                              <i class="{{ $topmenu->icon }}"></i>
                              {{ $topmenu->title_en }}
                          </a>
                          @endforeach
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>