@extends('frontend.landing')
@php
    $page_title = 'Honoris Causa';
@endphp
@section('title')
    {{ $page_title }}
@endsection


@section('content')
@include('frontend.partials.sections.banner-cover', ['page_title' => $page_title])

<div class="course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="courses-info">
                    <div class="tab-info">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title text-justify">

                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body text-justify">
                                        <table class="table table-bordered table-hover table-striped"
                                            style="width:100%">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Name of Recipient</th>
                                                    <th style="width:25%">Degree awarded</th>
                                                    <th style="text-align:center; width:15%">Year</th>
                                                </tr>
                                                <tr>
                                                    <td>The Rt. Hon'ble the Earl of Ronaldshay G.C.I., the First
                                                        Chancellor</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1922</td>
                                                </tr>
                                                <tr>
                                                    <td>Philip Joseph Hartog, the First Vice-Chancellor</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1925</td>
                                                </tr>
                                                <tr>
                                                    <td>The Rt. Hon'ble the Earl of Lytton, Ex-Chancellor of the
                                                        University</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1927</td>
                                                </tr>
                                                <tr>
                                                    <td>Mahamahopadhyaya Haraprasad Shastri, the First Head of the
                                                        Department of Sanskrit-Bengali</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1927</td>
                                                </tr>
                                                <tr>
                                                    <td>The Rt. Hon'ble Sir Francis Stanley Jackson, PC, GCSI, GCIE
                                                        Ex-Chancellor of the University</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1932</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Chandrasekhare Venkot Raman Eminent Scientist, Nobel
                                                        Prize Winner</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1932</td>
                                                </tr>
                                                <tr>
                                                    <td>The Rt. Hon'ble Sir John Anderson, Ex-Chancellor of the
                                                        University</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Abdur Rahim, KCSI, Kt</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Jagdis Chandra Basu, D.Sc.</td>
                                                    <td>Doctors of Science</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Prafulla Chandra Roy , KTCIE, D.Sc, Ph.D, FCS, FASB</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Jadunath Sarker, Eminent Historian</td>
                                                    <td>0Doctor of Literature;</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir Mohammed Iqbal Kt, MA, PhD, Bar-at-Law, Poet and
                                                        Philosopher</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Rabindranath Tagore</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sarat Chandra Chattapadhya, Novelist</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1936</td>
                                                </tr>
                                                <tr>
                                                    <td>Sir. A.F. Rahman, Ex-Vice Chancellor</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1937</td>
                                                </tr>
                                                <tr>
                                                    <td>Khwaja Nazimuddin, Former Governor General of Pakistan</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1949</td>
                                                </tr>
                                                <tr>
                                                    <td>His Royal Highness the Rt. Hon'ble Aga Sultan Sir Mohammad
                                                        Shah Aga Khan, PCKCIE, GCSI, GCIE, GCVO, LL.D.</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1951</td>
                                                </tr>
                                                <tr>
                                                    <td>His Excellency Dr. Abdul Wahab Azam , M.A. (London), D
                                                        Lit.(Fuwad)</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1952</td>
                                                </tr>
                                                <tr>
                                                    <td>His Excellency Major General Eskander Mirza Former Governor
                                                        General of Pakistan</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1956</td>
                                                </tr>
                                                <tr>
                                                    <td>A.K. Fazlul Haq, the then Chancellor of the University</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1956</td>
                                                </tr>
                                                <tr>
                                                    <td>Madame Sung Ching Ling</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1956</td>
                                                </tr>
                                                <tr>
                                                    <td>His Excellency Chou-En Lai Prime Minister of the People's
                                                        Republic of China</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1956</td>
                                                </tr>
                                                <tr>
                                                    <td>Field Marshal Mohammad Ayub Khan, the then President of
                                                        Pakistan</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1960</td>
                                                </tr>
                                                <tr>
                                                    <td>His Excellency Jamal Abdel Nasser, President of the United
                                                        Arab Republic</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1960</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Satyendra Nath Bose (Posthumous)</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Dr. Muhammad Shahidullah (Posthumous)</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Poet Kazi Nazrul Islam</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Ustad Ali Akbar Khan</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Dr. Hiralal De</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Dr. Muhammed Qudrat-i-Khuda</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Dr. Qazi Motahar Hossain</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Abul Fazal</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">1974</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Abdus Salam, FRS, Nobel Laureate</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1993</td>
                                                </tr>
                                                <tr>
                                                    <td>Dr. Federico Mayor, Director General, UNESCO</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">1997</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Amartya Sen, Nobel Laureate</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Sheikh Hasina Hon'ble Prime Minister, the People's Republic
                                                        of Bangladesh</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">1999</td>
                                                </tr>
                                                <tr>
                                                    <td>Tun Dr. Mahathir bin Mohamad Former Hon'ble Prime Minister
                                                        of Malaysia</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2004</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Dr. Muhammad Yunus, Winner of Nobel Prize for
                                                        Peace</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2007</td>
                                                </tr>
                                                <tr>
                                                    <td>Nobel Laureate Emeritus Prof. Yuan Tseh Lee of Taiwan</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">2009</td>
                                                </tr>
                                                <tr>
                                                    <td>Prof. Abul Hussam of Goerge Mason University, USA</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">2009</td>
                                                </tr>
                                                <tr>
                                                    <td>Prof Ranajit Guha.</td>
                                                    <td>Doctor of Literature</td>
                                                    <td style="text-align:center">2009</td>
                                                </tr>
                                                <tr>
                                                    <td>Abdullah Gul</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2010</td>
                                                </tr>
                                                <tr>
                                                    <td>Mr. ban Ki-moon, Secretary General of United Nations</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2011</td>
                                                </tr>
                                                <tr>
                                                    <td>Irina Bokova</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2012</td>
                                                </tr>
                                                <tr>
                                                    <td>Shri Pranab Mukherjee- the President of India</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2013</td>
                                                </tr>
                                                <tr>
                                                    <td>Professor Dr. Rolf Dieter Heuer, Director General of the
                                                        European Organization for Nuclear Research (CERN)</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">2014</td>
                                                </tr>
                                                <tr>
                                                    <td>Francis Gurry, Director General of World Intellectual
                                                        Property Organisation</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2015</td>
                                                </tr>
                                                <tr>
                                                    <td>Prof Amit Chakma, Vice-Chancellor of Western University,
                                                        Canada</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Nobel Laureate in Physics Dr. Takaaki Kajita, University
                                                        Professor AND Director, Institute for Cosmic Ray Research,
                                                        University of Tokyo, Japan</td>
                                                    <td>Doctor of Science</td>
                                                    <td style="text-align:center">2019</td>
                                                </tr>
                                                <tr>
                                                    <td>Doctor of Laws degree awarded to Bangabandhu at a special
                                                        convocation of DU</td>
                                                    <td>Doctor of Laws</td>
                                                    <td style="text-align:center">2023</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="aside">
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>About University</h4>
                        </div>
                        <ul>
                            <li><a href="HistoricalOutline.html">Historical Outline</a></li>

                            <li><a href="DuataGlance.html">University at a Glance</a></li>
                            <li><a href="HonorisCausa.html">Honoris Causa</a></li>
                            <li><a href="../viceChancellorMessage.html">Message from the Vice Chancellor</a></li>
                            <li><a href="../listofViceChancellors.html">List of Vice Chancellors</a></li>
                            <li><a href="../notableAlumni.html">Notable Alumni</a></li>
                        </ul>
                    </div>

                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>DU Leadership</h4>
                        </div>
                        <ul>
                            <li><a href="../leadership/chancellor.html">Chancellor</a></li>
                            <li><a href="../leadership/vc.html">Vice Chancellor</a></li>
                            <li><a href="../leadership/provca.html" nowrap>Pro-Vice Chancellor (Academic)</a></li>
                            <li><a href="../leadership/provcp.html">Pro-Vice Chancellor (Admin)</a></li>
                            <li><a href="../leadership/treasurer.html">Treasurer</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-item category">
                        <div class="title">
                            <h4>Governance Framework</h4>
                        </div>
                        <ul>
                            <li><a href="UniversityOrdinance.html">University Ordinance</a></li>
                            <li><a href="../senateMember.html">Senate Members</a></li>
                            <li><a href="../syndicateMembers.html">Syndicate Members</a></li>
                            <li><a href="UniversityStatutes.html">University Statutes</a></li>
                            <li><a href="FinanceCommittee.html">Finance Committee</a></li>
                            <li><a href="AcademicCouncil.html">Academic Council</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection







