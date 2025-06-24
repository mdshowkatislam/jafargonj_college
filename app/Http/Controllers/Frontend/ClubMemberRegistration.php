<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Mail\ClubMemberVerification;
use App\Models\AssignToClub;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Club;
use App\Models\About;
use App\Models\Page;
use App\Models\AtAGlanceNumber;
use App\Models\Contact;
use App\Models\ApaCategory;
use App\Models\ProgramCategory;
use App\Services\LabCenterService;
use App\Services\ClubService;
use App\Services\Program\ProgramService;
use App\Services\FacultyOfficerService;
use App\Services\PersonnelsToFacultyService;
use App\Services\DepartmentService;
use App\Services\VideoGalleryService;
use App\Services\FacultyService;
use App\Services\SpecialAchievementService;
use App\Models\OnCampusFacility;
use App\Models\ClubMember;
use App\Models\ClubMemberMapping;
use App\Models\ClubModerator;
use App\Models\GalleryCategory;
use App\Models\Document;
use App\Models\CmsSection;
use App\Services\NewsEventNoticeServices;
use App\Services\Research\ResearchService;
use App\Services\GalleryService;
use App\Services\Message\MessageService;
use App\Services\BannerService;
use App\Services\LandingModalService;
use App\Services\Slider\SliderService;
use App\Services\OfficeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClubMemberRegistration extends Controller
{
    private $message;
    private $achievementService;
    private $newsEventNoticeServices;
    private $NewsEventNoticeServices;
    private $PersonnelsToFacultyService;
    private $labService;
    private $clubService;
    private $facultyOfficerService;
    private $programService;
    private $FacultyService;
    private $DepartmentService;
    private $researchService;
    private $videoGalleryService;
    private $galleryService;
    private $messageService;
    private $officeService;
    private $bannerService;
    private $sliderService;
    private $landingModalService;
    public function __construct(
        MessageService $message, 
        FacultyService $FacultyService,
        SpecialAchievementService $achievementService, 
        NewsEventNoticeServices $newsEventNoticeServices, 
        NewsEventNoticeServices $NewsEventNoticeServices,
        PersonnelsToFacultyService $PersonnelsToFacultyService,
        ClubService $clubService,
        LabCenterService $labService,
        FacultyOfficerService $facultyOfficerService,
        DepartmentService $DepartmentService,
        ProgramService $programService,
        VideoGalleryService $videoGalleryService,
        ResearchService $researchService,
        GalleryService $galleryService, 
        MessageService $messageService, 
        OfficeService $officeService, 
        BannerService $bannerService, 
        SliderService $sliderService,
        LandingModalService $landingModalService
    )
    {
        $this->newsEventNoticeServices = $newsEventNoticeServices;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->PersonnelsToFacultyService = $PersonnelsToFacultyService;
        $this->DepartmentService = $DepartmentService;
        $this->labService = $labService;
        $this->clubService = $clubService;
        $this->facultyOfficerService = $facultyOfficerService;
        $this->programService = $programService;
        $this->researchService = $researchService;
        $this->galleryService = $galleryService;
        $this->messageService = $messageService;
        $this->officeService = $officeService;
        $this->bannerService = $bannerService;
        $this->sliderService = $sliderService;
        $this->message = $message;
        $this->FacultyService = $FacultyService;
        $this->achievementService = $achievementService;
        $this->videoGalleryService = $videoGalleryService;
        $this->landingModalService = $landingModalService;
    }

    public function index($slug)
    {
       $current_date = Carbon::now()->toDateString();

       $page_id     = 5;
       $type_id     = 5;

        $data['club'] = Club::with('faculty', 'department', 'events')->where('slug', $slug)->firstOrFail();
        $id = $data['club']->id;

        $data['page_id'] = $page_id;
        $data['page_tab_id'] = $id;
        $data['ref_id'] = '8';

        if (@$data['club']->slider_id) {
            $data['sliders'] = $this->sliderService->getByMasterId($data['club']->slider_id);
        } else {
            $data['sliders'] = $this->sliderService->getByMasterId(1);
        }

        $data['latest_news']    = $this->newsEventNoticeServices->getClubNewsNoticeEvent(1, 3, $data['club']->id);
        $data['events']         = $this->newsEventNoticeServices->getClubNewsNoticeEvent(2, 3, $data['club']->id, 1);
        $data['notices']        = $this->newsEventNoticeServices->getClubNewsNoticeEvent(3, 5, $data['club']->id);
        $data['modal']          = $this->landingModalService->getModalByTypeId(5, $id);

        // $data['club_members'] = ClubMember::with(['faculty','department','member_detail'=>function($q) {
        //     $q->leftJoin('clubs','clubs.id', 'assign_to_clubs.club_id');
        //     $q->leftJoin('club_designations','club_designations.id', 'assign_to_clubs.club_designation_id');
        //     $q->select('clubs.name as c_name','club_designations.name as d_name','assign_to_clubs.*');
        //     $q->where('assign_to_clubs.club_id', $id);
        //  }])->get();  

        $data['moderators'] = ClubModerator::where('club_id', $id)->where('club_moderators.status', 1)->where('club_designation_id', '!=', 6)
            ->join('club_designations', 'club_moderators.club_designation_id', '=', 'club_designations.id')
            ->whereDate('club_moderators.join_date', '<=', $current_date)
            ->whereDate('club_moderators.expire_date', '>=', $current_date)
            ->orderBy('club_designations.sort_order', 'asc')
            ->get();
        // $data['moderators'] = ClubModerator::where('club_id', $id)->where('status', 1)->where('club_designation_id', '!=' ,6)->with(['designation' => function ($q) {
        //         $q->orderBy('sort_order', 'asc');
        //     }])->get();

        $data['cheif_advisor'] = ClubModerator::where('club_id', $id)->where('status', 1)->where('club_designation_id', 6)->whereDate('join_date', '<=', $current_date)->whereDate('expire_date', '>=', $current_date)->first();

        $data['teams'] = AssignToClub::where('club_id', $id)->whereIn('club_designation_id', [1, 2, 3])
            ->join('club_designations', 'assign_to_clubs.club_designation_id', '=', 'club_designations.id')
            ->orderBy('club_designations.sort_order', 'asc')
            ->whereDate('assign_to_clubs.join_date', '<=', $current_date)
            ->whereDate('assign_to_clubs.expire_date', '>=', $current_date)
            ->get();
        
        $data['club_members'] = DB::table('assign_to_clubs')
            ->leftJoin('clubs', 'assign_to_clubs.club_id', '=', 'clubs.id')
            ->leftJoin('club_designations', 'assign_to_clubs.club_designation_id', '=', 'club_designations.id')
            ->leftJoin('club_members', 'assign_to_clubs.club_member_id', '=', 'club_members.id')
            ->select('assign_to_clubs.club_member_id as member_id', 'club_members.*', 'clubs.*', 'club_designations.*', 'clubs.name as club_name', 'club_members.name as member_name', 'assign_to_clubs.id as cmm_id', 'club_designations.name as d_name')
            ->where('assign_to_clubs.club_id', $id)
            ->where('assign_to_clubs.status', 1)
            ->whereNotIn('assign_to_clubs.club_designation_id', [1, 2, 3])
            ->whereDate('assign_to_clubs.join_date', '<=', $current_date)
            ->whereDate('assign_to_clubs.expire_date', '>=', $current_date)
            ->orderBy('club_designations.sort_order', 'asc')
            ->get();


        // $data['gallery_category'] = GalleryCategory::where('sub_category', 8)->where('status', 1)->first();
        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(8, $id);

        $data['vcInfo']                 = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']               = About::first();
        $data['program_cat']            = ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']   = $this->achievementService->getSpecialAchievement();
        $data['on_campus_facilities']   = OnCampusFacility::all();
        $data['welcome_page']           = Page::where('id', 13)->where('status', 1)->firstOrFail();
        $data['news']                   = $this->NewsEventNoticeServices->getSelectedRange(1, 3);
        $data['chsrResearces']          = $this->researchService->ResearchByResearchForRange(1, 5);
        $data['at_a_glance']            = AtAGlanceNumber::first();
        $data['contact_infos']          = Contact::first();
        $data['specialAcivment']        = $this->achievementService->getSpecialAchievementStudent();
        $data['apas']                   = ApaCategory::with('apa_report')->where('status', 1)->get();
        $data['vidoe_gallery']          = $this->videoGalleryService->getAll();

        $data['faculty']                = $this->FacultyService->getByID(1);
        
        $data['program_cat']            = $this->FacultyService->programCategory();
        $data['faculty_programs']       = $this->programService->facultyWiseProgram(1);
        
        $data['departments']            = $this->DepartmentService->DepartmentList(['faculty_id' => 1]);
        $data['faculty_head']           = $this->FacultyService->facultyHead(['faculty_id' => 1]);
        $data['faculty_name']           = $this->FacultyService->facultyName(['faculty_id' => 1]);
        
        $data['faculty_head_message']   = $this->message->getMessageFromHead($type_id, $data['faculty']->id);
        $data['faculty_members']        = $this->PersonnelsToFacultyService->faculty_members(['faculty_id' => 1]);
        $data['labs']                   = $this->labService->labByFaculty($data['faculty']->id);
        $data['clubs']                  = $this->clubService->FacultyWiseClub($data['faculty']->id);
        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $id)->where('page_visivility', '2')->where('status', 1)->orderBy('section_order', 'asc')->get();

        return view('frontend.club.index', $data);
    }

    public function ClubList()
    {
        $data['clubs'] = Club::where('status', 1)->latest()->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.club.club_list', $data);
    }

    public function clubAbout($slug)
    {
        $data['page_title'] = 'About';
        $data['club'] = Club::where('slug', $slug)->firstOrFail();
        $id = $data['club']->id;

        $data['page_id'] = 5;
        $data['page_tab_id'] = $id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }
        
        $data['cheif_advisor'] = ClubModerator::where('club_id', $id)->where('status', 1)->where('club_designation_id', 6)->first();
        
        return view('frontend.club.pages.about', $data);
    }
    public function clubCommittee($slug)
    {
        $current_date = Carbon::now()->toDateString();
        $data['page_title'] = 'Committee';
        $data['club'] = Club::where('slug', $slug)->firstOrFail();
        $id = $data['club']->id;

        $data['page_id'] = 5;
        $data['page_tab_id'] = $id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['moderators'] = ClubModerator::where('club_id', $id)->where('club_moderators.status', 1)
            ->whereDate('club_moderators.join_date', '<=', $current_date)
            ->whereDate('club_moderators.expire_date', '>=', $current_date)
            ->join('club_designations', 'club_moderators.club_designation_id', '=', 'club_designations.id')
            ->orderBy('club_designations.sort_order', 'asc')
            ->get();

        return view('frontend.club.pages.committee', $data);
    }
    public function clubMember($slug)
    {
        $current_date = Carbon::now()->toDateString();
        $data['page_title'] = 'Member';
        $data['club'] = Club::where('slug', $slug)->firstOrFail();
        $id = $data['club']->id;

        $data['page_id'] = 5;
        $data['page_tab_id'] = $id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['teams'] = AssignToClub::where('club_id', $id)
            ->join('club_designations', 'assign_to_clubs.club_designation_id', '=', 'club_designations.id')
            ->orderBy('club_designations.sort_order', 'asc')
            ->whereDate('assign_to_clubs.join_date', '<=', $current_date)
            ->whereDate('assign_to_clubs.expire_date', '>=', $current_date)
            ->get();

        return view('frontend.club.pages.member', $data);
    }
    public function clubActivity($slug)
    {
        $data['page_title']     = 'Club Activities';
        $data['club']           = Club::where('slug', $slug)->firstOrFail();
        $id                     = $data['club']->id;

        $data['page_id'] = 5;
        $data['page_tab_id'] = $id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['latest_news']    = $this->newsEventNoticeServices->getClubNewsNoticeEvent(1, 3, $data['club']->id);

        return view('frontend.club.pages.activities', $data);
    }
    public function clubGallery($slug)
    {
        $data['page_title'] = 'Club Gallery';
        $data['club'] = Club::where('slug', $slug)->firstOrFail();

        $data['page_id'] = 5;
        $data['page_tab_id'] = $data['club']->id;

        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(8, $data['club']->id);

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }
        
        return view('frontend.club.pages.gallery', $data);
    }
    public function clubDownload($slug)
    {
        $data['page_title'] = 'Club Document';
        $data['club'] = Club::where('slug', $slug)->firstOrFail();

        $data['page_id'] = 5;
        $data['page_tab_id'] = $data['club']->id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['documents'] = Document::where('type_id', 3)->where('ref_id', $data['club']->id)->where('status', 1)->get();

        return view('frontend.club.pages.download', $data);
    }

    public function clubMessage($id)
    {
        $data['club'] = Club::with('faculty', 'department', 'events')->find($id);

        $data['page_id'] = 5;
        $data['page_tab_id'] = $data['club']->id;

        if ($data['club']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['club']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.club.pages.read-more', $data);
    }




    public function registrationForm()
    {
        return view('frontend.club.member.registration');
    }
    public function registration(Request $request)
    {
        //    return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required|unique:club_members,student_id',
            'email' => 'required|unique:club_members,email',
            'phone' => 'required|unique:club_members,phone',
            // 'faculty_id' => 'required',
            // 'depratment_id' => 'required',
            // 'club_id' => 'required',
                'photo' => 'mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        DB::beginTransaction();
        try {
            $new_member = new ClubMember();
            $new_member->student_id         = $request->student_id;
            $new_member->faculty_id         = $request->faculty_id;
            $new_member->department_id      = $request->department_id;
            $new_member->name               = $request->name;
            $new_member->email              = $request->email;
            $new_member->phone              = $request->phone;
            $new_member->verify_token       = Str::random(40);
            if ($request->file('photo')) {
                $config = [
                    'name'  => 'photo',
                    'path'  => 'upload/club/member/image',
                    'width' => 70,
                    'height' => 70,
                ];
                $image = ImageHelper::uploadImage($config);
                // dd($image);
                $new_member->image = $image['filename'];
            }
            // dd($new_member);
            // return $new_member;
            $new_member->save();

            // $new_member_map = new ClubMemberMapping();
            // $new_member_map->club_member_id      = $new_member->id;
            // $new_member_map->faculty_id          = $request->faculty_id;
            // $new_member_map->department_id       = $request->department_id;
            // $new_member_map->club_id             = $request->club_id;
            // $new_member_map->club_designation_id = $request->club_designation_id;
            // $new_member_map->join_date           = date('Y-m-d H:i:s',strtotime($request->join_date));
            // $new_member_map->save();

            Mail::to($request->email)->send(new ClubMemberVerification($new_member));
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            // return redirect()->route('member.add')->with('error',$th->getMessage());
            return $th->getMessage();
        }

        return "registration success";
    }
    public function verify($token = null)
    {
        if ($token != null) {
            $user = ClubMember::where('verify_token', $token)->first();
            if ($user) {
                $user->verify_token = '';
                $user->status = 1;
                $user->save();
                return "Account Acivated";
            } else {
                return "invalid token";
            }
        }
        return "user Not found";
    }

    public function getUsers()
    {
        return "usesggg";
    }
}
