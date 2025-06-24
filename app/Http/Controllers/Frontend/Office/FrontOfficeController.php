<?php

namespace App\Http\Controllers\Frontend\Office;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Faq;
use App\Models\PersonnelsToOffice;
use App\Models\ProfileAchievement;
use App\Models\ProfileBiography;
use App\Models\ProfileJournal;
use App\Models\ProfileTraining;
use App\Models\SocialMediaLink;
use App\Models\Designation;
use App\Models\Office;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\PersonnelsToFacultyOfficer;
use App\Models\ProfileBook;
use App\Models\ProfileConference;
use App\Models\Team;
use App\Services\BannerService;
use App\Services\OfficeService;
use App\Services\Message\MessageService;
use App\Services\NewsEventNoticeServices;
use App\Services\GalleryService;
use App\Services\FaqServices;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    private $bannerService;
    private $officeService;
    private $message_service;
    private $NewsEventNoticeServices;
    private $galleryService;
    private $faqService;

    public function __construct(
        BannerService $bannerService,
        OfficeService $officeService,
        MessageService $message_service,
        NewsEventNoticeServices $NewsEventNoticeServices,
        GalleryService $galleryService,
        FaqServices $faqService
    ) {
        $this->bannerService            = $bannerService;
        $this->officeService            = $officeService;
        $this->message_service          = $message_service;
        $this->NewsEventNoticeServices  = $NewsEventNoticeServices;
        $this->galleryService           = $galleryService;
        $this->faqService               = $faqService;
    }

    public function index()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['all']    = $this->officeService->getAll();

        return view('frontend.office.index', $data);
    }
    
    public function officePeople()
    {
        // $data['profiles'] = PersonnelsToOffice::with('office')->select('office_id', 'sort_order')->distinct()->get();
        $data['offices']    = $this->officeService->getAll();
        $data['banner']     = $this->bannerService->bannerByRefId(1);

        return view('frontend.office.office_people', $data);
    }

    public function officeDetails($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        $data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.office_details', $data);
    }

    public function officeGallery($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);

        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }

        $data['galleryCategory']  = GalleryCategory::where('sub_category', 7)
            ->where('ref_id', $data['office']->id)
            ->where('status', 1)
            ->orderBy('sort')
            ->get(); 

        return view('frontend.office.template.pages.gallery', $data);
    }

    public function officeAbout($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);

        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.about', $data);
    }

    public function officeMessage($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);

        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.message', $data);
    }
    
    public function officePerson($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        $data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->orderBy('sort_order','asc')->get();
       
        //$data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.people', $data);
    }

    public function officeNotice($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
       // $data['news']   = $this->NewsEventNoticeServices->getSelectedRange(3, 10);
        $data['news']   = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(3, 5, $data['office']->id, $data['office']->office_id);
   
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        //$data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.notice', $data);
    }

    public function officeEvent($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
       // $data['news']   = $this->NewsEventNoticeServices->getSelectedRange(3, 10);
        $data['news']   = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(2, 5, $data['office']->id, $data['office']->office_id);
   
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        //$data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.event', $data);
    }

    public function officeNews($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
       // $data['news']   = $this->NewsEventNoticeServices->getSelectedRange(3, 10);
        $data['news']   = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(1, 5, $data['office']->id, $data['office']->office_id);
   
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        //$data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.news', $data);
    }

    public function officeNewsEventNoticeFilter(Request $request)
    {
        // dd($request->all());
        $id = $request->office_id;
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);

        $data['category'] = '';
        $data['type'] = $request->news_type;

        $query = News::where('type', $request->news_type_id)
                // ->where('office_id', $id)
                ->where(function ($query) use ($id) {
                    $query->where('office_id', $id)
                        ->orWhere('office_id', 0);
                })
                ->where('is_approved', 1)
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest();
        $data['news'] = $query->paginate(100);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        return view('frontend.office.template.pages.notice', $data);
    }

    public function officeContact($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        return view('frontend.office.template.pages.contact', $data);
    }
    public function officeCommittee($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);
        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }
        //$data['profiles'] = PersonnelsToOffice::with('profile')->where('office_id', $id)->where('status', 1)->get();
        // $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        $data['committee'] = Team::with(['member', 'committee_designation'])->where('status', 1)->get();
        $data['committee'] = $data['committee']->groupBy('type_id');
        // dd($data['committee'][2]);
        $data['faculty'] = Faculty::all();
        $data['department'] = Department::all();
        return view('frontend.office.template.pages.committee', $data);
    }

    public function officeDetailsMessage($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;
        
        $data['office'] = Office::find($id);
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }
        $data['message'] = $this->message_service->getMessageFromHead(3, $id);
        //dd($data['office']);
        return view('frontend.partials.sections.read-more', $data);
    }

    public function officePeopleDetails($id)
    {

        $data['profile'] = PersonnelsToOffice::with(['profile', 'office'])->where('profile_id', $id)->first();
        // $data['profile'] = PersonnelsToOffice::with(['profile', 'office' => function ($q) {
        //     $q->select('ucam_office_id', 'name');
        // }])->where('profile_id', $id)->first();
        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->profile_id)->get();
        $data['publication'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->first();
        $data['training'] = ProfileTraining::where('profile_id', $data['profile']->profile_id)->first();
        $data['achievement'] = ProfileAchievement::where('profile_id', $data['profile']->profile_id)->first();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->profile_id)->first();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['journals'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->get();
        $data['conferences'] = ProfileConference::where('profile_id', $data['profile']->profile_id)->get();
        $data['books'] = ProfileBook::where('profile_id', $data['profile']->profile_id)->get();
        // dd($data['banner']);
        return view('frontend.office.people_details', $data);
    }

    public function officeMemberDetails($id)
    {
        $data['page_id'] = 4;
        $data['page_tab_id'] = $id;

        $data['office'] = Office::find($id);

        // dd($data['office']);

        $id = $data['office']->profile_id;

        $dummyBanner = public_path('images/ore-banner-bg.jpg');
        if (@$data['office']->banner_id) {
            $banner = $this->bannerService->getByID($data['office']->banner_id);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        } else {
            $banner = $this->bannerService->bannerByRefId(1);
            $data['banner'] = $banner ?: ['image_path' => $dummyBanner];
        }

        $data['profile'] = PersonnelsToOffice::with(['profile', 'office'])->where('profile_id', $id)->first();
        // $data['profile'] = PersonnelsToOffice::with(['profile', 'office' => function ($q) {
        //     $q->select('ucam_office_id', 'name');
        // }])->where('profile_id', $id)->first();
        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->profile_id)->get();
        $data['publication'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->first();
        $data['training'] = ProfileTraining::where('profile_id', $data['profile']->profile_id)->first();
        $data['achievement'] = ProfileAchievement::where('profile_id', $data['profile']->profile_id)->first();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->profile_id)->first();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['journals'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->get();
        $data['conferences'] = ProfileConference::where('profile_id', $data['profile']->profile_id)->get();
        $data['books'] = ProfileBook::where('profile_id', $data['profile']->profile_id)->get();
        
        $data['designation'] = Designation::select('name')->where('id', $data['profile']->additional_designation)->first();
        
        return view('frontend.office.template.pages.member', $data);
    }
}
