<?php

namespace App\Http\Controllers\Frontend\Conference;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\CmsSection;
use App\Models\GalleryCategory;
use App\Models\ConferenceMember;
use App\Models\Slider;
use App\Models\SliderMaster;
use App\Models\FormTemplate;
use Illuminate\Http\Request;
use App\Services\ContentMgt\PageService; 
use App\Services\BannerService;

class ConferenceController extends Controller
{
    private $pageService;
    private $bannerService;

    public function __construct(PageService $pageService, BannerService $bannerService)
    { 
        $this->pageService = $pageService;
        $this->bannerService = $bannerService;
    }

    public function index(){
        $page_id     = 6;
        $page_tab_id = 1;

        $slider_masters   = SliderMaster::where('animation_type', 'conferences')->first();
        $data['sliders']  = Slider::where('slider_master_id', $slider_masters->id)->orderBy('sort_order', 'asc')->get();

        $data['galleryCategory']   = GalleryCategory::where('sub_category', 101)->where('status', 1)->get(); 

        $data['sections'] = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->orderBy('section_order', 'asc')->get();

        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '1';
        $data['menu']        = Conference::find(1);

        return view('frontend.conference.index', $data);
    }

    public function gallery(){
        $page_id     = 6;
        $page_tab_id = 1;

        $data['galleryCategory']   = GalleryCategory::where('sub_category', 101)->where('status', 1)->get(); 
        $data['banner']    = $this->bannerService->bannerByRefId(2222);
        
        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '1';
        $data['menu']        = Conference::find(1);

        return view('frontend.conference.gallery', $data);
    }

    public function organizingCommittee(){
        $page_id     = 6;
        $page_tab_id = 1;

        $data['members']   = ConferenceMember::where('member_type', 1)->where('status', 1)->get(); 
        $data['banner']    = $this->bannerService->bannerByRefId(2222);
        
        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '1';
        $data['menu']        = Conference::find(1);
        
        return view('frontend.conference.organizingCommittee', $data);
    }

    public function guestsSpeakers(){
        $page_id     = 6;
        $page_tab_id = 1;

        $data['members']   = ConferenceMember::where('member_type', 2)->where('status', 1)->get(); 
        $data['banner']    = $this->bannerService->bannerByRefId(2222);
        
        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['ref_id']      = '1';
        $data['menu']        = Conference::find(1);

        return view('frontend.conference.guestsSpeakers', $data);
    }

    public function home(Request $request){
        $page_id     = 6;
        $page_tab_id = 1;

        $data['page_info'] = $this->pageService->getByID($request->id);
        $data['banner']    = $this->bannerService->bannerByRefId(2222);

        $data['page_id']     = $page_id;
        $data['page_tab_id'] = $page_tab_id;
        $data['menu']        = Conference::find(1);

        $form_template = $data['page_info']['form_template'];
        $formTemplate  = FormTemplate::find($form_template);
       
        if(!empty(@$formTemplate->form_data)){
            $formTemplate->form_data = json_decode($formTemplate->form_data, true);
        }

        $data['slug'] = $request->slug;

        return view('frontend.conference.page', $data, compact('formTemplate'));
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'top_menu' => 'nullable|string',
            'nav_menu' => 'nullable|string',
        ]);

        // Insert or update the record in the `conferences` table
        $conference = Conference::updateOrCreate(
            ['id' => 1],
            [
                'top_menu' => $request->top_menu,
                'nav_menu' => $request->nav_menu,
            ]
        );

        return response()->json(['success' => true, 'message' => 'Menu updated successfully']);
    }
}