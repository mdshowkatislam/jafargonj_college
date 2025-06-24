<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Mail\ClubMemberVerification;
use App\Models\AssignToAlumni;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Alumni;
use App\Models\About;
use App\Models\Page;
use App\Models\AtAGlanceNumber;
use App\Models\Contact;
use App\Models\ApaCategory;
use App\Models\ProgramCategory;
use App\Services\LabCenterService;
use App\Services\AlumniService;
use App\Services\Program\ProgramService;
use App\Services\FacultyOfficerService;
use App\Services\PersonnelsToFacultyService;
use App\Services\DepartmentService;
use App\Services\VideoGalleryService;
use App\Services\FacultyService;
use App\Services\SpecialAchievementService;
use App\Models\OnCampusFacility;
use App\Models\AlumniMember;
use App\Models\AlumniMemberMapping;
use App\Models\AlumniModerator;
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

class AlumniMemberRegistration extends Controller
{
    private $message;
    private $achievementService;
    private $newsEventNoticeServices;
    private $NewsEventNoticeServices;
    private $PersonnelsToFacultyService;
    private $labService;
    private $alumniService;
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
        AlumniService $alumniService,
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
        $this->alumniService = $alumniService;
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

        $data['alumni'] = Alumni::with('faculty', 'department', 'events')->where('slug', $slug)->firstOrFail();
        $id = $data['alumni']->id;

        $data['page_id'] = $page_id;
        $data['page_tab_id'] = $id;
        $data['ref_id'] = '8';

        if (@$data['alumni']->slider_id) {
            $data['sliders'] = $this->sliderService->getByMasterId($data['alumni']->slider_id);
        } else {
            $data['sliders'] = $this->sliderService->getByMasterId(1);
        }

        $data['latest_news']    = $this->newsEventNoticeServices->getAlumniNewsNoticeEvent(1, 3, $data['alumni']->id);
        $data['events']         = $this->newsEventNoticeServices->getAlumniNewsNoticeEvent(2, 3, $data['alumni']->id, 1);
        $data['notices']        = $this->newsEventNoticeServices->getAlumniNewsNoticeEvent(3, 5, $data['alumni']->id);
        $data['modal']          = $this->landingModalService->getModalByTypeId(5, $id);

        // $data['alumni_members'] = alumniMember::with(['faculty','department','member_detail'=>function($q) {
        //     $q->leftJoin('alumnis','alumnis.id', 'assign_to_alumnis.alumni_id');
        //     $q->leftJoin('alumni_designations','alumni_designations.id', 'assign_to_alumnis.alumni_designation_id');
        //     $q->select('alumnis.name as c_name','alumni_designations.name as d_name','assign_to_alumnis.*');
        //     $q->where('assign_to_alumnis.alumni_id', $id);
        //  }])->get();  

        $data['moderators'] = AlumniModerator::where('alumni_id', $id)->where('alumni_moderators.status', 1)->where('alumni_designation_id', '!=', 6)
            ->join('alumni_designations', 'alumni_moderators.alumni_designation_id', '=', 'alumni_designations.id')
            ->whereDate('alumni_moderators.join_date', '<=', $current_date)
            ->whereDate('alumni_moderators.expire_date', '>=', $current_date)
            ->orderBy('alumni_designations.sort_order', 'asc')
            ->get();
        // $data['moderators'] = alumniModerator::where('alumni_id', $id)->where('status', 1)->where('alumni_designation_id', '!=' ,6)->with(['designation' => function ($q) {
        //         $q->orderBy('sort_order', 'asc');
        //     }])->get();

        $data['cheif_advisor'] = AlumniModerator::where('alumni_id', $id)->where('status', 1)->where('alumni_designation_id', 6)->whereDate('join_date', '<=', $current_date)->whereDate('expire_date', '>=', $current_date)->first();

        $data['teams'] = AssignToAlumni::where('alumni_id', $id)->whereIn('alumni_designation_id', [1, 2, 3])
            ->join('alumni_designations', 'assign_to_alumnis.alumni_designation_id', '=', 'alumni_designations.id')
            ->orderBy('alumni_designations.sort_order', 'asc')
            ->whereDate('assign_to_alumnis.join_date', '<=', $current_date)
            ->whereDate('assign_to_alumnis.expire_date', '>=', $current_date)
            ->get();
        
