@extends('frontend.layouts.master-landing')
@php
if($type==1){
    $page_title = 'Apply For Certificate';
}
elseif($type==2){
    $page_title = 'Apply For Transcript';
}
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <section class="container">
        <div class="row my-5">
            {{-- <div class="card-body">
                {!!  !!}
            </div> --}}
            <div class="card-body bg-light rounded">
                {!! $form_type->description !!}
            </div>
            <div class="card-body pt-5">
                <table id="dataTable" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('SL')</th>
                            <th>@lang('Form Title')</th>
                            <th>@lang('Attachment')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($infos as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ @$item->title }}</td>
                                <td><a class="btn btn-info btn-sm"
                                        href="{{ asset('storage/app/media/form/' . @$item->file) }}" role="button"><i
                                            class="fas fa-download me-1" download="Certificate"></i> Download</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
