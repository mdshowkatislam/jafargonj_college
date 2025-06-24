
<style>
    .top-author .author-items {
        padding: 30px;
        border: 1px solid #e7e7e7;
        border-top: none;
        overflow: hidden;
    }
    .top-author .author-items .item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e7e7e7;
    }
</style>
<div class="col-md-4">
    <div class="top-author">
        <h4 class="text-uppercase text-center fs-4 p-3 w-100 h-100 fw-bold" style="background-color: rgb(200, 196, 196)">Latest {{$page_title}}</h4>
        <div class="author-items">
            @foreach ($news as $item )
            <div class="item">
                <div class=" text-justify">
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
