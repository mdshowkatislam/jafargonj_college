<?php

namespace App\Http\Controllers\Frontend\Faculty;

use DB;
use App;
use Auth;
use Hash;
use App\Models\About;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\OnCampusFacility;
use App\Models\Page;
use App\Models\AtAGlanceNumber;
use App\Models\Contact;
use App\Models\ApaCategory;
use App\Models\Department;
use App\Models\CmsSection;
use Illuminate\Http\Request;
use App\Models\DeanStaffList;
use App\Services\ClubService;
use App\Services\BannerService;
use App\Services\FacultyService;
use App\Services\Program\ProgramService;
use App\Services\DepartmentService;
use App\Services\Message\MessageService;
use App\Services\PersonnelsToFacultyService;
use App\Services\Slider\SliderService;
use App\Services\NewsEventNoticeServices;
use App\Services\LabCenterService;
use App\Models\PersonnelsToFaculty;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\LandingModalService;
use App\Services\DeanStaffListService;
use App\Services\DeanHonorBoardService;
use App\Services\FacultyOfficerService;
use App\Services\Research\ResearchService;
use App\Services\Profile\ProfileService;
use App\Services\SpecialAchievementService;
use App\Services\VideoGalleryService;

class FacultyController extends Controller
{
    private $FacultyService;
    private $programService;
    private $DepartmentService;
    private $message;
    private $PersonnelsToFacultyService;
    private $NewsEventNoticeServices;
    private $slider;
    private $bannerService;
    private $deanStaffListService;
    private $clubService;
    private $deanHonorBoardService;
    private $labService;
    private $researchService;
    private $facultyOfficerService;
    private $landingModalService;
    private $profileService;
    private $achievementService;
    private $videoGalleryService;

    public function __construct(
        FacultyService $FacultyService,
        ProgramService $programService,
        DepartmentService $DepartmentService,
        MessageService $message,
        PersonnelsToFacultyService $PersonnelsToFacultyService,
        NewsEventNoticeServices $NewsEventNoticeServices,
        SliderService $slider,
        BannerService $bannerService,
        DeanStaffListService $deanStaffListService,
        ClubService $clubService,
        DeanHonorBoardService $deanHonorBoardService,
        LabCenterService $labService,
        ResearchService $researchService,
        FacultyOfficerService $facultyOfficerService,
        LandingModalService $landingModalService,
        ProfileService $profileService,
        SpecialAchievementService $achievementService,
        VideoGalleryService $videoGalleryService
    ) {
        $this->FacultyService             = $FacultyService;
        $this->programService             = $programService;
        $this->DepartmentService          = $DepartmentService;
        $this->message                    = $message;
        $this->PersonnelsToFacultyService = $PersonnelsToFacultyService;
        $this->NewsEventNoticeServices    = $NewsEventNoticeServices;
        $this->slider = $slider;
        $this->bannerService = $bannerService;
        $this->deanStaffListService = $deanStaffListService;
        $this->clubService = $clubService;
        $this->deanHonorBoardService = $deanHonorBoardService;
        $this->labService = $labService;
        $this->researchService = $researchService;
        $this->facultyOfficerService = $facultyOfficerService;
        $this->landingModalService = $landingModalService;
        $this->profileService = $profileService;
        $this->achievementService = $achievementService;
        $this->videoGalleryService = $videoGalleryService;
    }

