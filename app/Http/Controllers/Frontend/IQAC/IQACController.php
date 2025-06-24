<?php

namespace App\Http\Controllers\Frontend\IQAC;

use App\Http\Controllers\Controller;
use App\Models\iqacAbout;
use Illuminate\Http\Request;
use App\Services\Slider\SliderService;
use App\Models\TrainingWorkShopSeminar;
use App\Models\Team;
use App\Models\Document;
use App\Models\Faq;
use App\Models\IqacWorkshop;
use App\Models\PersonnelsToOffice;
use App\Models\Profile;
use App\Services\BannerService;
use App\Services\Message\MessageService;
use App\Services\NewsEventNoticeServices;
use App\Services\OfficeService;
use App\Services\GalleryService;
use App\Services\FaqServices;

class IQACController extends Controller
{
    private $sliderService;
    private $messageService;
    private $newsEventNoticeServices;
    private $officeService;
    private $bannerService;
    private $galleryService;
    private $faqService;

    public function __construct(
        OfficeService $officeService,
        SliderService $sliderService,
        MessageService $messageService,
        NewsEventNoticeServices $newsEventNoticeServices,
        BannerService $bannerService,
        GalleryService $galleryService,
        FaqServices $faqService
    ) {
        $this->sliderService            = $sliderService;
        $this->messageService           = $messageService;
        $this->newsEventNoticeServices  = $newsEventNoticeServices;
        $this->officeService            = $officeService;
        $this->bannerService            = $bannerService;
        $this->galleryService           = $galleryService;
        $this->faqService               = $faqService;
    }

    public function iqacHome()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        $data['iqac_abouts'] = iqacAbout::all();
        $data['trainingWorkshopSeminars'] = IqacWorkshop::where('type_id', 1)->where('status', 1)->take(10)->latest()->get();

        if ($data['office']->slider_id) {
            $data['sliders'] = $this->sliderService->getByMasterId($data['office']->slider_id);
        } else {
            $data['sliders'] = $this->sliderService->getByMasterId(1);
        }

        $data['message'] = $this->messageService->getMessageFromHead(3, $data['office']->id);

        $data['latest_news'] = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(1, 3, $data['office']->id);
        $data['events'] = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(2, 3, $data['office']->id, 1);
        $data['notices'] = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(3, 3, $data['office']->id);


        session()->put('active', 'about');
        return view('frontend.iqac.iqac_home', $data);
    }
    public function iqacCommittee()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        // QAC Type ID 1, FQAC Type ID 2, PSAC Type ID 3

        $data['QACMembers']    = Team::where('status', 1)->where('type_id', 1)->orderBy('sort_order', 'asc')->get();
        $data['FQACMembers']  = Team::where('status', 1)->where('type_id', 2)->orderBy('sort_order', 'asc')->get();
        $data['PSACMembers']     = Team::where('status', 1)->where('type_id', 3)->orderBy('sort_order', 'asc')->get();




        session()->put('active', 'committee');

        return view('frontend.iqac.iqac_committee', $data);
    }
    public function iqacTeam()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['people'] = PersonnelsToOffice::with('profile')
            ->where('office_id', $data['office']->id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        session()->put('active', 'team');

        return view('frontend.iqac.iqac_team', $data);
    }

    public function iqacTrainingWorkshop()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['trainingWorkshopSeminars']   = IqacWorkshop::where('type_id', 1)->where('status', 1)->get();
        $data['iqacActivities']             = IqacWorkshop::where('type_id', 2)->where('status', 1)->get();
        $data['iqacMeeting']                = IqacWorkshop::where('type_id', 3)->where('status', 1)->get();

        session()->put('active', 'training_workshop');

        return view('frontend.iqac.iqac_training_workshop', $data);
    }
    public function iqacTrainingWorkshopDetails($id)
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['workshop'] = IqacWorkshop::find($id);

        return view('frontend.iqac.iqac_training_workshop_details', $data);
    }
    public function iqacAboutDetails($id)
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }


        $data['iqac_about'] = iqacAbout::find($id);

        //dd($data['office']);
        return view('frontend.iqac.iqac_read_more', $data);
    }

    public function iqacDocument()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }


        $data['documents'] = Document::where('type_id', 1)->where('status', 1)->get();
        session()->put('active', 'document');

        return view('frontend.iqac.iqac_document', $data);
    }
    public function iqacMessage()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        session()->put('active', 'message');
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        $data['message'] = $this->messageService->getMessageFromHead(3, $data['office']->id);
        return view('frontend.iqac.iqac_read_more', $data);
    }
    public function iqacContact()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        session()->put('active', 'contact');

        return view('frontend.iqac.iqac_contact', $data);
    }
    public function iqacNewsEvent()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        session()->put('active', 'news_event');

        return view('frontend.iqac.iqac_news_event');
    }
    public function iqacFAQ()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['office']->id);

        session()->put('active', 'faq');

        return view('frontend.iqac.iqac_faq', $data);
    }
    public function iqacGallery()
    {
        $data['office'] = $this->officeService->getByID(config('configure.iqac'));
        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        session()->put('active', 'gallery');
        $data['title'] = 'IQAC Gallery';
        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(7, $data['office']->id);
        return view('frontend.iqac.iqac_gallery', $data);
    }
}