        $data['alumni_members'] = DB::table('assign_to_alumnis')
            ->leftJoin('alumnis', 'assign_to_alumnis.alumni_id', '=', 'alumnis.id')
            ->leftJoin('alumni_designations', 'assign_to_alumnis.alumni_designation_id', '=', 'alumni_designations.id')
            ->leftJoin('alumni_members', 'assign_to_alumnis.alumni_member_id', '=', 'alumni_members.id')
            ->select('assign_to_alumnis.alumni_member_id as member_id', 'alumni_members.*', 'alumnis.*', 'alumni_designations.*', 'alumnis.name as alumni_name', 'alumni_members.name as member_name', 'assign_to_alumnis.id as cmm_id', 'alumni_designations.name as d_name')
            ->where('assign_to_alumnis.alumni_id', $id)
            ->where('assign_to_alumnis.status', 1)
            ->whereNotIn('assign_to_alumnis.alumni_designation_id', [1, 2, 3])
            ->whereDate('assign_to_alumnis.join_date', '<=', $current_date)
            ->whereDate('assign_to_alumnis.expire_date', '>=', $current_date)
            ->orderBy('alumni_designations.sort_order', 'asc')
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
        $data['alumnis']                  = $this->alumniService->FacultyWiseAlumni($data['faculty']->id);
        $data['officer_of_dean_office'] = $this->facultyOfficerService->facultyWiseStaff($data['faculty']->id);

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $id)->where('page_visivility', '2')->orderBy('section_order', 'asc')->get();

        return view('frontend.alumni.index', $data);
    }

    public function alumniList()
    {
        $data['alumnis'] = alumni::where('status', 1)->latest()->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.alumni.alumni_list', $data);
    }

    public function alumniAbout($slug)
    {
        $data['page_title'] = 'About';
        $data['alumni'] = Alumni::where('slug', $slug)->firstOrFail();
        $id = $data['alumni']->id;

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }
        
        $data['cheif_advisor'] = AlumniModerator::where('alumni_id', $id)->where('status', 1)->where('alumni_designation_id', 6)->first();
        
        return view('frontend.alumni.pages.about', $data);
    }
    public function alumniCommittee($slug)
    {
        $current_date = Carbon::now()->toDateString();
        $data['page_title'] = 'Committee';
        $data['alumni'] = Alumni::where('slug', $slug)->firstOrFail();
        $id = $data['alumni']->id;

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['moderators'] = AlumniModerator::where('alumni_id', $id)->where('alumni_moderators.status', 1)
            ->whereDate('alumni_moderators.join_date', '<=', $current_date)
            ->whereDate('alumni_moderators.expire_date', '>=', $current_date)
            ->join('alumni_designations', 'alumni_moderators.alumni_designation_id', '=', 'alumni_designations.id')
            ->orderBy('alumni_designations.sort_order', 'asc')
            ->get();

        return view('frontend.alumni.pages.committee', $data);
    }
    public function alumniMember($slug)
    {
        $current_date = Carbon::now()->toDateString();
        $data['page_title'] = 'Member';
        $data['alumni'] = Alumni::where('slug', $slug)->firstOrFail();
        $id = $data['alumni']->id;

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['teams'] = AssignToAlumni::where('alumni_id', $id)
            ->join('alumni_designations', 'assign_to_alumnis.alumni_designation_id', '=', 'alumni_designations.id')
            ->orderBy('alumni_designations.sort_order', 'asc')
            ->whereDate('assign_to_alumnis.join_date', '<=', $current_date)
            ->whereDate('assign_to_alumnis.expire_date', '>=', $current_date)
            ->get();

        return view('frontend.alumni.pages.member', $data);
    }
    public function alumniActivity($slug)
    {
        $data['page_title']     = 'alumni Activities';
        $data['alumni']           = Alumni::where('slug', $slug)->firstOrFail();
        $id                     = $data['alumni']->id;

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['latest_news']    = $this->newsEventNoticeServices->getAlumniNewsNoticeEvent(1, 3, $data['alumni']->id);

        return view('frontend.alumni.pages.activities', $data);
    }
    public function alumniGallery($slug)
    {
        $data['page_title'] = 'alumni Gallery';
        $data['alumni'] = Alumni::where('slug', $slug)->firstOrFail();

        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(8, $data['alumni']->id);

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }
        
        return view('frontend.alumni.pages.gallery', $data);
    }
    public function alumniDownload($slug)
    {
        $data['page_title'] = 'alumni Document';
        $data['alumni'] = Alumni::where('slug', $slug)->firstOrFail();

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        $data['documents'] = Document::where('type_id', 3)->where('ref_id', $data['alumni']->id)->where('status', 1)->get();

        return view('frontend.alumni.pages.download', $data);
    }

    public function alumniMessage($id)
    {
        $data['alumni'] = Alumni::with('faculty', 'department', 'events')->find($id);

        if ($data['alumni']->banner_id) {
            $data['banner']     = $this->bannerService->getByID($data['alumni']->banner_id);
        } else {
            $data['banner']     = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.alumni.pages.read-more', $data);
    }




    public function registrationForm()
    {
        return view('frontend.alumni.member.registration');
    }
    public function registration(Request $request)
    {
        //    return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required|unique:alumni_members,student_id',
            'email' => 'required|unique:alumni_members,email',
            'phone' => 'required|unique:alumni_members,phone',
            // 'faculty_id' => 'required',
            // 'depratment_id' => 'required',
            // 'alumni_id' => 'required',
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
            $new_member = new AlumniMember();
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
                    'path'  => 'upload/alumni/member/image',
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

            // $new_member_map = new alumniMemberMapping();
            // $new_member_map->alumni_member_id      = $new_member->id;
            // $new_member_map->faculty_id          = $request->faculty_id;
            // $new_member_map->department_id       = $request->department_id;
            // $new_member_map->alumni_id             = $request->alumni_id;
            // $new_member_map->alumni_designation_id = $request->alumni_designation_id;
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
            $user = AlumniMember::where('verify_token', $token)->first();
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
