<ul class="list-unstyled mt-2">
    @foreach ($submenu as $sm)
        @if($sm->pages_id !=null)
            <li class="custom-child-menu p-2">
                <a class="custom-font-titillium-web effect" href="{{ $sm->url_link ? url('/pages/' .$sm->url_link. '/' .$sm->pages_id) : '#' }}" target="{{ $sm->target }}">
                    <i class="fas fa-angle-double-right"></i>
                    {{ $sm->title_en }}
                </a>
            </li>
        @endif
        
        @if($sm->pages_id ==null)
            @if ($sm->url_link_type != 4)
                <li class="custom-child-menu p-2">
                    <a class="custom-font-titillium-web effect" href="{{ $sm->url_link ? url($sm->url_link) : '#' }}" target="{{ $sm->target }}">
                        <i class="fas fa-angle-double-right"></i>
                        {{ $sm->title_en }}
                    </a>
                </li>
            @else
                <li class="custom-child-menu p-2">
                    <a class="custom-font-titillium-web effect" href="{{ $sm->url_link ? url('backend/menu_fle/'.$sm->url_link) : '#' }}" target="{{ $sm->target }}">
                        <i class="fas fa-angle-double-right"></i>
                        {{ $sm->title_en }}
                    </a>
                </li>
            @endif
        @endif
    @endforeach
</ul>