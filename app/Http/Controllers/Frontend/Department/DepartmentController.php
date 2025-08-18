<?php

namespace App\Http\Controllers\Frontend\Department;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ApaCategory;
use App\Models\AtAGlanceNumber;
use App\Models\CmsSection;
use App\Models\Contact;
use App\Models\Department;
use App\Models\FrontendMenu;
use App\Models\Message;
use App\Models\Office;
use App\Models\OnCampusFacility;
use App\Models\Page;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Models\News;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToFacultyOfficer;
use App\Models\PersonnelsToOffice;
use App\Models\Profile;
use App\Models\ProgramCategory;
use App\Services\BannerService;
use App\Services\ClubService;
use App\Services\DeanHonorBoardService;
use App\Services\DeanStaffListService;
use App\Services\DepartmentService;
use App\Services\FacultyOfficerService;
use App\Services\FacultyService;
use App\Services\LabCenterService;
use App\Services\LandingModalService;
use App\Services\Message\MessageService;
use App\Services\NewsEventNoticeServices;
use App\Services\OfficeService;
use App\Services\PersonnelsToFacultyService;
use App\Services\Profile\ProfileService;
use App\Services\Program\ProgramService;
use App\Services\Research\ResearchService;
use App\Services\Slider\SliderService;
use App\Services\SpecialAchievementService;
use App\Services\VideoGalleryService;
use DB;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $FacultyService;
    private $DepartmentService;
    private $NewsEventNoticeServices;
    private $PersonnelsToFacultyService;
    private $message;
    private $slider;
    private $bannerService;
    private $officeService;
    private $deanStaffListService;
    private $clubService;
    private $deanHonorBoardService;
    private $programService;
    private $labService;
    private $researchService;
    private $facultyOfficerService;
    private $landingModalService;
    private $messaService;
    private $profileService;
    private $achievementService;
    private $videoGalleryService;

    public function __construct(
        FacultyService $FacultyService,
        DepartmentService $DepartmentService,
        NewsEventNoticeServices $NewsEventNoticeServices,
        PersonnelsToFacultyService $PersonnelsToFacultyService,
        MessageService $message,
        SliderService $slider,
        BannerService $bannerService,
        OfficeService $officeService,
        DeanStaffListService $deanStaffListService,
        ClubService $clubService,
        DeanHonorBoardService $deanHonorBoardService,
        ProgramService $programService,
        LabCenterService $labService,
        ResearchService $researchService,
        FacultyOfficerService $facultyOfficerService,
        LandingModalService $landingModalService,
        MessageService $messaService,
        ProfileService $profileService,
        SpecialAchievementService $achievementService,
        VideoGalleryService $videoGalleryService
    ) {
        $this->FacultyService = $FacultyService;
        $this->DepartmentService = $DepartmentService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->PersonnelsToFacultyService = $PersonnelsToFacultyService;
        $this->message = $message;
        $this->slider = $slider;
        $this->bannerService = $bannerService;
        $this->officeService        = $officeService;
        $this->deanStaffListService = $deanStaffListService;
        $this->clubService = $clubService;
        $this->deanHonorBoardService = $deanHonorBoardService;
        $this->programService = $programService;
        $this->labService = $labService;
        $this->researchService = $researchService;
        $this->facultyOfficerService = $facultyOfficerService;
        $this->landingModalService = $landingModalService;
        $this->messaService = $messaService;
        $this->profileService = $profileService;
        $this->achievementService = $achievementService;
        $this->videoGalleryService = $videoGalleryService;
    }

    public function departmentHome($id)
    {
        $type_id     = 1;
        $page_id     = 3;
        $page_tab_id = $id;

        $data['department']             = $this->DepartmentService->getByID($id);

        $data['program_cat']            = $this->programService->programCategory();
        $data['dept_programs']          = $this->programService->departmentWiseProgram($id);

        if (@$data['department']->slider_id){
            $data['sliders']            = $this->slider->getByMasterId($data['department']->slider_id);
        }else{
            $data['sliders']            = $this->slider->getByMasterId(1);
        }

        //$data['news']                 = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['news']                   = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(1, 3, $data['department']->id, $data['department']->faculty_id);
        $data['events']                 = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(2, 2, $data['department']->id, $data['department']->faculty_id, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(3, 5, $data['department']->id, $data['department']->faculty_id);

        $data['banner']                 = $this->bannerService->getByID($data['department']->banner_id);
        $data['programs']               = $this->programService->departmentWiseProgram($data['department']->id);

        $data['faculty_members']        = $this->PersonnelsToFacultyService->departmentMembers($data['department']->id);

        $data['clubs']                  = $this->clubService->DepartmentWiseClub($data['department']->id);
        $data['labs']                   = $this->labService->labByDepartment($data['department']->id);
        $data['officer_of_department']  = $this->facultyOfficerService->departmentWiseStaff($data['department']->id);

        
        // $data['modal']                  = $this->landingModalService->getModalByType(3);
        $data['modal']                = $this->landingModalService->getModalByTypeId(3, $id);
        $data['message']                = $this->messaService->getMessageFromHead(2, $id);
        // dd( $data['message']   );
        $data['infos']                  = $this->researchService->ResearchByDepartment($data['department']->id);
        //$data['infos']                  = $this->researchService->ResearchByDepartment($data['department']->id);
  
        $data['faculty']                = $this->FacultyService->getByID($data['department']->faculty_id);
        
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);

        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);

        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        // $data['faculty_tamplate']    = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);

        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);

        $data['vcInfo']               = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']             = About::first();
        $data['special_achievements'] = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities'] = OnCampusFacility::all();
        $data['welcome_page']         = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['chsrResearces']        = $this->researchService->ResearchByResearchForRange(2, 5);
        $data['at_a_glance']          = AtAGlanceNumber::first();
        $data['contact_infos']        = Contact::first();
        $data['specialAcivment']      = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                 = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']        = $this->videoGalleryService->getAllLimit(8);
        $data['galleryCategory']      = GalleryCategory::where('sub_category', 2)->where('ref_id', $id)->where('status', 1)->get(); 

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->where('status', 1)->orderBy('section_order', 'asc')->get();
        //variables for menus
        $data['top_menus'] = FrontendMenu::where('menu_type_id', $data['department']['top_menu'])->where('status', 1)->get();

        $data['all_nav'] = FrontendMenu::where('menu_type_id', $data['department']['nav_menu'])->where('status', 1)->get();
        $data['parents'] = FrontendMenu::where('menu_type_id', $data['department']['nav_menu'])->where('status', 1)->where('parent_id', '0')->get();

        $data['childs'] =   $data['parents']->flatMap(function ($item) {
            return FrontendMenu::where('parent_id', $item->rand_id)->get();
        });
        // dd($data['childs']);
        session(['deprt_id' => $data['department']->id]);
        $data['dep_id'] = request()->id;

        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '2';

        return view('frontend.department.tamplate_four.index', $data);
    }

    public function officeHome($id){ 
        $type_id     = 1;
        $page_id     = 4;
        $page_tab_id = $id;
        //$id          = 1;
        
        $data['office'] = Office::find($id);
        
        $dummyBanner    = public_path('images/ore-banner-bg.jpg');
        //asset('assets/image.png');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }

        $data['profiles']         = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->orderBy('sort_order','asc')->get();
        $data['message']          = $this->message->getMessageFromHead(3, $id);
        $data['galleryCategory']  = GalleryCategory::where('sub_category', 7)->where('ref_id', $id)->where('status', 1)->get(); 

       // $data['sliders']                = $this->slider->getByMasterId(1);
        //$data['vcInfo']                 = $this->message->getMessageFromHead(3,1);

        if (@$data['office']->slider_id){
            $data['sliders']            = $this->slider->getByMasterId($data['office']->slider_id);
        }else{
            $data['sliders']            = $this->slider->getByMasterId(1);
        }

        $data['aboutUni']               = About::first();
        $data['program_cat']            = ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']   = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities']   = OnCampusFacility::all();
        $data['welcome_page']           = Page::where('id', 13)->where('status', 1)->firstOrFail();

        //$data['news']                   = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        //$data['events']                 = $this->NewsEventNoticeServices->getSelectedRange(2, 2, 1);
        //$data['notices']                = $this->NewsEventNoticeServices->getSelectedRange(3, 10);

        $data['news']                   = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(1, 3, $data['office']->id, $data['office']->office_id);
        $data['events']                 = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(2, 2, $data['office']->id, $data['office']->office_id, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(3, 5, $data['office']->id, $data['office']->office_id);

        $data['chsrResearces']          = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['at_a_glance']            = AtAGlanceNumber::first();
        $data['contact_infos']          = Contact::first();
        $data['specialAcivment']        = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                   = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']          = $this->videoGalleryService->getAll();
        $data['infos']                  = $this->researchService->getLimit(3);
        
        //$data['faculty']                = $this->FacultyService->getByID($id);
        //dd($data['office']);
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);
        //$data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        //$data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        
        //$data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        //$data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);
        $data['labs']                   = $this->labService->labByFaculty($data['office']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['office']->id);
        //$data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);
    
       // $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['all']    = $this->officeService->getAll();
        $data['modal']                = $this->landingModalService->getModalByTypeId(4, $id);
        
        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '7';

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->where('status', 1)->orderBy('section_order', 'asc')->get();
        // dd($data['office']);

        session(['off_id' => $data['office']->id]);

        return view('frontend.office.template.index', $data);
    }

    public function departmentResearch($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        // $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);

        if (@$data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['research_for'] = 1;
        $data['infos'] = $this->researchService->ResearchByFaculty($data['department']->id);
        $data['profiles'] = PersonnelsToFaculty::where('department_id', $id)->where('status', 1)->get();
        return view('frontend.department.tamplate_four.page.research', $data);
    }

    public function departmentNotice($id)
    {
        // dd($id);
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        // dd($data['department']);
        $data['category'] = '';
        $data['type'] = 'Notice';
        $data['news'] = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(3, 200, $data['department']->id, $data['department']->faculty_id); //post type and last array
        // dd($data['news']);
        $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);

        return view('frontend.department.tamplate_four.page.notice', $data);
    }

    public function departmentEvent($id)
    {
        // dd($id);
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        // dd($data['department']);
        $data['category'] = '';
        $data['type'] = 'Event';
        $data['news'] = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(2, 200, $data['department']->id, $data['department']->faculty_id); //post type and last array
        // dd($data['news']);
        $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);

        return view('frontend.department.tamplate_four.page.notice', $data);
    }

    public function departmentNews($id)
    {
        // dd($id);
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        // dd($data['department']);
        $data['category'] = '';
        $data['type'] = 'News';
        $data['news'] = $this->NewsEventNoticeServices->getDeptNewsEventsNotice(1, 200, $data['department']->id, $data['department']->faculty_id); //post type and last array
        // dd($data['news']);
        $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);

        return view('frontend.department.tamplate_four.page.notice', $data);
    }
    public function departmentNewsEventNoticeFilter(Request $request)
    {
        // dd($request->all());
        $faculty_id = $request->faculty_id;
        $department_id = $request->department_id;
        $data['page_id'] = 3;
        $data['page_tab_id'] = $department_id;

        $data['department'] = $this->DepartmentService->getByID($department_id);

        $data['category'] = '';
        $data['type'] = $request->news_type;

        // $data['news'] = $this->NewsEventNoticeServices->getFacultNewsEventsNotice(1, 100, $data['faculty']->id);
        $query = News::where('type', $request->news_type_id)
                // ->where('faculty_id', $faculty_id)
                ->where(function ($query) use ($faculty_id) {
                    $query->where('faculty_id', $faculty_id)
                        ->orWhere('faculty_id', 0);
                })
                ->where(function ($query) use ($department_id) {
                    $query->where('department_id', $department_id)
                        ->orWhere('department_id', 0);
                })
                ->where('is_approved', 1)
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest();
        $data['news'] = $query->paginate(100);

        $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);

        return view('frontend.department.tamplate_four.page.notice', $data);
    }

    public function departmentProgram($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        // $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        if (@$data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }
        $data['program_cat'] = $this->programService->programCategory();
        $data['dept_programs'] = $this->programService->departmentWiseProgram($id);

        return view('frontend.department.tamplate_four.page.program', $data);
    }

    public function allDepartmentMembers($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);

        // $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        if (@$data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['faculty_members'] = $this->PersonnelsToFacultyService->departmentMembers($data['department']->id);

        return view('frontend.department.tamplate_four.page.all_faculties', $data);
    }

    public function departmentMemberDetails($id){
        $data = $this->profileService->facultyMemberDetails($id);
        return view('frontend.department.tamplate_four.page.people_details', $data);
    }

    public function departmentMessage($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        //dd($data['department']);
        if ($data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.department.tamplate_four.page.read-more', $data);
    }

    public function departmentContact($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);
        //dd($data['department']);
        if (@$data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.department.tamplate_four.page.contact', $data);
    }

    public function departmentGallery($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;

        $data['department'] = $this->DepartmentService->getByID($id);

        //dd($data['department']);
        if (@$data['department']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['department']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['galleryCategory']  = GalleryCategory::where('sub_category', 2)
            ->where('ref_id', $data['department']->id)
            ->where('status', 1)
            ->orderBy('sort')
            ->get();

        return view('frontend.department.tamplate_four.page.gallery', $data);
    }

    public function chairMessageDetails($id)
    {
        $data['page_id'] = 3;
        $data['page_tab_id'] = $id;
        
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['profile'] = Profile::find($id);

        // $data['department'] = Department::find($id);
        $data['department'] = Department::where('profile_id', $id)->get()->first();

        // $data['message'] = $this->messaService->getMessageFromHead(2, $id);
        $data['message'] = Message::where('profile_id', $id)->get()->first();

        return view('frontend.department.tamplate_four.page.chair_message_details', $data);
    }
}
