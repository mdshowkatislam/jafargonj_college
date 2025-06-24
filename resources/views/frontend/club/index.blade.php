@php
    $page_title = $club->name;
    $url=request()->route()->getName();
@endphp

@section('title')
    {{ $page_title }}
@endsection

@extends('frontend.club.landing')

@section('content')
 
@foreach (@$sections as $key => $section)
                @php
                    $json_class      = json_decode($section->custom_class, true);
                    $section_layout  = $json_class['layout'];
                    $section_fade    = $json_class['fade'];
                    $cssPreview      = $section->cssPreview;

                    $data = @$section->number_of_column;
                      $col_1 = ''; $col_2 = ''; $col_3 = ''; $col_4 = ''; $col_5 = ''; $col_6 = '';
                      if($data === '01'){
                        $col_1 = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 px-0';
                        $col_2 = 'd-none';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '02') {
                        $col_1 = 'col-xl-2 col-lg-3 col-md-6 col-sm-12';
                        $col_2 = 'col-xl-10 col-lg-9 col-md-6 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '03') {
                        $col_1 = 'col-xl-3 col-lg-4 col-md-6 col-sm-12';
                        $col_2 = 'col-xl-9 col-lg-8 col-md-6 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '04') {
                        $col_1 = 'col-xl-4 col-lg-5 col-md-6 col-sm-12';
                        $col_2 = 'col-xl-8 col-lg-7 col-md-6 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '05') {
                        $col_1 = 'col-xl-5 col-lg-6 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-7 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '06') {
                        $col_1 = 'col-xl-6 col-lg-6 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-6 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '07') {
                        $col_1 = 'col-xl-10 col-lg-8 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-2 col-lg-4 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '08') {
                        $col_1 = 'col-xl-9 col-lg-8 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-3 col-lg-4 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '09') {
                        $col_1 = 'col-xl-8 col-lg-6 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-4 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '10') {
                        $col_1 = 'col-xl-7 col-lg-6 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-7 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'd-none';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '11') {
                        $col_1 = 'col-xl-4 col-lg-6 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-4 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'col-xl-4 col-lg-6 col-md-12 col-sm-12';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '12') {
                        $col_1 = 'col-xl-3 col-lg-4 col-md-6 col-sm-12';
                        $col_2 = 'col-xl-3 col-lg-4 col-md-6 col-sm-12';
                        $col_3 = 'col-xl-3 col-lg-4 col-md-6 col-sm-12';
                        $col_4 = 'col-xl-3 col-lg-4 col-md-6 col-sm-12';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                      }elseif($data === '13') {
                        $col_1 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                        $col_2 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                        $col_3 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                        $col_4 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                        $col_5 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                        $col_6 = 'col-xl-2 col-lg-4 col-md-6 col-sm-12';
                    }elseif($data === '14') {
                        $col_1 = 'col-xl-3 col-lg-3 col-md-12 col-sm-12';
                        $col_2 = 'col-xl-6 col-lg-6 col-md-12 col-sm-12';
                        $col_3 = 'col-xl-3 col-lg-3 col-md-12 col-sm-12';
                        $col_4 = 'd-none';
                        $col_5 = 'd-none';
                        $col_6 = 'd-none';
                    }
                @endphp

<section class="{{ @$section_layout }}" data-aos="{{ @$section_fade }}" style="{{ @$cssPreview }} {{ @$section->custom_css}}">
    <div class="row">
        @if (!empty(@$section->col1_name))
            <div class="{{ @$col_1 }}">
                @php
                    $component = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '1')->latest()->first();
                    $component_type   = @$component->component_type;
                    $component_id     = @$component->component_id;
                    $json_class1      = json_decode(@$component->custom_class, true);
                    //$component_layout = $json_class1['layout'];
                    //$component_fade   = $json_class1['fade'];
                @endphp

                <div class="{{ @$json_class1['layout'] }}" data-aos="{{ @$json_class1['fade'] }}" style="{{ @$component->cssPreview }} {{ @$component->custom_css}}">
                    @if ($component_type == '0')
                        <div>
                            {!! @$component->long_descriptions !!}
                            @if (!empty($component->files) && file_exists(public_path('upload/themes/'.$component->files)))
                                <style>
                                    .image-{{ $component->id }}{
                                        {{ @$component->image_style }}
                                    }
                                    @media only screen and (max-width: 600px) {
                                        .image-{{ $component->id }}{
                                            {{ @$component->image_style2 }}
                                        }
                                    }
                                </style>
                                <div class="{{ @$component->image_class }}">
                                    <img src="{{ asset('upload/themes/'.$component->files) }}" class="image-{{ $component->id }}" alt="Butex">
                                </div>
                            @endif
                        </div>
                    @elseif($component_type == '1')
                        @php
                            $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                            if(!empty(@$formTemplate->form_data)){
                            $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                            }
                        @endphp
                        @if(!empty($formTemplate->form_data))
                            @include('frontend.preview.components.form_template')
                        @endif
                    @elseif($component_type == '2')
                        @if ($component_id == 'c1')
                            @include('frontend.preview.components.slider')
                        @elseif($component_id == 'c2')
                            @include('frontend.preview.components.vc_profile')
                        @elseif($component_id == 'c3')
                            @include('frontend.preview.components.vc_message')
                        @elseif($component_id == 'c4')
                            @include('frontend.preview.components.welcome_message')
                        @elseif($component_id == 'c5')
                            @include('frontend.preview.components.welcome_video')
                        @elseif($component_id == 'c6')
                            @include('frontend.preview.components.latest_news')  
                        @elseif($component_id == 'c7')
                            @include('frontend.preview.components.events_notice')  
                        @elseif($component_id == 'c8')
                            @include('frontend.preview.components.events')  
                        @elseif($component_id == 'c9')
                            @include('frontend.preview.components.notice')
                        @elseif($component_id == 'c10')
                            @include('frontend.preview.components.research_activities')
                        @elseif($component_id == 'c11')
                            @include('frontend.preview.components.video_activities')
                        @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')       
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_news')
                        @elseif($component_id == 'c16')
                            @include('frontend.preview.components.contact_us')
                        @elseif($component_id == 'c17')
                            @include('frontend.preview.components.at_a_glance')
                        @elseif($component_id == 'c18')
                            @include('frontend.preview.components.dean_profile')
                        @elseif($component_id == 'c19')
                            @include('frontend.preview.components.about_faculty')
                        @elseif($component_id == 'c20')
                            @include('frontend.preview.components.about_department')
                        @elseif($component_id == 'c21')
                            @include('frontend.preview.components.faculty_member')
                        @elseif($component_id == 'c22')
                            @include('frontend.preview.components.faculty_notice')
                        @elseif($component_id == 'c23')
                            @include('frontend.preview.components.department_notice')
                        @elseif($component_id == 'c24')
                            @include('frontend.preview.components.office_notice')
                        @elseif($component_id == 'c25')
                            @include('frontend.preview.components.departments')
                        @elseif($component_id == 'c26')
                            @include('frontend.preview.components.program')
                        @elseif($component_id == 'c27')
                            @include('frontend.preview.components.laboratory')
                        @elseif($component_id == 'c28')
                            @include('frontend.preview.components.clubs')
                        @elseif($component_id == 'c29')
                            @include('frontend.preview.components.officers')
                        @elseif($component_id == 'c30')
                            @include('frontend.preview.components.message_from_chaorman')
                        @elseif($component_id == 'c31')
                            @include('frontend.preview.components.academic_program')
                        @elseif($component_id == 'c32')
                            @include('frontend.preview.components.office_banner')
                        @elseif($component_id == 'c33')
                            @include('frontend.preview.components.all_officer')
                        @elseif($component_id == 'c34')
                            @include('frontend.preview.components.club_overview')
                        @elseif($component_id == 'c35')
                            @include('frontend.preview.components.about_club')
                        @elseif($component_id == 'c36')
                            @include('frontend.preview.components.club_activities')
                        @elseif($component_id == 'c37')
                            @include('frontend.preview.components.album')
                        @elseif($component_id == 'c38')
                            @include('frontend.preview.components.club_team_member')
                        @elseif($component_id == 'c39')
                            @include('frontend.preview.components.club_member')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @endif
                    @endif
                </div>
            </div>
        @endif

        @if (!empty(@$section->col2_name))
        <div class="{{ @$col_2 }}">
            @php
                $component2 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '2')->latest()->first();
                $component_type   = @$component2->component_type;
                $component_id     = @$component2->component_id;
                $json_class2      = json_decode(@$component2->custom_class, true);
                //$component_layout = $json_class2['layout'];
                //$component_fade   = $json_class2['fade'];
            @endphp

            <div class="{{ @$json_class2['layout'] }}" data-aos="{{ @$json_class2['fade'] }}" style="{{ @$component2->cssPreview }} {{ @$component2->custom_css}}">
                @if ($component_type == '0')
                <div>
                    {!! @$component2->long_descriptions !!}
                    @if (!empty($component2->files) && file_exists(public_path('upload/themes/'.$component2->files)))
                        <style>
                            .image-{{ $component2->id }}{
                                {{ @$component2->image_style }}
                            }
                            @media only screen and (max-width: 600px) {
                                .image-{{ $component2->id }}{
                                    {{ @$component2->image_style2 }}
                                }
                            }
                        </style>
                        <div class="{{ @$component2->image_class }}">
                            <img src="{{ asset('upload/themes/'.$component2->files) }}" class="image-{{ $component2->id }}" alt="Butex">
                        </div>
                    @endif
                </div>
                @elseif($component_type == '1')
                    @php
                        $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                        if(!empty(@$formTemplate->form_data)){
                        $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                        }
                    @endphp
                    @if(!empty($formTemplate->form_data))
                        @include('frontend.preview.components.form_template')
                    @endif
                @elseif($component_type == '2')
                    @if ($component_id == 'c1')
                        @include('frontend.preview.components.slider')
                    @elseif($component_id == 'c2')
                        @include('frontend.preview.components.vc_profile')
                    @elseif($component_id == 'c3')
                        @include('frontend.preview.components.vc_message')
                    @elseif($component_id == 'c4')
                        @include('frontend.preview.components.welcome_message')
                    @elseif($component_id == 'c5')
                        @include('frontend.preview.components.welcome_video')
                    @elseif($component_id == 'c6')
                        @include('frontend.preview.components.latest_news')  
                    @elseif($component_id == 'c7')
                        @include('frontend.preview.components.events_notice')  
                    @elseif($component_id == 'c8')
                        @include('frontend.preview.components.events')  
                    @elseif($component_id == 'c9')
                        @include('frontend.preview.components.notice')
                    @elseif($component_id == 'c10')
                        @include('frontend.preview.components.research_activities')
                    @elseif($component_id == 'c11')
                        @include('frontend.preview.components.video_activities')
                    @elseif($component_id == 'c12')
                        @include('frontend.preview.components.apa')       
                    @elseif($component_id == 'c13')
                        @include('frontend.preview.components.faculty_slider')          
                    @elseif($component_id == 'c14')
                        @include('frontend.preview.components.google_map')
                    @elseif($component_id == 'c15')
                        @include('frontend.preview.components.research_news')
                    @elseif($component_id == 'c16')
                        @include('frontend.preview.components.contact_us')
                    @elseif($component_id == 'c17')
                        @include('frontend.preview.components.at_a_glance')
                    @elseif($component_id == 'c18')
                        @include('frontend.preview.components.dean_profile')
                    @elseif($component_id == 'c19')
                        @include('frontend.preview.components.about_faculty')
                    @elseif($component_id == 'c20')
                        @include('frontend.preview.components.about_department')
                    @elseif($component_id == 'c21')
                        @include('frontend.preview.components.faculty_member')
                    @elseif($component_id == 'c22')
                        @include('frontend.preview.components.faculty_notice')
                    @elseif($component_id == 'c23')
                        @include('frontend.preview.components.department_notice')
                    @elseif($component_id == 'c24')
                        @include('frontend.preview.components.office_notice')
                    @elseif($component_id == 'c25')
                        @include('frontend.preview.components.departments')
                    @elseif($component_id == 'c26')
                        @include('frontend.preview.components.program')
                    @elseif($component_id == 'c27')
                        @include('frontend.preview.components.laboratory')
                    @elseif($component_id == 'c28')
                        @include('frontend.preview.components.clubs')
                    @elseif($component_id == 'c29')
                        @include('frontend.preview.components.officers')
                    @elseif($component_id == 'c30')
                        @include('frontend.preview.components.message_from_chaorman')
                    @elseif($component_id == 'c31')
                        @include('frontend.preview.components.academic_program')
                    @elseif($component_id == 'c32')
                        @include('frontend.preview.components.office_banner')
                    @elseif($component_id == 'c33')
                        @include('frontend.preview.components.all_officer')
                    @elseif($component_id == 'c34')
                        @include('frontend.preview.components.club_overview')
                    @elseif($component_id == 'c35')
                        @include('frontend.preview.components.about_club')
                    @elseif($component_id == 'c36')
                        @include('frontend.preview.components.club_activities')
                    @elseif($component_id == 'c37')
                        @include('frontend.preview.components.album')
                    @elseif($component_id == 'c38')
                        @include('frontend.preview.components.club_team_member')
                    @elseif($component_id == 'c39')
                        @include('frontend.preview.components.club_member')
                    @elseif($component_id == 'c40')
                        @include('frontend.preview.components.club_moderator')
                    @endif
                @endif
            </div>
        </div>
        @endif

        @if (!empty(@$section->col3_name))
        <div class="{{ @$col_3 }}">
            @php
                $component3 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '3')->latest()->first();
                $component_type   = @$component3->component_type;
                $component_id     = @$component3->component_id;
                $json_class3      = json_decode(@$component3->custom_class, true);
                //$component_layout = $json_class3['layout'];
                //$component_fade   = $json_class3['fade'];
            @endphp

            <div class="{{ @$json_class3['layout'] }}" data-aos="{{ @$json_class3['fade'] }}" style="{{ @$component3->cssPreview }} {{ @$component3->custom_css}}">
                @if ($component_type == '0')
                    <div>
                        {!! @$component3->long_descriptions !!}
                        @if (!empty($component3->files) && file_exists(public_path('upload/themes/'.$component3->files)))
                            <style>
                                .image-{{ $component3->id }}{
                                    {{ @$component3->image_style }}
                                }
                                @media only screen and (max-width: 600px) {
                                    .image-{{ $component3->id }}{
                                        {{ @$component3->image_style2 }}
                                    }
                                }
                            </style>
                            <div class="{{ @$component3->image_class }}">
                                <img src="{{ asset('upload/themes/'.$component3->files) }}" class="image-{{ $component3->id }}" alt="Butex">
                            </div>
                        @endif
                    </div>
                    @elseif($component_type == '1')
                        @php
                            $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                            if(!empty(@$formTemplate->form_data)){
                            $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                            }
                        @endphp
                        @if(!empty($formTemplate->form_data))
                            @include('frontend.preview.components.form_template')
                        @endif
                    @elseif($component_type == '2')
                        @if ($component_id == 'c1')
                            @include('frontend.preview.components.slider')
                        @elseif($component_id == 'c2')
                            @include('frontend.preview.components.vc_profile')
                        @elseif($component_id == 'c3')
                            @include('frontend.preview.components.vc_message')
                        @elseif($component_id == 'c4')
                            @include('frontend.preview.components.welcome_message')
                        @elseif($component_id == 'c5')
                            @include('frontend.preview.components.welcome_video')
                        @elseif($component_id == 'c6')
                            @include('frontend.preview.components.latest_news')  
                        @elseif($component_id == 'c7')
                            @include('frontend.preview.components.events_notice')  
                        @elseif($component_id == 'c8')
                            @include('frontend.preview.components.events')  
                        @elseif($component_id == 'c9')
                            @include('frontend.preview.components.notice')
                        @elseif($component_id == 'c10')
                            @include('frontend.preview.components.research_activities')
                        @elseif($component_id == 'c11')
                            @include('frontend.preview.components.video_activities')
                        @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')       
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_news')
                        @elseif($component_id == 'c16')
                            @include('frontend.preview.components.contact_us')
                        @elseif($component_id == 'c17')
                            @include('frontend.preview.components.at_a_glance')
                        @elseif($component_id == 'c18')
                            @include('frontend.preview.components.dean_profile')
                        @elseif($component_id == 'c19')
                            @include('frontend.preview.components.about_faculty')
                        @elseif($component_id == 'c20')
                            @include('frontend.preview.components.about_department')
                        @elseif($component_id == 'c21')
                            @include('frontend.preview.components.faculty_member')
                        @elseif($component_id == 'c22')
                            @include('frontend.preview.components.faculty_notice')
                        @elseif($component_id == 'c23')
                            @include('frontend.preview.components.department_notice')
                        @elseif($component_id == 'c24')
                            @include('frontend.preview.components.office_notice')
                        @elseif($component_id == 'c25')
                            @include('frontend.preview.components.departments')
                        @elseif($component_id == 'c26')
                            @include('frontend.preview.components.program')
                        @elseif($component_id == 'c27')
                            @include('frontend.preview.components.laboratory')
                        @elseif($component_id == 'c28')
                            @include('frontend.preview.components.clubs')
                        @elseif($component_id == 'c29')
                            @include('frontend.preview.components.officers')
                        @elseif($component_id == 'c30')
                            @include('frontend.preview.components.message_from_chaorman')
                        @elseif($component_id == 'c31')
                            @include('frontend.preview.components.academic_program')
                        @elseif($component_id == 'c32')
                            @include('frontend.preview.components.office_banner')
                        @elseif($component_id == 'c33')
                            @include('frontend.preview.components.all_officer')
                        @elseif($component_id == 'c34')
                            @include('frontend.preview.components.club_overview')
                        @elseif($component_id == 'c35')
                            @include('frontend.preview.components.about_club')
                        @elseif($component_id == 'c36')
                            @include('frontend.preview.components.club_activities')
                        @elseif($component_id == 'c37')
                            @include('frontend.preview.components.album')
                        @elseif($component_id == 'c38')
                            @include('frontend.preview.components.club_team_member')
                        @elseif($component_id == 'c39')
                            @include('frontend.preview.components.club_member')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @endif
                    @endif
            </div>
        </div>
        @endif

        @if (!empty(@$section->col4_name))
        <div class="{{ @$col_4 }}">
            @php
                $component4 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '4')->latest()->first();
                $component_type   = @$component4->component_type;
                $component_id     = @$component4->component_id;
                $json_class4      = json_decode(@$component4->custom_class, true);
                //$component_layout = $json_class4['layout'];
                //$component_fade   = $json_class4['fade'];
            @endphp
            <div class="{{ @$json_class4['layout'] }}" data-aos="{{ @$json_class4['fade'] }}" style="{{ @$component4->cssPreview }} {{ @$component4->custom_css}}">
                @if ($component_type == '0')
                    <div>
                        {!! @$component4->long_descriptions !!}
                        @if (!empty($component4->files) && file_exists(public_path('upload/themes/'.$component4->files)))
                            <style>
                                .image-{{ $component4->id }}{
                                    {{ @$component4->image_style }}
                                }
                                @media only screen and (max-width: 600px) {
                                    .image-{{ $component4->id }}{
                                        {{ @$component4->image_style2 }}
                                    }
                                }
                            </style>
                            <div class="{{ @$component4->image_class }}">
                                <img src="{{ asset('upload/themes/'.$component4->files) }}" class="image-{{ $component4->id }}" alt="Butex">
                            </div>
                        @endif
                    </div>
                    @elseif($component_type == '1')
                        @php
                            $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                            if(!empty(@$formTemplate->form_data)){
                            $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                            }
                        @endphp
                        @if(!empty($formTemplate->form_data))
                            @include('frontend.preview.components.form_template')
                        @endif
                    @elseif($component_type == '2')
                        @if ($component_id == 'c1')
                            @include('frontend.preview.components.slider')
                        @elseif($component_id == 'c2')
                            @include('frontend.preview.components.vc_profile')
                        @elseif($component_id == 'c3')
                            @include('frontend.preview.components.vc_message')
                        @elseif($component_id == 'c4')
                            @include('frontend.preview.components.welcome_message')
                        @elseif($component_id == 'c5')
                            @include('frontend.preview.components.welcome_video')
                        @elseif($component_id == 'c6')
                            @include('frontend.preview.components.latest_news')  
                        @elseif($component_id == 'c7')
                            @include('frontend.preview.components.events_notice')  
                        @elseif($component_id == 'c8')
                            @include('frontend.preview.components.events')  
                        @elseif($component_id == 'c9')
                            @include('frontend.preview.components.notice')
                        @elseif($component_id == 'c10')
                            @include('frontend.preview.components.research_activities')
                        @elseif($component_id == 'c11')
                            @include('frontend.preview.components.video_activities')
                        @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')       
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_news')
                        @elseif($component_id == 'c16')
                            @include('frontend.preview.components.contact_us')
                        @elseif($component_id == 'c17')
                            @include('frontend.preview.components.at_a_glance')
                        @elseif($component_id == 'c18')
                            @include('frontend.preview.components.dean_profile')
                        @elseif($component_id == 'c19')
                            @include('frontend.preview.components.about_faculty')
                        @elseif($component_id == 'c20')
                            @include('frontend.preview.components.about_department')
                        @elseif($component_id == 'c21')
                            @include('frontend.preview.components.faculty_member')
                        @elseif($component_id == 'c22')
                            @include('frontend.preview.components.faculty_notice')
                        @elseif($component_id == 'c23')
                            @include('frontend.preview.components.department_notice')
                        @elseif($component_id == 'c24')
                            @include('frontend.preview.components.office_notice')
                        @elseif($component_id == 'c25')
                            @include('frontend.preview.components.departments')
                        @elseif($component_id == 'c26')
                            @include('frontend.preview.components.program')
                        @elseif($component_id == 'c27')
                            @include('frontend.preview.components.laboratory')
                        @elseif($component_id == 'c28')
                            @include('frontend.preview.components.clubs')
                        @elseif($component_id == 'c29')
                            @include('frontend.preview.components.officers')
                        @elseif($component_id == 'c30')
                            @include('frontend.preview.components.message_from_chaorman')
                        @elseif($component_id == 'c31')
                            @include('frontend.preview.components.academic_program')
                        @elseif($component_id == 'c32')
                            @include('frontend.preview.components.office_banner')
                        @elseif($component_id == 'c33')
                            @include('frontend.preview.components.all_officer')
                        @elseif($component_id == 'c34')
                            @include('frontend.preview.components.club_overview')
                        @elseif($component_id == 'c35')
                            @include('frontend.preview.components.about_club')
                        @elseif($component_id == 'c36')
                            @include('frontend.preview.components.club_activities')
                        @elseif($component_id == 'c37')
                            @include('frontend.preview.components.album')
                        @elseif($component_id == 'c38')
                            @include('frontend.preview.components.club_team_member')
                        @elseif($component_id == 'c39')
                            @include('frontend.preview.components.club_member')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @endif
                    @endif
            </div>

        </div>
        @endif

        @if (!empty(@$section->col5_name))
        <div class="{{ @$col_5 }}">
            @php
                $component5 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '5')->latest()->first();
                $component_type   = @$component5->component_type;
                $component_id     = @$component5->component_id;
                $json_class5      = json_decode(@$component5->custom_class, true);
                //$component_layout = $json_class5['layout'];
                //$component_fade   = $json_class5['fade'];
            @endphp

            <div class="{{ @$json_class5['layout'] }}" data-aos="{{ @$json_class5['fade'] }}" style="{{ @$component5->cssPreview }} {{ @$component5->custom_css}}">
                @if ($component_type == '0')
                    <div>
                        {!! @$component5->long_descriptions !!}
                        @if (!empty($component5->files) && file_exists(public_path('upload/themes/'.$component5->files)))
                            <style>
                                .image-{{ $component5->id }}{
                                    {{ @$component5->image_style }}
                                }
                                @media only screen and (max-width: 600px) {
                                    .image-{{ $component5->id }}{
                                        {{ @$component5->image_style2 }}
                                    }
                                }
                            </style>
                            <div class="{{ @$component5->image_class }}">
                                <img src="{{ asset('upload/themes/'.$component5->files) }}" class="image-{{ $component5->id }}" alt="Butex">
                            </div>
                        @endif
                    </div>
                    @elseif($component_type == '1')
                        @php
                            $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                            if(!empty(@$formTemplate->form_data)){
                            $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                            }
                        @endphp
                        @if(!empty($formTemplate->form_data))
                            @include('frontend.preview.components.form_template')
                        @endif
                    @elseif($component_type == '2')
                        @if ($component_id == 'c1')
                            @include('frontend.preview.components.slider')
                        @elseif($component_id == 'c2')
                            @include('frontend.preview.components.vc_profile')
                        @elseif($component_id == 'c3')
                            @include('frontend.preview.components.vc_message')
                        @elseif($component_id == 'c4')
                            @include('frontend.preview.components.welcome_message')
                        @elseif($component_id == 'c5')
                            @include('frontend.preview.components.welcome_video')
                        @elseif($component_id == 'c6')
                            @include('frontend.preview.components.latest_news')  
                        @elseif($component_id == 'c7')
                            @include('frontend.preview.components.events_notice')  
                        @elseif($component_id == 'c8')
                            @include('frontend.preview.components.events')  
                        @elseif($component_id == 'c9')
                            @include('frontend.preview.components.notice')
                        @elseif($component_id == 'c10')
                            @include('frontend.preview.components.research_activities')
                        @elseif($component_id == 'c11')
                            @include('frontend.preview.components.video_activities')
                        @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')       
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_news')
                        @elseif($component_id == 'c16')
                            @include('frontend.preview.components.contact_us')
                        @elseif($component_id == 'c17')
                            @include('frontend.preview.components.at_a_glance')
                        @elseif($component_id == 'c18')
                            @include('frontend.preview.components.dean_profile')
                        @elseif($component_id == 'c19')
                            @include('frontend.preview.components.about_faculty')
                        @elseif($component_id == 'c20')
                            @include('frontend.preview.components.about_department')
                        @elseif($component_id == 'c21')
                            @include('frontend.preview.components.faculty_member')
                        @elseif($component_id == 'c22')
                            @include('frontend.preview.components.faculty_notice')
                        @elseif($component_id == 'c23')
                            @include('frontend.preview.components.department_notice')
                        @elseif($component_id == 'c24')
                            @include('frontend.preview.components.office_notice')
                        @elseif($component_id == 'c25')
                            @include('frontend.preview.components.departments')
                        @elseif($component_id == 'c26')
                            @include('frontend.preview.components.program')
                        @elseif($component_id == 'c27')
                            @include('frontend.preview.components.laboratory')
                        @elseif($component_id == 'c28')
                            @include('frontend.preview.components.clubs')
                        @elseif($component_id == 'c29')
                            @include('frontend.preview.components.officers')
                        @elseif($component_id == 'c30')
                            @include('frontend.preview.components.message_from_chaorman')
                        @elseif($component_id == 'c31')
                            @include('frontend.preview.components.academic_program')
                        @elseif($component_id == 'c32')
                            @include('frontend.preview.components.office_banner')
                        @elseif($component_id == 'c33')
                            @include('frontend.preview.components.all_officer')
                        @elseif($component_id == 'c34')
                            @include('frontend.preview.components.club_overview')
                        @elseif($component_id == 'c35')
                            @include('frontend.preview.components.about_club')
                        @elseif($component_id == 'c36')
                            @include('frontend.preview.components.club_activities')
                        @elseif($component_id == 'c37')
                            @include('frontend.preview.components.album')
                        @elseif($component_id == 'c38')
                            @include('frontend.preview.components.club_team_member')
                        @elseif($component_id == 'c39')
                            @include('frontend.preview.components.club_member')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @endif
                    @endif
            </div>

        </div>
        @endif

        @if (!empty(@$section->col6_name))
        <div class="{{ @$col_6 }}">
            @php
                $component6 = App\Models\CmsComponent::where('section_id', @$section->rand_id)->where('column_id', '6')->latest()->first();
                $component_type   = @$component6->component_type;
                $component_id     = @$component6->component_id;
                $json_class6      = json_decode(@$component6->custom_class, true);
                //$component_layout = $json_class6['layout'];
                //$component_fade   = $json_class6['fade'];
            @endphp

            <div class="{{ @$json_class6['layout'] }}" data-aos="{{ @$json_class6['fade'] }}" style="{{ @$component6->cssPreview }} {{ @$component6->custom_css}}">
                @if ($component_type == '0')
                    <div>
                        {!! @$component6->long_descriptions !!}
                        @if (!empty($component6->files) && file_exists(public_path('upload/themes/'.$component6->files)))
                            <style>
                                .image-{{ $component6->id }}{
                                    {{ @$component6->image_style }}
                                }
                                @media only screen and (max-width: 600px) {
                                    .image-{{ $component6->id }}{
                                        {{ @$component6->image_style2 }}
                                    }
                                }
                            </style>
                            <div class="{{ @$component6->image_class }}">
                                <img src="{{ asset('upload/themes/'.$component6->files) }}" class="image-{{ $component6->id }}" alt="Butex">
                            </div>
                        @endif
                    </div>
                @elseif($component_type == '1')
                    @php
                        $formTemplate = App\Models\FormTemplate::where('id', @$component_id)->where('status', 'active')->first();
                        if(!empty(@$formTemplate->form_data)){
                        $formTemplate->form_data = json_decode(@$formTemplate->form_data, true);
                        }
                    @endphp
                    @if(!empty($formTemplate->form_data))
                        @include('frontend.preview.components.form_template')
                    @endif
                @elseif($component_type == '2')
                    @if ($component_id == 'c1')
                        @include('frontend.preview.components.slider')
                    @elseif($component_id == 'c2')
                        @include('frontend.preview.components.vc_profile')
                    @elseif($component_id == 'c3')
                        @include('frontend.preview.components.vc_message')
                    @elseif($component_id == 'c4')
                        @include('frontend.preview.components.welcome_message')
                    @elseif($component_id == 'c5')
                        @include('frontend.preview.components.welcome_video')
                    @elseif($component_id == 'c6')
                        @include('frontend.preview.components.latest_news')  
                    @elseif($component_id == 'c7')
                        @include('frontend.preview.components.events_notice')  
                    @elseif($component_id == 'c8')
                        @include('frontend.preview.components.events')  
                    @elseif($component_id == 'c9')
                        @include('frontend.preview.components.notice')
                    @elseif($component_id == 'c10')
                        @include('frontend.preview.components.research_activities')
                    @elseif($component_id == 'c11')
                        @include('frontend.preview.components.video_activities')
                    @elseif($component_id == 'c12')
                        @include('frontend.preview.components.apa')       
                    @elseif($component_id == 'c13')
                        @include('frontend.preview.components.faculty_slider')          
                    @elseif($component_id == 'c14')
                        @include('frontend.preview.components.google_map')
                    @elseif($component_id == 'c15')
                        @include('frontend.preview.components.research_news')
                    @elseif($component_id == 'c16')
                        @include('frontend.preview.components.contact_us')
                    @elseif($component_id == 'c17')
                        @include('frontend.preview.components.at_a_glance')
                    @elseif($component_id == 'c18')
                        @include('frontend.preview.components.dean_profile')
                    @elseif($component_id == 'c19')
                        @include('frontend.preview.components.about_faculty')
                    @elseif($component_id == 'c20')
                        @include('frontend.preview.components.about_department')
                    @elseif($component_id == 'c21')
                        @include('frontend.preview.components.faculty_member')
                    @elseif($component_id == 'c22')
                        @include('frontend.preview.components.faculty_notice')
                    @elseif($component_id == 'c23')
                        @include('frontend.preview.components.department_notice')
                    @elseif($component_id == 'c24')
                        @include('frontend.preview.components.office_notice')
                    @elseif($component_id == 'c25')
                        @include('frontend.preview.components.departments')
                    @elseif($component_id == 'c26')
                        @include('frontend.preview.components.program')
                    @elseif($component_id == 'c27')
                        @include('frontend.preview.components.laboratory')
                    @elseif($component_id == 'c28')
                        @include('frontend.preview.components.clubs')
                    @elseif($component_id == 'c29')
                        @include('frontend.preview.components.officers')
                    @elseif($component_id == 'c30')
                        @include('frontend.preview.components.message_from_chaorman')
                    @elseif($component_id == 'c31')
                        @include('frontend.preview.components.academic_program')
                    @elseif($component_id == 'c32')
                        @include('frontend.preview.components.office_banner')
                    @elseif($component_id == 'c33')
                        @include('frontend.preview.components.all_officer')
                    @elseif($component_id == 'c34')
                        @include('frontend.preview.components.club_overview')
                    @elseif($component_id == 'c35')
                        @include('frontend.preview.components.about_club')
                    @elseif($component_id == 'c36')
                        @include('frontend.preview.components.club_activities')
                    @elseif($component_id == 'c37')
                        @include('frontend.preview.components.album')
                    @elseif($component_id == 'c38')
                        @include('frontend.preview.components.club_team_member')
                    @elseif($component_id == 'c39')
                        @include('frontend.preview.components.club_member')
                    @elseif($component_id == 'c40')
                        @include('frontend.preview.components.club_moderator')
                    @endif
                @endif
            </div>

        </div>
        @endif
    </div> 
</section>

<div class="modal fade" id="imageModalX" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel2">Image Preview</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Selected Image" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection



