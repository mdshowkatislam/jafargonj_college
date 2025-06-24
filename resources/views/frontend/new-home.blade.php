@extends('frontend.layouts.master-landing')

@php
    $page_title = 'Home Page';
@endphp

@section('title')
    {{ $page_title }}
@endsection

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
                        $col_1 = 'col-xl-3 col-lg-3 col-md-4 col-sm-12';
                        $col_2 = 'col-xl-9 col-lg-9 col-md-8 col-sm-12';
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

<section class="custom-font-titillium-web {{ @$section_layout }}" data-aos="{{ @$section_fade }}" style="{{ @$cssPreview }} {{ @$section->custom_css}}">
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
                            <span class="custom-font-titillium-web">{!! @$component->long_descriptions !!}</span>

                            @if(@$component->long_details_descriptions)
                                <a href="/single-page/{{ $component->id }}">[<u>Read more</u>]</a>
                            @endif 

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
                                    @if($component->image_class != 'banner')
                                        <img src="{{ asset('upload/themes/'.$component->files) }}" class="image-{{ $component->id }}" alt="Butex">
                                    @endif
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
                        {{-- @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')        --}}
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_media')
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
                            @include('frontend.preview.components.mision_vission')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @elseif($component_id == 'c41')
                            @include('frontend.preview.components.result')
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
                    <span class="custom-font-titillium-web">{!! @$component2->long_descriptions !!}</span>

                    @if(@$component2->long_details_descriptions)
                        <a href="/single-page/{{ $component2->id }}">[<u>Read more</u>]</a>
                    @endif 

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
                            @if($component2->image_class != 'banner')
                                <img src="{{ asset('upload/themes/'.$component2->files) }}" class="image-{{ $component2->id }}" alt="Butex">
                            @endif
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
                        @include('frontend.partials.latest_news')  
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
                    {{-- @elseif($component_id == 'c12')
                        @include('frontend.preview.components.apa')        --}}
                    @elseif($component_id == 'c13')
                        @include('frontend.preview.components.faculty_slider')          
                    @elseif($component_id == 'c14')
                        @include('frontend.preview.components.google_map')
                    @elseif($component_id == 'c15')
                        @include('frontend.preview.components.research_media')
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
                        @include('frontend.preview.components.mision_vission')
                    @elseif($component_id == 'c40')
                        @include('frontend.preview.components.club_moderator')
                    @elseif($component_id == 'c41')
                        @include('frontend.preview.components.result')
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
               // $component_layout = $json_class3['layout'];
                //$component_fade   = $json_class3['fade'];
            @endphp

            <div class="{{ @$json_class3['layout'] }}" data-aos="{{ @$json_class3['fade'] }}" style="{{ @$component3->cssPreview }} {{ @$component3->custom_css}}">
                @if (@$component_type == '0')
                    <div>
                    <span class="custom-font-titillium-web">{!! @$component3->long_descriptions !!}</span>

                    @if(@$component3->long_details_descriptions)
                        <a href="/single-page/{{ $component3->id }}">[<u>Read more</u>]</a>
                    @endif 
                    
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
                                @if($component3->image_class != 'banner')
                                    <img src="{{ asset('upload/themes/'.$component3->files) }}" class="image-{{ $component3->id }}" alt="Butex">
                                @endif
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
                            @include('frontend.partials.latest_news')  
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
                        {{-- @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')        --}}
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_media')
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
                            @include('frontend.preview.components.mision_vission')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @elseif($component_id == 'c41')
                            @include('frontend.preview.components.result')
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
               // $component_fade   = $json_class4['fade'];
            @endphp
            <div class="{{ @$json_class4['layout'] }}" data-aos="{{ @$json_class4['fade'] }}" style="{{ @$component4->cssPreview }} {{ @$component4->custom_css}}">
                @if ($component_type == '0')
                    <div>
                        <span class="custom-font-titillium-web">{!! @$component4->long_descriptions !!}</span>

                        @if(@$component4->long_details_descriptions)
                            <a href="/single-page/{{ $component4->id }}">[<u>Read more</u>]</a>
                        @endif 

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
                                @if($component4->image_class != 'banner')
                                <   img src="{{ asset('upload/themes/'.$component4->files) }}" class="image-{{ $component4->id }}" alt="Butex">
                                @endif
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
                            @include('frontend.partials.latest_news')  
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
                        {{-- @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')        --}}
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_media')
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
                            @include('frontend.preview.components.mision_vission')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @elseif($component_id == 'c41')
                            @include('frontend.preview.components.result')
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
                        <span class="custom-font-titillium-web">{!! @$component5->long_descriptions !!}</span>

                        @if(@$component5->long_details_descriptions)
                            <a href="/single-page/{{ $component5->id }}">[<u>Read more</u>]</a>
                        @endif 

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
                                @if($component5->image_class != 'banner')
                                    <img src="{{ asset('upload/themes/'.$component5->files) }}" class="image-{{ $component5->id }}" alt="Butex">
                                @endif
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
                            @include('frontend.partials.latest_news')  
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
                        {{-- @elseif($component_id == 'c12')
                            @include('frontend.preview.components.apa')        --}}
                        @elseif($component_id == 'c13')
                            @include('frontend.preview.components.faculty_slider')          
                        @elseif($component_id == 'c14')
                            @include('frontend.preview.components.google_map')
                        @elseif($component_id == 'c15')
                            @include('frontend.preview.components.research_media')
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
                            @include('frontend.preview.components.mision_vission')
                        @elseif($component_id == 'c40')
                            @include('frontend.preview.components.club_moderator')
                        @elseif($component_id == 'c41')
                            @include('frontend.preview.components.result')
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
                        <span class="custom-font-titillium-web">{!! @$component6->long_descriptions !!}</span>

                        @if(@$component6->long_details_descriptions)
                            <a href="/single-page/{{ $component6->id }}">[<u>Read more</u>]</a>
                        @endif 

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
                                @if($component6->image_class != 'banner')
                                    <img src="{{ asset('upload/themes/'.$component6->files) }}" class="image-{{ $component6->id }}" alt="Butex">
                                @endif
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
                        @include('frontend.partials.latest_news')  
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
                    {{-- @elseif($component_id == 'c12')
                        @include('frontend.preview.components.apa')        --}}
                    @elseif($component_id == 'c13')
                        @include('frontend.preview.components.faculty_slider')          
                    @elseif($component_id == 'c14')
                        @include('frontend.preview.components.google_map')
                    @elseif($component_id == 'c15')
                        @include('frontend.preview.components.research_media')
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
                        @include('frontend.preview.components.mision_vission')
                    @elseif($component_id == 'c40')
                        @include('frontend.preview.components.club_moderator')
                    @elseif($component_id == 'c41')
                        @include('frontend.preview.components.result')
                    @endif
                @endif
            </div>

        </div>
        @endif
    </div>
    @if (@$modal)
        @include('frontend.partials.modal.view')
    @endif
</section>
@endforeach

<style>
    #time {
        display: flex;
        gap: 20px;
    }

    #time .circle {
        position: relative;
        width: 90px;
        height: 90px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #time .circle svg {
        position: relative;
        width: 90px;
        height: 90px;
        transform: rotate(270deg);
    }

    #time .circle svg circle {
        width: 100%;
        height: 100%;
        fill: transparent;
        stroke: #191919;
        stroke-width: 8;
        transform: translate(5px, 5px);
    }

    #time .circle svg circle:nth-child(2) {
        stroke: var(--clr);
        stroke-dasharray: 252;
    }

    #time div {
        position: absolute;
        text-align: center;
        font-weight: bold;
        font-size: 1.4em;
        margin-top: 25px;
    }

    .title {
        font-size: 14px !important;
        margin-top: -30px !important;
    }

    @media screen and (max-width: 992px) {
        #time {
            flex-direction: row;
            align-items: center;
            gap: 0px;
            justify-content: center;
        }

        #time .ap {
            font-size: 1.5em;
            transform: translateX(40px);
        }
    }


    /*! CSS Used from: /css/app.css */
    *,
    :after,
    :before {
        box-sizing: border-box;
    }


    a {
        color: #1d7099;
        text-decoration: none;
        background-color: transparent;
    }


    a:hover {
        color: #00c5bf;
        text-decoration: underline;
    }

    @media print {

        *,
        :after,
        :before {
            text-shadow: none !important;
            box-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }
    }

    /*! CSS Used from: /css/styles1.css */
    marquee a {
        color: #fff !important;
        font-size: 13px;
        font-weight: 600;
    }

    /*! CSS Used from: /css/styles1_responsive.css */
    @media screen and (max-width:1023px) {
        a {
            font-size: 13px;
        }

        marquee {
            margin-top: 6px;
        }
    }


    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    a:active,
    a:hover {
        outline-width: 0;
    }


    .owl-carousel {
        height: auto;
    }

    .owl-theme .owl-nav {
        margin-top: 0px !important;
        display: none !important;
    }

    .researchCarousel .owl-item {
        height: 34.5rem !important;
    }



    @media only screen and (min-width: 1399px) {
        #about-section {
            padding-bottom: 4rem;
        }
    }

    .card {
        border: 2px solid #dddddd;
        background-color: #f5f5f5;
    }

    table,
    th,
    td {
        border: 0px solid !important;
    }

    li {
        font-size: 15px;
    }

    strong {
        font-size: 18px;
        color: #00c5bf;
    }

    a {
        color: black;
    }


    ul li::before {
        color: #00c5bf;
    }

    .my_icon::marker {
        color: #a50d0d;
        content: "►";
    }

    .text-color-one {
        color: #00c5bf;
    }

    .home-content-heading {
        color: #002147;
        font-size: 1.75rem !important;
        text-shadow: 0px 3px 4px rgb(0 0 0 / 25%);
        /* font-family: "Work Sans"; */
        font-style: normal;
        font-weight: 600;

        /* line-height: 123.6%; */
        element.style {
            height: 4px;
        }

        .fun-factor-area .fun-fact {
            font-size: 25px !important;
            line-height: 1 !important;
            letter-spacing: 0.6px !important;
            font-weight: 700 !important;
        }

        h1,
        h2,
        h3,
        h4 {
            margin-bottom: 15px;
            font-size: 18px !important;
        }

    }
