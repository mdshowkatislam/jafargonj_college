<?php

namespace App\Http\Controllers\Frontend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\ChsrResearchArea;
use App\Models\Document;
use App\Models\Faculty;
use App\Models\Faq;
use App\Models\Form;
use App\Models\PersonalToResearch;
use App\Models\PersonnelsToOffice;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\Research;
use App\Services\BannerService;
use App\Services\Chsr\ChsrAboutService;
use App\Services\Chsr\ChsrSupervisorService;
use App\Services\Course\CourseService;
use App\Services\Journal\JournalService;
use App\Services\Message\MessageService;
use App\Services\News\NewsService;
use App\Services\NewsEventNoticeServices;
use App\Services\OfficeService;
use App\Services\Research\ResearchService;
use App\Services\Slider\SliderService;
use App\Services\VideoGalleryService;
use App\Services\FaqServices;
use Illuminate\Http\Request;

class ChsrController extends Controller
{
    private $chsrAboutService;
    private $sliderService;
    private $messageService;
    private $officeService;
    private $chsrSupervisorService;
    private $newsEventNoticeServices;
    private $videoGalleryService;
    private $researchService;
    private $bannerService;
    private $courseService;
    private $faqService;

    public function __construct(
        ChsrAboutService $chsrAboutService,
        SliderService $sliderService,
        MessageService $messageService,
        OfficeService $officeService,
        ChsrSupervisorService $chsrSupervisorService,
        NewsEventNoticeServices $newsEventNoticeServices,
        VideoGalleryService $videoGalleryService,
        ResearchService $researchService,
        BannerService $bannerService,
        CourseService $courseService,
        FaqServices $faqService
    ) {
        $this->chsrAboutService         = $chsrAboutService;
        $this->officeService            = $officeService;
        $this->sliderService            = $sliderService;
        $this->messageService           = $messageService;
        $this->chsrSupervisorService    = $chsrSupervisorService;
        $this->newsEventNoticeServices  = $newsEventNoticeServices;
        $this->videoGalleryService      = $videoGalleryService;
        $this->researchService          = $researchService;
        $this->bannerService            = $bannerService;
        $this->courseService            = $courseService;
        $this->faqService               = $faqService;
    }

    public function oreHome()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['about_ore'] = $this->chsrAboutService->getAll();
        $data['documentList'] = Document::where('type_id', 5)->orderBy('id', 'desc')->get();
        //dd($data['documentList']);
        return view('frontend.chsr.ore',$data);
    }
    public function chsr_home()
    {
       
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['message'] = $this->messageService->getMessageFromHead(3, $data['office']->id);
        $data['about'] = $this->chsrAboutService->getAll();
        $data['aboutFirst'] = $this->chsrAboutService->getAbout();
       
        $data['research_for'] = 1; 
        $data['latest_news'] = $this->newsEventNoticeServices->getOfficeNewsEventsNotice(1, 3, $data['office']->id);
       
       
        return view('frontend.chsr.chsr', $data);
    }
    public function chsrMphil()
    {
        $data['info'] = Program::join('program_categories', 'program_categories.id', 'program_category_id')
            ->join('faculties', 'faculties.id', 'faculty_id')
            ->join('departments', 'departments.id', 'department_id')
            ->select('programs.*', 'faculties.name as fname', 'departments.name as dname', 'program_categories.program_category as pcname')
            ->where('programs.id', 469)->first();
        $data['program_categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['courses'] = $this->courseService->programWiseCourse($data['info']->id);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.chsr.chsr_mphil', $data);
    }
    public function chsrPhd()
    {
        $data['info'] = Program::join('program_categories', 'program_categories.id', 'program_category_id')
            ->join('faculties', 'faculties.id', 'faculty_id')
            ->join('departments', 'departments.id', 'department_id')
            ->select('programs.*', 'faculties.name as fname', 'departments.name as dname', 'program_categories.program_category as pcname')
            ->where('programs.id', 470)->first();
        $data['program_categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['courses'] = $this->courseService->programWiseCourse($data['info']->id);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.chsr.chsr_phd', $data);
    }
    public function chsrResearchArea()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['infos'] = ChsrResearchArea::where('status', 1)->get();
        return view('frontend.chsr.chsr_research_area', $data);
    }
    public function chsrSupervisor()
    {
        return view('frontend.chsr.chsr_supervisor');
    }
    public function chsrAwardee()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['research_for'] = 1;
        $data['infos'] = $this->researchService->CompletedResearchByResearchFor($data['research_for']);

        return view('frontend.research2.research_list', $data);
    }
    public function chsrResearch()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['research_for'] = 1;
        $data['infos'] = $this->researchService->FundedResearchByResearchFor($data['research_for']);

        return view('frontend.research2.research_list', $data);
    }
    // public function chsrResearch(){
    //     $data['banner'] = $this->bannerService->bannerByRefId(1);
    //     $data['type'] = 1;
    //     $data['count_completed_research'] = count($this->researchService->ResearchByType('completed_research', $data['type']));
    //     $data['count_ongoing_research'] = count($this->researchService->ResearchByType('ongoing_research', $data['type']));
    //     return view('frontend.research.research_list', $data);
    // }

    public function chsrDownloads()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // $data['chsr_forms'] = Form::where('type_id', 9)->where('status', '1')->get();
        $data['chsr_forms'] = Document::where('type_id', 5)->where('status', '1')->get();
        return view('frontend.chsr.downloads', $data);
    }

    public function chsrMessage()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['message'] = $this->messageService->getMessageFromHead(3, $data['office']->id);
        //dd($data['office']);
        return view('frontend.chsr.read-more', $data);
    }
    public function chsrAbout()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['abouts'] = $this->chsrAboutService->getAll();
        //dd($data['office']);
        return view('frontend.chsr.about_chsr', $data);
    }
    public function chsrPeople()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['people'] = PersonnelsToOffice::with('profile')
            ->where('office_id', $data['office']->id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();
        //dd($data['office']);
        return view('frontend.chsr.chsr_people', $data);
    }

    public function chsrFaq()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['faqs']   = $this->faqService->faqByTypeAndRefId(7, $data['office']->id);

        return view('frontend.chsr.chsr_faq', $data);
    }
    public function allChsrNotice()
    {
        $data['type'] = 'Notice';
        $data['category'] = 'chsr';
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['news'] = $this->newsEventNoticeServices->getNewsEventsNoticeForOffice(3, 100, $data['office']->id);
        return view('frontend.news.allnews', $data);
    }

    public function butexConference()
    {
        $data = [''];
        return view('frontend.ore.conference-2022.conference22',$data);
    }
}
