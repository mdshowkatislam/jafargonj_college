@extends('frontend.landing')
@php
    $page_title = 'Historical Outline';
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
                                        <div class="wrapper center-block">
                                            <div class="panel-group" id="accordion" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1912"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1912
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1912" class="panel-collapse in"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            On 31 January a delegation led by Nawab Sir
                                                            Salimullah,Nawab Syed Nawab Ali Chowdhury and Sher
                                                            e-Bangla A.K. Fazlul Hug met Viceroy Lord Hardinge on
                                                            his visit to Dhaka (then Dacca) and raised the demand of
                                                            the establishment of a University in the region.On 2
                                                            February a communique was published stating the decision
                                                            of the Government of India to recommend the Constitution
                                                            of a University at Dhaka.On 4 April the Government of
                                                            British India invited the Government of Bengal to submit
                                                            a complete scheme of the University.On 27 May the
                                                            Government of Bengal published resolution in regard to
                                                            the proposed University and appointed a Committee of
                                                            thirteen members with Sir Robert Nathaniel as President
                                                            to frame the scheme. The Committee, known as Nathan
                                                            committee, submitted the scheme in the same year.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1913"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1913
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1913" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Nathan Committee Report was published for public
                                                            opinion; approved by the Secretary of State in the same
                                                            year.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1917"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1917
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1917" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            A resolution was moved in the Imperial Legislative
                                                            Council by Nawab Syed Nawab Ali Chowdhury asking the
                                                            Government of India to introduce a bill for the
                                                            establishment and incorporation of a University at
                                                            Dhaka. The scheme of the University was referred to the
                                                            Calcutta University Commission led by the
                                                            Vice-Chancellor of the University of Leeds, Dr. M.E.
                                                            Sadler for advice regarding constitution and management
                                                            of the University.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1920"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1920
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1920" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Dacca University Act of 1920, Act No. XVIII, was passed
                                                            by the Legislative Council that received the assent of
                                                            the Governor General on 23 March.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1921"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1921
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1921" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The year of the start of the UniversityOn July 1, 1921
                                                            the University began its journey with 3 Faculties: Arts,
                                                            Science and Law; 12 Departments- Sanskrit and Bengali,
                                                            English, Education, History, Arabic and Islamic Studies,
                                                            Persian and Urdu, Philosophy, Economics and Politics,
                                                            Physics, Chemistry, Mathematics and Law; 3 Dormitories
                                                            for students: Salimullah Muslim Hall, Dacca Hall and
                                                            Jagannath Hall.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1923"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1923
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1923" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            On 22 February the University held its first
                                                            Convocation.Lord Lytton, Governor of Bengal and
                                                            Chancellor of the University of Dhaka was the
                                                            convocation speaker.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1938"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1938
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1938" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Political Science became a separate
                                                            identity.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1940"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1940
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1940" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Fazlul Haq Muslim Hall was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1947"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1947
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1947" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of International Relations was
                                                            established.The University completed its first phase of
                                                            Development with the end of the British rule in the
                                                            subcontinent.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1948"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1948
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1948" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Islamic History and Culture was opened
                                                            in the Faculty of Arts and also the Department of
                                                            Geography (now Geography and Environment) in Science
                                                            Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1949"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1949
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1949" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Soil Science (now Soil, Water and
                                                            Environment) and the Department of Geology were
                                                            established in Science Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1950"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1950
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1950" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Statistics was initiated in the
                                                            science Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1952"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1952
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1952" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The year of the Language MovementThe University of Dhaka
                                                            played the central role in the Language Movement that
                                                            ultimately culminated in the recognition of Bangla as
                                                            the State Language.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1954"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1954
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1954" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Botany became a separate identity.The
                                                            Department of Zoology started functioning in Science
                                                            Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1957"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1957
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1957" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Sociology was established in faculty
                                                            and the Department of Biochemistry ( Biochemistry
                                                            andMolecular Biology )in the Faculty.Iqbal Hall was
                                                            established, renamed as Sgt. Zahurul Huq Hall in 1972
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1959"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1959
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1959" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Department of Library Science was opened (renamed as the
                                                            Department of Information Science and Library
                                                            Management) in the Faculty of Arts.The Bureau of
                                                            Economic Research, formed by some teachers in 1956, was
                                                            officially recognized.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1960"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1960
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1960" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Faculty of Commerce was introduced as a major area
                                                            of study at the University.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1961"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1961
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1961" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Institute of Education and Research was established
                                                            in the University of Dhaka.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1962"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1962
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1962" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Journalism (now Mass Communication and
                                                            Journalism) was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1963"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1963
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1963" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The first women&#039;s Hall, Ruqayyah Hall, was
                                                            established.The &#039;Assembly Hall&#039; of the then
                                                            East Pakistan Provincial Government was handed over to
                                                            the University of Dhaka to become a part of the
                                                            Residential facilities for the Students of Jagannath
                                                            Hall.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1964"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1964
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1964" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Pharmacy started its journey in the
                                                            Science Faculty and the Institute of Statistical
                                                            Research and Training was opened in the University of
                                                            Dhaka.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1965"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1965
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1965" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Applied Physics (now Electrical and
                                                            Electronics Engineering) started functioning in
                                                            theScience Faculty.The Department ofPsychology was also
                                                            established under the Science Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1966"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1966
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1966" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The International Hostel (now Sir P.J. Hartog
                                                            International Hall) was established.M. A. Jinnah Hall
                                                            was established, renamed as SurjaSen Hall in 1972.The
                                                            University of Dhaka played a significant role in the
                                                            autonomy movement of 1966
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1967"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1967
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1967" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Haji Muhammad Mohsin Hall was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1969"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1969
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1969" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Institute of Nutrition and Food Sciences was
                                                            created.The University of Dhaka played a significant
                                                            role in the autonomy movement of 1969.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1970"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1970
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1970" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Faculty of Social Science was established involving
                                                            the Departments of Economics, Political Science,
                                                            Sociology, International Relations and Public
                                                            Administration.Faculty of Commerce (now Business
                                                            Studies) was created with the opening of Accounting (now
                                                            Accounting and Information Systems) and Management (now
                                                            Management Studies)Departments in the Faculty.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion"
                                                                href="#collapseOne_1971_The_year_of_Independence"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1971 The year of Independence
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1971_The_year_of_Independence"
                                                        class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The University made supreme sacrifices with fourteen
                                                            teachers, one officer, twenty six employees, and
                                                            hundreds of students of the university losing their
                                                            lives in the war for the Independence of Bangladesh.The
                                                            second women Hall, Shamsunnahar Hall was established.The
                                                            University completed its second phase of development and
                                                            started the third phase of
                                                            developmentwiththeemergenceofthe People&#039;s Republic
                                                            of Bangladesh. 1972TheDepartment of Applied Chemistry
                                                            (now Applied Chemistry and Chemical Engineering) was
                                                            opened in the Science Faculty and the Department of
                                                            Public Administration in the Faculty of Social Sciences.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1973"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1973
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1973" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Dhaka University Order, 1973 came into force whereby
                                                            the democratic norms and autonomy became integral
                                                            features of the University. The Institute of Social
                                                            Welfare and Research was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1974"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1974
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1974" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Institute of Modern Languages started functioning in
                                                            the University.The Faculty of Biological Sciences was
                                                            established with the Departments of Soil Science (now
                                                            Soil, Water and Environment), Botany, Zoology,
                                                            Biochemistry (now Biochemistry and Molecular Biology),
                                                            Psychology and Pharmacy. The Departments of Finance
                                                            (later Finance and Banking) and Marketing were
                                                            established in the Faculty of Commerce. The Bureau of
                                                            Business Research started functioning.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1976"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1976
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1976" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Kabi Jashimuddin Hall and Sir A.F. Rahman Hall were
                                                            established. The Bose Centre for Advanced Studies and
                                                            Research in Natural Sciences was opened.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1979"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1979
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1979" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Microbiology was introduced in the
                                                            Faculty of Biological Sciences.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1980"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1980
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1980" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Islamic Studies started functioning as
                                                            an independent identity in the Faculty of Arts. The
                                                            CentreforAdvancedStudiesand Research in Biological
                                                            Sciences, Dev Centre for Philosophical Studies and the
                                                            Centre for Advanced Research in the Humanities were
                                                            established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1981"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1981
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1981" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            TheRenewableEnergyResearch Centre was opened.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1983"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1983
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1983" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Institute of Fine Arts was added to the University.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1984"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1984
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1984" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Centre for Advanced Study and Research in Social
                                                            Sciences was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1985"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1985
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1985" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The old &#039;Assembly Hall&#039; of the then East
                                                            Pakistan Provincial Government later constituting a part
                                                            of the Jagannath Hall collapsed on October 15 that led
                                                            to the death of 26 students of the Hall and 14 employees
                                                            and guests. The day has been recognized as the
                                                            &#039;University of Dhaka Mourning Day&#039;, observed
                                                            every year in memory of the departed souls.The
                                                            Semi-conductor Technology Research Centre and the
                                                            Biotechnology Research Centre were opened in the
                                                            University.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1987"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1987
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1987" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Biological Nitrogen Fixation Research Unit involving the
                                                            Centre for National Research Scientific (CNRS), France
                                                            and the Department of Soil Science, University of Dhaka
                                                            was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1988"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1988
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1988" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Muktijoddha Ziaur Rahman Hall and Bangabandhu Sheikh
                                                            Mujibur Rahman Hall were established. In 2014 renamed as
                                                            Father of the Nation Bangabandhu Sheikh Mujibur Rahman
                                                            Hall. The Nazrul Research Centre and the Archives and
                                                            History Research Centre were opened.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1989"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1989
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1989" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Bangladesh Kuwait Maitree Hall, a third dormitory for
                                                            the female students and the Institute of Business
                                                            Administration Hostel were established.
                                                            DisasterResearchTrainingandManagement Centre in the
                                                            Department of Geography and Environment was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1990"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1990
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1990" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Delta Study Centre in the Department of Geology
                                                            started functioning.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1992"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1992
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1992" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Computer Science (now Comber Science
                                                            and Engineering) the Department of linguistics and the
                                                            Department of Anthropology started functioningin the
                                                            Faculty of Science, Faculty of Arts and Faculty of
                                                            Social Sciences respectively.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1993"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1993
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1993" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Nabab Faizunnessa Chowdhurani Chhatrinibash (Hostel) was
                                                            established for the female M.Phil and Ph.D.students of
                                                            the University.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1994"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1994
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1994" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Theatre and Music was established in
                                                            the Arts Faculty of the University. The research Centre
                                                            for Liberation War was created.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1995"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1995
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1995" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Faculty of Pharmacy was established involving the
                                                            department of Pharmacy. The Centre for Development and
                                                            Policy Research was established.Commerce Faculty was
                                                            renamed as the Faculty Business Studies.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1996"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1996
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1996" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Centre for Bio-medical Research was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1997"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1997
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1997" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of World Religions and the Department of
                                                            Clinical Psychology had begun in the Faculty of Arts and
                                                            the Faculty of Biological Sciences respectively.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1998"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1998
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1998" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Department of Aquaculture and Fisheries (renamed as the
                                                            Department of Fisheries) started in the Faculty of
                                                            Biological Sciences.The Institute of Health Economics
                                                            was opened in the University of Dhaka. Also the Centre
                                                            of Excellence for Advanced Research in Physical,
                                                            Chemical, Biological and Pharmaceutical Sciences was
                                                            started.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_1999"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 1999
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_1999" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Population Sciences and the Department
                                                            t of Peace and Conflict Studies were opened in the
                                                            Faculty of Social Sciences.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2000"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2000
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2000" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Genetic Engineering and Bio-technology
                                                            and the Department of Women Studies (renamed as the
                                                            Department of Women and Gender Studies) were established
                                                            in the Faculty of Social Sciences and the Faculty of
                                                            Social Sciences respectively. Nazmul Karim Study Centre
                                                            in the Department of Sociology and the Centre for
                                                            Cultural Development Research of Bangladesh were
                                                            established.The Begum Fazilatunnessa Mujib Hall (the
                                                            fourth women Hall) and the Amar Ekushey Hall were
                                                            established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2001"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2001
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2001" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Institute of Information Technology was opened in
                                                            the University of Dhaka. The Centre for Development and
                                                            Institutional Studies, the Dr. Sirajul Haque Islamic
                                                            Research Centre, the Centre for Education Research and
                                                            Training and a Centre of Excellence for Advanced
                                                            Research in Arts and Social Sciences were established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2002"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2002
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2002" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Development Studies started
                                                            functioning in the Faculty of Social Sciences. The Japan
                                                            Study Centre and Language Teaching Centre were created
                                                            in the University of Dhaka. The Department of Mass
                                                            Communication and Journalism came under the Faculty of
                                                            Social Sciences from the Faculty of Arts.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2003"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2003
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2003" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Pharmacy Department had split into the Department of
                                                            Pharmaceutical Chemistry, Department of Clinical
                                                            Pharmacy and Pharmacology, and the Department of
                                                            Pharmaceutics and Pharmaceutical Technology for Masters
                                                            Programmes, with the Honours Programme under the Faculty
                                                            itself. The Dhaka University Cyber Centre was
                                                            established. The Department of Banking and the
                                                            Department of Management Information Systems (MIS) were
                                                            established in the Business Studies Faculty. The Arts
                                                            Computer Centre and the Centre for Governance Studies
                                                            came into existence in the University of Dhaka.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2004"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2004
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2004" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            University and Industry Alliance was established in the
                                                            Institute of Business Administration.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2005"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2005
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2005" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Bangladesh-Australia Centre for Environmental Research
                                                            was established in the Department of Soil, Water and
                                                            Environment.The Centre for Corporate Governance and
                                                            Finance Studies and the Centre for Microfinance and
                                                            Development started functioning in the university.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2007"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2007
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2007" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Tourism and Hospitality Management and
                                                            the Department of International Business were opened in
                                                            the Faculty of Business Studies.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2008"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2008
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2008" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Faculty of Earth and Environmental Sciences, The
                                                            Faculty of Engineering and Technology and The Faculty of
                                                            Fine Arts were opened. The Department of Biomedical
                                                            Physics and Technology was opened in the Faculty of
                                                            Science.The Department of Theoretical Physics was
                                                            resuscitated in the Faculty of Science. A 2-Year
                                                            Regional Masters Programme in Journalism, Media and
                                                            Communication began at the Department of Mass
                                                            Communication and Journalism in partnership with The
                                                            Oslo University College, Norway; The University of
                                                            Punjab, Pakistan and College of Journalism and Mass
                                                            Communication, Nepal. Teachers and students from all
                                                            these partner countries take part in teaching and
                                                            learning to this Programme.The Center for Administrative
                                                            Research and Innovation, The Center for Interreligious
                                                            and Intercultural Dialogue; The Center for Buddihist
                                                            Heritage and Culture and the Center for Trade and
                                                            Investment came into existence.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2009"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2009
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2009" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Theatre and Music is separated into
                                                            two Departments, namely-The Department of Theatre and
                                                            the Department of Music. The Center for Disaster and
                                                            Vulnerability Studies was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2010"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2010
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2010" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Centre for Genocide Studies was established.
                                                            Studentship expulsion order imposed by the Executive
                                                            Council on the then young student leader, Sheikh Mujibur
                                                            Rahman (later Father of the Nation Bangabandhu Sheikh
                                                            Mujibur Rahman) for expressing solidarity with the
                                                            ongoing movement of class-iv employees union of Dhaka
                                                            University in 1949, was unanimously revoked by the
                                                            University Syndicate in August this year.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2011"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2011
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2011" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Three new Departments were opened at the University.
                                                            They are: The Department of Television and Film Studies
                                                            under the Faculty of Social Sciences, The Department of
                                                            Nuclear Engineering under the Faculty of Engineering and
                                                            Technology and The University of Dhaka. Department of
                                                            Educational and Counseling Psychology under the Faculty
                                                            of Biological Sciences. The Renewable Energy Research
                                                            Centre was converted as the Institute of Renewable
                                                            Energy. The Government of Bangladesh has decided to
                                                            handover the Bangladesh College of Leather Technology to
                                                            the University of Dhaka for transforming it into an
                                                            Institute of the University.The Kotler Centre for
                                                            Marketing Excellence (KCME) was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2012"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2012
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2012" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Two new Departments were opened under the Faculty of
                                                            Earth and Environmental Sciences. The Department of
                                                            Oceanography and the Department of Disaster Science and
                                                            Management. The Institute of Disaster Management and
                                                            Vulnerability Studies and The Institute of Leather
                                                            Engineering and Technology have been set up. It may be
                                                            noted here that the Bangladesh College of Leather
                                                            Technology was handed over by the Government to the
                                                            University for transforming it into an independent
                                                            institute under Dhaka University. Two centres, namely
                                                            The Scandinavian Study Centre and The East Asia Study
                                                            Centre were established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2013"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2013
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2013" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Criminology was opened in the Faculty
                                                            of Social Sciences.Three research Centres, namely the
                                                            Centre on Budget and Policy, the Centre for Policy
                                                            Research on Business and Development and the Centre for
                                                            Climate Change Study and Resource Utilization were
                                                            established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2014"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2014
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2014" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Four new Departments were opened at the University.
                                                            These are: Department of Dancing under the Faculty of
                                                            Arts, Department of Applied Mathematics under the
                                                            Faculty of Science, Department of Communication
                                                            Disorders under the Faculty of Social Sciences and
                                                            Department of Pharmacy under the Faculty of Pharmacy.
                                                            Six Research Centres, namely The Centre for English
                                                            Teaching and Research, The Chromosome Research Centre,
                                                            Centre of Excellence for Teaching and Learning, Centre
                                                            for Culture and Resilience Studies, Centre for
                                                            Bioinformatics Learning Advancement and Systematics
                                                            Training were established and Air Quality Research and
                                                            Monitoring Centre has been established at the Advance
                                                            Research in Sciences (CARS).
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2015"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2015
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2015" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Communication Disorders started
                                                            functioning in the Faculty of Social Sciences. The
                                                            Department of Robotics and Mechatronics began
                                                            functioning in the Faculty of Engineering and Technology
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2016"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2016
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2016" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Meteorology and the Department of
                                                            Printing and Publication were established in the
                                                            University of Dhaka. The Confucius Institute was
                                                            established in the University of Dhaka. Four new
                                                            Research centers were opened at the University. These
                                                            are International Center for Ocean Governance, Center
                                                            for Advanced Research in Strategic Human Resource
                                                            Management (CARSHRM), Neuroscience Research Center of
                                                            Dhaka University and Center for Entrepreneurship
                                                            Development and SME Management (CEDSMEM).
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2017"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2017
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2017" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            The Department of Japanese Studies started functioning
                                                            in the Faculty of Social Sciences. The Department of
                                                            Theoretical and Computational Chemsitry was opened in
                                                            the Faculty of Science. ICT (Information and
                                                            Communication Technology) Cell was established.
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="panel panel-default">

                                                    <div class="panel-heading active" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseOne_2019"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Year: 2019
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne_2019" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            Two new offices named &#039;Office of the International
                                                            Affairs&#039; and &#039;Dhaka University Technology
                                                            Transfer Office&#039; were opened. Bangabandhu Sheikh
                                                            Mujib Research Institute for Peace and Liberty will be
                                                            established in the &#039;Mujib Year&#039;.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
                            <li><a href="#UniversityOrdinance.html">University Ordinance</a></li>
                            <li><a href="#../senateMember.html">Senate Members</a></li>
                            <li><a href="#../syndicateMembers.html">Syndicate Members</a></li>
                            <li><a href="#UniversityStatutes.html">University Statutes</a></li>
                            <li><a href="#FinanceCommittee.html">Finance Committee</a></li>
                            <li><a href="#AcademicCouncil.html">Academic Council</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection







