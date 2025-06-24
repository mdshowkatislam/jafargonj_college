<style>
    .banner-cover-bg {
            @if(@$banner->image)
                background-image: url("{{ asset('upload/banner/'. @$banner->image) }}");
            @else
            background: rgb(2, 0, 36);
            @endif
          
            background-repeat: no-repeat;
            background-size: cover;
            height: 350px;
            display: flex;
            align-items: center; /* Centers vertically */
            justify-content: center; /* Centers horizontally */
            position: relative;
            /* margin-top: 20px; */
        }

</style>

<nav class="banner-cover-bg" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb mt-5 bg-dark p-2 rounded">
        <li class="breadcrumb-item"><a class="text-white" href="{{url('/')}}"><i class="fas fa-home"></i> Home</a></li><span style="font-size: 20px;color: white; margin: 0px 6px 0px 6px;" class="ti-angle-double-right"></span>
        <li class="breadcrumb-item text-white" aria-current="page">{{ $page_title }}</li>
    </ol>
</nav>