@extends('frontend.hall.landing-app')

@php
$page_title= $facultyMember->name
@endphp

@section('title', $page_title)
@section('hall_style')

@endsection

@section('content')
@include('frontend/hall/hall_header')


@endsection

@section('custom-scripts')

<script>

</script>

@endsection