    public function facultyHome($id)
    {
        $type_id     = 1;
        $page_id     = 2;
        $page_tab_id = $id;
        
        $data['faculty']                = $this->FacultyService->getByID($id);
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram($id);
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);
        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => $id]);
        // $data['faculty_tamplate']    = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);
        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        $data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);

        $data['news']                   = $this->NewsEventNoticeServices->getNewsEventsNotice(1, 3, $data['faculty']->id);
        //$data['news']                 = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['events']                 = $this->NewsEventNoticeServices->getNewsEventsNotice(2, 2, $data['faculty']->id, 1);
        $data['notices']                = $this->NewsEventNoticeServices->getNewsEventsNotice(3, 5, $data['faculty']->id);
        //$data['infos']                = $this->researchService->getLimit($id);
        $data['infos']                  = $this->researchService->ResearchByFaculty($data['faculty']->id);

        if($data['faculty']->slider_id){
            $data['sliders']            = $this->slider->getByMasterId($data['faculty']->slider_id);
        } else {
            $data['sliders']            = $this->slider->getByMasterId(1);
        }
        
        if ($data['faculty']->banner_id){
            $data['banner']             = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner']             = $this->bannerService->bannerByRefId(1);
        }

        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['faculty']->id);
        $data['labs']                   = $this->labService->labByFaculty($data['faculty']->id);
        // $data['modal']                  = $this->landingModalService->getModalByType(2);

        $data['vcInfo']               = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']             = About::first();
        $data['special_achievements'] = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities'] = OnCampusFacility::all();
        $data['welcome_page']         = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['chsrResearces']        = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['at_a_glance']          = AtAGlanceNumber::first();
        $data['contact_infos']        = Contact::first();
        $data['specialAcivment']      = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                 = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']        = $this->videoGalleryService->getAllLimit(8);
        $data['galleryCategory']      = GalleryCategory::where('sub_category', 1)->where('ref_id', $id)->where('status', 1)->get(); 
        $data['modal']                = $this->landingModalService->getModalByTypeId(2, $id);

        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '1';

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->where('status', 1)->orderBy('section_order', 'asc')->get();
        session(['facult_id' => $data['faculty']->id]);
        return view('frontend.faculty.tamplate_four.index', $data);
    }


    public function facultyResearch($id)
    {
        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['research_for'] = 1;
        $data['infos'] = $this->researchService->ResearchByFaculty($data['faculty']->id);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['profiles'] = PersonnelsToFaculty::where('faculty_id', $id)->where('status', 1)->get();

        return view('frontend.faculty.tamplate_four.page.research', $data);
    }
    
    public function facultyNotice($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['category'] = '';
        $data['type'] = 'Notice';

        $data['news'] = $this->NewsEventNoticeServices->getFacultNewsEventsNotice(3, 100, $data['faculty']->id);
        //$data['news']          = $this->NewsEventNoticeServices->getNewsEventsNotice(2, 2, $data['faculty']->id, 1);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        // if ($data['faculty_tamplate'] == 1) {
        //     return view('frontend.faculty.tamplate_one.page.notice', $data);
        // } elseif ($data['faculty_tamplate'] == 2) {
        //     return view('frontend.faculty.tamplate_two.page.notice', $data);
        // }
        return view('frontend.faculty.tamplate_four.page.notice', $data);
    }

    public function facultyEvent($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['category'] = '';
        $data['type'] = 'Events';

        //$data['news'] = $this->NewsEventNoticeServices->getNewsEventsNotice(3, 100, $data['faculty']->id);
        // $data['news']          = $this->NewsEventNoticeServices->getNewsEventsNotice(2, 2, $data['faculty']->id, 1);
        $data['news'] = $this->NewsEventNoticeServices->getFacultNewsEventsNotice(2, 100, $data['faculty']->id);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.faculty.tamplate_four.page.notice', $data);
    }

    public function facultyNews($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['category'] = '';
        $data['type'] = 'News';

        // $data['news']                   = $this->NewsEventNoticeServices->getNewsEventsNotice(1, 3, $data['faculty']->id);
        $data['news'] = $this->NewsEventNoticeServices->getFacultNewsEventsNotice(1, 100, $data['faculty']->id);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.faculty.tamplate_four.page.notice', $data);
    }

    public function facultyNewsEventNoticeFilter(Request $request)
    {
        //dd($request->all());
        $id = $request->faculty_id;
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);

        $data['category'] = '';
        $data['type'] = $request->news_type;

        // $data['news'] = $this->NewsEventNoticeServices->getFacultNewsEventsNotice(1, 100, $data['faculty']->id);
        $query = News::where('type', $request->news_type_id)
                // ->where('faculty_id', $faculty_id)
                ->where(function ($query) use ($id) {
                    $query->where('faculty_id', $id)
                        ->orWhere('faculty_id', 0);
                })
                ->where('is_approved', 1)
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest();
                
        $data['news'] = $query->paginate(100);
        $data['query'] = $request->search;

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.faculty.tamplate_four.page.notice', $data);
    }

    public function facultyDepartment($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);
        $data['departments'] = $this->DepartmentService->DepartmentList(['faculty_id' => $id]);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.faculty.tamplate_four.page.department', $data);
    }

    public function facultyGallery($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['galleryCategory']  = GalleryCategory::where('sub_category', 1)
            ->where('ref_id', $data['faculty']->id)
            ->where('status', 1)
            ->orderBy('sort')
            ->get(); 

        return view('frontend.faculty.tamplate_four.page.gallery', $data);
    }

    public function allFacultyMembers($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);

        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);

        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        // $data['faculty_members'] = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => $id]);
        $data['departments'] = Department::where('faculty_id', $id)->where('status', 1)->get();

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        // dd($data);

        // if ($data['faculty_tamplate'] == 1) {
        //     return view('frontend.faculty.tamplate_one.page.all_faculties', $data);
        // } elseif ($data['faculty_tamplate'] == 2) {
        //     return view('frontend.faculty.tamplate_two.page.all_faculties', $data);
        // }
        return view('frontend.faculty.tamplate_four.page.all_faculties', $data);
    }

    public function deanHonourBoard($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;
        
        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);

        $data['members'] = $this->deanHonorBoardService->FacultyWiseDeanHonourBoard($id);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        // if ($data['faculty_tamplate'] == 1) {
        //     return view('frontend.faculty.tamplate_one.page.dean_honour_board', $data);
        // } elseif ($data['faculty_tamplate'] == 2) {
        //     return view('frontend.faculty.tamplate_two.page.dean_honour_board', $data);
        // }
        return view('frontend.faculty.tamplate_four.page.dean_honour_board', $data);
    }
    public function facultyMemberDetails($id){
        $data = $this->profileService->facultyMemberDetails($id);
        return view('frontend.faculty.tamplate_four.page.people_details', $data);
    }
    public function facultyMessage($id)
    {
        $data['page_id'] = 2;
        $data['page_tab_id'] = $id;

        $data['faculty'] = $this->FacultyService->getByID($id);
        $data['faculty_name'] = $this->FacultyService->facultyName(['faculty_id' => $id]);
        $data['faculty_head'] = $this->FacultyService->facultyHead(['faculty_id' => $id]);

        if ($data['faculty']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['faculty']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        // $data['faculty_tamplate'] = $this->FacultyService->facultyTamplate(['faculty_id' => $id]);
        // if ($data['faculty_tamplate'] == 1) {
        //     return view('frontend.faculty.tamplate_three.page.all_faculties', $data);
        // } elseif ($data['faculty_tamplate'] == 2) {
        //     return view('frontend.faculty.tamplate_three.page.all_faculties', $data);
        // }
        return view('frontend.faculty.tamplate_four.page.read-more', $data);
    }
}
