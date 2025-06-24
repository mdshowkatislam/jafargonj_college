@extends('frontend.landing')
@php
    $page_title = 'Vice Chancellor List';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<style></style>

 <!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Course Info -->
                <div class="col-md-12">

                    <div class="top-author">
                        <div class="author-items"
                            style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17);">

                            <div class="col-sm-12 text-center">
                                <h3>List of Vice Chancellors</h3>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table-list" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">1
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="{{asset('frontend/images/all-vc/1. Sir Philip Joseph Hartog.jpg')}}" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Sir. P.J. Hartog</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.12.1920 to 31.12.1925</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">2
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="{{asset('frontend/images/all-vc/2.G_h_Langley-min.original.jpg')}}" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor G.H.Langley</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.01.1926 to 30.06.1934</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">3
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/3. Sir_A_F_Rahman-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Sir. A. F. Rahman</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.07.1934 to 31.12.1936</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">4
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/4. Dr_R_C_majumder-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. R. C. Majumder</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.01.1937 to 30.06.1942</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">5
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/5. Dr_Mahmud_Hasan-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Mahmud Hasan</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.07.1942 to 21.10.1948</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">6
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/6. Dr_S_M__Hossain-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. S. M. Hossain</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        22.10.1948 to 08.11.1953</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">7
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/7. Dr__W_A_Jenkins-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. W.A.Jenkins</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        09.11.1953 to 08.11.1956</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">8
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/8. justice_Muhammad_Ibrahim-min.original_aFROAYK.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Justice Muhammad Ibrahim</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        09.11.1956 to 27.10.1958</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">9
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/9. Justice__Hamoodur_Rahman-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Justice Hamoodur Rahman</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        05.11.1958 to 14.12.1960</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">10
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/10. Dr_Mahmud_Husain-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Mahmud Husain</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        15.12.1960 to 19.02.1963</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">11
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/11. Dr_Md_Osman_Ghani-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Md. Osman Ghani</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        20.02.1963 to 01.12.1969</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">12
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/12. Dr_Abu_Syed_Chaudhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Justice Abu Syed Chowdhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        02.12.1969 to 20.01.1972</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">13
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/13. Dr_Muzaffar_Ahmed_Chaudhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Muzaffar Ahmed Chowdhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        21.01.1972 to 12.04.1973</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">14
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/14. Dr_Abdul_Matin_Chaudhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr Abdul Matin Chaudhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        13.04.1973 to 22.09.1975</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">15
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/15. Dr_Muhammad_Shams-Ul_Huq-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Muhammad Shams-ul Huq </td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        23.09.1975 to 01.02.1976</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">16
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/16. Dr_Fazlul_Halim_Chowdhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Fazlul Halim Chowdhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        02.02.1976 to 20.03.1983</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">17
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/17. Dr_A_K_M_Siddiq-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr.A.K.M.Siddiq</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        21.03.1983 to 16.08.1983</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">18
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/18. Dr_Md_Shamsul_Huq-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Dr. Md. Shamsul Huq</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        17.08.1983 to 12.01.1986</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">19
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/19. Dr_Abdul_Mannan-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Abdul Mannan</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        12.01.1986 to 22.03.1990</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">20
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/20. Dr_M_Maniruzzaman_Miah-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor M. Maniruzzaman Miah</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        24.03.1990 to 31.10.1992</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">21
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/21. Dr_Emajuddin_Ahamed-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Emajuddin Ahamed</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.11.1992 to 31.08.1996</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">22
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/22. Dr_Shahid_Uddin_Ahmad-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Shahid Uddin Ahmad</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        31.08.1996 to 29.09.1996</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">23
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/23. Dr_A_K_Azad_Chowdhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor A. K. Azad Chowdhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        30.09.1996 to 12.11.2001</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">24
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/24. Dr_Anwarullah_Chowdhury-min.original.jpg"
                                            alt="Thumb" class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Anwarullah Chowdhury</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        12.11.2001 to 31.07.2002</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">25
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/25. AFM-yusuf.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor A.F.M. Yusuf Haider</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        01.08.2002 to 23.09.2002</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">26
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/26. Dr_S_M_A_Faiz-min.original.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor S. M. A. Faiz</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        23.09.2002 to 16.01.2009</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">27
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/27. AAMS-arefin_c9GK1iM.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor A A M S Arefin Siddique</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        17.01.2009 to 05.09.2017</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">28
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/28. MD-akhtarujjaman.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Professor Dr. Md. Akhtaruzzaman</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        06.09.2017 to 03.11.2023</td>

                                </tr>
                                <tr>
                                    <td class="width-5per shadowLevel2 text-center vertical-align-middle">29
                                    </td>
                                    <td class="width-10per" style="text-align: center"> <img
                                            src="./assets/img/all-vc/29th_Maksud_Kamal.jpg" alt="Thumb"
                                            class="img-thumbnail min-height-100px" height="60" width="60">
                                    </td>
                                    <td class="vertical-align-middle shadowLevel2">
                                        Prof. Dr. A. S. M. Maksud Kamal</td>
                                    <td class="font-size-18px vertical-align-middle" style="text-align:center">
                                        Since 04.11.2023 to ---</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End content ============================================= -->

@endsection







