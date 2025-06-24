@extends('frontend/partials/iqac_layout')

@php
    $page_title = "Committee"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')

@include('frontend.partials.sections.banner_chsr', ['page_title' => $page_title])

  <!-- Our Faculty Person -->
  <section>
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
      {{-- <h1 class=" text-secondary fs-3 mb-0 text-center pt-3">Team</h1> --}}
      <div class="row justify-content-center">
        @foreach($teams as $team)
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-danger card rounded-0 border-0 member-list-card zoom_in_hover" style="">
              <img class="card-img-top rounded-0 border-0" src="{{ $team->member->photo ? asset('upload/profiles/'.@$team->member->photo) : @$team->member->photo_path }}" onerror="this.onerror=null;this.src='{{ asset('upload/user-dummy.jpeg') }}';" alt=""
                height="" />
              <div class="card-body">
                <a href="{{ route('office.people.details', $team->member->id) }}">
                  <h5 class="card-title text-white fs-6 mt-0 text-center">
                      {{ $team->member->nameEn }}
                  </h5>
              </a>
                <p class="card-text text-white text-center mb-0">
                    {{@$team->member->designation}}
                </p>
              </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection