<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Route;
use DB;
use App;
use Auth;
use Hash;
use App\Models\Faq;
use App\Models\Club;
use App\Models\Form;
use App\Models\News;
use App\Models\Page;
use App\Models\About;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Faculty;
use App\Models\Marquee;
use App\Models\Profile;
use App\Models\Program;
use App\Models\FormType;
use App\Models\LabCenter;
use App\Models\Department;
use App\Models\ApaCategory;
use App\Models\FinancialAid;
use App\Models\FrontendMenu;
use App\Models\VideoGallery;
use App\Models\JournalPaper;
use App\Services\NocService;
use Illuminate\Http\Request;
use App\Services\FaqServices;
use App\Services\TypeService;
use App\Models\CitizenCharter;
use App\Models\AtAGlanceNumber;
use App\Models\ProgramCategory;
use App\Services\BannerService;
use App\Services\OfficeService;
use App\Services\ResultService;
use App\Models\OnCampusFacility;
use App\Services\GalleryService;
use App\Services\Gallery;
use App\Services\MagazineService;
use App\Services\FacultyService;
use App\Services\DepartmentService;
use App\Services\LabCenterService;
use App\Services\ClubService;
use App\Services\FacultyOfficerService;
use App\Services\Program\ProgramService;
use App\Services\PersonnelsToFacultyService;
use App\Models\PersonnelsToOffice;
use App\Models\Hall;

use App\Models\CmsSection;
use App\Models\CmsTheme;
use App\Models\CmsComponent;
use App\Models\CmsCustomComponent;
use App\Models\GalleryCategory;

use App\Models\PersonnelsToFaculty;
use App\Services\NewsletterService;
use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\HallMember;
use App\Models\JobCategory;
use App\Models\JobResult;
use App\Models\Member;
use App\Models\Message;
use App\Models\Office;
use App\Models\Research;
use App\Models\Transport;
use App\Models\VcHonorBoardMember;
use App\Services\LandingModalService;
use App\Services\Slider\SliderService;
use Illuminate\Support\Facades\Session;
use App\Services\Message\MessageService;
use App\Services\HonorBoardMemberService;
use App\Services\NewsEventNoticeServices;
use App\Services\Research\ResearchService;
use App\Services\SpecialAchievementService;
use App\Services\Affiliation\AffiliateInstituteService;
use App\Services\CompleteResearchService\CompleteResearchService;
use App\Services\VideoGalleryService;
use Carbon\Carbon;

class FrontController extends Controller
{
    private $FacultyService;
    private $DepartmentService;
    private $programService;
    private $labService;
    private $clubService;
    private $facultyOfficerService;
    private $PersonnelsToFacultyService;
    private $achievementService;
    private $NewsEventNoticeServices;
    private $slider;
    private $message;
    private $affiliation;
    private $bannerService;
    private $newsletterService;
    private $resultService;
    private $researchService;
    private $nocService;
    private $galleryService;
    private $honorBoardMemberService;
    private $landingModalService;
    private $officeService;
    private $faqService;
    private $magazineService;
    private $videoGalleryService;
    private $messaService;

    public function __construct(
        FacultyService $FacultyService,
        DepartmentService $DepartmentService,
        ProgramService $programService,
        LabCenterService $labService,
        ClubService $clubService,
        FacultyOfficerService $facultyOfficerService,
        PersonnelsToFacultyService $PersonnelsToFacultyService,
        SpecialAchievementService $achievementService,
        NewsEventNoticeServices $NewsEventNoticeServices,
        SliderService $slider,
        MessageService $message,
        AffiliateInstituteService $affiliation,
        BannerService $bannerService,
        CompleteResearchService $CompleteResearchService,
        NewsletterService $newsletterService,
        ResultService $resultService,
        ResearchService $researchService,
        NocService $nocService,
        GalleryService $galleryService,
        HonorBoardMemberService $honorBoardMemberService,
        TypeService $typeService,
        LandingModalService $landingModalService,
        OfficeService $officeService,
        MagazineService $magazineService,
        FaqServices $faqService,
        VideoGalleryService $videoGalleryService,
        MessageService $messaService
    ) {
        $this->FacultyService = $FacultyService;
        $this->DepartmentService = $DepartmentService;
        $this->programService = $programService;
        $this->labService = $labService;
        $this->clubService = $clubService;
        $this->facultyOfficerService = $facultyOfficerService;
        $this->PersonnelsToFacultyService = $PersonnelsToFacultyService;
        $this->achievementService = $achievementService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->slider = $slider;
        $this->message = $message;
        $this->affiliation = $affiliation;
        $this->bannerService = $bannerService;
        // $this->CompleteResearchService = $CompleteResearchService;
        $this->newsletterService = $newsletterService;
        $this->resultService = $resultService;
        $this->researchService = $researchService;
        $this->nocService = $nocService;
        $this->galleryService = $galleryService;
        $this->honorBoardMemberService = $honorBoardMemberService;
        // $this->typeService = $typeService;
        $this->landingModalService = $landingModalService;
        $this->officeService = $officeService;
        $this->faqService = $faqService;
        $this->magazineService = $magazineService;
        $this->videoGalleryService = $videoGalleryService;
        $this->messaService = $messaService;
    }

    public function index()
    {
        $page_id     = 1;
        $page_tab_id = 1;
        $id          = 1;
        $type_id     = 1;
        
        $data['galleryCategory']        = GalleryCategory::where('sub_category', 0)->where('status', 1)->orderBy('sort')->get(); 

        $data['sliders']                = $this->slider->getByMasterId(1);
        $data['vcInfo']                 = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']               = About::first();
        $data['program_cat']            = ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']   = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities']   = OnCampusFacility::all();
        $data['welcome_page']           = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['news']                   = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['events']                 = $this->NewsEventNoticeServices->getSelectedRange(2, 2, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getSelectedRange(3, 10);

        $data['home_notice1']           = $this->NewsEventNoticeServices->result_and_notice(3, 1, 5);
        $data['home_notice2']           = $this->NewsEventNoticeServices->result_and_notice(3, 2, 5);
        $data['home_notice3']           = $this->NewsEventNoticeServices->result_and_notice(3, 3, 5);
        $data['home_notice4']           = $this->NewsEventNoticeServices->result_and_notice(3, 5, 5);

        //$data['infos']                  = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['infos']                  = Research::where('research_type', '!=', '4')->take(2)->orderBy('created_at', 'desc')->get();
        //$data['media']                  = Research::where('research_type', '4')->take(1)->orderBy('created_at', 'desc')->get();
        $data['media']                  = JournalPaper::get();
    
        $data['at_a_glance']            = AtAGlanceNumber::first();
        $data['contact_infos']          = Contact::first();
        $data['specialAcivment']        = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                   = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']          = $this->videoGalleryService->getAllLimit(6);

        $data['faculty']                = $this->FacultyService->getByID($id);
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);
        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        $data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);
        $data['labs']                   = $this->labService->labByFaculty($data['faculty']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['faculty']->id);
        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);
        $data['modal']                  = $this->landingModalService->getModalByType(1);
        $data['page_id']                = $page_id;
        $data['page_tab_id']            = $page_tab_id;
        $data['banner']                 = $this->bannerService->bannerByRefId(1111);
        $time                           = AtAGlanceNumber::first();
        $data['time']                   = Carbon::parse($time->research_time)->format('M d, Y 00:00:00');
        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->where('page_visivility', '2')->where('status', 1)->orderBy('section_order', 'asc')->get();

        return view('frontend.new-home', $data);
    }

    public function preview(Request $request){
        $page_id     = $request->id;
        $page_tab_id = $request->tab;
        
        $id          = 1;
        $type_id     = 1;

        $data['galleryCategory']        = GalleryCategory::where('sub_category', 0)->where('status', 1)->orderBy('sort')->get(); 
        $data['sliders']                = $this->slider->getByMasterId(1);
        $data['vcInfo']                 = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']               = About::first();
        $data['program_cat']            = ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']   = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities']   = OnCampusFacility::all();
        $data['welcome_page']           = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['news']                   = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['events']                 = $this->NewsEventNoticeServices->getSelectedRange(2, 2, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getSelectedRange(3, 10);
        //$data['infos']                  = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['infos']                  = $this->researchService->getLimit(2);
        $data['media']                  = $this->researchService->getLimit(1);
        $data['at_a_glance']            = AtAGlanceNumber::first();
        $data['contact_infos']          = Contact::first();
        $data['specialAcivment']        = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                   = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']          = $this->videoGalleryService->getAllLimit(6);

        $data['faculty']                = $this->FacultyService->getByID($id);
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);
        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        $data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);
        $data['labs']                   = $this->labService->labByFaculty($data['faculty']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['faculty']->id);
        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);
        $data['modal']                  = $this->landingModalService->getModalByType(1);

        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->orderBy('section_order', 'asc')->get();

        return view('frontend.preview.home', $data);
    }

    public function preview2(Request $request){
        $theme_id    = $request->id;
        $id          = 1;
        $type_id     = 1;

        $data['sliders']                = $this->slider->getByMasterId(1);
        $data['vcInfo']                 = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']               = About::first();
        $data['program_cat']            = ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']   = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities']   = OnCampusFacility::all();
        $data['welcome_page']           = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['news']                   = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['events']                 = $this->NewsEventNoticeServices->getSelectedRange(2, 2, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getSelectedRange(3, 10);
        $data['chsrResearces']          = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['at_a_glance']            = AtAGlanceNumber::first();
        $data['contact_infos']          = Contact::first();
        $data['specialAcivment']        = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                   = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']          = $this->videoGalleryService->getAll();
       
        $data['faculty']                = $this->FacultyService->getByID($id);
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);
        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        $data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);
        $data['labs']                   = $this->labService->labByFaculty($data['faculty']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['faculty']->id);
        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);

        $data['page_id']     = $theme_id;
        $data['page_tab_id'] = '';

        $data['sections'] = CmsTheme::where('theme_id', $theme_id)->orderBy('section_order', 'asc')->get();

        return view('frontend.preview.home2', $data);
    }

    public function album(Request $request){
        $data['galleryCategory']  = GalleryCategory::where('sub_category', $request->id)
        ->where('ref_id', $request->ref)
        ->where('status', 1)
        ->orderBy('sort')
        ->get(); 
        return view('frontend.gallery.gallery', $data);
    }

    public function singlePage(Request $request){
        
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['custom_data'] = CmsComponent::find($request->id);
        //dd($data['custom_data']);
        return view('frontend.single_page.home', $data);
    }
   
    public function videoGalleryAll()
    {
        $data['videos'] = $this->videoGalleryService->getAll();
        return view('frontend.video_gallery', $data);
    }

    public function achievement($id)
    {
        $data['achievements'] = $this->achievementService->getByID($id);
        return view('frontend.achievement', $data);
    }

    public function achievementStudentDetails($id)
    {
        $data['achievements'] = $this->achievementService->getStudentByID($id);
        return view('frontend.achievement', $data);
    }
    public function achievementStudentAll()
    {
        $data['achievements'] = $this->achievementService->getSpecialAchievementStudent();
        // dd($data['achievements']);
        return view('frontend.achievement', $data);
    }


    public function research($id)
    {
        $data['url'] = request()->url;
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['info'] = $this->researchService->researchDetail($id);
        
        //$data['research'] = $this->researchService->getOngoingResearchWithRange(1, 6);
        $data['research'] = Research::where('research_type', '!=', '4')->orderBy('created_at', 'desc')->take(12)->get();

        //dd($data['info']);
        if ($data['url'] == 'faculty_home' || $data['url'] == 'faculty_research') {
            $data['layout'] = 'frontend.faculty.tamplate_four.partials.main';
            $data['faculty'] = \App\Models\Faculty::find($data['info']->ref_id);
            return view('frontend.research-common', $data);
        } elseif ($data['url'] == 'department_home' || $data['url'] == 'department_research') {
            $data['layout'] = 'frontend.department.tamplate_four.partials.main-second';
            $data['department'] = \App\Models\Department::find($data['info']->ref_id);
            return view('frontend.research-common', $data);
        } else {
            $data['layout'] = 'frontend.layouts.master-landing';
            return view('frontend.research', $data);
        }
    }

    public function research2($id)
    {
        $data['url'] = request()->url;
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['info'] = JournalPaper::where('id', $id)->first();
        
        //$data['research'] = $this->researchService->getOngoingResearchWithRange(1, 6);
        $data['research'] = JournalPaper::orderBy('created_at', 'desc')->take(12)->get();
        $data['layout'] = 'frontend.layouts.master-landing';
        
        return view('frontend.research2', $data);
        
    }

    public function businessFaculty()
    {
        return view('frontend.faculty.business-faculty');
    }

    public function officer()
    {
        return view('frontend.officer');
    }
    public function vc()
    {
        return view('frontend.vc');
    }
    public function vc2()
    {
        return view('frontend.vc2');
    }
    public function business_studies()
    {
        return view('frontend.business_studies');
    }
    public function campus_life()
    {
        $data['on_campus_facilities'] = OnCampusFacility::all();
        $data['banner'] = $this->bannerService->bannerByRefId(15);
        return view('frontend.campus_life', $data);
    }

    public function about_overview()
    {

        $data['welcome_page'] = About::first();
        $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(1, 10);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        //$data['welcome_page'] = Page::where('id', 13)->where('status', 1)->firstOrFail();
        //dd($data['welcome_page']);
        return view('frontend.about.about_butex', $data);
    }

    public function mission_vision()
    {

        $data['about'] = About::first();
        // $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(1, 10);
        $data['banner'] = $this->bannerService->bannerByRefId(14);
        //$data['welcome_page'] = Page::where('id', 13)->where('status', 1)->firstOrFail();
        //dd($data['welcome_page']);
        return view('frontend.about.mission_vision', $data);
    }

    public function shortStory()
    {
        $data['about'] = About::first();
        $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(1, 10);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['banner']);
        return view('frontend.about.short_story', $data);
    }

    public function vc_honor_board()
    {
        $data['vc_list'] = VcHonorBoardMember::where('status', 1)->orderBy('start_date', 'DESC')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['banner']);
        return view('frontend.about.list_of_vc', $data);
    }
    
    public function e_library() 
    {
        $data['banner'] = $this->bannerService->bannerByRefId(14);

        return view('frontend.about.e_library_butex', $data); 
    }
    public function university_at_a_glance() 
    {
        $data['banner'] = $this->bannerService->bannerByRefId(14);
        $data['at_a_glance'] = AtAGlanceNumber::first();

        return view('frontend.about.at_a_glance', $data); 
    }

    public function transport()
    {
        $data['transports'] = Transport::all();
        return view('frontend.about.transport')->with($data);
    }

    public function employeeDirectory()
    {
        $data['allOffice'] = Office::with('Profile')->orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        $data['allfaculty'] = Faculty::with('profile')->orderBy('sort_order', 'asc')->get();
        $data['allHall'] = Hall::with('provostProfile')->orderBy('sort_order', 'asc')->get();
        $data['allDepartment'] = Department::with('profile')->get();
        //dd($data['allOffice']);
        return view('frontend.about.employee_directory', $data);
    }
    public function typeWiseCategoryDirectory(Request $request)
    {
        // return $request->all();
        if ($request->category_type == 1) {
            $data['categories'] = Faculty::where('status', 1)->orderBy('sort_order', 'asc')->get();
        }
        /* elseif($request->category_type==2){
            $data['categories'] = Department::get();
        } */ elseif ($request->category_type == 2) {
            $data['categories'] = Office::where('status', 1)->orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        } elseif ($request->category_type == 3) {
            $data['categories'] = Hall::where('status', 1)->orderBy('sort_order', 'asc')->get();
        }
        // dd( $data['categories']);
        if (isset($data['categories'])) {
            return response()->json($data['categories']);
        } else {
            return response()->json('fail');
        }
    }
    public function facultyWiseDepartment(Request $request)
    {
        $data['facultyWiseDepartment'] = Department::where('faculty_id', $request->faculty_id)->where('status', 1)->orderBy('sort_order', 'asc')->get();
        if (isset($data)) {
            return response()->json($data);
        } else {
            return response()->json('fail');
        }
    }
    public function departmentWiseMember(Request $request)
    {
        $data['members'] = PersonnelsToFaculty::with('profile')->where('department_id', $request->department_id)->orderBy('sort_order', 'asc')->get();
        if (isset($data['members'])) {
            return response()->json($data['members']);
        } else {
            return response()->json('fail');
        }
    }
    public function CategoryWiseMember(Request $request)
    {
        $where = [];
        if ($request->radio_teacher == 2) {
            $where[] = ['personnel_type', '=', 1];
        } else if ($request->radio_teacher == 3) {
            $where[] = ['personnel_type', '=', 2];
        }
        if ($request->category_type == 1) {
            if($request->dept_id == null){
                $faculty = Faculty::where('id', $request->category_id)->first();
                $data['members'] = PersonnelsToFaculty::whereHas('profile', function ($q) use ($where) {
                    $q->where($where);
                })->with(['profile', 'faculty.profile'])->where('faculty_id', $request->category_id)->where('profile_id', '!=', @$faculty->profile_id)->orderBy('sort_order', 'asc')->get();
                $data['head'] = Profile::where('id', @$faculty->profile_id)->where($where)->first();
            }
            else{
                $dept = Department::where('id', $request->dept_id)->first();
                $data['members'] = PersonnelsToFaculty::whereHas('profile', function ($q) use ($where) {
                    $q->where($where);
                })->with('profile')->where('department_id', $request->dept_id)->where('profile_id', '!=', $dept->profile_id)->orderBy('sort_order', 'asc')->get();
                $data['head'] = Profile::where('id', $dept->profile_id)->where($where)->first();
            }
        } elseif ($request->category_type == 2) {
            // $office = Office::find($request->category_id);
            $office = Office::where('id', $request->category_id)->first();
            if($request->category_id == -1){
                $data['members'] = PersonnelsToOffice::whereHas('profile', function ($q) use ($where) {
                    $q->where($where);
                })->with(['profile', 'designation'])->get();
            }
            else{
                // $data['members'] = PersonnelsToOffice::whereHas('profile', function ($q) use ($where) {
                //     $q->where($where);
                // })->with(['profile', 'office.Profile'])->where('office_id', $request->category_id)->where('member_id', '!=', @$office->profile_id)->orderBy('sort_order', 'asc')->get();
                $office = Office::where('id', $request->category_id)->first();
                $data['members'] = PersonnelsToOffice::whereHas('profile', function ($q) use ($where) {
                    $q->where($where);
                })->with(['profile', 'office.Profile', 'designation'])->where('office_id', $request->category_id)->where('profile_id', '!=', @$office->profile_id)->orderBy('sort_order', 'asc')->get();
                $data['head'] = Profile::where('id', @$office->profile_id)->where($where)->first();
                // dd($data['members']);
            }

        } elseif ($request->category_type == 3) {
            $hall = Hall::where('id', $request->category_id)->first();
            $data['members'] = HallMember::whereHas('member', function ($q) use ($where) {
                $q->where($where);
            })->with(['member', 'hall.member'])->where('hall_id', $request->category_id)->where('member_id', '!=', @$hall->provost)->orderBy('type_id', 'asc')->orderBy('sort_order', 'asc')->get();
            $data['head'] = Profile::where('id', @$hall->provost)->where($where)->first();
            // dd($data['head']);
        }
        return response()->json($data);
        // if (isset($data['members'])) {
        // } else {
        //     return response()->json('fail');
        // }
    }


    public function allteacher(Request $request)

    {
        if ($request->all_teacher == 1) {

            $data['teacher'] = Member::where('member_type', $request->all_teacher)->get();
            // $data['teacher'] = DepartmentToFacultyMember::with('member')->where('member_type', $request->all_teacher)->get();
        }

        if ($request->all_teacher == 2) {

            $data['teacher'] = Member::where('member_type', $request->all_teacher)->get();
        }

        if ($request->all_teacher == 3) {

            $data['teacher'] = Member::where('member_type', $request->all_teacher)->get();
        }
        return response()->json($data['teacher']);
    }

    public function citizenCharter()
    {
        $id = 1;
        $data['banner']  = CitizenCharter::find($id);
        // dd($data['banner']);
        return view('frontend.about.citizen_charter', $data);
    }
    public function factsFigures()
    {
        $data['faqs'] = $this->faqService->getAllFaq();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.facts_figures', $data);
    }
    public function newsletter()
    {

        $data['infos'] = $this->newsletterService->getAllByStatus();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.newsletter.newsletter', $data);
    }

    public function newsletterByYear(Request $request)
    {
        if ($request->year == 'All') {
            $data['infos'] = $this->newsletterService->getAllByStatus();
        } else {
            $data['infos'] = $this->newsletterService->getByYear($request->year);
        }
        return view('frontend.about.newsletter.newsletter_by_year', $data);
    }

    public function magazine()
    {

        $data['infos'] = $this->magazineService->getAllByStatus();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.magazine.magazine', $data);
    }

    public function magazineByYear(Request $request)
    {
        // dd($request);
        if ($request->year == 'All') {
            $data['infos'] = $this->magazineService->getAllByStatus();
        } else {
            $data['infos'] = $this->magazineService->getByYear($request->year);
        }
        return view('frontend.about.magazine.magazine_by_year', $data);
    }

    public function result()
    {
        $data['infos'] = $this->resultService->List();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.result.result_list', $data);
    }
    public function resultByProgramCategory($ref_id)
    {
        $data['infos'] = $this->resultService->getByProgramCategory($ref_id);
        // dd($data['infos']);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.result.result_list', $data);
    }

    public function academicCalender()
    {
        $data['infos'] = Form::where('type_id', 2)->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.academic_calender.academic_calender_list', $data);
    }
    public function academicCalenderByYear(Request $request)
    {
        if ($request->year == 'All') {
            $data['infos'] = Form::where('type_id', 3)->get();
        } else {
            $data['infos'] = Form::where('type_id', 3)->where('year', $request->year)->get();;
        }
        return view('frontend.academic_calender.academic_calender_by_year', $data);
    }
    public function annualReport()
    {

        $data['infos'] = Form::where('type_id', 6)->orderBy('publish_date', 'DESC')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.annual_report.annual_report_list', $data);
    }
    public function annualReportByYear(Request $request)
    {
        if ($request->year == 'All') {
            $data['infos'] = Form::where('type_id', 6)->orderBy('publish_date', 'DESC')->get();
        } else {
            $data['infos'] = Form::where('type_id', 6)->where('year', $request->year)->orderBy('publish_date', 'DESC')->get();;
        }
        return view('frontend.annual_report.annual_report_by_year', $data);
    }

    public function vcInformation()
    {
        $data['vcInfo'] = $this->message->getMessageFromHead(3, 1);
        $data['vcProfile'] = $this->officeService->getByID(1);
        $data['vcHBM'] = $this->honorBoardMemberService->getHonorBoardMembersByType(1); //type 1= VC
        // dd($data['vcInfo'] );
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.vc_information', $data);
    }

    public function proVcInformation()
    {
        $data['proVcInfo'] = $this->message->getMessageFromHead(3, 2);
        $data['proVcProfile'] = $this->officeService->getByID(2);
        $data['proVcHBM'] = $this->honorBoardMemberService->getHonorBoardMembersByType(2); //type 2= Pro VC
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.pro_vc_info', $data);
    }
    public function treasurerInformation()
    {
        $data['treasurer'] = $this->message->getMessageFromHead(3, 3);
        $data['treasurerProfile'] = $this->officeService->getByID(3);
        $data['treasurerHBM'] = $this->honorBoardMemberService->getHonorBoardMembersByType(3); //type 3= Treasurer
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.treasurer_info', $data);
    }

    public function messageFromTheRegistrar()
    {
        $data['register'] = $this->message->getMessageFromHead(3, 4);
        //$data['registerProfile'] = $this->officeService->getByID(4);
        $data['registerHBM'] = $this->honorBoardMemberService->getHonorBoardMembersByType(4); //type 3= Registrar
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        //dd($data);
        return view('frontend.about.register_information', $data);
    }
    
    public function Chancellor()
    {
        //$data['chancellor'] = $this->message->getMessageFromHead(3, 4);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['vc_message'] = Page::where('title', 'Chancellor')->first();
        return view('frontend.about.chancellor', $data);
    }

    public function nocList()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['nocs'] = $this->nocService->frontNocList();
        return view('frontend.noc', $data);
    }

    public function nocListSearch(Request $request)
    {
        $title = $request->search_data;

        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['nocs'] = $this->nocService->NocListSearch($title);
        $data['title'] = $title;

        return view('frontend.noc', $data);
    }


    public function careerList()
    {
        //deadline job status
        $currentDate = Carbon::now()->format('Y-m-d');
        Career::where('deadline', '<', $currentDate)
             ->update(['status' => 0]);

        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['jobCategories'] = JobCategory::with('JobPosts')->where('status', 1)->orderBy('id','desc')->get();
        $data['jobs_count']    =  Career::where('type', 1)->where('status', 1)->get()->count();
        $data['career_forms']  = Career::select('id', 'title', 'date', 'status', 'attachment')->where('status', 1)->where('type', 2)
            ->orderBy('id', 'desc')
            ->get();
        $data['forms_count'] = $data['career_forms']->count();
        $data['job_results'] = JobResult::where('status', 1)
            ->with(['career' => function ($query) {
                $query->select('id', 'title');
            }])
            ->orderBy('id','desc')
            ->latest()
            ->get();
        $data['results_count'] = $data['job_results']->count();    

        //dd($data['job_results']);
        return view('frontend.career.career_list', $data);
    }



    public function careerById($id)
    {
        $data['page_title'] = 'Job Details';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        
        $data['all_jobs'] = Career::where([
            ['job_categorie_id', $id],
            
        ])->latest()->get();
        //dd($data);
        $data['job_details'] = Career::with('jobCategory')->findOrFail($id);
       
        return view('frontend.career.job-details', $data);
    }
    public function careerByType(Request $request)
    {
        // dd($request->all());
        if ($request->career == 'Notice') {
            $data['infos'] = Career::where('type', 1)->where('status', 1)->get();
        } elseif ($request->career == 'Form') {
            $data['infos'] = Career::where('type', 2)->where('status', 1)->get();
        } else {
            $data['infos'] = Career::where('type', 3)->where('status', 1)->get();
        }
        return view('frontend.career.career_by_type', $data);
    }


    public function lab()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['labs'] = LabCenter::all();
        return view('frontend.lab.lab_list', $data);
    }
    public function labDetails($id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['lab'] = LabCenter::find($id);

        $data['gallary_images'] = $this->galleryService->getGalleryByCategory($data['lab']->gallery_id);

        return view('frontend.lab.lab_details', $data);
    }

    //chairman details
    public function chairMessageDetails($id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['profile'] = Profile::find($id);

        // $data['message'] = $this->messaService->getMessageFromHead(2, $id);
        $data['message'] = Message::where('profile_id', $id)->get()->first();

        return view('frontend.messages.chair_message_details', $data);
    }


    // Student-Online Services

    public function scholarships_and_financial_aids()
    {
        $data['sfa'] = FinancialAid::firstOrFail();
        return view('frontend.online_services.financial_aids', $data);
    }
    public function apply_for_certificate()
    {
        $data['type'] = 1;
        $data['form_type'] = FormType::findOrFail($data['type']);
        $data['infos'] = Form::where('type_id', $data['type'])->get();
        return view('frontend.online_services.form', $data);
    }

    public function apply_for_transcript()
    {
        $data['type'] = 2;
        $data['form_type'] = FormType::findOrFail($data['type']);
        $data['infos'] = Form::where('type_id', $data['type'])->get();
        return view('frontend.online_services.form', $data);
        // return view('frontend.online_services.transcript');
    }

    // Research

    public function researchList()
    {
        $data['research_type'] = 'all';
        $data['type'] = 4;
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['news'] = $this->researchService->getAll();
        return view('frontend.news.allnews', $data);
    }

    public function chsrResearchList()
    {
        $data['research_type'] = 'chsr';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = $this->researchService->ResearchByResearchType(1);
        return view('frontend.research-list', $data);
    }

    public function facultyResearchList()
    {
        $data['research_type'] = 'faculty';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = $this->researchService->ResearchByResearchType(2);
        return view('frontend.research-list', $data);
    }
    public function facultyResearchLists()
    {
        $data['research_type'] = 'faculty';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = $this->researchService->ResearchByResearchType(2);
        $data['profiles'] = PersonnelsToFaculty::where('status', 1)->get();
        return view('frontend.research-lists', $data);
    }

    public function bbResearchList()
    {
        $data['research_type'] = 'bb';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = $this->researchService->ResearchByResearchType(3);
        return view('frontend.research-list', $data);
    }

    public function researchListByYear(Request $request)
    {
        if ($request->type == 'research-list') {
            if ($request->year == 'All') {
                $data['infos'] = $this->researchService->getAll();
            } else {
                $data['infos'] = $this->researchService->getByForAndYear(1, $request->year);
            }
        } elseif ($request->type == 'chsr-research-list') {
            if ($request->year == 'All') {
                $data['infos'] = $this->researchService->ResearchByResearchType(1);
            } else {
                $data['infos'] = $this->researchService->getByTypeAndYear(1, $request->year);
            }
        } elseif ($request->type == 'faculty-research-list') {
            if ($request->year == 'All') {
                $data['infos'] = $this->researchService->ResearchByResearchType(2);
            } else {
                $data['infos'] = $this->researchService->getByTypeAndYear(2, $request->year);
            }
        } elseif ($request->type == 'bb-research-list') {
            if ($request->year == 'All') {
                $data['infos'] = $this->researchService->ResearchByResearchType(3);
            } else {
                $data['infos'] = $this->researchService->getByTypeAndYear(3, $request->year);
            }
        } elseif ($request->type == 'ongoing-research') {
            if ($request->year == 'All') {
                $data['infos'] = $this->researchService->getAllOngoingResearch();
            } else {
                $data['infos'] = $this->researchService->getOngoingResearchByYear($request->year);
            }
        }

        return view('frontend.research2.research_by_year', $data);
    }

    public function ongoingResearch()
    {
        $data['research_type'] = 'ongoing';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = $this->researchService->getAllOngoingResearch();
        return view('frontend.research-list', $data);
    }

    // Admissions

    public function admission_notice()
    {
        $data['academics'] = Admission::where('status', 1)->orderBy('start_date', 'desc')->get();
        // dd($data['academics']);
        return view('frontend.admissions.notice', $data);
    }
    public function admission_result()
    {
        return view('frontend.admissions.result');
    }
    public function prospectus()
    {
        return view('frontend.admissions.prospectus');
    }
    public function certificate_course()
    {
        return view('frontend.admissions.certificate_course');
    }

    // Gallery

    public function galleryList()
    {
        $data['title'] = 'BUTEX Album';
        $data['contact_infos'] = Contact::first();
        $data['galleryCategory'] = GalleryCategory::where('status', '1')->orderBy('created_at', 'desc')->get();

        return view('frontend.gallery.album', $data);
    }

    public function galleryListDetails(Request $request)
    {
        $data['title']           = 'BUTEX Image Gallery';

        $data['galleryCategory']  = GalleryCategory::where('id', $request->id)
            ->where('status', 1)
            ->orderBy('sort')
            ->get(); 


        return view('frontend.gallery.gallery', $data);

    }

    public function galleryView($type, $id, $ref_id = null)
    {
        $data['categoryName'] = $this->galleryService->getGalleryCategoryNameById($id);
        $data['images'] = $this->galleryService->getGalleryByCategory($id);
        $data['type'] = $type;
        $data['title'] = $data['categoryName']->name;

        if ($ref_id) {
            $data['club'] = Club::find($ref_id);
        }

        $data['banner'] = $this->bannerService->bannerByRefId(1);

        return view('frontend.gallery.images', $data);
    }

    public function downloads()
    {
        $data['infos'] = Form::where('status', 1)->where('type_id', 1)->orderBy('publish_date', 'DESC')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['infos']);
        return view('frontend.downloads.list', $data);
    }
    public function downloadsByType(Request $request)
    {
        if ($request->type == 'All') {
            $data['infos'] = Form::where('status', 1)->get();
        } else {
            $data['infos'] = Form::where('type_id', $request->type)->where('status', 1)->get();
        }
        return view('frontend.downloads.list-by-type', $data);
    }

    public function privacyPolicy()
    {
        $data['infos'] = Page::where('id', 12)->where('status', 1)->firstOrFail();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.privacy_policy.view', $data);
    }

    public function contact()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['contact_infos'] = Contact::first();
        return view('frontend.partials.sections.contact', $data);
    }

    public function allResearch()
    {
        $data['infos'] = Research::where('research_type', '!=', '4')->orderBy('created_at', 'desc')->paginate(12); 
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.partials.sections.research_publication', $data);
    }

    public function allMedia()
    {
        $data['infos'] = JournalPaper::orderBy('created_at', 'desc')->paginate(12); 
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.partials.sections.research_media', $data);
    }
    
    public function allAcademics()
    {
        $data['faculties'] = Faculty::where('status', 1)->orderBy('sort_order')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
      
        return view('frontend.partials.sections.academics_all', $data);
    }

    public function allDepartments()
    {
        $data['departments'] = Department::where('status', 1)->orderBy('sort_order')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.partials.sections.departments_all', $data);
    }
    
    public function MenuUrl(Request $request)
    {
        $data['contact_infos'] = Contact::first();
       // dd($data['contact_infos']);

        $menu_url_data = FrontendMenu::where('id', $request->menu_id)->first();
        if ($menu_url_data != null) {
            if ($menu_url_data->url_link_type == '1') {
                return redirect()->route($menu_url_data['url_link']);
            }

            if ($menu_url_data->url_link_type == '2') {
                $data['find_post'] = Page::where('title', @str_replace('-', ' ', $menu_url_data->url_link))->first();
                return view('frontend.single_page.single-page', $data);
            }

            if ($menu_url_data->url_link_type == '3') {
                $url = strpos($menu_url_data->url_link, 'http') !== 0 ? "http://" . $menu_url_data->url_link : $menu_url_data->url_link;
                header("Location:" . $url);
                die();
            }

            if ($menu_url_data->url_link_type == '4') {
                $data['find_post'] = $menu_url_data;
                return view('frontend.single_page.single-page-attach', $data);
            }
            return redirect()->back()->with('error', 'Sorry page is not found');
        } else {
            return redirect()->back();
        }
    }


    public function showPageName($slug)
    {

        // if (view()->exists("pages.{$slug}")) {

        //     return view("pages.{$slug}");

        // }

        

        return abort(404);
    }

    public function butexHalls()
    {
        $data['halls'] = Hall::all();
        return view('frontend.halls.list', $data);
    }

    public function butexHallDetails($id)
    {
        //$data['hall_details'] = Hall::find($id)->name;

        // $ids = Hall::where('short_url', $id)->first();
        //$id = $ids->id;

        $data['hall_details'] = Hall::with('provostProfile')->find($id);
        $data['sliders'] = $this->slider->getByMasterId($data['hall_details']->slider_id);
        $data['message'] = Message::where('type_id', 4)->where('category_id', $id)->first();

        // $data['hallHomes'] = HallHome::where(['hall_id' => $id])->get();

        // $data['events'] = News::where('hall_id', $ids)
        //     ->orWhere('hall_id', -1)
        //     ->where('type', 1)->take(5)->orWhere('type', 2)
        //     ->orderBy('start_date', 'desc')
        //     ->get();


        // $data['notices'] = News::where('hall_id', $ids)
        //     ->orWhere('hall_id', -1)
        //     ->where('type', 3)
        //     ->orderBy('start_date', 'desc')
        //     ->get();

        //dd($data);
        return view('frontend.halls.details', $data);
    }

    public function provostMessage($id)
    {
        $data['message'] = Message::where('type_id', 4)->where('category_id', $id)->first();
        return view('frontend.halls.details', $data);
    }

}
