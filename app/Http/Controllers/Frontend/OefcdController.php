<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Services\OefcdServices;
use App\Services\NewsEventNoticeServices;
use App\Services\Message\MessageService;
use App\Services\Slider\SliderService;
use App\Services\BannerService;
use App\Services\GalleryService;
use App\Services\FaqServices;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Mou;
use App\Models\OefcdAbout;
use App\Models\OefcdCurriculum;
use App\Models\OefcdOfficerDevelopmentProgram;
use App\Models\Office;
use App\Models\Page;
use App\Models\PersonnelsToOffice;
use Illuminate\Http\Request;

class OefcdController extends Controller
{

    private $OefcdServices;
    private $NewsEventNoticeServices;
    private $messageService;
    private $sliderService;
    private $bannerService;
    private $galleryService;
    private $faqService;

    public function __construct(
        OefcdServices $OefcdServices,
        NewsEventNoticeServices $NewsEventNoticeServices,
        MessageService $messageService,
        SliderService $sliderService,
        BannerService $bannerService,
        GalleryService $galleryService,
        FaqServices $faqService
    ) {
        $this->OefcdServices = $OefcdServices;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->messageService = $messageService;
        $this->sliderService = $sliderService;
        $this->bannerService = $bannerService;
        $this->galleryService = $galleryService;
        $this->faqService = $faqService;
    }
    public function index()
    {

        $data['office'] = Office::find(30);
        if ($data['office']->slider_id) {
            $data['sliders'] = $this->sliderService->getByMasterId($data['office']->slider_id);
        } else {
            $data['sliders'] = $this->sliderService->getByMasterId(1);
        }

        $data['latest_news'] = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(1, 3, $data['office']->id);
        $data['events'] = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(2, 5, $data['office']->id, 1);
        $data['notices'] = $this->NewsEventNoticeServices->getOfficeNewsEventsNotice(3, 5, $data['office']->id);


        $data['message'] = $this->messageService->getMessageFromHead(3, 30);
        $data['profiles'] = PersonnelsToOffice::where('profile_id', '!=', $data['office']->profile_id)->where('status', 1)->orderBy('sort_order', 'asc')->whereHas('office', function ($query) {
            $query->where('id', 30);
        })->get();

        $data['about'] = OefcdAbout::first();

        return view('frontend.oefcd.pages.index', $data);
    }

    public function faculty()
    {
        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['info'] = $this->OefcdServices->getby();
        return view('frontend.oefcd.pages.faculty_program', $data);
    }

    public function training()
    {
        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }
        $data['officer_development_program'] = OefcdOfficerDevelopmentProgram::first();

        $data['trainer_list'] = $this->OefcdServices->getAllByStatus();

        return view('frontend.oefcd.pages.staff_training', $data);
    }

    public function international_affairs()
    {

        $id = 1;
        $data['about'] = $this->OefcdServices->getInternationalAffairByID($id);
        $data['local_mous'] = Mou::where('status', 1)->where('institute_type', 1)->get();
        $data['foreign_mous'] = Mou::where('status', 1)->where('institute_type', 2)->get();

        // dd($data['about']);

        return view('frontend.oefcd.pages.international_affairs', $data);
    }

    public function curriculumnDevelopment()
    {
        $id = 1;
        $data['about'] = $this->OefcdServices->getCurriculumnByID($id);

        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }
        $data['curriculums'] = OefcdCurriculum::where('status', 1)->get();

        return view('frontend.oefcd.pages.curriculumn', $data);
    }
    public function Evaluation()
    {
        $id = 1;
        $data['about'] = $this->OefcdServices->getEvaluationByID($id);

        return view('frontend.oefcd.pages.evaluation', $data);
    }

    public function oefcdDocument()
    {
        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['documents'] = Document::where('type_id', 4)->where('status', 1)->get();
        return view('frontend.oefcd.pages.oefcd_document', $data);
    }

    public function oefcdMessage()
    {

        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['message'] = $this->messageService->getMessageFromHead(3, 30);
        return view('frontend.oefcd.pages.read-more', $data);
    }


    public function oefcdFAQ()
    {
        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }


        $data['faqs'] = $this->faqService->faqByTypeAndRefId(7, $data['office']->id);

        session()->put('active', 'faq');

        return view('frontend.oefcd.pages.oefcd_faq', $data);
    }

    public function oefcdGallery()
    {

        $data['office'] = Office::find(30);

        if ($data['office']->banner_id) {
            $data['banner'] = $this->bannerService->getByID($data['office']->banner_id);
        } else {
            $data['banner'] = $this->bannerService->bannerByRefId(1);
        }

        $data['galleryCategory'] = $this->galleryService->getGalleryCategoryByCategoryAndRefId(7, $data['office']->id);

        return view('frontend.oefcd.pages.oefcd_gallery', $data);
    }
    public function get_gdata(Request $request)
    {
        $galleries = Gallery::where('gallery_category_id', $request->id)->where('status', 1)->get();

        if (isset($galleries)) {
            return response()->json($galleries);
        } else {
            return response()->json('fail');
        }
    }
    public function oefcdGallery_category($id)
    {
        $data['galleries'] = Gallery::where('gallery_category_id', $id)->where('status', 1)->get();
        //dd($data['galleries']);

        return view('frontend.oefcd.pages.oefcd_gallery', $data);
    }
}
