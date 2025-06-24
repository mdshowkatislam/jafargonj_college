<?php

use App\Http\Controllers\Backend\HallController;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\FrontControllerMenu;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\JournalController;
use App\Http\Controllers\Frontend\ConvocationController;
use App\Http\Controllers\Frontend\ResearchController;
use App\Http\Controllers\Backend\Media\ImageController;
use App\Http\Controllers\Backend\Media\UploadController;
use App\Http\Controllers\Frontend\ClubMemberRegistration;
use App\Http\Controllers\Frontend\Faculty\FacultyController;
use App\Http\Controllers\Frontend\NewsEventNoticeController;
use App\Http\Controllers\Frontend\Department\DepartmentController;
use App\Http\Controllers\Frontend\Chsr\ChsrController;
use App\Http\Controllers\Frontend\Procurement\ProcurementController;
use App\Http\Controllers\Frontend\Academics\FrontAcademicsController;
use App\Http\Controllers\Frontend\AlumniMemberRegistration;
use App\Http\Controllers\Frontend\HallFrontController;
use App\Http\Controllers\Frontend\ButexFormController;
use App\Http\Controllers\Frontend\Conference\ConferenceController;
use App\Models\Alumni;

Route::get('/clear', function () {
    try {
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        Artisan::call('storage:link');
        return 'Cache/Config is cleared';
    } catch (\Exception $e) {
        dd($e);
    }
});

// routes/web.php
Route::post('/submit-dynamic-form', 'Backend\ButexBuilder\ButexFormBuilderController@storeDynamicForm')->name('submit.Dynamicform');

//Route::get('/{slug}', [FrontController::class, 'showPageName'])->name('page_name.show');

Route::get('/news-event-notice-filter', [NewsEventNoticeController::class, 'newsEventNoticeFilter']);
Route::get('/news-event-notice-search-filter-filter', [NewsEventNoticeController::class, 'newsEventNoticeSearchFilter']);
Route::get('/noc-filter', [FrontController::class, 'nocListSearch']);

Route::get('testmail', function (Request $request) {
    $data['user_email'] = 'md.wasim0@gmail.com';
    $data['name'] = 'test';
    Mail::send('frontend.suggestion.mail-page', $data, function ($message) use ($data) {
        $message->to($data['user_email']);
        $message->subject('BUTEX - Subject');
    });
});

Route::get('add-slug-to-clubs', function () {
    $clubs = Club::where('slug', null)->get(['id', 'name', 'slug']);

    foreach ($clubs as $club) {
        $slug = (new Club())->generateSlug($club->name);
        $club->slug = $slug;
        $club->save();
    }
    return 'Slug added in all clubs';
});

Route::get('add-slug-to-alumnis', function () {
    $alumnis = Alumni::where('slug', null)->get(['id', 'name', 'slug']);

    foreach ($alumnis as $alumni) {
        $slug = (new Alumni())->generateSlug($alumni->name);
        $alumni->slug = $slug;
        $alumni->save();
    }
    return 'Slug added in all alumnis';
});

Route::get('/club-member-registration', [ClubMemberRegistration::class, 'registrationForm']);
Route::post('/club-member-registration', [ClubMemberRegistration::class, 'registration'])->name('registration.form.submit');
Route::get('/verify-email/{token}', [ClubMemberRegistration::class, 'verify'])->name('verify.email');
Route::get('/alumni-member-registration', [AlumniMemberRegistration::class, 'registrationForm']);
Route::post('/alumni-member-registration', [AlumniMemberRegistration::class, 'registration'])->name('registration.form.submit');
// Route::get('/verify-email/{token}', [AlumniMemberRegistration::class, 'verify'])->name('verify.email');
// Route::get('/club-members',[ClubMemberRegistration::class,'getUsers']);
Route::get('/q/{menu?}', 'Frontend\FrontController@MenuUrl')->name('menu_url');

Route::get('/', 'Frontend\FrontController@index')->name('index');

Route::get('/404message', function() {
    return view('frontend.messages.404message');
})->name('404message');

Route::get('preview/{id}/{tab}', [FrontController::class, 'preview']);

Route::get('preview/{id}', [FrontController::class, 'preview2']);

Route::get('/single-page/{id}', [FrontController::class, 'singlePage']);

// form
Route::get('/form1', [ButexFormController::class, 'form1']);
Route::get('/form2', [ButexFormController::class, 'form2']);
Route::get('/form3', [ButexFormController::class, 'form3']);
Route::get('/form4', [ButexFormController::class, 'form4']);
Route::get('/form5', [ButexFormController::class, 'form5']);

Route::get('/convocation/{title}', [ConvocationController::class, 'index']);

Route::post('/butex-form-save', [ButexFormController::class, 'store'])->name('butex_form.store');

//About Staffs
Route::get('/about', [FrontController::class, 'about_overview'])->name('about_overview');
Route::get('/e-library', [FrontController::class, 'e_library'])->name('e_library');
Route::get('/university-at-a-glance', [FrontController::class, 'university_at_a_glance'])->name('university_at_a_glance');
Route::get('/mission_vision', [FrontController::class, 'mission_vision'])->name('mission_vision');
Route::get('/short-story', [FrontController::class, 'shortStory'])->name('short_story');
Route::get('/vc-honor-board', [FrontController::class, 'vc_honor_board'])->name('vc_honor_board');
Route::get('/citizen-charter', [FrontController::class, 'citizenCharter'])->name('citizen_charter');
Route::get('/facts-figures', [FrontController::class, 'factsFigures'])->name('facts_figures');
// Route::get('/brochure-newsletter', [FrontController::class, 'newsletter'])->name('newsletter');
Route::get('/newsletter', [FrontController::class, 'newsletter'])->name('newsletter');
Route::get('/newsletter_by_year', [FrontController::class, 'newsletterByYear'])->name('newsletter_by_year');

Route::get('/magazine', [FrontController::class, 'magazine'])->name('magazine');
Route::get('/magazine_by_year', [FrontController::class, 'magazineByYear'])->name('magazine_by_year');
Route::get('/result', [FrontController::class, 'result'])->name('result');
Route::get('/result-by-program-category/{category}', [FrontController::class, 'resultByProgramCategory'])->name('result_by_program_category');
Route::get('/result_by_year', [FrontController::class, 'resultByYear'])->name('result_by_year');

Route::get('/academic-calender', [FrontController::class, 'academicCalender'])->name('academic_calender');
Route::get('/academic_calender_by_year', [FrontController::class, 'academicCalenderByYear'])->name('academic_calender_by_year');

Route::get('/annual-report', [FrontController::class, 'annualReport'])->name('annual_report');
Route::get('/annual_report_by_year', [FrontController::class, 'annualReportByYear'])->name('annual_report_by_year');

Route::get('/downloads', [FrontController::class, 'downloads'])->name('downloads');
Route::get('/downloads-by-type', [FrontController::class, 'downloadsByType'])->name('downloads_by_type');
Route::get('/privacy-policy', [FrontController::class, 'privacyPolicy'])->name('privacy_policy');

Route::get('/chancellor', [FrontController::class, 'Chancellor'])->name('chancellor');
Route::get('/pro-vc-information', [FrontController::class, 'proVcInformation'])->name('pro_vc_info');
Route::get('/treasurer-information', [FrontController::class, 'treasurerInformation'])->name('treasurer_info');
Route::get('/the-registrar', [FrontController::class, 'messageFromTheRegistrar'])->name('message_from_registrar');
Route::get('/vc_information', [FrontController::class, 'vcInformation'])->name('vc_info');
Route::get('syndicate-members-list', [FrontControllerMenu::class, 'syndicateMemberList'])->name('syndicate-members-list');
Route::get('butex-short-story', [FrontControllerMenu::class, 'butexShortStory'])->name('butex-short-story');

Route::get('/ongoing-research', [FrontController::class, 'ongoingResearch'])->name('ongoing_research');
Route::get('/research-list', [FrontController::class, 'researchList'])->name('research_list');
Route::get('/chsr-research-list', [FrontController::class, 'chsrResearchList'])->name('chsr_research_list');
Route::get('/faculty-research-list', [FrontController::class, 'facultyResearchList'])->name('faculty_research_list');
Route::get('/faculty-research-lists', [FrontController::class, 'facultyResearchLists'])->name('faculty_research_lists');
Route::get('/bb-research-list', [FrontController::class, 'bbResearchList'])->name('bb_research_list');
Route::get('/research-list-by-year', [FrontController::class, 'researchListByYear'])->name('research_list_by_year');

Route::get('research-by-type/{id?}', 'Frontend\ResearchController@researchByType')->name('research_by_type');
Route::get('/research/{id}', [FrontController::class, 'research'])->name('research');
Route::get('/research-list/{type_id}', [ResearchController::class, 'researchListbyType'])->name('research.list.by.type');
Route::get('/funded-research', [ResearchController::class, 'fundedResearch'])->name('funded.research');
Route::get('/research-by-year', [ResearchController::class, 'researchByYear'])->name('research_by_year');
Route::get('/research-by-year-for', [ResearchController::class, 'researchByYearFor'])->name('research_by_year_for');
Route::get('/faculty-research-by-year', [ResearchController::class, 'facultyResearchByYear'])->name('faculty_research_by_year');

Route::get('/journal-list', [JournalController::class, 'journalList'])->name('journal.list');
Route::get('/journal-list-by-year', [JournalController::class, 'journalListByYear'])->name('journal_by_year');
Route::get('/journal/{id}', [JournalController::class, 'journalDetails'])->name('journal_details');
Route::get('/journal/faculty/{id}', [JournalController::class, 'journalListByFaculty'])->name('journal_by_faculty');

Route::get('achievement/{id}', 'Frontend\FrontController@achievement')->name('achievement');

Route::get('achievement/student/{id}', 'Frontend\FrontController@achievementStudentDetails')->name('achievement.details');

Route::get('achievement-student/all', 'Frontend\FrontController@achievementStudentAll')->name('achievement-student-all');
//
Route::get('custom-page/{id}/', 'Frontend\PagesController@pages')->name('pages');

Route::get('pages/{page_name}/{id}/', 'Frontend\PagesController@userPages')->name('user-pages');

// Start - Hall Frontend
Route::get('/halls', [HallFrontController::class, 'butexHalls'])->name('butex.halls');
//Route::get('/halls-details/{id}', [FrontController::class, 'butexHallDetails'])->name('hall_details');
//Route::get('/provost_message/{id}', [FrontController::class, 'provostMessage'])->name('provost_message');

Route::get('/all_halls',  [HallFrontController::class, 'allHalls'])->name('all_halls');
Route::get('/hall_details/{id}', [HallFrontController::class, 'allHallDetail'])->name('hall_details');
Route::get('/hall_history/{id}',  [HallFrontController::class, 'hallHistory'])->name('hall_history');
Route::get('/hall_provost/{id}', [HallFrontController::class, 'allHallProvost'])->name('all_hall_provost');
Route::get('/provost_details/{id}', [HallFrontController::class,'ProvostDetails'])->name('provost_details');
Route::get('/hall_member_details/{id}', [HallFrontController::class,'HallMemberDetails'])->name('hall_member_details');

Route::get('/provost_message/{id}', [HallFrontController::class,'provostMessage'])->name('provost_message');
Route::get('/house_tutor/{id}', [HallFrontController::class,'houseTutor'])->name('house_tutor');
Route::get('/officers/{id}', [HallFrontController::class,'administrativeStaff'])->name('administrative_staff');
Route::get('/student_activity/{id}', [HallFrontController::class,'studentActivity'])->name('student_activity');
Route::get('/archivement/{id}', [HallFrontController::class,'archivement'])->name('archivement');
Route::get('/scholarship_financial/{id}', [HallFrontController::class,'scholarshipFinancial'])->name('scholarship_financial');
Route::get('/hall_contact/{id}', [HallFrontController::class,'hallContact'])->name('hall_contact');
// End - Hall Frontend

// Start - Provost Frontend
Route::get('/hall_provost', [HallFrontController::class,'hallProvost'])->name('hall_provost');
Route::get('/hall_provost_details/{id}', [HallFrontController::class,'hallProvostDetails'])->name('hall_provost_details');

// End - Provost Frontend

Route::get('archive/{type}/details/{id}', 'Frontend\NewsEventNoticeController@types')->name('type.details');

Route::post('notices_cat_result', 'Frontend\NewsEventNoticeController@notices_cat_result')->name('notices_cat_result');

Route::get('archive/{type}/all/', 'Frontend\NewsEventNoticeController@alltypes')->name('type.all');

// Route::get('/searching-posting', 'Frontend\NewsEventNoticeController@searchingPostingInfo')->name('searching_posting_info');

Route::post('/search-post', 'Frontend\NewsEventNoticeController@searchingPost')->name('searching_post');

//Route::get('archive/{type}/details/{id}', 'Frontend\NewsEventNoticeController@types')->name('type.details');
//Route::get('archive/{type}/all/', 'Frontend\NewsEventNoticeController@alltypes')->name('type.all');

Route::get('research-details/{id}', 'Frontend\FrontController@research')->name('research.details');
Route::get('research-details2/{id}', 'Frontend\FrontController@research2')->name('research.details2');
Route::get('featuredNewsEvents/details/{id}', 'Frontend\NewsEventNoticeController@featuredNewsEvents')->name('featuredNewEvents.details');
Route::get('featuredNewsEvents/all/', 'Frontend\NewsEventNoticeController@featuredNewsEventsAll')->name('featuredNewEvents.all');
Route::get('video_gallery/all/', 'Frontend\FrontController@videoGalleryAll')->name('videogallery.all');

// Route::get('achievement/details/{$id}', 'Frontend\FrontController@achievement')->name('achievement.details');

Route::get('/noc', [FrontController::class, 'nocList'])->name('noc_list');
Route::get('/career', [FrontController::class, 'careerList'])->name('career_list');
Route::get('career/job-details/{id}', [FrontController::class, 'careerById'])->name('career_details');
Route::get('/career-by-type', [FrontController::class, 'careerByType'])->name('career_by_type');


//ajax
Route::get('faculty-wise-department', 'Backend\ProgramController@facultyWiseDepartment')->name('faculty_wise_department_front');
Route::get('department_wise_program_count', 'Backend\ProgramController@department_wise_program_count')->name('department_wise_program_count');

// Student-Online Services
Route::get('scholarships_and_financial_aids', [FrontController::class, 'scholarships_and_financial_aids'])->name('scholarships_and_financial_aids');
Route::get('apply_for_certificate', [FrontController::class, 'apply_for_certificate'])->name('apply_for_certificate');
Route::get('apply_for_transcript', [FrontController::class, 'apply_for_transcript'])->name('apply_for_transcript');

// Admissions
Route::get('admission_notice', [FrontController::class, 'admission_notice'])->name('admission_notice');
Route::get('admission_result', [FrontController::class, 'adzmission_result'])->name('admission_result');
Route::get('prospectus', [FrontController::class, 'prospectus'])->name('prospectus');
Route::get('certificate_course', [FrontController::class, 'certificate_course'])->name('certificate_course');

//Office
Route::get('office', 'Frontend\Office\FrontOfficeController@index')->name('office');
Route::get('officers', 'Frontend\Office\FrontOfficeController@officePeople')->name('offices');
Route::get('/office_home/{id}', 'Frontend\Department\DepartmentController@officeHome')->name('office_home');
Route::get('/office_home/{id}/about', 'Frontend\Office\FrontOfficeController@officeAbout')->name('office_about');
Route::get('/office_home/{id}/message', 'Frontend\Office\FrontOfficeController@officeMessage')->name('office_message');
Route::get('/office_home/{id}/people', 'Frontend\Office\FrontOfficeController@officePerson')->name('office_people');
Route::get('/office_home/{id}/notice', 'Frontend\Office\FrontOfficeController@officeNotice')->name('office_notice');
Route::get('/office_home/{id}/event', 'Frontend\Office\FrontOfficeController@officeEvent')->name('office_event');
Route::get('/office_news/{id}/news', 'Frontend\Office\FrontOfficeController@officeNews')->name('office_news');
Route::post('/office_newsEventNotice/{id}/officeNewsEventNoticeFilter', 'Frontend\Office\FrontOfficeController@officeNewsEventNoticeFilter')->name('office_officeNewsEventNoticeFilter');
Route::get('/office_home/{id}/contact', 'Frontend\Office\FrontOfficeController@officeContact')->name('office_contact');
Route::get('/office_home/{id}/committee', 'Frontend\Office\FrontOfficeController@officeCommittee')->name('office_committee');
Route::get('/office_home/{id}/gallery', 'Frontend\Office\FrontOfficeController@officeGallery')->name('office_gallery');
Route::get('office/office_details/{id}', 'Frontend\Office\FrontOfficeController@officeDetails')->name('office.office_details');
Route::get('office/people/details/{id}', 'Frontend\Office\FrontOfficeController@officePeopleDetails')->name('office.people.details');
Route::get('/office_home/{id}/office-member-details', 'Frontend\Office\FrontOfficeController@officeMemberDetails')->name('office_member_deatils');
Route::get('office/office_details/message/{id}', 'Frontend\Office\FrontOfficeController@officeDetailsMessage')->name('office.office_details_message');

Route::get('labs', 'Frontend\FrontController@lab')->name('lab.list');
Route::get('lab-details/{id}', 'Frontend\FrontController@labDetails')->name('lab.details');

//chair-message
// Route::get('chair-message/{id}', 'Frontend\FrontController@chairMessageDetails')->name('chair-message.details');

//Club
Route::get('clubs', 'Frontend\ClubMemberRegistration@clubList')->name('clubs.list');
Route::get('club-home/{slug}', 'Frontend\ClubMemberRegistration@index')->name('club.index');
Route::get('club/about/{slug}', 'Frontend\ClubMemberRegistration@clubAbout')->name('club.about');
Route::get('club/committee/{slug}', 'Frontend\ClubMemberRegistration@clubCommittee')->name('club.committee');
Route::get('club/members/{slug}', 'Frontend\ClubMemberRegistration@clubMember')->name('club.member');
Route::get('club/activities/{slug}', 'Frontend\ClubMemberRegistration@clubActivity')->name('club.activities');
Route::get('club/gallery/{slug}', 'Frontend\ClubMemberRegistration@clubGallery')->name('club.gallery');
Route::get('club/downloads/{slug}', 'Frontend\ClubMemberRegistration@clubDownload')->name('club.download');
Route::get('club/message/{id}', 'Frontend\ClubMemberRegistration@clubMessage')->name('club.message');

// alumni
Route::get('alumnis', 'Frontend\AlumniMemberRegistration@alumniList')->name('alumnis.list');
Route::get('alumni-home/{slug}', 'Frontend\AlumniMemberRegistration@index')->name('alumni.index');
Route::get('alumni/about/{slug}', 'Frontend\AlumniMemberRegistration@alumniAbout')->name('alumni.about');
Route::get('alumni/committee/{slug}', 'Frontend\AlumniMemberRegistration@alumniCommittee')->name('alumni.committee');
Route::get('alumni/members/{slug}', 'Frontend\AlumniMemberRegistration@alumniMember')->name('alumni.member');
Route::get('alumni/activities/{slug}', 'Frontend\AlumniMemberRegistration@alumniActivity')->name('alumni.activities');
Route::get('alumni/gallery/{slug}', 'Frontend\AlumniMemberRegistration@alumniGallery')->name('alumni.gallery');
Route::get('alumni/downloads/{slug}', 'Frontend\AlumniMemberRegistration@alumniDownload')->name('alumni.download');
Route::get('alumni/message/{id}', 'Frontend\AlumniMemberRegistration@alumniMessage')->name('alumni.message');

Route::get('cpc', 'Frontend\CpcController@index')->name('cpc');
Route::get('cpc/about-us', 'Frontend\CpcController@about')->name('cpc.about');
Route::get('cpc/academic-counselling', 'Frontend\CpcController@academicCounselling')->name('cpc.academic_counselling');
Route::get('cpc/socio-emotional-counselling', 'Frontend\CpcController@socioEmotional')->name('cpc.socio_emotional');
Route::get('cpc/placement-center', 'Frontend\CpcController@placementCenter')->name('cpc.placement_enter');
Route::get('cpc/appointment', 'Frontend\CpcController@appointment')->name('cpc.appointment');
Route::get('cpc/resources', 'Frontend\CpcController@resources')->name('cpc.resources');
Route::get('cpc/gallery', 'Frontend\CpcController@gallery')->name('cpc.gallery');
Route::get('cpc/message', 'Frontend\CpcController@cpcMessage')->name('cpc.message');
Route::get('cpc/faq', 'Frontend\CpcController@cpcFaq')->name('cpc.faq');

// Faculty wise tamplate
Route::get('/faculty_home/{id}', [FacultyController::class, 'facultyHome'])->name('faculty_home');
Route::get('/faculty_home/{id}/research', [FacultyController::class, 'facultyResearch'])->name('faculty_research');
Route::get('/faculty_home/{id}/notice', [FacultyController::class, 'facultyNotice'])->name('faculty_notice');
Route::get('/faculty_home/{id}/event', [FacultyController::class, 'facultyEvent'])->name('faculty_event');
Route::get('/faculty_home/{id}/news', [FacultyController::class, 'facultyNews'])->name('faculty_news');
Route::post('/faculty_newsEventNotice/{id}/facultyNewsEventNoticeFilter', [FacultyController::class, 'facultyNewsEventNoticeFilter'])->name('faculty_facultyNewsEventNoticeFilter');
Route::get('/faculty_home/{id}/department', [FacultyController::class, 'facultyDepartment'])->name('faculty_department');
Route::get('/faculty_home/{id}/gallery', [FacultyController::class, 'facultyGallery'])->name('faculty_gallery');
Route::get('/faculty_home/{id}/all-faculties', [FacultyController::class, 'allFacultyMembers'])->name('faculty_all_faculties');
Route::get('/faculty_home/{id}/dean-honour-board', [FacultyController::class, 'deanHonourBoard'])->name('faculty_dean_honour_board');
Route::get('/faculty_home/{id}/faculty-member-details', [FacultyController::class, 'facultyMemberDetails'])->name('faculty_member_deatils');
Route::get('/faculty_home/{id}/message', [FacultyController::class, 'facultyMessage'])->name('faculty_message');

// Department wise tamplate
Route::get('/department_home/{id}', [DepartmentController::class, 'departmentHome'])->name('department_home');
Route::get('/department_home/{id}/research', [DepartmentController::class, 'departmentResearch'])->name('department_research');
Route::get('/department_home/{id}/notice', [DepartmentController::class, 'departmentNotice'])->name('department_notice');
Route::get('/department_home/{id}/event', [DepartmentController::class, 'departmentEvent'])->name('department_event');
Route::get('/department_home/{id}/news', [DepartmentController::class, 'departmentNews'])->name('department_news');
Route::post('/department_newsEventNotice/{id}/departmentNewsEventNoticeFilter', [DepartmentController::class, 'departmentNewsEventNoticeFilter'])->name('department_departmentNewsEventNoticeFilter');
Route::get('/department_home/{id}/program', [DepartmentController::class, 'departmentProgram'])->name('department_program');
Route::get('/department_home/{id}/all-faculties', [DepartmentController::class, 'allDepartmentMembers'])->name('department_all_faculties');
Route::get('/department_home/{id}/message', [DepartmentController::class, 'departmentMessage'])->name('department_message');
Route::get('/department_home/{id}/contact', [DepartmentController::class, 'departmentContact'])->name('department_contact');
Route::get('/department_home/{id}/gallery', [DepartmentController::class, 'departmentGallery'])->name('department_gallery');
Route::get('/department_home/{id}/faculty-member-details', [DepartmentController::class, 'departmentMemberDetails'])->name('department_member_deatils');
Route::get('/department_home/chair-message/{id}', [DepartmentController::class,'chairMessageDetails'])->name('chair-message.details');

// Conference Home
Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences');
Route::get('/conferences/{slug}/{id}', [ConferenceController::class, 'home'])->name('conferences_home');
Route::get('/conferences/gallery', [ConferenceController::class, 'gallery'])->name('conferences_gallery');
Route::get('/conferences/organizing-committee', [ConferenceController::class, 'organizingCommittee'])->name('organizing_committee');
Route::get('/conferences/guests-speakers', [ConferenceController::class, 'guestsSpeakers'])->name('guests_speakers');

//Route::get('/conferences_home/{id}', [ConferenceController::class, 'departmentHome'])->name('department_home');

//Faculty Member
Route::get('faculty-members', 'Frontend\FacultyMember\FacultyMemberController@FacultyMember')->name('faculty_member');
Route::get('faculty-officers', 'Frontend\FacultyMember\FacultyMemberController@FacultyOfficer')->name('faculty_officer');
Route::get('department-officers', 'Frontend\FacultyMember\FacultyMemberController@departmentOfficer')->name('department_officer');
// Route::get('department-officers', [DepartmentController::class, 'departmentOfficer'])->name('department_officer');
Route::get('faculty-member/details/{id}', 'Frontend\FacultyMember\FacultyMemberController@FacultyMemberDetails')->name('faculty_member.details');

Route::get('faculty-member-head/details/{id}', 'Frontend\FacultyMember\FacultyMemberController@FacultyMemberHeadDetails')->name('faculty_member_head.details');

Route::get('faculty-officer/details/{id}', 'Frontend\FacultyMember\FacultyMemberController@facultyOfficerDetails')->name('faculty.officer.details');
Route::get('all-deans', 'Frontend\FacultyMember\FacultyMemberController@allDeans')->name('all_deans');
Route::get('all-department-chairman', 'Frontend\FacultyMember\FacultyMemberController@allChairman')->name('all_chairman');
Route::get('all-office-head', 'Frontend\FacultyMember\FacultyMemberController@allOfficeHead')->name('all_office_head');
Route::get('all-hall-provosts', 'Frontend\FacultyMember\FacultyMemberController@allHallProvosts')->name('all_hall_provosts');

//Procurement
Route::get('/procurement', [ProcurementController::class, 'procurement'])->name('procurement');
Route::get('/procurement/{id}', [ProcurementController::class, 'procurementSingle'])->name('procurementSingle');

// transport
Route::get('/transport-facilites', 'Frontend\FrontController@transport')->name('transports');
// telephone 
Route::get('/employee_directory', 'Frontend\FrontController@employeeDirectory')->name('employee_directory');
Route::get('/type-wise-category-directory', 'Frontend\FrontController@typeWiseCategoryDirectory')->name('type_wise_category_directory');
Route::get('/faculty-wise-departments', 'Frontend\FrontController@facultyWiseDepartment')->name('faculty_wise_departments');
Route::get('/department-wise-member', 'Frontend\FrontController@departmentWiseMember')->name('department_wise_member');
Route::get('/category-wise-member', 'Frontend\FrontController@CategoryWiseMember')->name('category_wise_member');
Route::get('/all_teacher', 'Frontend\FrontController@allteacher')->name('all_teacher');

//IQAC Start
Route::get('/iqac', 'Frontend\IQAC\IQACController@iqacHome')->name('iqac');
Route::get('/iqac/about/{id}', 'Frontend\IQAC\IQACController@iqacAboutDetails')->name('iqac_about');
Route::get('/iqac-committee', 'Frontend\IQAC\IQACController@iqacCommittee')->name('iqac_committee');
Route::get('/iqac-team', 'Frontend\IQAC\IQACController@iqacTeam')->name('iqac_team');
Route::get('/iqac-training-workshop', 'Frontend\IQAC\IQACController@iqacTrainingWorkshop')->name('iqac_training_workshop');
Route::get('/iqac-training-workshop-details/{id}', 'Frontend\IQAC\IQACController@iqacTrainingWorkshopDetails')->name('iqac_training_workshop_details');
Route::get('/iqac-document', 'Frontend\IQAC\IQACController@iqacDocument')->name('iqac_document');
Route::get('/iqac-activities', 'Frontend\IQAC\IQACController@iqacNewsEvent')->name('iqac_news_event');
Route::get('/iqac-faq', 'Frontend\IQAC\IQACController@iqacFAQ')->name('iqac_faq');
Route::get('/iqac-gallery', 'Frontend\IQAC\IQACController@iqacGallery')->name('iqac_gallery');
Route::get('/iqac-contact', 'Frontend\IQAC\IQACController@iqacContact')->name('iqac_contact');
Route::get('/iqac-message', 'Frontend\IQAC\IQACController@iqacMessage')->name('iqac_message');
// Regulatory body
Route::get('/regulatory-body/{id}', 'Frontend\RegulatoryBody\RegulatoryBodyController@regulatory_body')->name('senate.member');

//bb chair

Route::prefix('bangabandhu_chair')->group(function () {
    Route::get('/', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChair')->name('bangabandhu_chair');
    Route::get('research', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairResearch')->name('bangabandhu_chair.research');
    Route::get('research/{type}/{id}', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairResearchDetail')->name('bangabandhu_chair.research.detail');
    Route::get('project', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairProject')->name('bangabandhu_chair.project');
    Route::get('collaboration', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairCollaboration')->name('bangabandhu_chair.collaboration');
    Route::get('publication', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairPublication')->name('bangabandhu_chair.publication');
    Route::get('publication/{id}', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairPublicationDetails')->name('bangabandhu_chair.publication.details');
    Route::get('gallery', 'Frontend\BangabandhuChair\BangabandhuChairController@bangabandhuChairGallery')->name('bangabandhu_chair.gallery');
});

//oefcd
Route::get('oefcd', 'Frontend\OefcdController@index')->name('oefcd');
Route::get('oefcd/faculty', 'Frontend\OefcdController@faculty')->name('oefcd.faculty');
Route::get('oefcd/staff', 'Frontend\OefcdController@training')->name('oefcd.staff');
Route::get('oefcd/international', 'Frontend\OefcdController@international_affairs')->name('oefcd.affairs');
Route::get('oefcd/curriculumn', 'Frontend\OefcdController@curriculumnDevelopment')->name('oefcd.curriculumn');
Route::get('oefcd/evaluation', 'Frontend\OefcdController@Evaluation')->name('oefcd.evaluation');
Route::get('oefcd/document', 'Frontend\OefcdController@oefcdDocument')->name('oefcd.document');
Route::get('oefcd/message', 'Frontend\OefcdController@oefcdMessage')->name('oefcd.message');


Route::get('oefcd/oefcd_faq', 'Frontend\OefcdController@oefcdFAQ')->name('oefcd.oefcd_faq');
Route::get('oefcd/oefcd_gallery', 'Frontend\OefcdController@oefcdGallery')->name('oefcd.oefcd_gallery');
Route::get('oefcd/gallery/category/{id}', 'Frontend\OefcdController@oefcdGallery_category')->name('oefcd.gallery.category');
Route::get('get_gdata', 'Frontend\OefcdController@get_gdata')->name('get_gdata');

//affiliation
Route::get('affiliate-institute/{id}', 'Frontend\AffiliationController@index')->name('affiliation');
Route::get('all-affiliate-institutes', 'Frontend\AffiliationController@allAffiliation')->name('all.affiliate.institutes');
Route::get('affiliate-institutes-by-type', 'Frontend\AffiliationController@affiliationByType')->name('affiliate_institutes_by_type');

//chsr
//Route::get('/conferences', [ChsrController::class, 'butexConference'])->name('conferences');
Route::get('/ore', [ChsrController::class, 'oreHome'])->name('ore_home');
Route::get('/butex_ore', [ChsrController::class, 'chsr_home'])->name('chsr_home');
Route::get('/chsr/mphil', 'Frontend\Chsr\ChsrController@chsrMphil')->name('chsr_mphil');
Route::get('/chsr/phd', 'Frontend\Chsr\ChsrController@chsrPhd')->name('chsr_phd');
Route::get('/chsr/research-area', 'Frontend\Chsr\ChsrController@chsrResearchArea')->name('chsr_research_area');
Route::get('/chsr/supervisor', 'Frontend\Chsr\ChsrController@chsrSupervisor')->name('chsr_supervisor');
Route::get('/chsr/chsr-awardee', 'Frontend\Chsr\ChsrController@chsrAwardee')->name('chsr_awardee');
Route::get('/chsr/chsr-research-project', 'Frontend\Chsr\ChsrController@chsrResearch')->name('chsr_research');
Route::get('/chsr/chsr-downloads', 'Frontend\Chsr\ChsrController@chsrDownloads')->name('chsr_downloads');
Route::get('/chsr/message', 'Frontend\Chsr\ChsrController@chsrMessage')->name('chsr_message');
Route::get('/chsr/about', 'Frontend\Chsr\ChsrController@chsrAbout')->name('chsr_about');
Route::get('/chsr/people', 'Frontend\Chsr\ChsrController@chsrPeople')->name('chsr_people');
Route::get('/chsr/faq', 'Frontend\Chsr\ChsrController@chsrFaq')->name('chsr_faq');
Route::get('/chsr/all-notices', 'Frontend\Chsr\ChsrController@allChsrNotice')->name('all_chsr_notice');

Route::get('academics', 'Frontend\Academics\FrontAcademicsController@index')->name('academics');
Route::get('academics/{id}', 'Frontend\Academics\FrontAcademicsController@programCategoryWiseProgram')->name('academics.programCategoryWiseProgram');
Route::get('academics/admission/{id}', 'Frontend\Academics\FrontAcademicsController@programCategoryWiseProgramAdmission')->name('academics.programCategoryWiseProgramAdmission');
Route::get('academics/academic_details/{id}', 'Frontend\Academics\FrontAcademicsController@academics_details')->name('academics.academics_details');
Route::get('academics/academic_details/notices/filter', 'Frontend\Academics\FrontAcademicsController@filterProgramNotices')->name('academics.academics_details.notices.filter');
Route::get('academics/academics_admission_details/{id}', 'Frontend\Academics\FrontAcademicsController@academics_admission_details')->name('academics.academics_admission_details');
Route::post('academics_srch', 'Frontend\Academics\FrontAcademicsController@academics_srch')->name('academics_srch');
Route::post('academicsId_srch', 'Frontend\Academics\FrontAcademicsController@academicsId_srch')->name('academicsId_srch');


Route::get('business_studies', 'Frontend\FrontController@business_studies')->name('business_studies');
Route::get('banghabondhu', 'Frontend\FrontController@banghabondhu')->name('banghabondhu');
Route::get('campus-life', 'Frontend\FrontController@campus_life')->name('campus_life');

Route::get('album/{id}/{ref}', 'Frontend\FrontController@album')->name('album');
Route::get('gallery', 'Frontend\FrontController@galleryList')->name('gallery_list');
Route::get('gallery/{id}', 'Frontend\FrontController@galleryListDetails')->name('gallery_details');

Route::get('gallery-view/{type}/{id}/{ref_id?}', 'Frontend\FrontController@galleryView')->name('gallery_view');
Route::get('contact', 'Frontend\FrontController@contact')->name('contact');
Route::get('all-academics', 'Frontend\FrontController@allAcademics')->name('all_academics');
Route::get('all-departments', 'Frontend\FrontController@allDepartments')->name('all_departments');
Route::get('research_and_publication', 'Frontend\FrontController@allResearch')->name('allResearch');
Route::get('media_and_publication', 'Frontend\FrontController@allMedia')->name('allMedia');

Route::get('suggestion', 'Frontend\SuggestionController@suggestion')->name('suggestion');
Route::post('suggestion/store', 'Frontend\SuggestionController@suggestionStore')->name('suggestion_store');
Route::get('/reload-captcha', 'Frontend\SuggestionController@reloadcaptcha')->name('reload.captcha');

//Reset Password
// Route::get('reset/password', 'Backend\PasswordResetController@resetPassword')->name('reset.password');
// Route::post('check/email', 'Backend\PasswordResetController@checkEmail')->name('check.email');
// Route::get('check/name', 'Backend\PasswordResetController@checkName')->name('check.name');
// Route::get('check/code', 'Backend\PasswordResetController@checkCode')->name('check.code');
// Route::post('submit/check/code', 'Backend\PasswordResetController@submitCode')->name('submit.check.code');
// Route::get('new/password', 'Backend\PasswordResetController@newPassword')->name('new.password');
// Route::post('store/new/password', 'Backend\PasswordResetController@newPasswordStore')->name('store.new.password');

Route::get('findapi', function () {
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', '');
    // dd($res);
    $clientdatas = json_decode($res->getBody()->getContents());
    return $clientdatas;
});

// Route::group(['middleware' => 'prevent.back'], function(){
Auth::routes();

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post.login');
Route::get('/verify-token', 'Auth\LoginController@showVerifyTokenForm')->name('verify.token');
Route::post('/verify-token', 'Auth\LoginController@postVerifyToken')->name('post.verify.token');
Route::post('/logout', 'Auth\LoginController@logOut')->name('logOut');

Route::middleware(['auth', 'prevent_back'])->group(function () {
    // Route::middleware(['jisf.auth'])->group(function () {
    Route::get('/home', 'Backend\HomeController@index')->name('dashboard');
    Route::group(['middleware' => ['permission']], function () {
        Route::prefix('menu')->group(function () {
            Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
            Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
            Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
            Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
            Route::post('/update/{id}', 'Backend\Menu\MenuController@update')->name('menu.update');
            Route::get('/subparent', 'Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

            Route::get('/icon', 'Backend\Menu\MenuIconController@index')->name('menu.icon');
            Route::post('icon/store', 'Backend\Menu\MenuIconController@store')->name('menu.icon.store');
            Route::get('icon/edit', 'Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
            Route::post('icon/update/{id}', 'Backend\Menu\MenuIconController@update')->name('menu.icon.update');
            Route::post('icon/delete', 'Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
        });

        Route::get('/search-policy', 'Backend\HomeController@searchPolicy')->name('search.policy');
        Route::get('/policy=details/{id}', 'Backend\HomeController@policyDetails')->name('policy.details');

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('user');
            Route::get('/club-user-list', 'UserController@clubUserList')->name('club.user.list');
            Route::get('/add', 'UserController@userAdd')->name('user.add');
            Route::post('/store', 'UserController@userStore')->name('user.store');
            Route::get('/edit/{id}', 'UserController@userEdit')->name('user.edit');
            Route::post('/update/{id}', 'UserController@updateUser')->name('user.update');
            Route::post('/delete', 'UserController@deleteUser')->name('user.delete');
            Route::get('/reset-password', 'UserController@resetPassword')->name('reset.password');


            Route::get('/add/personals_to_user', 'PersonalUserController@userAdd')->name('personals_user.add');
            Route::post('/store/personals_user', 'PersonalUserController@userStore')->name('personals_user.store');


            Route::get('/add/club_member_user', 'PersonalUserController@clubUserAdd')->name('club_member_user.add');
            Route::post('/store/club_member', 'PersonalUserController@club_member_store')->name('club_member.store');

            //get single personal data
            Route::get('/find_single_profile', 'PersonalUserController@find_single_profile')->name('find_single_profile');

            //get single student data
            Route::get('/find_single_student', 'PersonalUserController@find_single_student')->name('find_single_student');
            // Route::get('/edit/personals_user/{id}', 'UserController@userEdit')->name('personals_user.edit');
            // Route::post('/update/personals_user/{id}', 'UserController@updateUser')->name('personals_user.update');
            // Route::post('/delete/personals_user', 'UserController@deleteUser')->name('personals_user.delete');


            Route::get('/user/status/', 'UserController@userStatus')->name('user.status.change');

            Route::get('/role', 'Backend\Menu\RoleController@index')->name('user.role');
            Route::post('/role/store', 'Backend\Menu\RoleController@storeRole')->name('user.role.store');
            Route::get('/role/edit', 'Backend\Menu\RoleController@getRole')->name('user.role.edit');
            Route::post('/role/update/{id}', 'Backend\Menu\RoleController@updateRole')->name('user.role.update');
            Route::post('/role/delete', 'Backend\Menu\RoleController@deleteRole')->name('user.role.delete');

            Route::get('/permission', 'Backend\Menu\MenuPermissionController@index')->name('user.permission');
            Route::post('/permission/store', 'Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');

            Route::get('/logs', 'Backend\LogController@index')->name('user.logs');
            Route::get('/log-list', 'Backend\LogController@dateWiseLogs')->name('user.date.wise.logs');
        });

        Route::prefix('profile-management')->group(function () {
            //Change Password
            Route::get('change/password', 'Backend\PasswordChangeController@changePassword')->name('profile-management.change.password');
            Route::post('store/password', 'Backend\PasswordChangeController@storePassword')->name('profile-management.store.password');
            //Profile
            Route::get('change/profile', 'Backend\PasswordChangeController@changeProfile')->name('profile-management.change.profile');
            Route::post('store/profile', 'Backend\PasswordChangeController@storeProfile')->name('profile-management.store.profile');
        });

        Route::prefix('frontend-menu')->group(function () {
            //Post
            Route::get('/post/view', 'Backend\Page\PageController@view')->name('frontend-menu.post.view');
            Route::get('/post/add', 'Backend\Page\PageController@add')->name('frontend-menu.post.add');
            Route::post('/post/store', 'Backend\Page\PageController@store')->name('frontend-menu.post.store');
            Route::get('/post/edit/{id}', 'Backend\Page\PageController@edit')->name('frontend-menu.post.edit');
            Route::post('/post/update/{id}', 'Backend\Page\PageController@update')->name('frontend-menu.post.update');
            Route::get('/post/delete', 'Backend\Page\PageController@destroy')->name('frontend-menu.post.destroy');
            //Frontend Menu
            Route::get('/menu/view/{id}', 'Backend\FrontendMenu\FrontendMenuController@view')->name('frontend-menu.menu.view');
            Route::get('/menu/add', 'Backend\FrontendMenu\FrontendMenuController@add')->name('frontend-menu.menu.add');
            Route::post('/menu/single/store', 'Backend\FrontendMenu\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
            Route::post('/menu/store', 'Backend\FrontendMenu\FrontendMenuController@store')->name('frontend-menu.menu.store');
            Route::get('/menu/edit/{id}', 'Backend\FrontendMenu\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
            Route::post('/menu/update/{id}', 'Backend\FrontendMenu\FrontendMenuController@update')->name('frontend-menu.menu.update');
            Route::get('/menu/delete', 'Backend\FrontendMenu\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');

            // Frontend menu type
            Route::get('menu_type/view', 'Backend\FrontendMenu\FrontendMenuController@viewMenuType')->name('frontend-menu.menu_type.view');
            Route::get('menu_type/create', 'Backend\FrontendMenu\FrontendMenuController@createMenuType')->name('frontend-menu.menu_type.create');
            Route::post('menu_type/store', 'Backend\FrontendMenu\FrontendMenuController@storeMenuType')->name('frontend-menu.menu_type.store');
            Route::get('menu_type/edit/{id}', 'Backend\FrontendMenu\FrontendMenuController@editMenuType')->name('frontend-menu.menu_type.edit');
            Route::post('menu_type/update/{id}', 'Backend\FrontendMenu\FrontendMenuController@updateMenuType')->name('frontend-menu.menu_type.update');

            //top menu

            Route::get('top_menu/view', 'Backend\FrontendMenu\FrontendTopMenuController@viewMenu')->name('frontend-menu.top_menu');
            Route::get('top_menu/create', 'Backend\FrontendMenu\FrontendTopMenuController@createMenu')->name('frontend-menu.top_menu.create');
            Route::post('top_menu/store', 'Backend\FrontendMenu\FrontendTopMenuController@storeMenu')->name('frontend-menu.top_menu.store');
            Route::get('top_menu/edit/{id}', 'Backend\FrontendMenu\FrontendTopMenuController@editMenu')->name('frontend-menu.top_menu.edit');
            Route::post('top_menu/update/{id}', 'Backend\FrontendMenu\FrontendTopMenuController@updateMenu')->name('frontend-menu.top_menu.update');
        });

        Route::prefix('about')->group(function () {
            Route::get('/view', 'Backend\AboutController@aboutView')->name('about.overview');
            Route::get('/about/add', 'Backend\AboutController@aboutAdd')->name('about.add');
            Route::post('/about/store', 'Backend\AboutController@aboutStore')->name('about.store');
            Route::get('/about/edit/{id}', 'Backend\AboutController@aboutEdit')->name('about.edit');
            Route::post('/about/update/{id}', 'Backend\AboutController@aboutUpdate')->name('about.update');
            Route::post('/about/delete', 'Backend\AboutController@aboutDelete')->name('about.delete');

            Route::get('vc-information', 'Backend\AboutController@vcInformation')->name('vc.information');
            Route::post('vc-information/{id}', 'Backend\AboutController@vcInformationUpdate')->name('vc.information.update');

            Route::get('vc/honor/board/list', 'Backend\VcHonorBoardController@list')->name('vc.honor.board.list');
            Route::get('vc/honor/board/create', 'Backend\VcHonorBoardController@create')->name('vc.honor.board.create');
            Route::post('vc/honor/board/store', 'Backend\VcHonorBoardController@store')->name('vc.honor.board.store');
            Route::get('vc/honor/board/edit/{id}', 'Backend\VcHonorBoardController@edit')->name('vc.honor.board.edit');
            Route::post('vc/honor/board/update/{id}', 'Backend\VcHonorBoardController@update')->name('vc.honor.board.update');
        });

        Route::prefix('homepages')->group(function () {
            //Slider type
            Route::get('/slider/view', 'Backend\Homepage\SliderController@sliderView')->name('homepages.slider.view');
            Route::get('/slider/type', 'Backend\Homepage\SliderController@sliderTypAdd')->name('homepages.slider.type');
            Route::post('/slider/type/store', 'Backend\Homepage\SliderController@sliderTypeStore')->name('homepages.slider.type.store');
            Route::get('/slider/edit/{id}', 'Backend\Homepage\SliderController@sliderTypeEdit')->name('homepages.slider.type.edit');
            Route::post('/slider/update/{id}', 'Backend\Homepage\SliderController@sliderUpdate')->name('homepages.slider.type.update');
            Route::post('/slider/delete', 'Backend\Homepage\SliderController@sliderDelete')->name('homepages.slider.delete');


            //Slider Add
            Route::get('/slider/add/{id}', 'Backend\Homepage\SliderController@sliderAdd')->name('homepages.slider.add');
            Route::post('slider-store', 'Backend\Homepage\SliderController@sliderStore')->name('homepages.slider-store');
            Route::get('/slider-view/{id}', 'Backend\Homepage\SliderController@typeWiseSlideView')->name('homepages.slider.typeView');
            Route::get('/slider-edit/{id}', 'Backend\Homepage\SliderController@typeWiseSlideEdit')->name('homepages.slider.wise.edit');
            Route::post('slider-update', 'Backend\Homepage\SliderController@sliderWiseUpdate')->name('homepages.slider-update');


            // //About Us
            // Route::get('/about/view', 'Backend\Homepage\AboutController@aboutView')->name('homepages.about.view');
            // Route::get('/about/add', 'Backend\Homepage\AboutController@aboutAdd')->name('homepages.about.add');
            // Route::post('/about/store', 'Backend\Homepage\AboutController@aboutStore')->name('homepages.about.store');
            // Route::get('/about/edit/{id}', 'Backend\Homepage\AboutController@aboutEdit')->name('homepages.about.edit');
            // Route::post('/about/update/{id}', 'Backend\Homepage\AboutController@aboutUpdate')->name('homepages.about.update');
            // Route::post('/about/delete', 'Backend\Homepage\AboutController@aboutDelete')->name('homepages.about.delete');

            //Gallery Category
            Route::get('gallery/category', 'Backend\Homepage\GalleryCategoryController@index')->name('homepages.gallery.category');
            Route::get('gallery/category/add', 'Backend\Homepage\GalleryCategoryController@galleryCategoryAdd')->name('homepages.gallery.category.add');
            Route::post('gallery/category/store', 'Backend\Homepage\GalleryCategoryController@galleryCategoryStore')->name('homepages.gallery.category.store');
            Route::get('gallery/category/edit/{id?}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryEdit')->name('homepages.gallery.category.edit');
            Route::post('gallery/category/update/{id}', 'Backend\Homepage\GalleryCategoryController@galleryCategoryUpdate')->name('homepages.gallery.category.update');
            Route::post('gallery/category/delete', 'Backend\Homepage\GalleryCategoryController@galleryCategoryDelete')->name('homepages.gallery.category.delete');

            //image Gallery
            Route::get('image-gallery', 'Backend\Homepage\ImageGalleryController@index')->name('homepages.gallery');
            Route::get('image-gallery/add', 'Backend\Homepage\ImageGalleryController@galleryAdd')->name('homepages.gallery.add');
            Route::post('image-gallery/store', 'Backend\Homepage\ImageGalleryController@galleryStore')->name('homepages.gallery.store');
            Route::get('image-gallery/edit/{id?}', 'Backend\Homepage\ImageGalleryController@galleryEdit')->name('homepages.gallery.edit');
            Route::post('image-gallery/update/{id}', 'Backend\Homepage\ImageGalleryController@galleryUpdate')->name('homepages.gallery.update');
            Route::post('image-gallery/delete', 'Backend\Homepage\ImageGalleryController@galleryDelete')->name('homepages.gallery.delete');

            //Video Gallery
            Route::get('video-gallery', 'Backend\Homepage\VideoCategoryController@index')->name('homepages.video.gallery');
            Route::get('video-gallery/add', 'Backend\Homepage\VideoCategoryController@galleryAdd')->name('homepages.gallery.add');
            Route::post('video-gallery/store', 'Backend\Homepage\VideoCategoryController@galleryStore')->name('homepages.gallery.store');
            Route::get('video-gallery/edit/{id?}', 'Backend\Homepage\VideoCategoryController@galleryEdit')->name('homepages.gallery.edit');
            Route::post('video-gallery/update/{id}', 'Backend\Homepage\VideoCategoryController@galleryUpdate')->name('homepages.gallery.update');
            Route::post('video-gallery/delete', 'Backend\Homepage\VideoCategoryController@galleryDelete')->name('homepages.gallery.delete');

            //event
            Route::get('/event', 'Backend\Homepage\EventController@index')->name('homepages.event');
            Route::get('/event/add', 'Backend\Homepage\EventController@Add')->name('homepages.event.add');
            Route::post('/event/store', 'Backend\Homepage\EventController@Store')->name('homepages.event.store');
            Route::get('/event/edit/{id}', 'Backend\Homepage\EventController@Edit')->name('homepages.event.edit');
            Route::post('/event/update/{id}', 'Backend\Homepage\EventController@Update')->name('homepages.event.update');
            Route::post('/event/delete', 'Backend\Homepage\EventController@Delete')->name('homepages.event.delete');

            //conference member
            Route::get('/conferences-member', 'Backend\Homepage\ConferenceMemberController@index')->name('conferences.member');
            Route::get('/conferences-member/add', 'Backend\Homepage\ConferenceMemberController@Add')->name('conferences.member.add');
            Route::post('/conferences-member/store', 'Backend\Homepage\ConferenceMemberController@Store')->name('conferences.member.store');
            Route::get('/conferences-member/edit/{id}', 'Backend\Homepage\ConferenceMemberController@Edit')->name('conferences.member.edit');
            Route::post('/conferences-member/update/{id}', 'Backend\Homepage\ConferenceMemberController@Update')->name('conferences.member.update');
            Route::get('/conferences-member/delete/{id}', 'Backend\Homepage\ConferenceMemberController@Delete')->name('conferences.member.delete');

            Route::get('/notice', 'Backend\Homepage\NoticeController@index')->name('homepages.notice');
            Route::get('/news', 'Backend\Homepage\NewsController@index')->name('homepages.news');
        });

        Route::prefix('manage-faculty')->group(function () {
            //Faculty
            Route::get('/faculty', 'Backend\ManageFacultyController@index')->name('manage_faculty.faculty');
            Route::get('/faculty/add', 'Backend\ManageFacultyController@Add')->name('manage_faculty.faculty.add');
            Route::post('/faculty/store', 'Backend\ManageFacultyController@Store')->name('manage_faculty.faculty.store');
            Route::get('/faculty/edit/{id}', 'Backend\ManageFacultyController@Edit')->name('manage_faculty.faculty.edit');
            Route::post('/faculty/update/{id}', 'Backend\ManageFacultyController@Update')->name('manage_faculty.faculty.update');
            Route::post('/faculty/delete', 'Backend\ManageFacultyController@Delete')->name('manage_faculty.faculty.delete');
        });

        Route::prefix('setup')->group(function () {
            // Developed by Mamun
            //Faculty
            Route::get('/faculty', 'Backend\ManageFacultyController@index')->name('setup.manage_faculty');
            Route::get('/faculty/add', 'Backend\ManageFacultyController@Add')->name('setup.manage_faculty.add');
            Route::post('/faculty/store', 'Backend\ManageFacultyController@Store')->name('setup.manage_faculty.store');
            Route::get('/faculty/edit/{id}', 'Backend\ManageFacultyController@Edit')->name('setup.manage_faculty.edit');
            Route::post('/faculty/update/{id}', 'Backend\ManageFacultyController@Update')->name('setup.manage_faculty.update');
            Route::post('/faculty/delete', 'Backend\ManageFacultyController@Delete')->name('setup.manage_faculty.delete');

            //Faculty for API
            Route::get('/faculty-from-api', 'Backend\ManageFacultyController@newFacultyfromApi')->name('setup.manage_faculty.new_faculty_from_api');
            Route::get('/insert-all-faculty-to-db', 'Backend\ManageFacultyController@insertAllToDB')->name('setup.manage_faculty.insert_all_faculty_to_db');

            //Department
            Route::get('/department', 'Backend\ManageDepartmentController@index')->name('setup.manage_department');
            Route::get('/department/add', 'Backend\ManageDepartmentController@Add')->name('setup.manage_department.add');
            Route::post('/department/store', 'Backend\ManageDepartmentController@Store')->name('setup.manage_department.store');
            Route::get('/department/edit/{id}', 'Backend\ManageDepartmentController@Edit')->name('setup.manage_department.edit');
            Route::post('/department/update/{id}', 'Backend\ManageDepartmentController@Update')->name('setup.manage_department.update');
            Route::post('/department/delete', 'Backend\ManageDepartmentController@Delete')->name('setup.manage_department.delete');

            //Department for API
            Route::get('/department-from-api', 'Backend\ManageDepartmentController@newDepartmentfromApi')->name('setup.manage_department.new_department_from_api');
            Route::get('/insert-all-department-to-db', 'Backend\ManageDepartmentController@insertAllToDB')->name('setup.manage_department.insert_all_department_to_db');

            //end by Mamun

            //Form Type status
            Route::get('form_type', 'Backend\FormTypeController@index')->name('setup.form_type');
            Route::get('form_type/add', 'Backend\FormTypeController@add')->name('setup.form_type.add');
            Route::post('form_type/store', 'Backend\FormTypeController@store')->name('setup.form_type.store');
            Route::get('form_type/edit/{id}', 'Backend\FormTypeController@edit')->name('setup.form_type.edit');
            Route::post('form_type/update/{id}', 'Backend\FormTypeController@update')->name('setup.form_type.update');
            Route::get('form_type/delete', 'Backend\FormTypeController@delete')->name('setup.form_type.delete');

            //Form

            Route::get('/form', 'Backend\FormController@index')->name('setup.manage_form');
            Route::get('/form/add', 'Backend\FormController@Add')->name('setup.manage_form.add');
            Route::post('/form/store', 'Backend\FormController@Store')->name('setup.manage_form.store');
            Route::get('/form/edit/{id}', 'Backend\FormController@Edit')->name('setup.manage_form.edit');
            Route::post('/form/update/{id}', 'Backend\FormController@Update')->name('setup.manage_form.update');
            Route::post('/form/delete', 'Backend\FormController@Delete')->name('setup.manage_form.delete');

            // Academic Attachment
            Route::get('/attachment', 'Backend\AttachmentController@index')->name('setup.attachment');
            Route::get('/attachment/add', 'Backend\AttachmentController@Add')->name('setup.attachment.add');
            Route::post('/attachment/store', 'Backend\AttachmentController@Store')->name('setup.attachment.store');
            Route::get('/attachment/edit/{id}', 'Backend\AttachmentController@Edit')->name('setup.attachment.edit');
            Route::post('/attachment/update/{id}', 'Backend\AttachmentController@Update')->name('setup.attachment.update');
            Route::post('/attachment/delete', 'Backend\AttachmentController@Delete')->name('setup.attachment.delete');

            //Academic Result
            Route::get('/academic_result', 'Backend\AcademicResultController@index')->name('setup.academic_result');
            Route::get('/academic_result/add', 'Backend\AcademicResultController@Add')->name('setup.academic_result.add');
            Route::post('/academic_result/store', 'Backend\AcademicResultController@Store')->name('setup.academic_result.store');
            Route::get('/academic_result/edit/{id}', 'Backend\AcademicResultController@Edit')->name('setup.academic_result.edit');
            Route::post('/academic_result/update/{id}', 'Backend\AcademicResultController@Update')->name('setup.academic_result.update');
            Route::post('/academic_result/delete', 'Backend\AcademicResultController@Delete')->name('setup.academic_result.delete');

            //    Route::get('faculty_wise_department','AcademicResultController@facultyWiseDepartment')->name('faculty_wise_department');
            Route::get('department_wise_program', 'Backend\AcademicResultController@DepartmentWiseProgram')->name('department_wise_program');


            // Hall
            Route::get('/hall', 'Backend\HallController@index')->name('setup.manage_hall');
            Route::get('/hall/add', 'Backend\HallController@Add')->name('setup.manage_hall.add');
            Route::post('/hall/store', 'Backend\HallController@Store')->name('setup.manage_hall.store');
            Route::get('/hall/edit/{id}', 'Backend\HallController@Edit')->name('setup.manage_hall.edit');
            Route::post('/hall/update/{id}', 'Backend\HallController@Update')->name('setup.manage_hall.update');
            Route::post('/hall/delete', 'Backend\HallController@Delete')->name('setup.manage_hall.delete');


            //Hall Member
            Route::get('/hall_member/{id}', 'Backend\HallMemberController@index')->name('setup.manage_hall_member');
            Route::get('/hall_member/add/{id}', 'Backend\HallMemberController@Add')->name('setup.manage_hall_member.add');
            Route::post('/hall_member/store', 'Backend\HallMemberController@Store')->name('setup.manage_hall_member.store');
            Route::get('/hall_member/edit/{id}', 'Backend\HallMemberController@Edit')->name('setup.manage_hall_member.edit');
            Route::post('/hall_member/update/{id}', 'Backend\HallMemberController@Update')->name('setup.manage_hall_member.update');
            Route::get('/hall_member/delete/{id}', 'Backend\HallMemberController@memberDelete')->name('setup.manage_hall_member.delete');
            Route::get('/member_wise_hall', 'Backend\HallMemberController@memberWiseHall')->name('member_wise_hall');


            //Program Category
            Route::get('/program_category', 'Backend\ProgramCategoryController@index')->name('setup.program_category');
            Route::get('/program_category/add', 'Backend\ProgramCategoryController@Add')->name('setup.program_category.add');
            Route::post('/program_category/store', 'Backend\ProgramCategoryController@Store')->name('setup.program_category.store');
            Route::get('/program_category/edit/{id}', 'Backend\ProgramCategoryController@Edit')->name('setup.program_category.edit');
            Route::post('/program_category/update/{id}', 'Backend\ProgramCategoryController@Update')->name('setup.program_category.update');
            Route::post('/program_category/delete', 'Backend\ProgramCategoryController@Delete')->name('setup.program_category.delete');

            //Program
            Route::get('/program', 'Backend\ProgramController@index')->name('setup.program');
            Route::get('/program/add', 'Backend\ProgramController@Add')->name('setup.program.add');
            Route::post('/program/store', 'Backend\ProgramController@Store')->name('setup.program.store');
            Route::get('/program/edit/{id}', 'Backend\ProgramController@Edit')->name('setup.program.edit');
            Route::post('/program/update/{id}', 'Backend\ProgramController@Update')->name('setup.program.update');
            // Route::post('/program/delete', 'Backend\ProgramController@Delete')->name('setup.program.delete');
            //Admission ON/OFF
            Route::post('/program/approve/{id}', 'Backend\ProgramController@programApprove')->name('program.approve');
            Route::post('/program/active/{id}', 'Backend\ProgramController@programActive')->name('program.active');

            // Start - Admission 
            // Route::prefix('admission')->group(function () {
                Route::get('list','Backend\Admission\AdmissionController@list')->name('admission.list');
                Route::get('add','Backend\Admission\AdmissionController@add')->name('admission.add');
                Route::post('store','Backend\Admission\AdmissionController@store')->name('admission.store');
                Route::get('edit/{id}','Backend\Admission\AdmissionController@edit')->name('admission.edit');
                Route::post('update/{id}','Backend\Admission\AdmissionController@update')->name('admission.update');
                Route::get('delete','Backend\Admission\AdmissionController@destroy')->name('admission.delete');
            // });
            // End - Admission

            //ajax
            Route::get('faculty-wise-department', 'Backend\ProgramController@facultyWiseDepartment')->name('faculty_wise_department');

            //Program from Api
            Route::get('/program-from-api', 'Backend\Program\ProgramFromApiController@index')->name('setup.program.program_from_api');
            Route::get('/program-from-api/store', 'Backend\Program\ProgramFromApiController@store')->name('setup.program.program_from_api.store');

            //Course
            Route::get('/course', 'Backend\CourseController@index')->name('setup.course');
            Route::get('/course/add', 'Backend\CourseController@add')->name('setup.course.add');
            Route::post('/course/store', 'Backend\CourseController@store')->name('setup.course.store');
            Route::get('/course/edit/{id}', 'Backend\CourseController@edit')->name('setup.course.edit');
            Route::post('/course/update/{id}', 'Backend\CourseController@update')->name('setup.course.update');

            //Course from Api
            Route::get('/course-from-api', 'Backend\CourseController@courseFromApi')->name('setup.course_from_api');
            Route::get('/course-from-api/store', 'Backend\CourseController@storeCourseFromApi')->name('setup.course_from_api.store');

            //FAQ
            Route::get('/faq', 'Backend\FAQController@index')->name('setup.faq');
            Route::get('/faq/add', 'Backend\FAQController@Add')->name('setup.faq.add');
            Route::post('/faq/store', 'Backend\FAQController@Store')->name('setup.faq.store');
            Route::get('/faq/edit/{id}', 'Backend\FAQController@Edit')->name('setup.faq.edit');
            Route::post('/faq/update/{id}', 'Backend\FAQController@Update')->name('setup.faq.update');
            Route::post('/faq/delete', 'Backend\FAQController@Delete')->name('setup.faq.delete');

            //ajax
            Route::get('multiple-faculty-wise-department', 'Backend\FAQController@multipleFacultyWiseDepartment')->name('multiple_faculty_wise_department');
            Route::get('multiple-department-wise-program', 'Backend\FAQController@multipleDepartmentWiseProgram')->name('multiple_department_wise_program');

            //Gallery Category
            Route::get('/gallery_category', 'Backend\GalleryCategoryController@index')->name('setup.gallery_category');
            Route::get('/gallery_category/add', 'Backend\GalleryCategoryController@Add')->name('setup.gallery_category.add');
            Route::post('/gallery_category/store', 'Backend\GalleryCategoryController@Store')->name('setup.gallery_category.store');
            Route::get('/gallery_category/edit/{id}', 'Backend\GalleryCategoryController@Edit')->name('setup.gallery_category.edit');
            Route::post('/gallery_category/update/{id}', 'Backend\GalleryCategoryController@Update')->name('setup.gallery_category.update');
            Route::post('/gallery_category/delete', 'Backend\GalleryCategoryController@Delete')->name('setup.gallery_category.delete');

            Route::get('/gallery/{category_id}/{ref_id?}', 'Backend\GalleryCategoryController@categoryWiseGallery')->name('setup.gallery_category.categoryWiseGallery');
            Route::get('/gallery-add/{category_id}/{ref_id?}', 'Backend\GalleryCategoryController@addCategoryWiseGallery')->name('setup.gallery_category.categoryWiseGallery.add');
            Route::get('/gallery-edit/{id}/{category_id}/{ref_id?}', 'Backend\GalleryCategoryController@editCategoryWiseGallery')->name('setup.gallery_category.categoryWiseGallery.edit');

            //Manage Photo
            Route::get('/photo/list/{category_id}/{type?}/{ref_id?}', 'Backend\PhotoController@index')->name('setup.photo');
            Route::get('/photo/add/{category_id}/{type?}/{ref_id?}', 'Backend\PhotoController@add')->name('setup.photo.add');
            Route::post('/photo/store/{category_id}', 'Backend\PhotoController@Store')->name('setup.photo.store');
            Route::get('/photo/edit/{category_id}/{id}/{type?}/{ref_id?}', 'Backend\PhotoController@Edit')->name('setup.photo.edit');
            Route::post('/photo/update/{category_id}/{id}', 'Backend\PhotoController@Update')->name('setup.photo.update');
            Route::post('/photo/delete', 'Backend\PhotoController@Delete')->name('setup.photo.delete');

            // Route::get('/photo/{category_id}/{type}', 'Backend\PhotoController@typeWisePhoto')->name('setup.photo.typeWisePhoto');

            Route::post('/photo/stores', 'Backend\PhotoController@StoreImage')->name('filepond.server.url');
            //Crop Image Save to folder
            Route::post('crop-image-upload', 'Backend\PhotoController@cropImageSave')->name('crop_image_upload');
            Route::post('/photos/upload', 'Backend\PhotoController@PhotosUpload')->name('setup.photo.photos_upload');



            Route::get('/image', 'Backend\Media\ImageController@index')->name('image.upload');
            Route::post('/submit', 'Backend\Media\ImageController@store')->name('submitImage');
            // Route::post('/submit', 'store')->name('submitImage');


            //route filepond
            Route::post('/upload', 'Backend\Media\UploadController@store')->name('upload');
            Route::delete('/hapus', 'Backend\Media\UploadController@destroy')->name('hapus');
            // Route::delete('/hapus', 'destroy')->name('hapus');


            //Video Gallery
            Route::get('video_gallery', 'Backend\VideoGalleryController@index')->name('setup.video_gallery');
            Route::get('video_gallery/add', 'Backend\VideoGalleryController@addVideoGallery')->name('setup.video_gallery.add');
            Route::post('video_gallery/store', 'Backend\VideoGalleryController@storeVideoGallery')->name('setup.video_gallery.store');
            Route::get('video_gallery/edit/{id}', 'Backend\VideoGalleryController@editVideoGallery')->name('setup.video_gallery.edit');
            Route::post('video_gallery/update/{id}', 'Backend\VideoGalleryController@updateVideoGallery')->name('setup.video_gallery.update');
            Route::post('video_gallery/delete', 'Backend\VideoGalleryController@deleteVideoGallery')->name('setup.video_gallery.delete');



            //Career
            Route::get('career/view', 'Backend\CareerController@index')->name('setup.career.view');
            Route::get('career/add', 'Backend\CareerController@add')->name('setup.career.add');
            Route::post('career/single/store', 'Backend\CareerController@singleStore')->name('setup.career.single.store');
            Route::post('career/store', 'Backend\CareerController@store')->name('setup.career.store');
            Route::get('career/edit/{id}', 'Backend\CareerController@edit')->name('setup.career.edit');
            Route::post('career/update/{id}', 'Backend\CareerController@update')->name('setup.career.update');
            Route::post('career/delete', 'Backend\CareerController@destroy')->name('setup.career.delete');

            Route::get('career/job-circular', 'Backend\CareerController@jobCircular')->name('setup.career.job_circular');
            Route::get('career/job-form', 'Backend\CareerController@jobForm')->name('setup.career.job_form');
            
            Route::get('career/job-result/view', 'Backend\JobResultController@index')->name('setup.career.job_result.view');
            Route::get('career/job-result/add', 'Backend\JobResultController@jobResult')->name('setup.career.job_result');
            Route::get('career/job-result/{id}', 'Backend\JobResultController@edit')->name('setup.career.job_result.edit');
            Route::post('career/job-result/update/{id}', 'Backend\JobResultController@update')->name('setup.career.job_result.update');
            Route::post('career/job-result/store', 'Backend\JobResultController@store')->name('setup.job-result.store');
           

             //Job Category
             Route::get('job-categories/view', 'Backend\JobCategoryController@index')->name('setup.job-categories.view');
             Route::get('job-categories/add', 'Backend\JobCategoryController@add')->name('setup.job-categories.add');
             Route::post('job-categories/store', 'Backend\JobCategoryController@store')->name('setup.job-categories.store');
             Route::get('job-categories/edit/{id}', 'Backend\JobCategoryController@edit')->name('setup.job-categories.edit');
             Route::post('job-categories/update/{id}', 'Backend\JobCategoryController@update')->name('setup.job-categories.update');
             Route::post('job-categories/delete', 'Backend\JobCategoryController@destroy')->name('setup.job-categories.delete');

            //Remove Career Attachment
            Route::get('/remove_career_attachment/{id}', 'Backend\CareerController@careerAttachmentRemove')->name('setup.career.remove_career_attachment');
            Route::post('/remove_career_attachment', 'Backend\CareerController@careerAttachmentRemove')->name('setup.career.remove_career_attachment');
            
            //Office
            Route::get('/office', 'Backend\ManageOfficeController@index')->name('setup.manage_office');
            Route::get('/office/add', 'Backend\ManageOfficeController@Add')->name('setup.manage_office.add');
            Route::post('/office/store', 'Backend\ManageOfficeController@Store')->name('setup.manage_office.store');
            Route::get('/office/edit/{id}', 'Backend\ManageOfficeController@Edit')->name('setup.manage_office.edit');
            Route::post('/office/update/{id}', 'Backend\ManageOfficeController@Update')->name('setup.manage_office.update');
            Route::post('/office/delete', 'Backend\ManageOfficeController@Delete')->name('setup.manage_office.delete');

            //Office for API
            Route::get('/office-from-api', 'Backend\ManageOfficeController@newOfficefromApi')->name('setup.manage_office.new_office_from_api');
            Route::get('/insert-all-office-to-db', 'Backend\ManageOfficeController@insertAllToDB')->name('setup.manage_office.insert_all_office_to_db');

            //Office
            Route::get('/office/facilities/{office_id}', 'Backend\Office\OfficeFacilityController@index')->name('setup.office.facility');
            Route::get('/office/facilities/add/{office_id}', 'Backend\Office\OfficeFacilityController@Add')->name('setup.office.facility.add');
            Route::post('/office/facilities/store/{office_id}', 'Backend\Office\OfficeFacilityController@Store')->name('setup.office.facility.store');
            Route::get('/office/facilities/edit/{id}/{office_id}', 'Backend\Office\OfficeFacilityController@Edit')->name('setup.office.facility.edit');
            Route::post('/office/facilities/update/{id}/{office_id}', 'Backend\Office\OfficeFacilityController@Update')->name('setup.office.facility.update');
            // Route::post('/office/facilities/delete/{office_id}', 'Backend\Office\OfficeFacilityController@Delete')->name('setup.office.facility.delete');


            //Manage Affiliations
            Route::get('/affiliation', 'Backend\AffiliationController@index')->name('setup.affiliation');
            Route::get('/affiliation/add', 'Backend\AffiliationController@Add')->name('setup.affiliation.add');
            Route::post('/affiliation/store', 'Backend\AffiliationController@Store')->name('setup.affiliation.store');
            Route::get('/affiliation/edit/{id}', 'Backend\AffiliationController@Edit')->name('setup.affiliation.edit');
            Route::post('/affiliation/update/{id}', 'Backend\AffiliationController@Update')->name('setup.affiliation.update');
            Route::post('/affiliation/delete', 'Backend\AffiliationController@Delete')->name('setup.affiliation.delete');

            Route::get('/affiliation/api', 'Backend\AffiliationController@getAffiliationsFromApi')->name('affiliation.api');
            Route::get('/affiliation/api/store', 'Backend\AffiliationController@storeAffiliationsFromApi')->name('affiliation.api.store');
            Route::post('affiliation/status_change', 'Backend\AffiliationController@status_change')->name('affiliation.status_change');


            //Custom Pages
            Route::get('/custom_page', 'Backend\CustomPageController@index')->name('setup.custom_page');
            Route::get('/custom_page/add', 'Backend\CustomPageController@Add')->name('setup.custom_page.add');
            Route::post('/custom_page/store', 'Backend\CustomPageController@Store')->name('setup.custom_page.store');
            Route::get('/custom_page/edit/{id}', 'Backend\CustomPageController@Edit')->name('setup.custom_page.edit');
            Route::post('/custom_page/update/{id}', 'Backend\CustomPageController@Update')->name('setup.custom_page.update');
            Route::post('/custom_page/delete', 'Backend\CustomPageController@Delete')->name('setup.custom_page.delete');
        });

        Route::prefix('manage-profile')->group(function () {
            //From API
            Route::get('/profile-office', 'Backend\ProfileFromApiController@index_office')->name('manage_office_profile.from_api');
            Route::get('/profile', 'Backend\ProfileFromApiController@index')->name('manage_profile.from_api');
            Route::get('/profile/add', 'Backend\ProfileFromApiController@Add')->name('manage_profile.from_api.add');
            Route::post('/profile/store', 'Backend\ProfileFromApiController@Store')->name('manage_profile.from_api.store');
            Route::get('/profile/view/{BupNo}', 'Backend\ProfileFromApiController@viewSingleProfile')->name('manage_profile.from_api.view_single_profile');
            Route::get('/profile/view/{NameEng}', 'Backend\ProfileFromApiController@viewSingleProfilewithName')->name('manage_profile.from_api.view_single_profile');
            Route::get('/profile/edit/{id}', 'Backend\ProfileFromApiController@Edit')->name('manage_profile.from_api.edit');
            Route::post('/profile/update/{id}', 'Backend\ProfileFromApiController@Update')->name('manage_profile.from_api.update');
            Route::post('/profile/delete', 'Backend\ProfileFromApiController@Delete')->name('manage_profile.from_api.delete');
            Route::get('/insert-all-to-db', 'Backend\ProfileFromApiController@insertAllToDB')->name('manage_profile.from_api.insertAllToDB');
            Route::get('/insert-all-to-db-office', 'Backend\ProfileFromApiController@insertAllToDB_Office')->name('manage_profile.from_api.insertAllToDB_Office');

            Route::get('/insert-profile-to-db', 'Backend\ProfileFromApiController@insertProfileToDB')->name('manage_profile.from_api.insertProfileToDB');

            //From Database
            Route::get('/profiles_in_database', 'Backend\ProfileFromDatabaseController@index')->name('manage_profile.from_database');
            Route::get('/profiles_in_database/add', 'Backend\ProfileFromDatabaseController@Add')->name('manage_profile.from_database.add');
            Route::post('/profiles_in_database/store', 'Backend\ProfileFromDatabaseController@Store')->name('manage_profile.from_database.store');
            Route::get('/profiles_in_database/view/{BupNo}', 'Backend\ProfileFromDatabaseController@viewSingleProfile')->name('manage_profile.from_database.view_single_profile');
            Route::get('/profiles_in_database/edit/{id}', 'Backend\ProfileFromDatabaseController@Edit')->name('manage_profile.from_database.edit');
            Route::post('/profiles_in_database/update/{id}', 'Backend\ProfileFromDatabaseController@Update')->name('manage_profile.from_database.update');
            Route::post('/profiles_in_database/delete', 'Backend\ProfileFromDatabaseController@Delete')->name('manage_profile.from_database.delete');
            Route::get('/updated-list-in-faculty-api', 'Backend\ProfileFromDatabaseController@updatedListInFacultyApi')->name('manage_profile.from_database.updated_list_in_faculty_api');
            //Modified Personnels
            Route::get('/modified_personnels/edit/{BupNo}', 'Backend\ProfileFromDatabaseController@editModifiedPersonnels')->name('manage_profile.from_database.edit_modified_personnels');
            Route::post('/modified_personnels/update/{BupNo}', 'Backend\ProfileFromDatabaseController@updateModifiedPersonnels')->name('manage_profile.from_database.update_modified_personnels');

            //Profile Journal Info Edit
            Route::get('/profile_journal_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_journal_info_edit')->name('profile_journal_info_edit');
            Route::post('/profile_journal_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_journal_info_update')->name('profile_journal_info_update');
            Route::post('/remove_profile_journal', 'Backend\ProfileOtherInfosController@profile_journal_remove')->name('remove_profile_journal');
            //Profile Journal Info Add
            Route::get('/profile_journal_info_add', 'Backend\ProfileOtherInfosController@profile_journal_info_add')->name('profile_journal_info_add');
            Route::post('/profile_journal_info_store', 'Backend\ProfileOtherInfosController@profile_journal_info_store')->name('profile_journal_info_store');

            //Profile Conference Info Edit
            Route::get('/profile_conference_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_conference_info_edit')->name('profile_conference_info_edit');
            Route::post('/profile_conference_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_conference_info_update')->name('profile_conference_info_update');
            Route::post('/remove_profile_conference', 'Backend\ProfileOtherInfosController@profile_conference_remove')->name('remove_profile_conference');

            //Profile Book Info Edit
            Route::get('/profile_book_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_book_info_edit')->name('profile_book_info_edit');
            Route::post('/profile_book_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_book_info_update')->name('profile_book_info_update');
            Route::post('/remove_profile_book', 'Backend\ProfileOtherInfosController@profile_book_remove')->name('remove_profile_book');

            //Profile Biography Info Edit
            Route::get('/profile_biography_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_biography_info_edit')->name('profile_biography_info_edit');
            Route::post('/profile_biography_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_biography_info_update')->name('profile_biography_info_update');
            Route::post('/remove_profile_biography', 'Backend\ProfileOtherInfosController@profile_biography_remove')->name('remove_profile_biography');

            //Profile Professional Activity Info Edit
            Route::get('/profile_professional_activity_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_professional_activity_info_edit')->name('profile_professional_activity_info_edit');
            Route::post('/profile_professional_activity_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_professional_activity_info_update')->name('profile_professional_activity_info_update');
            Route::post('/remove_profile_professional_activity', 'Backend\ProfileOtherInfosController@profile_professional_activity_remove')->name('remove_profile_professional_activity');


            //Profile Course Taught Info Edit
            Route::get('/profile_course_taught_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_course_taught_info_edit')->name('profile_course_taught_info_edit');
            Route::post('/profile_course_taught_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_course_taught_info_update')->name('profile_course_taught_info_update');
            Route::post('/remove_profile_course_taught', 'Backend\ProfileOtherInfosController@profile_course_taught_remove')->name('remove_profile_course_taught');

            //Profile Award Honor Info Edit
            Route::get('/profile_award_honor_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_award_honor_info_edit')->name('profile_award_honor_info_edit');
            Route::post('/profile_award_honor_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_award_honor_info_update')->name('profile_award_honor_info_update');
            Route::post('/remove_profile_award_honor', 'Backend\ProfileOtherInfosController@profile_award_honor_remove')->name('remove_profile_award_honor');

            //Profile Membership Info Edit
            Route::get('/profile_membership_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_membership_info_edit')->name('profile_membership_info_edit');
            Route::post('/profile_membership_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_membership_info_update')->name('profile_membership_info_update');
            Route::post('/remove_profile_membership', 'Backend\ProfileOtherInfosController@profile_membership_remove')->name('remove_profile_membership');

            //Profile Research Area Interest Info Edit
            Route::get('/profile_research_area_interest_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_area_interest_info_edit')->name('profile_research_area_interest_info_edit');
            Route::post('/profile_research_area_interest_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_area_interest_info_update')->name('profile_research_area_interest_info_update');
            Route::post('/remove_profile_research_area_interest', 'Backend\ProfileOtherInfosController@profile_research_area_interest_remove')->name('remove_profile_research_area_interest');

            //Profile Training Info Edit
            Route::get('/profile_training_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_training_info_edit')->name('profile_training_info_edit');
            Route::post('/profile_training_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_training_info_update')->name('profile_training_info_update');
            Route::post('/remove_profile_training', 'Backend\ProfileOtherInfosController@profile_training_remove')->name('remove_profile_training');

            //Profile Acheivement Info Edit
            Route::get('/profile_achievement_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_achievement_info_edit')->name('profile_achievement_info_edit');
            Route::post('/profile_achievement_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_achievement_info_update')->name('profile_achievement_info_update');
            Route::post('/remove_profile_achievement', 'Backend\ProfileOtherInfosController@profile_achievement_remove')->name('remove_profile_achievement');

            //Profile Google Scholar Info Edit
            Route::get('/profile_google_scholar_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_google_scholar_info_edit')->name('profile_google_scholar_info_edit');
            Route::post('/profile_google_scholar_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_google_scholar_info_update')->name('profile_google_scholar_info_update');
            Route::post('/remove_profile_google_scholar', 'Backend\ProfileOtherInfosController@profile_google_scholar_remove')->name('remove_profile_google_scholar');

            //Profile Research Gate Info Edit
            Route::get('/profile_research_gate_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_gate_info_edit')->name('profile_research_gate_info_edit');
            Route::post('/profile_research_gate_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_research_gate_info_update')->name('profile_research_gate_info_update');
            Route::post('/remove_profile_research_gate', 'Backend\ProfileOtherInfosController@profile_research_gate_remove')->name('remove_profile_research_gate');

            //Profile Website Info Edit
            Route::get('/profile_website_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_website_info_edit')->name('profile_website_info_edit');
            Route::post('/profile_website_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_website_info_update')->name('profile_website_info_update');
            Route::post('/remove_profile_website', 'Backend\ProfileOtherInfosController@profile_website_remove')->name('remove_profile_website');
            //Profile Social media Info Edit
            Route::get('/profile_Social_media_info_edit/{profile_id}', 'Backend\ProfileOtherInfosController@profile_social_media_info_edit')->name('profile_Social_media_info_edit');
            Route::post('/profile_Social_media_info_update/{profile_id}', 'Backend\ProfileOtherInfosController@profile_social_media_info_update')->name('profile_Social_media_info_update');
            Route::post('/remove_profile_Social_media', 'Backend\ProfileOtherInfosController@profile_social_media_remove')->name('remove_profile_Social_media');
            Route::post('/profile_Social_media_store', 'Backend\ProfileOtherInfosController@profile_Social_media_store')->name('profile_Social_media_store');
            // Route::post('/profile_Social_media_store/{id}', 'Backend\ProfileOtherInfosController@profile_Social_media_store')->name('profile_Social_media_store');

            //Personnels to Faculty
            Route::get('/personnels_to_faculty', 'Backend\PersonnelsToFacultyController@index')->name('manage_profile.personnels_to_faculty');
            Route::get('/personnels_to_faculty/add', 'Backend\PersonnelsToFacultyController@Add')->name('manage_profile.personnels_to_faculty.add');
            Route::post('/personnels_to_faculty/store', 'Backend\PersonnelsToFacultyController@Store')->name('manage_profile.personnels_to_faculty.store');
            Route::get('/personnels_to_faculty/view/{BupNo}', 'Backend\PersonnelsToFacultyController@viewSingleProfile')->name('manage_profile.personnels_to_faculty.view_single_profile');
            Route::get('/personnels_to_faculty/edit/{id}', 'Backend\PersonnelsToFacultyController@Edit')->name('manage_profile.personnels_to_faculty.edit');
            Route::post('/personnels_to_faculty/update/{id}', 'Backend\PersonnelsToFacultyController@Update')->name('manage_profile.personnels_to_faculty.update');
            Route::post('/personnels_to_faculty/delete', 'Backend\PersonnelsToFacultyController@Delete')->name('manage_profile.personnels_to_faculty.delete');

            Route::post('personnels_to_faculty/status_change', 'Backend\PersonnelsToFacultyController@status_change')->name('personnels_to_faculty.status_change');

            //Personnels to Faculty Officer
            Route::get('/personnels_to_faculty_officer', 'Backend\PersonnelsToFacultyOfficerController@index')->name('manage_profile.personnels_to_faculty_officer');
            Route::get('/personnels_to_faculty_officer/add', 'Backend\PersonnelsToFacultyOfficerController@Add')->name('manage_profile.personnels_to_faculty_officer.add');
            Route::post('/personnels_to_faculty_officer/store', 'Backend\PersonnelsToFacultyOfficerController@Store')->name('manage_profile.personnels_to_faculty_officer.store');
            Route::get('/personnels_to_faculty_officer/view/{BupNo}', 'Backend\PersonnelsToFacultyOfficerController@viewSingleProfile')->name('manage_profile.personnels_to_faculty_officer.view_single_profile');
            Route::get('/personnels_to_faculty_officer/edit/{id}', 'Backend\PersonnelsToFacultyOfficerController@Edit')->name('manage_profile.personnels_to_faculty_officer.edit');
            Route::post('/personnels_to_faculty_officer/update/{id}', 'Backend\PersonnelsToFacultyOfficerController@Update')->name('manage_profile.personnels_to_faculty_officer.update');
            Route::post('/personnels_to_faculty_officer/delete', 'Backend\PersonnelsToFacultyOfficerController@Delete')->name('manage_profile.personnels_to_faculty_officer.delete');

            Route::post('personnels_to_faculty_officer/status_change', 'Backend\PersonnelsToFacultyOfficerController@status_change')->name('personnels_to_faculty_officer.status_change');

            //Personnels to Office
            Route::get('/personnels_to_office', 'Backend\PersonnelsToOfficeController@index')->name('manage_profile.personnels_to_office');
            Route::get('/personnels_to_office/add', 'Backend\PersonnelsToOfficeController@Add')->name('manage_profile.personnels_to_office.add');
            Route::post('/personnels_to_office/store', 'Backend\PersonnelsToOfficeController@Store')->name('manage_profile.personnels_to_office.store');
            Route::get('/personnels_to_office/view/{BupNo}', 'Backend\PersonnelsToOfficeController@viewSingleProfile')->name('manage_profile.personnels_to_office.view_single_profile');
            Route::get('/personnels_to_office/edit/{id}', 'Backend\PersonnelsToOfficeController@Edit')->name('manage_profile.personnels_to_office.edit');
            Route::post('/personnels_to_office/update/{id}', 'Backend\PersonnelsToOfficeController@Update')->name('manage_profile.personnels_to_office.update');
            Route::post('/personnels_to_office/delete', 'Backend\PersonnelsToOfficeController@Delete')->name('manage_profile.personnels_to_office.delete');

            Route::post('personnels_to_office/status_change', 'Backend\PersonnelsToOfficeController@status_change')->name('personnels_to_office.status_change');

            Route::get('personnels_to_office/member-wise-designation', 'Backend\PersonnelsToOfficeController@MemberWiseDesignation')->name('person_wise_designation');

            //Personnels to Office
            // Route::get('/personnels_to_dean_office', 'Backend\PersonnelsToDeanOfficeController@index')->name('manage_profile.personnels_to_dean_office');
            // Route::get('/personnels_to_dean_office/add', 'Backend\PersonnelsToDeanOfficeController@Add')->name('manage_profile.personnels_to_dean_office.add');
            // Route::post('/personnels_to_dean_office/store', 'Backend\PersonnelsToDeanOfficeController@Store')->name('manage_profile.personnels_to_dean_office.store');
            // Route::get('/personnels_to_dean_office/edit/{id}', 'Backend\PersonnelsToDeanOfficeController@Edit')->name('manage_profile.personnels_to_dean_office.edit');
            // Route::post('/personnels_to_dean_office/update/{id}', 'Backend\PersonnelsToDeanOfficeController@Update')->name('manage_profile.personnels_to_dean_office.update');
            // Route::post('/personnels_to_dean_office/delete', 'Backend\PersonnelsToDeanOfficeController@Delete')->name('manage_profile.personnels_to_dean_office.delete');
        });

        Route::prefix('news')->group(function () {
            Route::get('/list', 'Backend\NewsController@index')->name('news.list');
            Route::get('/add', 'Backend\NewsController@add')->name('news.add');
            Route::post('/store', 'Backend\NewsController@store')->name('news.store');
            Route::get('/edit/{id}', 'Backend\NewsController@edit')->name('news.edit');
            Route::post('/update/{id}', 'Backend\NewsController@update')->name('news.update');
            Route::post('/delete', 'Backend\NewsController@delete')->name('news.delete');
            Route::get('/approve/{id}', 'Backend\NewsController@approve')->name('news.approve');
            Route::get('/reject/{id}', 'Backend\NewsController@reject')->name('news.reject');

            Route::get('news-event-notice/filter_news', 'Backend\NewsController@filterNews')->name('news.filter_news');
            Route::get('news-event-notice/filter_event', 'Backend\NewsController@filterEvent')->name('news.filter_event');
            Route::get('news-event-notice/filter_notice', 'Backend\NewsController@filterNotice')->name('news.filter_notice');
            Route::get('news-event-notice/filter_notice/{id}', 'Backend\NewsController@filterNotice_category')->name('news.filter_notice_filter');
            Route::get('news-event-notice/filter_faculty/{id}', 'Backend\NewsController@filterFaculty')->name('news.filter_faculty');
            Route::get('news-event-notice/filter_department/{id}', 'Backend\NewsController@filterDepartment')->name('news.filter_department');
            Route::get('news-event-notice/filter_office/{id}', 'Backend\NewsController@filterOffice')->name('news.filter_office');
            Route::get('news-event-notice/filter_club/{id}', 'Backend\NewsController@filterClub')->name('news.filter_club');
            Route::get('news-event-notice/filter_hall/{id}', 'Backend\NewsController@filterHall')->name('news.filter_hall');
            Route::get('news-event-notice/filter_general_notice', 'Backend\NewsController@filterGeneralNotice')->name('news.filter_general_notice');
            Route::get('news-event-notice/filter_special_notice', 'Backend\NewsController@filterSpecialNotice')->name('news.filter_special_notice');
            Route::get('news-event-notice/filter_tender_notice', 'Backend\NewsController@filterTenderNotice')->name('news.filter_tender_notice');

            //Publication status
            Route::get('publication_status', 'Backend\PublicationStatusController@index')->name('news.publication_status');
            Route::get('publication_status/add', 'Backend\PublicationStatusController@add')->name('news.publication_status.add');
            Route::post('publication_status/store', 'Backend\PublicationStatusController@store')->name('news.publication_status.store');
            Route::get('publication_status/edit/{id}', 'Backend\PublicationStatusController@edit')->name('news.publication_status.edit');
            Route::post('publication_status/update/{id}', 'Backend\PublicationStatusController@update')->name('news.publication_status.update');
            Route::get('publication_status/delete', 'Backend\PublicationStatusController@delete')->name('news.publication_status.delete');

            // On Going Research

            Route::get('ongoing_research', 'Backend\OngoingResearchController@index')->name('news.ongoing_research');
            Route::get('ongoing_research/add', 'Backend\OngoingResearchController@add')->name('news.ongoing_research.add');
            Route::post('ongoing_research/store', 'Backend\OngoingResearchController@store')->name('news.ongoing_research.store');
            Route::get('ongoing_research/edit/{id}', 'Backend\OngoingResearchController@edit')->name('news.ongoing_research.edit');
            Route::post('ongoing_research/update/{id}', 'Backend\OngoingResearchController@update')->name('news.ongoing_research.update');
            Route::get('ongoing_research/delete', 'Backend\OngoingResearchController@delete')->name('news.ongoing_research.delete');

            //Completed Research
            Route::get('completed_research', 'Backend\CompletedResearchController@index')->name('news.completed_research');
            Route::get('completed_research/add', 'Backend\CompletedResearchController@add')->name('news.completed_research.add');
            Route::post('completed_research/store', 'Backend\CompletedResearchController@store')->name('news.completed_research.store');
            Route::get('completed_research/edit/{id}', 'Backend\CompletedResearchController@edit')->name('news.completed_research.edit');
            Route::post('completed_research/update/{id}', 'Backend\CompletedResearchController@update')->name('news.completed_research.update');
            Route::get('completed_research/delete', 'Backend\CompletedResearchController@delete')->name('news.completed_research.delete');

            //Research

            Route::get('research', 'Backend\Research\ResearchController@index')->name('news.research');
            Route::get('research/add', 'Backend\Research\ResearchController@add')->name('news.research.add');
            Route::post('research/store', 'Backend\Research\ResearchController@store')->name('news.research.store');
            Route::get('research/edit/{id}', 'Backend\Research\ResearchController@edit')->name('news.research.edit');
            Route::post('research/update/{id}', 'Backend\Research\ResearchController@update')->name('news.research.update');
            Route::get('research/delete', 'Backend\Research\ResearchController@delete')->name('news.completed_research.delete');

            // news letter
            Route::get('news_letter/list', 'Backend\NewsletterController@index')->name('news.newsletter.list');
            Route::get('news_letter/add', 'Backend\NewsletterController@add')->name('news.newsletter.add');
            Route::post('news_letter/store', 'Backend\NewsletterController@store')->name('news.newsletter.store');
            Route::get('news_letter/edit/{id}', 'Backend\NewsletterController@edit')->name('news.newsletter.edit');
            Route::post('news_letter/update/{id}', 'Backend\NewsletterController@update')->name('news.newsletter.update');
            Route::post('news_letter/status_change', 'Backend\NewsletterController@status_change')->name('news.newsletter.status_change');


            // Magazine
            Route::get('magazine/list', 'Backend\MagazineController@index')->name('news.magazine.list');
            Route::get('magazine/add', 'Backend\MagazineController@add')->name('news.magazine.add');
            Route::post('magazine/store', 'Backend\MagazineController@store')->name('news.magazine.store');
            Route::get('magazine/edit/{id}', 'Backend\MagazineController@edit')->name('news.magazine.edit');
            Route::post('magazine/update/{id}', 'Backend\MagazineController@update')->name('news.magazine.update');
            Route::post('magazine/status_change', 'Backend\MagazineController@status_change')->name('news.magazine.status_change');


            //Journal Paper
            Route::get('journal/list', 'Backend\JournalController@index')->name('news.journal_paper.list');
            Route::get('journal/add', 'Backend\JournalController@add')->name('news.journal_paper.add');
            Route::post('journal/store', 'Backend\JournalController@store')->name('news.journal_paper.store');
            Route::get('journal/edit/{id}', 'Backend\JournalController@edit')->name('news.journal_paper.edit');
            Route::post('journal/update/{id}', 'Backend\JournalController@update')->name('news.journal_paper.update');

            //convocation Paper
            Route::get('convocation/list', 'Backend\ConvocationController@index')->name('news.convocation.list');
            Route::get('convocation/add', 'Backend\ConvocationController@add')->name('news.convocation.add');
            Route::post('convocation/store', 'Backend\ConvocationController@store')->name('news.convocation.store');
            Route::get('convocation/edit/{id}', 'Backend\ConvocationController@edit')->name('news.convocation.edit');
            Route::put('convocation/update/{id}', 'Backend\ConvocationController@update')->name('news.convocation.update');
            Route::delete('convocation/destroy/{id}', 'Backend\ConvocationController@destroy')->name('news.convocation.destroy');

            // Route::get('delete','Backend\JournalController@delete')->name('journal_paper.delete');

            //Article (Shafi - 6 April 2022)
            Route::get('article/list/{type}/{ref_id}', 'Backend\ArticleController@index')->name('news.article.list');
            Route::get('article/add/{type}/{ref_id}', 'Backend\ArticleController@add')->name('news.article.add');
            Route::post('article/store/{type}/{ref_id}', 'Backend\ArticleController@store')->name('news.article.store');
            Route::get('article/edit/{type}/{ref_id}/{id}', 'Backend\ArticleController@edit')->name('news.article.edit');
            Route::post('article/update/{type}/{ref_id}/{id}', 'Backend\ArticleController@update')->name('news.article.update');
        });

        // Develop by Mamun 6 september
        Route::prefix('regulatory_bodies')->group(function () {
            Route::get('/committee-member-setup', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@index')->name('regulatory_bodies.committe.member.setup');
            Route::get('/committee-type-create', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@create')->name('regulatory_bodies.committe.type.create');
            Route::post('/committee-type-store', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@store')->name('regulatory_bodies.committe.type.store');
            Route::get('/committee-type-edit/{id}', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@edit')->name('regulatory_bodies.committe.type.edit');
            Route::post('/committee-type-update/{id}', 'Backend\RegulatoryBody\RegulatoryCommitteSetupController@update')->name('regulatory_bodies.committe.type.update');

            Route::get('/committee-member', 'Backend\RegulatoryBody\CommitteeController@index')->name('regulatory_bodies.senate.committee.member');
            Route::get('/committee-member/add', 'Backend\RegulatoryBody\CommitteeController@create')->name('regulatory_bodies.senate.committee.member.add');
            Route::post('/committee-member/store', 'Backend\RegulatoryBody\CommitteeController@store')->name('regulatory_bodies.senate.committee.member.store');
            Route::get('/committee-member/edit/{id}', 'Backend\RegulatoryBody\CommitteeController@edit')->name('regulatory_bodies.senate.committee.member.edit');
            Route::post('/committee-member/update/{id}', 'Backend\RegulatoryBody\CommitteeController@update')->name('regulatory_bodies.senate.committee.member.update');

            Route::post('/member/status/{id}', 'Backend\RegulatoryBody\CommitteeController@statusChange')->name('member.status.change');

            Route::get('/committee-member/{comittee_type_id}', 'Backend\RegulatoryBody\CommitteeController@committeeByType')->name('regulatory_bodies.senate.committee.member.by_type');

            // Route::get('/senate-committee-member', 'Backend\SenateCommitteeController@index')->name('regulatory_bodies.senate.committee.member');
            // Route::get('/senate-committee-member/add', 'Backend\SenateCommitteeController@create')->name('regulatory_bodies.senate.committee.member.add');
            // Route::post('/senate-committee-member/store', 'Backend\SenateCommitteeController@store')->name('regulatory_bodies.senate.committee.member.store');
            // Route::get('/senate-committee-member/edit/{id}', 'Backend\SenateCommitteeController@edit')->name('regulatory_bodies.senate.committee.member.edit');
            // Route::post('/senate-committee-member/update/{id}', 'Backend\SenateCommitteeController@update')->name('regulatory_bodies.senate.committee.member.update');

            // Route::post('/member/status/{id}','Backend\SenateCommitteeController@statusChange')->name('member.status.change');

            Route::get('/syndicate-committee-member', 'Backend\SyndicateCommitteeMemberController@index')->name('syndicate.committee.member');
            Route::get('/syndicate-committee-member/add', 'Backend\SyndicateCommitteeMemberController@create')->name('syndicate.committee.member.add');
            Route::post('/syndicate-committee-member/store', 'Backend\SyndicateCommitteeMemberController@store')->name('syndicate.committee.member.store');
            Route::get('/syndicate-committee-member/edit/{id}', 'Backend\SyndicateCommitteeMemberController@edit')->name('syndicate.committee.member.edit');
            Route::post('/syndicate-committee-member/update/{id}', 'Backend\SyndicateCommitteeMemberController@update')->name('syndicate.committee.member.update');

            Route::get('/academic-council-member', 'Backend\AcademicCommitteeMemberController@index')->name('academic.committee.member');
            Route::get('/academic-council-member/add', 'Backend\AcademicCommitteeMemberController@create')->name('academic.committee.member.add');
            Route::post('/academic-council-member/store', 'Backend\AcademicCommitteeMemberController@store')->name('academic.committee.member.store');
            Route::get('/academic-council-member/edit/{id}', 'Backend\AcademicCommitteeMemberController@edit')->name('academic.committee.member.edit');
            Route::post('/academic-council-member/update/{id}', 'Backend\AcademicCommitteeMemberController@update')->name('academic.committee.member.update');


            Route::get('/finance-committee-member', 'Backend\FinanceCommitteeMemberController@index')->name('finance.committee.member');
            Route::get('/finance-committee-member/add', 'Backend\FinanceCommitteeMemberController@create')->name('finance.committee.member.add');
            Route::post('/academic-committee-member/store', 'Backend\FinanceCommitteeMemberController@store')->name('finance.committee.member.store');
            Route::get('/finance-committee-member/edit/{id}', 'Backend\FinanceCommitteeMemberController@edit')->name('finance.committee.member.edit');
            Route::post('/finance-committee-member/update/{id}', 'Backend\FinanceCommitteeMemberController@update')->name('finance.committee.member.update');
        });
        // Develop by Mamun 7 september
        Route::prefix('club')->group(function () {

            Route::get('view', 'Backend\ClubController@clubView')->name('club.view');

            Route::get('/event/list/{id}', 'Backend\ClubController@club_event_list')->name('club.events.list');
            Route::get('/list', 'Backend\ClubController@index')->name('club.list');
            Route::get('/new-add', 'Backend\ClubController@create')->name('club.add');
            Route::post('/club-store', 'Backend\ClubController@store')->name('club.store');
            Route::get('/club-edit/club_id={id}', 'Backend\ClubController@edit')->name('club.edit');
            Route::post('/club-update/{id}', 'Backend\ClubController@update')->name('club.update');
            Route::post('/club-delete', 'Backend\ClubController@delete')->name('club.delete');

            Route::get('/get-department/{id}', 'Backend\ClubController@getDepartment')->name('get-department');

            // add club-member -> rename to team
            Route::prefix('team')->group(function () {
                Route::get('/list', 'Backend\ClubMemberController@index')->name('club.member.list');
                Route::get('/list/without/club', 'Backend\ClubMemberController@member_list');
                Route::get('/add', 'Backend\ClubMemberController@create')->name('club.member.add');
                Route::post('/store', 'Backend\ClubMemberController@store')->name('club.member.store');
                Route::get('/edit/{id}', 'Backend\ClubMemberController@edit')->name('club.member.edit');
                Route::post('/update/{id}', 'Backend\ClubMemberController@update')->name('club.member.update');
                Route::post('/delete', 'Backend\ClubMemberController@delete')->name('club.member.delete');
                Route::post('/delete-photo', 'Backend\ClubMemberController@deletePhoto')->name('club.member.delete.photo');

                Route::get('/assign-to-club-list', 'Backend\ClubMemberController@assignToClubList')->name('club.assign.to.club.list');
                Route::get('/assign-to-club', 'Backend\ClubMemberController@assignToClub')->name('club.assign.to.club');
                Route::post('/assign-to-club', 'Backend\ClubMemberController@memberAssignToClub')->name('club.member.assign.to.club');
                Route::get('/assign-to-club/edit/{id}', 'Backend\ClubMemberController@assignToClubEdit')->name('club.assign.to.club.edit');
                Route::post('/assign-to-club/update/{id}', 'Backend\ClubMemberController@assignToClubUpdate')->name('club.assign.to.club.update');
                Route::post('/assign-to-club/delete', 'Backend\ClubMemberController@assignToClubDelete')->name('club.assign.to.club.delete');
                Route::get('/assign-member-by-club', 'Backend\ClubMemberController@assignMemberByClub')->name('assign.member.by.club');
            });
            // add club-moderator
            Route::prefix('moderator')->group(function () {

                Route::get('/list', 'Backend\ClubModeratorController@index')->name('club.moderator.list');
                Route::get('/assign-to-club', 'Backend\ClubModeratorController@assignToClub')->name('club.moderator.assign.to.club');
                Route::post('/assign-to-club', 'Backend\ClubModeratorController@moderatorAssignToClubStore')->name('club.moderator.assign.to.club.store');
                Route::get('/assign-to-club/edit/{id}', 'Backend\ClubModeratorController@assignToClubEdit')->name('club.moderator.assign.to.club.edit');
                Route::post('/assign-to-club/update/{id}', 'Backend\ClubModeratorController@moderatorAssignToClubUpdate')->name('club.moderator.assign.to.club.update');
                Route::post('/moderator-delete', 'Backend\ClubModeratorController@delete')->name('club.moderator.delete');
            });
        });

        Route::prefix('alumni')->group(function () {

            Route::get('view', 'Backend\AlumniController@alumniView')->name('alumni.view');

            Route::get('/event/list/{id}', 'Backend\AlumniController@alumni_event_list')->name('alumni.events.list');
            Route::get('/list', 'Backend\AlumniController@index')->name('alumni.list');
            Route::get('/new-add', 'Backend\AlumniController@create')->name('alumni.add');
            Route::post('/alumni-store', 'Backend\AlumniController@store')->name('alumni.store');
            Route::get('/alumni-edit/alumni_id={id}', 'Backend\AlumniController@edit')->name('alumni.edit');
            Route::post('/alumni-update/{id}', 'Backend\AlumniController@update')->name('alumni.update');
            Route::post('/alumni-delete', 'Backend\AlumniController@delete')->name('alumni.delete');

            Route::get('/get-department/{id}', 'Backend\AlumniController@getDepartment')->name('get-department');

            // add alumni-member -> rename to team
            Route::prefix('team')->group(function () {
                Route::get('/list', 'Backend\AlumniMemberController@index')->name('alumni.member.list');
                Route::get('/list/without/alumni', 'Backend\AlumniMemberController@member_list');
                Route::get('/add', 'Backend\AlumniMemberController@create')->name('alumni.member.add');
                Route::post('/store', 'Backend\AlumniMemberController@store')->name('alumni.member.store');
                Route::get('/edit/{id}', 'Backend\AlumniMemberController@edit')->name('alumni.member.edit');
                Route::post('/update/{id}', 'Backend\AlumniMemberController@update')->name('alumni.member.update');
                Route::post('/delete', 'Backend\AlumniMemberController@delete')->name('alumni.member.delete');
                Route::post('/delete-photo', 'Backend\AlumniMemberController@deletePhoto')->name('alumni.member.delete.photo');

                Route::get('/assign-to-alumni-list', 'Backend\AlumniMemberController@assignToAlumniList')->name('alumni.assign.to.alumni.list');
                Route::get('/assign-to-alumni', 'Backend\AlumniMemberController@assignToAlumni')->name('alumni.assign.to.alumni');
                Route::post('/assign-to-alumni', 'Backend\AlumniMemberController@memberAssignToAlumni')->name('alumni.member.assign.to.alumni');
                Route::get('/assign-to-alumni/edit/{id}', 'Backend\AlumniMemberController@assignToAlumniEdit')->name('alumni.assign.to.alumni.edit');
                Route::post('/assign-to-alumni/update/{id}', 'Backend\AlumniMemberController@assignToAlumniUpdate')->name('alumni.assign.to.alumni.update');
                Route::post('/assign-to-alumni/delete', 'Backend\AlumniMemberController@assignToAlumniDelete')->name('alumni.assign.to.alumni.delete');
                Route::get('/assign-member-by-alumni', 'Backend\AlumniMemberController@assignMemberByAlumni')->name('assign.member.by.alumni');
            });
            // add Alumni-moderator
            Route::prefix('moderator')->group(function () {

                Route::get('/list', 'Backend\AlumniModeratorController@index')->name('alumni.moderator.list');
                Route::get('/assign-to-alumni', 'Backend\AlumniModeratorController@assignToAlumni')->name('alumni.moderator.assign.to.alumni');
                Route::post('/assign-to-alumni', 'Backend\AlumniModeratorController@moderatorAssignToAlumniStore')->name('alumni.moderator.assign.to.alumni.store');
                Route::get('/assign-to-alumni/edit/{id}', 'Backend\AlumniModeratorController@assignToAlumniEdit')->name('alumni.moderator.assign.to.alumni.edit');
                Route::post('/assign-to-alumni/update/{id}', 'Backend\AlumniModeratorController@moderatorAssignToAlumniUpdate')->name('alumni.moderator.assign.to.alumni.update');
                Route::post('/moderator-delete', 'Backend\AlumniModeratorController@delete')->name('alumni.moderator.delete');
            });
        });

        Route::prefix('financial-aid')->group(function () {
            Route::get('edit/', 'Backend\FinancialAidController@edit')->name('financial-aid.edit');
            Route::post('update/{id}', 'Backend\FinancialAidController@update')->name('financial-aid.update');
        });


        Route::prefix('lab-center')->group(function () {

            Route::get('list', 'Backend\LabCenterController@index')->name('lab-center.list');
            Route::get('add', 'Backend\LabCenterController@addlab')->name('lab-center.add');
            Route::post('store', 'Backend\LabCenterController@store')->name('lab-center.store');
            Route::get('edit/{id}', 'Backend\LabCenterController@edit')->name('lab-center.edit');
            Route::post('update/{id}', 'Backend\LabCenterController@update')->name('lab-center.update');
            Route::post('status_change', 'Backend\LabCenterController@status_change')->name('lab-center.status_change');
        });

        Route::prefix('dean-office')->group(function () {
            // Dean's Office
            Route::get('list', 'Backend\DeanInformationController@index')->name('dean-office.information');
            Route::get('add', 'Backend\DeanInformationController@add')->name('dean-office.add');
            Route::post('store', 'Backend\DeanInformationController@store')->name('dean-office.store');
            Route::get('edit/{id}', 'Backend\DeanInformationController@edit')->name('dean-office.edit');
            Route::post('update/{id}', 'Backend\DeanInformationController@update')->name('dean-office.update');
            Route::post('status_change', 'Backend\DeanInformationController@status_change')->name('dean-office.status_change');
            // Dean's Staff List
            Route::get('/staff_list/{id}', 'Backend\DeanStaffListController@index')->name('dean-office.staff_list');
            Route::get('/staff_list/add/{id}', 'Backend\DeanStaffListController@add')->name('dean-office.staff_list.add');
            Route::post('/staff_list/store', 'Backend\DeanStaffListController@store')->name('dean-office.staff_list.store');
            Route::get('/staff_list/edit/{id}/{faculty_id}', 'Backend\DeanStaffListController@edit')->name('dean-office.staff_list.edit');
            Route::post('/staff_list/update/{id}', 'Backend\DeanStaffListController@update')->name('dean-office.staff_list.update');
            // Dean's Honor Board
            Route::get('honor_board/list', 'Backend\DeanHonorBoardController@index')->name('dean-office.honor_board.list');
            Route::get('honor_board/add', 'Backend\DeanHonorBoardController@add')->name('dean-office.honor_board.add');
            Route::post('honor_board/store', 'Backend\DeanHonorBoardController@store')->name('dean-office.honor_board.store');
            Route::get('honor_board/edit/{id}', 'Backend\DeanHonorBoardController@edit')->name('dean-office.honor_board.edit');
            Route::post('honor_board/update/{id}', 'Backend\DeanHonorBoardController@update')->name('dean-office.honor_board.update');
            Route::post('honor_board/status_change', 'Backend\DeanHonorBoardController@status_change')->name('dean-office.honor_board.status_change');
        });

        // Transport (Shafi - 3 Nov 2022)
        Route::prefix('transport')->group(function () {
            // University Transport

            Route::get('/route_list', 'Backend\TransportController@index')->name('transport.list');
            Route::get('/route_create', 'Backend\TransportController@create')->name('transport.create');
            Route::post('/route_store', 'Backend\TransportController@store')->name('transport.store');
            Route::get('/route_edit/{id}', 'Backend\TransportController@edit')->name('transport.edit');
            Route::post('/route_update/{id}', 'Backend\TransportController@update')->name('transport.update');
            Route::get('/route_delete/{id}', 'Backend\TransportController@delete')->name('transport.delete');

            // Transport Time
            Route::get('/route_time/{id}', 'Backend\RouteTimeController@index')->name('route.time.list');
            Route::get('/route_time_create/{id}', 'Backend\RouteTimeController@create')->name('route.time.create');
            Route::post('/route_time_store', 'Backend\RouteTimeController@store')->name('route.time.store');
            Route::get('/route_time_edit/{id}', 'Backend\RouteTimeController@edit')->name('route.time.edit');
            Route::post('/route_time_update/{id}', 'Backend\RouteTimeController@update')->name('route.time.update');
            Route::get('/route_time_delete/{id}', 'Backend\RouteTimeController@delete')->name('route.time.delete');
        });
        
        Route::prefix('noc')->group(function () {
            Route::get('list', 'Backend\NocController@index')->name('noc.list');
            Route::get('add', 'Backend\NocController@add_noc')->name('noc.add');
            Route::post('store', 'Backend\NocController@store')->name('noc.store');
            Route::get('edit/{id}', 'Backend\NocController@edit')->name('noc.edit');
            Route::post('update/{id}', 'Backend\NocController@update')->name('noc.update');
            Route::post('status_change', 'Backend\NocController@status_change')->name('noc.status_change');
            Route::get('category-wise-deptOrOffice', 'Backend\NocController@categoryWiseDeptOrOffice')->name('category_wise_deptOrOffice');
            Route::get('member-wise-designation', 'Backend\NocController@MemberWiseDesignation')->name('member_wise_designation');
            Route::get('department-wise-member', 'Backend\NocController@departmentWiseMember')->name('department_wise_member');
            Route::get('office-wise-member', 'Backend\NocController@officeWiseMember')->name('office_wise_member');
        });

        Route::prefix('landing-modal')->group(function () {
            Route::get('list', 'Backend\LandingModalController@index')->name('landing-modal.modal_list');
            Route::get('add', 'Backend\LandingModalController@addmodal')->name('landing-modal.add');
            Route::post('store', 'Backend\LandingModalController@store')->name('landing-modal.store');
            Route::get('edit/{id}', 'Backend\LandingModalController@edit')->name('landing-modal.edit');
            Route::post('update/{id}', 'Backend\LandingModalController@update')->name('landing-modal.update');
            Route::post('status_change', 'Backend\LandingModalController@status_change')->name('landing-modal.status_change');
            Route::post('/delete', 'Backend\LandingModalController@deleteImage')->name('landing-modal.img.delete');
        });

        Route::prefix('marquee')->group(function () {
            Route::get('list', 'Backend\MarqueeController@index')->name('marquee.list');
            Route::get('add', 'Backend\MarqueeController@add')->name('marquee.add');
            Route::post('store', 'Backend\MarqueeController@store')->name('marquee.store');
            Route::get('edit/{id}', 'Backend\MarqueeController@edit')->name('marquee.edit');
            Route::post('update/{id}', 'Backend\MarqueeController@update')->name('marquee.update');
            // Route::get('delete/{id}', 'Backend\MarqueeController@delete')->name('marquee.delete');
            // Route::post('status_change', 'Backend\MarqueeController@status_change')->name('marquee.status_change');
        });

        Route::prefix('cpc')->group(function () {
            Route::get('view', 'Backend\CpcController@view')->name('cpc.view');
            Route::get('add', 'Backend\CpcController@add')->name('cpc.add');
            Route::post('store', 'Backend\CpcController@store')->name('cpc.store');
            Route::get('event/list/{id}', 'Backend\CpcController@eventList')->name('cpc.event.list');
            Route::get('news/list/{id}', 'Backend\CpcController@newstList')->name('cpc.news.list');

            // Conatct information
            Route::get('/contact', 'Backend\CpcController@viewCpcHomeContact')->name('cpc.home.contact');
            Route::post('/contact/store', 'Backend\CpcController@storeCpcHomeContact')->name('cpc.home.contact.store');
            Route::post('/contact/update/{id}', 'Backend\CpcController@updateCpcHomeContact')->name('cpc.home.contact.update');

            // cpc section
            Route::get('section/{id}', 'Backend\CpcController@cpcSectionList')->name('cpc.section');
            Route::get('cpc-section/add/{id}', 'Backend\CpcController@sectionAdd')->name('cpc.section.add');
            Route::post('cpc-section/store/{id}', 'Backend\CpcController@sectionStore')->name('cpc.section.store');
            Route::get('cpc-section-edit/{section_id}/{id}', 'Backend\CpcController@sectionEdit')->name('cpc.section.edit');
            Route::post('cpc-section-update/{id}', 'Backend\CpcController@updateCpcSection')->name('cpc.section.update');

            Route::get('cpc-team', 'Backend\CpcController@ourTeam')->name('cpc.section.ourteam');

            Route::get('cpc-resource-people-list/{cpc_id}', 'Backend\CpcController@resourceList')->name('cpc.section.people.list');
            Route::get('cpc-resource-people/{cpc_id}', 'Backend\CpcController@resourcePeople')->name('cpc.section.people');
            Route::post('cpc-resource-people-store', 'Backend\CpcController@resourceStore')->name('cpc.resource.perople.store');

            Route::get('cpc-section-faq-list/{cpc_id}', 'Backend\CpcController@cpcFaqList')->name('cpc.section.faq.list');
            Route::get('cpc-section-faq/{cpc_id}', 'Backend\CpcController@cpcFaq')->name('cpc.section.faq');
            Route::post('cpc-faq-store', 'Backend\CpcController@cpcfaqStore')->name('cpc.faq.store');
            // Route::get('cpc-section-contact/{cpc_id}','Backend\CpcController@cpcFaq')->name('cpc.section.faq');

            Route::get('cpc-contact-list/{cpc_id}', 'Backend\CpcController@cpcContactList')->name('cpc.contact.list');
            Route::get('cpc-contact/{cpc_id}', 'Backend\CpcController@cpcContact')->name('cpc.contact');
            Route::get('cpc-contact-edit/{cpc_id}/{id}', 'Backend\CpcController@cpcContactEdit')->name('cpc.contact.edit');
            Route::post('cpc-contact-store', 'Backend\CpcController@cpcContactStore')->name('cpc.contact.store');
            Route::post('cpc-contact-update/{id}', 'Backend\CpcController@cpcContactUpdate')->name('cpc.contact.update');
        });

        Route::prefix('special_achievement')->group(function () {
            //News
            Route::get('/list', 'Backend\SpecialAchievementController@index')->name('special_achievement.list');
            Route::get('/add', 'Backend\SpecialAchievementController@add')->name('special_achievement.add');
            Route::post('/store', 'Backend\SpecialAchievementController@store')->name('special_achievement.store');
            Route::get('/edit/{id}', 'Backend\SpecialAchievementController@edit')->name('special_achievement.edit');
            Route::post('/update/{id}', 'Backend\SpecialAchievementController@update')->name('special_achievement.update');
            Route::get('/delete', 'Backend\SpecialAchievementController@delete')->name('special_achievement.delete');

            Route::get('achievement/filter_student', 'Backend\SpecialAchievementController@filterStudent')->name('special_achievement.filter_student');
            Route::get('achievement/filter_teacher', 'Backend\SpecialAchievementController@filterTeacher')->name('special_achievement.filter_teacher');
            Route::get('achievement/filter_organization', 'Backend\SpecialAchievementController@filterOrganization')->name('special_achievement.filter_organization');
        });

        // On Campus Facilities
        Route::prefix('on-campus')->group(function () {
            Route::get('facilities', 'Backend\OnCampusFacilitesController@FacilityList')->name('facilities');
            Route::get('facility-edit/{id}', 'Backend\OnCampusFacilitesController@FacilityEdit')->name('on.campus.facility');
            Route::post('facility-update/{id}', 'Backend\OnCampusFacilitesController@FacilityUpdate')->name('on.campus.update');
        });

        Route::prefix('site-settings')->group(function () {
            // From Builder
            Route::post('addFromBuilder', 'Backend\ButexBuilder\ButexFormBuilderController@store')->name('save.formTemplate');
            Route::post('updateFromBuilder', 'Backend\ButexBuilder\ButexFormBuilderController@update')->name('update.formTemplate');
            Route::post('changeStatusFromBuilder', 'Backend\ButexBuilder\ButexFormBuilderController@updateTemplateStatus')->name('save.StatusFormTemplate');
            Route::post('deleteFromBuilder', 'Backend\ButexBuilder\ButexFormBuilderController@deleteFormTemplate')->name('delete.formTemplate');
            Route::post('deleteUserFromData', 'Backend\ButexBuilder\ButexFormBuilderController@deleteUserForm')->name('delete.userForm');
            Route::post('customFormTemplateDelete', 'Frontend\ButexFormController@customFormTemplateDelete')->name('delete.customFormTemplateDelete');
            Route::get('butex_form_builder', 'Backend\ButexBuilder\ButexFormBuilderController@index')->name('butex_form_builder');
            Route::get('all_form_template', 'Backend\ButexBuilder\ButexFormBuilderController@show')->name('all_form_template');
            Route::get('all_custom_form/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@showCustomForm')->name('all_custom_form');
            Route::get('single_custom_form/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@showSingleCustomForm')->name('single_custom_form');
            Route::get('single_custom_form_view/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@showSingleCustomFormView')->name('single_custom_form_view');
            Route::get('single_custom_excel_form/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@showSingleCustomExcelForm')->name('single_custom_excel_form');
            Route::get('template_single/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@view')->name('template_single');
            Route::get('data_single/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@Dataview')->name('data_single');
            Route::get('data_single_print/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@DataviewPrint')->name('data_single_print');
            Route::get('data_single_print_image/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@DataviewPrintImage')->name('data_single_print_image');
            Route::get('edit_form/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@edit')->name('edit_form');
            Route::get('user_form/{id}', 'Backend\ButexBuilder\ButexFormBuilderController@userForm')->name('user_form');

            // Butext Builder
            Route::get('butex_builder', 'Backend\ButexBuilder\ButexBuilderController@index')->name('butex_builder');
            Route::get('butex_themes/{page_id}/{page_tab_id}', 'Backend\ButexBuilder\ButexBuilderController@butexThemes')->name('butex_themes');
            Route::get('butex_builder/{id}', 'Backend\ButexBuilder\ButexBuilderController@index')->name('show.butex_builder');
            Route::get('butex_builder/{id}/{tab_id}', 'Backend\ButexBuilder\ButexBuilderController@index')->name('show.butex_builder');
            Route::get('theme_builder/{page_id}/{page_tab_id}', 'Backend\ButexBuilder\ButexBuilderController@themes')->name('show.butex_builder');
            
            Route::post('addSection', 'Backend\ButexBuilder\ButexBuilderController@store')->name('section.store');
            Route::post('addCustomComponent', 'Backend\ButexBuilder\ButexBuilderController@storeComponent')->name('store.component');
            Route::get('deleteSection', 'Backend\ButexBuilder\ButexBuilderController@destroy')->name('section.delete');
            Route::get('deleteColumn', 'Backend\ButexBuilder\ButexBuilderController@destroyCol')->name('column.delete');
            Route::get('deleteComponent', 'Backend\ButexBuilder\ButexBuilderController@destroyComponent')->name('component.delete');
            Route::post('addComponents', 'Backend\ButexBuilder\ButexBuilderController@addComponent')->name('add.component');
            Route::get('components', 'Backend\ButexBuilder\ButexBuilderController@getComponents')->name('show.component');
            Route::post('store-design', 'Backend\ButexBuilder\ButexBuilderController@storeDesign')->name('store.design');
            Route::post('store-themes', 'Backend\ButexBuilder\ButexBuilderController@storeThemes')->name('store.themes');
            Route::post('store-install', 'Backend\ButexBuilder\ButexBuilderController@storeInstall')->name('store.install');
            Route::post('store-design-component', 'Backend\ButexBuilder\ButexBuilderController@storeComponentDesign')->name('store.designComponent');
            Route::post('store-design-theme', 'Backend\ButexBuilder\ButexBuilderController@storeThemeDesign')->name('store.designTheme');
            // Create Componenta
            Route::get('create-component', 'Backend\ButexBuilder\ButexBuilderController@indexComponent')->name('create.component');
            Route::get('delete-compoenet/{id}', 'Backend\ButexBuilder\ButexBuilderController@deleteComponent')->name('delete.component');
            Route::get('edit-component/{id}/{col}/{page}/{tabe}', 'Backend\ButexBuilder\ButexBuilderController@editComponent')->name('edit.component');
            Route::get('design-section/{id}', 'Backend\ButexBuilder\ButexBuilderController@designSection')->name('design.section');
            Route::get('design-component/{id}/{page_id}/{page_tab_id}', 'Backend\ButexBuilder\ButexBuilderController@designComponent')->name('design.component');

            // Section Order
            Route::post('post-reorder', 'Backend\ButexBuilder\ButexBuilderController@reorder')->name('components.updateOrder');
            Route::post('page.status', 'Backend\ButexBuilder\ButexBuilderController@savePage')->name('page.status');

            //Slider
            Route::get('slider/{slider_master_id}', 'Backend\SliderController@index')->name('site-setting.slider')->where('slider_master_id', '[0-9]+');
            Route::get('slider/add/{slider_master_id}', 'Backend\SliderController@addSlider')->name('site-setting.slider.add');
            Route::post('slider/store', 'Backend\SliderController@storeSlider')->name('site-setting.slider.store');
            Route::get('slider/edit/{slider_master_id}/{id}', 'Backend\SliderController@editSlider')->name('site-setting.slider.edit');
            Route::post('slider/update/{id}', 'Backend\SliderController@updateSlider')->name('site-setting.slider.update');
            Route::post('slider/delete', 'Backend\SliderController@deleteSlider')->name('site-setting.slider.delete');
            //Slider Video
            // Route::post('slider/store/video', 'SliderController@storeSliderVideo')->name('site-setting.slider.store_video');

            //Slider Master
            Route::get('slider-master', 'Backend\SliderMasterController@index')->name('site-setting.slider-master');
            Route::get('slider-master/add', 'Backend\SliderMasterController@add')->name('site-setting.slider-master.add');
            Route::post('slider-master/store', 'Backend\SliderMasterController@store')->name('site-setting.slider-master.store');
            Route::get('slider-master/edit/{id}', 'Backend\SliderMasterController@edit')->name('site-setting.slider-master.edit');
            Route::post('slider-master/update/{id}', 'Backend\SliderMasterController@update')->name('site-setting.slider-master.update');
            Route::post('slider-master/delete', 'Backend\SliderMasterController@delete')->name('site-setting.slider-master.delete');

            //Banner
            Route::get('banner', 'Backend\BannerController@index')->name('site-setting.banner');
            Route::get('banner/add', 'Backend\BannerController@add')->name('site-setting.banner.add');
            Route::post('banner/store', 'Backend\BannerController@store')->name('site-setting.banner.store');
            Route::get('banner/edit/{id}', 'Backend\BannerController@edit')->name('site-setting.banner.edit');
            Route::post('banner/update/{id}', 'Backend\BannerController@update')->name('site-setting.banner.update');
            Route::post('banner/delete', 'Backend\BannerController@delete')->name('site-setting.banner.delete');

            //Logo
            Route::get('logo', 'Backend\LogoController@index')->name('site-setting.logo');
            Route::get('logo/add', 'Backend\LogoController@add')->name('site-setting.logo.add');
            Route::post('logo/store', 'Backend\LogoController@store')->name('site-setting.logo.store');
            Route::get('logo/edit/{id}', 'Backend\LogoController@edit')->name('site-setting.logo.edit');
            Route::post('logo/update/{id}', 'Backend\LogoController@update')->name('site-setting.logo.update');
            Route::post('logo/delete', 'Backend\LogoController@delete')->name('site-setting.logo.delete');

            // Study Leave
            Route::get('/leave', 'Backend\StudyLeaveController@index')->name('manage_leave');
            Route::get('/leave/add', 'Backend\StudyLeaveController@add')->name('manage_leave.add');
            Route::post('/leave/store', 'Backend\StudyLeaveController@store')->name('manage_leave.store');
            Route::get('/leave/edit/{id}', 'Backend\StudyLeaveController@edit')->name('manage_leave.edit');
            Route::post('/leave/update/{id}', 'Backend\StudyLeaveController@update')->name('manage_leave.update');
            Route::post('/leave/delete', 'Backend\StudyLeaveController@delete')->name('manage_leave.delete');

            //designation
            Route::get('/designation', 'DesignationController@index')->name('user.designation');
            Route::get('/designation/add', 'DesignationController@add')->name('user.designation.add');
            Route::post('/designation/store', 'DesignationController@store')->name('user.designation.store');
            Route::get('/designation/edit/{id}', 'DesignationController@edit')->name('user.designation.edit');
            Route::post('/designation/update/{id}', 'DesignationController@update')->name('user.designation.update');
            Route::post('/designation/delete', 'DesignationController@delete')->name('user.designation.delete');

            //Numbers at a glancelanding-modal/list
            Route::get('/at-a-glance', 'Backend\AtAGlanceController@index')->name('site-setting.at_a_glance');
            Route::post('/at-a-glance/store', 'Backend\AtAGlanceController@store')->name('site-setting.at_a_glance.store');
            Route::post('/at-a-glance/update/{id}', 'Backend\AtAGlanceController@update')->name('site-setting.at_a_glance.update');

            // Conatct information
            Route::get('/contact', 'Backend\ContactController@index')->name('site-setting.contact');
            Route::post('/contact/store', 'Backend\ContactController@store')->name('site-setting.contact.store');
            Route::post('/contact/update/{id}', 'Backend\ContactController@update')->name('site-setting.contact.update');

            //Chitizen charter
            Route::get('/citizen-charter/edit', 'Backend\CitizenCharterController@edit')->name('site-setting.citizen-charter.edit');
            Route::post('/citizen-charter/update', 'Backend\CitizenCharterController@update')->name('site-setting.citizen-charter.update');
        });

        Route::prefix('chsr')->group(function () {
            Route::get('/view', 'Backend\Chsr\AboutChsrController@aboutView')->name('chsr.view');
            // Route::get('/vision', 'Backend\Chsr\AboutChsrController@vision')->name('chsr.vision');
            // Route::get('/mission', 'Backend\Chsr\AboutChsrController@mission')->name('chsr.mission');
            // Route::get('/goal', 'Backend\Chsr\AboutChsrController@goal')->name('chsr.goal');
            // Route::get('/organogram', 'Backend\Chsr\AboutChsrController@organogram')->name('chsr.organogram');
            // Route::get('/contact', 'Backend\Chsr\AboutChsrController@organogram')->name('chsr.contact');

            Route::get('/faq-tt', 'Backend\Chsr\AboutChsrController@faq')->name('chsr.faq');
            Route::get('/faq/create', 'Backend\Chsr\AboutChsrController@create')->name('chsr.faq.create');
            Route::post('/faq/store', 'Backend\Chsr\AboutChsrController@store')->name('chsr.faq.store');
            Route::post('/faq/update', 'Backend\Chsr\AboutChsrController@update')->name('chsr.faq.update');

            Route::get('/chsr-edit/{id}', 'Backend\Chsr\AboutChsrController@editChsr')->name('chsr.edit');
            Route::post('/chsr-update/{id}', 'Backend\Chsr\AboutChsrController@updateChsr')->name('chsr.update');

            Route::get('office/view', 'Backend\Chsr\ChsrOfficeController@index')->name('chsr.about.office');
            Route::get('office/add', 'Backend\Chsr\ChsrOfficeController@create')->name('chsr.about.create');
            Route::post('office/store', 'Backend\Chsr\ChsrOfficeController@store')->name('chsr.about.store');
            Route::get('office/edit/{id}', 'Backend\Chsr\ChsrOfficeController@edit')->name('chsr.about.edit');
            Route::post('office/update/{id}', 'Backend\Chsr\ChsrOfficeController@update')->name('chsr.about.update');
            Route::get('office/profile_wise_rank', 'Backend\Chsr\ChsrOfficeController@profileWiseRank')->name('profile_wise_rank');

            Route::get('office/dean-lists', 'Backend\Chsr\ChsrOfficeController@deanList')->name('chsr.dean.list');
            Route::get('office/director-lists', 'Backend\Chsr\ChsrOfficeController@directorList')->name('chsr.director.list');
            Route::get('office/deputy-director-lists', 'Backend\Chsr\ChsrOfficeController@deputyDirectorList')->name('chsr.deputy.director.list');
            Route::get('office/assistant-director-lists', 'Backend\Chsr\ChsrOfficeController@assistantDirectorList')->name('chsr.assistant.director.list');
            Route::get('office/officer-lists', 'Backend\Chsr\ChsrOfficeController@officerList')->name('chsr.officer.list');

            Route::get('program/list', 'Backend\Chsr\ChsrProgramController@index')->name('chsr.programs');
            Route::get('program/add', 'Backend\Chsr\ChsrProgramController@create')->name('chsr.program.create');

            Route::get('researcher/lists', 'Backend\Chsr\ChsrResearcherController@index')->name('chsr.researcher.list');
            Route::get('researcher/add', 'Backend\Chsr\ChsrResearcherController@create')->name('chsr.researcher.create');
            Route::post('researcher/store', 'Backend\Chsr\ChsrResearcherController@store')->name('chsr.researcher.store');
            Route::get('researcher/edit/{id}', 'Backend\Chsr\ChsrResearcherController@edit')->name('chsr.researcher.edit');
            Route::get('researcher/update/{id}', 'Backend\Chsr\ChsrResearcherController@update')->name('chsr.researcher.update');
            Route::get('researcher/view/{id}', 'Backend\Chsr\ChsrResearcherController@viewSingle')->name('chsr.researcher.view');

            Route::get('/category_wise_program', 'Backend\Chsr\ChsrResearcherController@categoryWiseProgram')->name('category_wise_program');

            Route::get('supervisor/lists', 'Backend\Chsr\ChsrSupervisorController@index')->name('chsr.supervisor.list');
            Route::get('supervisor/add', 'Backend\Chsr\ChsrSupervisorController@create')->name('chsr.supervisor.create');
            Route::post('supervisor/store', 'Backend\Chsr\ChsrSupervisorController@store')->name('chsr.supervisor.store');
            Route::get('supervisor/edit/{id}', 'Backend\Chsr\ChsrSupervisorController@edit')->name('chsr.supervisor.edit');
            Route::post('supervisor/update/{id}', 'Backend\Chsr\ChsrSupervisorController@update')->name('chsr.supervisor.update');
            Route::post('supervisor/delete', 'Backend\Chsr\ChsrSupervisorController@delete')->name('chsr.supervisor.delete');

            Route::get('research-project/lists', 'Backend\Chsr\ChsrResearcherController@projectList')->name('chsr.research.project.list');

            Route::get('/faq/lists', 'Backend\Chsr\ChsrFaqController@faqList')->name('chsr.faq.list');

            Route::get('/admission/requirements', 'Backend\Chsr\ChsrProgramAdmissionRequirementController@create')->name('chsr.admission.requirements');
            Route::post('/admission/requirements/store', 'Backend\Chsr\ChsrProgramAdmissionRequirementController@store')->name('chsr.admission.requirements.store');

            Route::get('/team', 'Backend\Chsr\ChsrTeamController@index')->name('chsr.manage_team');
            Route::get('/team/add', 'Backend\Chsr\ChsrTeamController@add')->name('chsr.manage_team.add');
            Route::post('/team/store', 'Backend\Chsr\ChsrTeamController@store')->name('chsr.manage_team.store');
            Route::get('/team/edit/{id}', 'Backend\Chsr\ChsrTeamController@edit')->name('chsr.manage_team.edit');
            Route::post('/team/update/{id}', 'Backend\Chsr\ChsrTeamController@update')->name('chsr.manage_team.update');
            Route::get('/team/delete', 'Backend\Chsr\ChsrTeamController@delete')->name('chsr.manage_team.delete');


            Route::get('/research-area/list', 'Backend\Chsr\ChsrResearchAreaController@index')->name('chsr.manage_research_area');
            Route::get('/research-area/add', 'Backend\Chsr\ChsrResearchAreaController@add')->name('chsr.manage_research_area.add');
            Route::post('/research-area/store', 'Backend\Chsr\ChsrResearchAreaController@store')->name('chsr.manage_research_area.store');
            Route::get('/research-area/edit/{id}', 'Backend\Chsr\ChsrResearchAreaController@edit')->name('chsr.manage_research_area.edit');
            Route::post('/research-area/update/{id}', 'Backend\Chsr\ChsrResearchAreaController@update')->name('chsr.manage_research_area.update');
            Route::get('/research-area/delete', 'Backend\Chsr\ChsrResearchAreaController@delete')->name('chsr.manage_research_area.delete');
        });

        Route::get('/view-home-link', 'Backend\HomeLinkController@viewHomeLink')->name('home_link');
        Route::get('/add-home-link', 'Backend\HomeLinkController@addHomeLink')->name('home_link.add');
        Route::post('/store-home-link', 'Backend\HomeLinkController@storeHomeLink')->name('home_link.store');
        Route::get('/edit-home-link/{id}', 'Backend\HomeLinkController@editHomeLink')->name('home_link.edit');
        Route::post('/update-home-link/{id}', 'Backend\HomeLinkController@updateHomeLink')->name('home_link.update');
        Route::post('/delete-home-link', 'Backend\HomeLinkController@deleteHomeLink')->name('home_link.delete');

        // manage events
        Route::get('/event', 'Backend\EventController@index')->name('event.list');
        Route::get('/add', 'Backend\EventController@create')->name('event.add');
        Route::post('/store', 'Backend\EventController@store')->name('event.store');
        Route::get('/edit/club_id={id}', 'Backend\EventController@edit')->name('event.edit');
        Route::get('/edit/alumni_id={id}', 'Backend\EventController@editAlumni')->name('event.alumni.edit');
        Route::post('/update/{id}', 'Backend\EventController@update')->name('event.update');
        Route::get('/delete', 'Backend\EventController@delete')->name('event.delete');

        // update conference menu
        Route::post('/conferences/store-menu', [ConferenceController::class, 'storeMenu'])->name('conferences.storeMenu');
    });

    Route::prefix('procurements')->group(function () {
        Route::get('/procurement', 'ProcurementController@index')->name('manage_procurement');
        Route::get('/procurement/add', 'ProcurementController@add')->name('manage_procurement.add');
        Route::get('/procurement/add/{id}', 'ProcurementController@add')->name('manage_procurement.add');
        Route::post('/procurement/store', 'ProcurementController@store')->name('manage_procurement.store');
        Route::get('/procurement/delete/{id}', 'ProcurementController@delete')->name('manage_procurement.delete');
    });

    Route::get('/document/{id}', 'DocumentController@index')->name('manage_document');
    Route::get('/document/add/{id}', 'DocumentController@add')->name('manage_document.add');
    Route::post('/document/store', 'DocumentController@store')->name('manage_document.store');
    Route::get('/document/edit/{type_id}/{document_id}', 'DocumentController@edit')->name('manage_document.edit');
    Route::post('/document/update/{id}', 'DocumentController@update')->name('manage_document.update');
    Route::post('/document/delete', 'DocumentController@delete')->name('manage_document.delete');

    Route::prefix('iqac')->group(function () {
        Route::get('view', 'Backend\Iqac\IqacController@index')->name('iqac.view');

        Route::get('/workshop_seminar', 'Backend\Iqac\IqacWorkShopController@index')->name('manage_workshop_seminar');
        Route::get('/workshop_seminar/add', 'Backend\Iqac\IqacWorkShopController@add')->name('manage_workshop_seminar.add');
        Route::post('/workshop_seminar/store', 'Backend\Iqac\IqacWorkShopController@store')->name('manage_workshop_seminar.store');
        Route::get('/workshop_seminar/edit/{id}', 'Backend\Iqac\IqacWorkShopController@edit')->name('manage_workshop_seminar.edit');
        Route::post('/workshop_seminar/update/{id}', 'Backend\Iqac\IqacWorkShopController@update')->name('manage_workshop_seminar.update');
        Route::post('/workshop_seminar/delete', 'Backend\Iqac\IqacWorkShopController@delete')->name('manage_workshop_seminar.delete');

        Route::get('/committee', 'TeamController@index')->name('manage_team');
        Route::get('/committee/add', 'TeamController@add')->name('manage_team.add');
        Route::post('/committee/store', 'TeamController@store')->name('manage_team.store');
        Route::get('/committee/edit/{id}', 'TeamController@edit')->name('manage_team.edit');
        Route::post('/committee/update/{id}', 'TeamController@update')->name('manage_team.update');
        Route::get('/committee/delete', 'TeamController@delete')->name('manage_team.delete');

        Route::get('/iqac_about', 'IqacAboutController@index')->name('manage_iqac_about');
        Route::get('/iqac_about/add', 'IqacAboutController@add')->name('manage_iqac_about.add');
        Route::post('/iqac_about/store', 'IqacAboutController@store')->name('manage_iqac_about.store');
        Route::get('/iqac_about/edit/{id}', 'IqacAboutController@edit')->name('manage_iqac_about.edit');
        Route::post('/iqac_about/update/{id}', 'IqacAboutController@update')->name('manage_iqac_about.update');
        Route::post('/iqac_about/delete', 'IqacAboutController@delete')->name('manage_iqac_about.delete');
    });

    // Route::prefix('project_mananement')->group(function () {
    //     Route::get('news-event-notice', 'NewsController@index')->name('site-setting.news');
    //     Route::get('news-event-notice/add', 'NewsController@addNews')->name('site-setting.news.add');
    //     Route::post('news-event-notice/store', 'NewsController@storeNews')->name('site-setting.news.store');
    //     Route::get('news-event-notice/edit/{id}', 'NewsController@editNews')->name('site-setting.news.edit');
    //     Route::post('news-event-notice/update/{id}', 'NewsController@updateNews')->name('site-setting.news.update');
    //     Route::get('news-event-notice/delete', 'NewsController@deleteNews')->name('site-setting.news.delete');

    //     Route::get('news-event-notice/filter_news', 'NewsController@filterNews')->name('site-setting.news.filter_news');
    //     Route::get('news-event-notice/filter_event', 'NewsController@filterEvent')->name('site-setting.news.filter_event');
    //     Route::get('news-event-notice/filter_notice', 'NewsController@filterNotice')->name('site-setting.news.filter_notice');
    //     Route::get('news-event-notice/filter_press_release', 'NewsController@filterPressRelease')->name('site-setting.news.filter_press_release');
    //     Route::get('news-event-notice/filter_general_notice', 'NewsController@filterGeneralNotice')->name('site-setting.news.filter_general_notice');
    //     Route::get('news-event-notice/filter_special_notice', 'NewsController@filterSpecialNotice')->name('site-setting.news.filter_special_notice');
    //     Route::get('news-event-notice/filter_tender_notice', 'NewsController@filterTenderNotice')->name('site-setting.news.filter_tender_notice');
    // });

    Route::prefix('oefcd')->group(function () {
        Route::get('/view', 'Backend\OEFCDController@index')->name('oefcd.index');
        Route::get('/training-list', 'Backend\TrainingController@index')->name('oefcd.staff.training.list');
        Route::get('/training/create', 'Backend\TrainingController@create')->name('oefcd.staff.training.create');
        Route::post('/training/store', 'Backend\TrainingController@store')->name('oefcd.staff.training.store');
        Route::get('/training/edit/{id}', 'Backend\TrainingController@edit')->name('oefcd.staff.training.edit');
        Route::post('/training/update/{id}', 'Backend\TrainingController@update')->name('oefcd.staff.training.update');

        Route::get('/training-event/trainer-list/{id}', 'Backend\TrainingEventController@index')->name('oefcd.staff.training_event.trainer_list');
        Route::get('/trainer/trainer-create/{id}', 'Backend\TrainingEventController@trainer_create')->name('oefcd.staff.trainer.trainer_create');
        Route::post('/trainer/trainer-store', 'Backend\TrainingEventController@trainer_store')->name('oefcd.staff.trainer.trainer_store');

        Route::get('/trainer/trainer-edit/{id}', 'Backend\TrainingEventController@trainer_edit')->name('oefcd.staff.trainer.trainer_edit');
        Route::post('/trainer/trainer-update/{id}', 'Backend\TrainingEventController@trainer_update')->name('oefcd.staff.trainer.trainer_update');

        Route::get('/trainer/trainee-edit/{id}', 'Backend\TrainingEventController@trainee_edit')->name('oefcd.staff.trainee.trainee_edit');
        Route::post('/training_event/trainee-update/{id}', 'Backend\TrainingEventController@trainee_update')->name('oefcd.staff.training_event.trainee_update');

        Route::get('/training-event/trainee-list/{id}', 'Backend\TrainingEventController@trainee_index')->name('oefcd.staff.training_event.trainee_list');
        Route::get('/training-event/trainee-create/{id}', 'Backend\TrainingEventController@trainee_create')->name('oefcd.staff.training_event.trainee_create');
        Route::post('/training-event/trainee-store', 'Backend\TrainingEventController@trainee_store')->name('oefcd.staff.training_event.trainee_store');
        // Route::get('/trainer-list','Backend\OEFCDController@trainerList')->name('oefcd.staff.trainer.list');
        // Route::get('/trainer/create','Backend\OEFCDController@create')->name('oefcd.staff.trainer.create');
        // Route::post('/trainer/store','Backend\OEFCDController@store')->name('oefcd.staff.trainer.store');

        //international.affair
        Route::get('/about/international_affair', 'Backend\OEFCDController@aboutInternationalAffair')->name('international.affair.about');
        Route::post('/about/international_affair/update/{id}', 'Backend\OEFCDController@aboutInternationalAffairUpdate')->name('international.affair.update');
        Route::get('/international_affair', 'Backend\OEFCDController@internationalAffair')->name('international.affair');
        Route::get('/post/list', 'Backend\OEFCDController@postList')->name('post.list');
        Route::get('/contact', 'Backend\OEFCDController@contact')->name('international_affairs.contact');
        Route::post('/contact-update', 'Backend\OEFCDController@contactUpdate')->name('international_affairs.contact.update');

        Route::get('/about', 'Backend\OEFCDController@about_oefcd')->name('about_oefcd');
        Route::post('/about/update/{id}', 'Backend\OEFCDController@about_oefcd_update')->name('about_oefcd.update');

        //Faculty development program

        Route::get('/faculty/development_program', 'Backend\OEFCDController@development_program')->name('development_program');
        Route::post('/faculty/development_program/update/{id}', 'Backend\OEFCDController@development_program_update')->name('development_program.update');

        Route::get('/curriculumn-development', 'Backend\OEFCDController@curriculumnDevelopment')->name('curriculumn_development');
        Route::post('/curriculumn-development/update/{id}', 'Backend\OEFCDController@curriculumnDevelopmentUpdate')->name('curriculumn_development.update');

        Route::get('/curriculum-list', 'Backend\OEFCDCurriculumController@index')->name('oefcd.curriculum.list');
        Route::get('/curriculum/create', 'Backend\OEFCDCurriculumController@create')->name('oefcd.curriculum.create');
        Route::post('/curriculum/store', 'Backend\OEFCDCurriculumController@store')->name('oefcd.curriculum.store');
        Route::get('/curriculum/edit/{id}', 'Backend\OEFCDCurriculumController@edit')->name('oefcd.curriculum.edit');
        Route::post('/curriculum/update/{id}', 'Backend\OEFCDCurriculumController@update')->name('oefcd.curriculum.update');

        Route::get('/mou-list', 'Backend\MouController@index')->name('oefcd.mou.list');
        Route::get('/mou/create', 'Backend\MouController@create')->name('oefcd.mou.create');
        Route::post('/mou/store', 'Backend\MouController@store')->name('oefcd.mou.store');
        Route::get('/mou/edit/{id}', 'Backend\MouController@edit')->name('oefcd.mou.edit');
        Route::post('/mou/update/{id}', 'Backend\MouController@update')->name('oefcd.mou.update');

        Route::get('/evaluation/view', 'Backend\OEFCDController@evaluation')->name('oefcd.evaluation.view');
        Route::post('/evaluation/update/{id}', 'Backend\OEFCDController@evaluationUpdate')->name('oefcd.evaluation.update');

        Route::get('/trainer-list', 'Backend\OEFCDController@trainerList')->name('oefcd.staff.trainer.list');
        Route::get('/trainer/create', 'Backend\OEFCDController@create')->name('oefcd.staff.trainer.create');
        Route::post('/trainer/store', 'Backend\OEFCDController@store')->name('oefcd.staff.trainer.store');
        Route::get('/trainer/edit/{id}', 'Backend\OEFCDController@edit')->name('oefcd.staff.trainer.edit');
        Route::post('/trainer/update/{id}', 'Backend\OEFCDController@update')->name('oefcd.staff.trainer.update');

        Route::get('/officers-development-program', 'Backend\OEFCDController@officers_development_program')->name('officers_development_program');
        Route::post('/officers-development-program/update/{id}', 'Backend\OEFCDController@officers_development_program_update')->name('officers_development_program.update');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/view', 'Backend\BlogController@index')->name('blog.index');
        Route::get('/create', 'Backend\BlogController@create')->name('blog.create');
        Route::post('/store', 'Backend\BlogController@store')->name('blog.store');
        Route::get('/edit/{id}', 'Backend\BlogController@edit')->name('blog.edit');
        Route::post('/update/{id}', 'Backend\BlogController@update')->name('blog.update');
        Route::post('/delete', 'Backend\BlogController@delete')->name('blog.delete');
    });

    Route::prefix('short-story')->group(function () {
        Route::get('/view', 'Backend\ButexShortController@index')->name('short_story.index');
        Route::get('/create', 'Backend\ButexShortController@create')->name('short_story.create');
        Route::post('/store', 'Backend\ButexShortController@store')->name('short_story.store');
        Route::get('/edit/{id}', 'Backend\ButexShortController@edit')->name('short_story.edit');
        Route::post('/update/{id}', 'Backend\ButexShortController@update')->name('short_story.update');
        Route::post('/delete', 'Backend\ButexShortController@delete')->name('short_story.delete');
    });


    Route::prefix('bangabandhu_chair')->group(function () {
        Route::get('about/view', 'Backend\BangabandhuChair\BangabandhuChairAboutController@index')->name('bangabandhu_chair.about');
        Route::post('about/store', 'Backend\BangabandhuChair\BangabandhuChairAboutController@store')->name('bangabandhu_chair.about.store');
        Route::post('about/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairAboutController@update')->name('bangabandhu_chair.about.update');
        // });
        // Route::prefix('bangabandhu-chair-quote')->group(function() {
        Route::get('quote/view', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@index')->name('bangabandhu_chair.quote');
        Route::get('quote/create', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@create')->name('bangabandhu_chair.quote.create');
        Route::post('quote/store', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@store')->name('bangabandhu_chair.quote.store');
        Route::get('quote/edit/{id}', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@edit')->name('bangabandhu_chair.quote.edit');
        Route::post('quote/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@update')->name('bangabandhu_chair.quote.update');
        Route::post('quote/delete', 'Backend\BangabandhuChair\BangabandhuChairQuoteController@delete')->name('bangabandhu_chair.quote.delete');
        //});
        // Route::prefix('bangabandhu-chair-researcher')->group(function() {
        Route::get('researcher/view', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@index')->name('bangabandhu_chair.researcher');
        Route::get('researcher/create', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@create')->name('bangabandhu_chair.researcher.create');
        Route::post('researcher/store', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@store')->name('bangabandhu_chair.researcher.store');
        Route::get('researcher/edit/{id}', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@edit')->name('bangabandhu_chair.researcher.edit');
        Route::post('researcher/update/{id}', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@update')->name('bangabandhu_chair.researcher.update');
        Route::post('researcher/delete', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@delete')->name('bangabandhu_chair.researcher.delete');
    });

    Route::get('bangabandhu-chair-research-list', 'Backend\BangabandhuChair\BangabandhuChairResearcherController@researchList')->name('bangabandhu_chair.research.list');

    //Message
    Route::prefix('message')->group(function () {
        Route::get('view', 'Backend\MessageController@index')->name('message');
        Route::get('add', 'Backend\MessageController@add')->name('message.add');
        Route::post('store', 'Backend\MessageController@store')->name('message.store');
        Route::get('edit/{id}', 'Backend\MessageController@edit')->name('message.edit');
        Route::post('update/{id}', 'Backend\MessageController@update')->name('message.update');
        Route::post('delete', 'Backend\MessageController@destroy')->name('message.delete');
    });

    Route::get('type-wise-category', 'Backend\MessageController@typeWiseCategory')->name('type_wise_category');
    Route::get('category-wise-head', 'Backend\MessageController@categoryWiseHead')->name('category_wise_head');

    Route::prefix('apa')->group(function () {
        Route::prefix('category')->group(function () {

            Route::get('view', 'Backend\ApaCategoryController@index')->name('catagory.list');
            Route::get('add', 'Backend\ApaCategoryController@add')->name('catagory.add');
            Route::post('store', 'Backend\ApaCategoryController@store')->name('catagory.store');
            Route::get('edit/{id}', 'Backend\ApaCategoryController@edit')->name('catagory.edit');
            Route::post('update/{id}', 'Backend\ApaCategoryController@update')->name('catagory.update');
            Route::post('delete', 'Backend\ApaCategoryController@destroy')->name('catagory.delete');
        });
        Route::prefix('report')->group(function () {

            Route::get('view/{category_id}', 'Backend\ApaReportController@index')->name('report.list');
            Route::get('add/{category_id}', 'Backend\ApaReportController@add')->name('report.add');
            Route::post('store/{category_id}', 'Backend\ApaReportController@store')->name('report.store');
            Route::get('edit/{category_id}/{id}', 'Backend\ApaReportController@edit')->name('report.edit');
            Route::post('update/{category_id}/{id}', 'Backend\ApaReportController@update')->name('report.update');
            Route::post('delete', 'Backend\ApaReportController@destroy')->name('report.delete');
        });
    });
});

Route::get('/q/{menu?}', 'Frontend\FrontController@MenuUrl')->name('menu_url');

Route::get('/save-form', 'Frontend\FrontController@MenuUrl')->name('save.form');