</style>

<script>
   function time() {
        var second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let dd = document.getElementById("dd");
        let hh = document.getElementById("hh");
        let mm = document.getElementById("mm");
        // let ss = document.getElementById("ss");
        //upper section used for circle anim id call

        let day_dot = document.querySelector(".day_dot");
        let hr_dot = document.querySelector(".hr_dot");
        let min_dot = document.querySelector(".min_dot");
        let sec_dot = document.querySelector(".sec_dot");
        //upper section used for circle anim dots class call


        var second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;
        var time = @json($time);
        var countDown = new Date(time).getTime(),
            x = setInterval(function() {

                var now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById('days').innerText = Math.floor(distance / (day)),
                    document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute));
                // document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                var d = Math.floor(distance / (day));
                var h = Math.floor((distance % (day)) / (hour));
                var m = Math.floor((distance % (hour)) / (minute));


                dd.style.strokeDashoffset = 252 - (252 * d) / 100;
                hh.style.strokeDashoffset = 252 - (252 * h) / 24;
                mm.style.strokeDashoffset = 252 - (252 * m) / 60;
                // ss.style.strokeDashoffset = 252 - (252 * s) / 60;

            }, second)
    }
    let run = setInterval(time, 1000); 
</script>
<script>
    $(document).ready(function() {
        $('.research-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })

        $('.video-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })

    });
</script>


@endsection


