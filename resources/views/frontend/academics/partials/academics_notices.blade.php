<ul class="list-group" id="program_notice">
    @forelse ($notices as $item)
        <li class="list-group-item">
            <div class="card-body">
                <h5 class="card-title fs-4" style="text-align: justify; font-size:15px;">
                    <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}" target="_blank">{{ $item->title }}</a>
                </h5>
                <div class="card-text mb-1">
                    <span>Published: {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</span>
                </div>
                <a href="{{ route('type.details', ["id"=>$item->id,"type"=>'notice']) }}" target="_blank">
                    <button type="button" class="btn btn-sm rounded-pill"><i class="fas fa-plus" style="color: #1C4370;"></i> Read more</button>
                </a>
            </div>
        </li>
    @empty
        <p class="m-2">No Notice Found For This Program</p>
    @endforelse
</ul>

<div class="my-1">
    {{ $notices->links() }}  <!-- Pagination links -->
</div>
