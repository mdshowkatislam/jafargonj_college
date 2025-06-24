<style>
    .upcoming-events img {
        width: 100%;
        object-fit: cover;
    }

    .upcoming-events .card {
        border: none;
        border-radius: 0;
    }

    .upcoming-event-date-time {
        text-transform: uppercase;
        font-weight: 900;
        font-size: 0.8rem;
        letter-spacing: 0.25rem;
        color: #2b292a;
        border: 1px solid #2b292a;
    }


    .upcoming-event-link {
        font-weight: 700;
        display: inline-block;
    }

    .news-card {
        background-color: #e9ecef !important;
        position: relative;
        margin-bottom: 10px;
        background-color: #ffffff;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;

    }

    .news-card:before {
        position: absolute;
        content: '';
        left: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .news-card:after {
        position: absolute;
        content: '';
        right: 0px;
        bottom: 0px;
        width: 0px;
        height: 5px;
        background-color: #00c5bf;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;
    }

    .news-card:hover {
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        -ms-transform: translateY(10px);
        -o-transform: translateY(10px);
        transform: translateY(10px);
    }

    .news-card:hover::before,
    .news-card:hover::after {
        width: 100%;
    }

    .news-card img {
        height: 200px !important;
    }

    .news-card a {
        color: #275D38;
        -webkit-transition: all 800ms ease;
        -moz-transition: all 800ms ease;
        -ms-transition: all 800ms ease;
        -o-transition: all 800ms ease;
        transition: all 800ms ease;

    }

    .news-card a:hover {
        color: #047C3B;
    }




    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.125rem;
        }

        .upcoming-event-link {
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02rem;
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.24rem;
        }

        .upcoming-event-link {
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.02rem;
        }
    }

    /* X-Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .upcoming-event-date-time {
            font-weight: 900;
            font-size: 0.8rem;
            letter-spacing: 0.25rem;
        }

        .upcoming-event-link {
            font-weight: 700;
        }
    }
</style>

@foreach ($news as $item)
    <div class="col mb-3 home-news-card">
        <div class="card h-100 news-card">
            <div><img alt="" src="{{ asset('upload/news/' . $item->image) }}"
                    onerror="this.onerror=null;this.src='{{ asset('upload/no-image.png') }}';" />
            </div>
            <div class="py-3 px-2">
                <div class="mt-0 mb-3 "><span
                        class="upcoming-event-date-time py-1 px-2">{{ date('M d, Y', strtotime($item->date)) }}</span>
                </div>
                <a class="stretched-link upcoming-event-link"
                    href="{{ route('news.details', $item->id) }}">{{ $item->title }} </a>
            </div>
        </div>
    </div>
@endforeach
