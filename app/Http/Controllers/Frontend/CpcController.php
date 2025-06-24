<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CpcContact;
use App\Models\PersonnelsToOffice;
use Illuminate\Http\Request;
use App\Services\NewsEventNoticeServices;
use App\Services\CpcServices;
use App\Services\FaqServices;
use App\Services\Message\MessageService;
use App\Services\GalleryService;
use App\Services\OfficeService;
use App\Services\Slider\SliderService;
use App\Services\BannerService;

use App\Models\Document;

class CpcController extends Controller
{
    private $newsEventNoticeServices;
    private $cpcServices;
    private $messageService;
    private $faqService;
    private $galleryService;
    private $officeService;
    private $sliderService;
    private $bannerService;

    public function __construct(
        NewsEventNoticeServices $newsEventNoticeServices,
        CpcServices $cpcServices,
        MessageService $messageService,
        FaqServices $faqService,
        GalleryService $galleryService,
        OfficeService $officeService,
        SliderService $sliderService,
        BannerService $bannerService
    ) {
        $this->newsEventNoticeServices = $newsEventNoticeServices;
        $this->cpcServices = $cpcServices;
        $this->messageService = $messageService;
        $this->faqService = $faqService;
        $this->galleryService = $galleryService;
        $this->officeService = $officeService;
        $this->sliderService = $sliderService;
        $this->bannerService = $bannerService;
    }

    public function index()
    {

        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['news']       = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(1, 3, $data['cpc']->id);
        $data['events']     = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(2, 3, $data['cpc']->id, 1);
        $data['notices']    = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(3, 3, $data['cpc']->id);

        $data['message']    = $this->messageService->getMessageFromHead(3, 33);

        $data['contact']    = CpcContact::first();

        return view('frontend.cpc.index', $data);
    }
    public function about()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

    
        $data['infos'] = $this->cpcServices->cpcSection(1);

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);

        $data['profiles'] = PersonnelsToOffice::where('office_id', 33)->where('status', 1)->orderBy('sort_order', 'asc')->get();

        return view('frontend.cpc.pages.about-us', $data);
    }
    public function academicCounselling()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['infos'] = $this->cpcServices->cpcSection(2);

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);

        return view('frontend.cpc.pages.academic-counselling', $data);
    }
    public function socioEmotional()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['infos'] = $this->cpcServices->cpcSection(3);

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);

        return view('frontend.cpc.pages.socio-emotional', $data);
    }
    public function placementCenter()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['infos'] = $this->cpcServices->cpcSection(4);

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);

        return view('frontend.cpc.pages.placement-center', $data);
    }
    public function appointment()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['infos'] = $this->cpcServices->cpcSection(5);

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);

        return view('frontend.cpc.pages.appointment', $data);
    }
    public function resources()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['documents'] = Document::where('type_id', 2)->where('status', 1)->get();
        return view('frontend.cpc.pages.resources', $data);
    }
    public function gallery()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['title'] = 'Image Gallery';
        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(7, $data['cpc']->id);
        return view('frontend.cpc.pages.gallery', $data);
    }

    public function cpcMessage()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['office'] = $this->officeService->getByID(33);
        $data['message'] = $this->messageService->getMessageFromHead(3, 33);
        return view('frontend.cpc.pages.read-more', $data);
    }

    public function cpcFaq()
    {
        $data['cpc'] = $this->cpcServices->getCpcFromOffice();

        if ($data['cpc']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['cpc']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['cpc']->id);
        
        return view('frontend.cpc.pages.faq', $data);
    }
}
