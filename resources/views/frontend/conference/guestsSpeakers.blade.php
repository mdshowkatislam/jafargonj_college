@php
    $page_title = 'Guests Speakers';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@extends('frontend.conference.main')

@section('content')

@include('frontend.partials.sections.banner-with-title', ['page_title' => $page_title])

<style>
    .profile-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      background-color: #f9f9f9;
      padding: 20px;
    }

    .profile-card {
      text-align: center;
      background: white;
      border: 1px solid #666;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .profile-image {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 1px solid blue;
    }

    .profile-name {
      margin: 10px 0;
      font-size: 18px;
      color: #333;
    }

    .profile-title,
    .profile-department,
    .profile-institution {
      margin: 5px 0;
      font-size: 14px;
      color: #666;
    }
  </style>

<div class="mb-3">
    <div class="text-colore" style="background-color: #f9f9f9; padding: 20px;">
        <h2 style="font-weight: 700; text-align: center; color: #002147; font-size: 2rem;">GUESTS & SPEAKERS</h2>
    </div>

    <div class="profile-container">

    <div class="profile-container">
              @foreach ($members as $member)
              <div class="profile-card">
                  <!-- Display the member's image -->
                  <img 
                      src="{{ asset($member->image ? 'uploads/conference/' . $member->image : 'default-image.jpg') }}" 
                      alt="{{ $member->member_name }}" 
                      class="profile-image">
                      
                      <!-- Display the member's name -->
                      <h3 class="profile-name">{{ $member->member_name }}</h3>

                      <!-- Display designations, if available -->
                      <p class="profile-title">{{ $member->designation_1 }}</p>
                      @if ($member->designation_2)
                          <p class="profile-title">{{ $member->designation_2 }}</p>
                      @endif
                      @if ($member->designation_3)
                          <p class="profile-title">{{ $member->designation_3 }}</p>
                      @endif

                      <!-- Display email, phone, and description -->
                      @if ($member->email)
                      <p class="profile-department">{{ $member->email }}</p>
                      @endif

                      @if ($member->phone)
                      <p class="profile-department">{{ $member->phone }}</p>
                      @endif

                      @if ($member->description)
                      <p class="profile-department">{{ $member->description }}</p>
                      @endif

                </div>
              @endforeach
          </div>

        
    </div>
    
</div>

@endsection