<style>
    .effect h5 a {
        transition: 10ms ease-in-out;
    }
    .effect h5 a:hover {
        color: #00c5bf;
    }
</style>

<div class="col-md-4">
    <div class="top-author">
        <h4>Latest {{$page_title}}</h4>
        <div class="author-items">
            @foreach ($news as $item )
            <div class="item">
                <div class="effect text-justify">
                    <h5 class="fs-6">
                         <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'news']) }}"
                            target="_blank">
                         {{   $item->title }}
                        </a>
                    </h5>
                    {{-- <ul>
                        <li class="border">
                            <span>
                                {{ date("d m,Y",strtotime($item->date)) }}
                            </span>
                        </li>
                    </ul> --}}
                    <span>
                        {{ date("d m,Y",strtotime($item->date)) }}
                    </span>
                </div>
            </div>
        
            @endforeach
        </div>
    </div>
</div>
