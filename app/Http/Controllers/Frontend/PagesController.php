<?php

namespace App\Http\Controllers\Frontend;

use App\Services\ContentMgt\PageService; 
use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;
use App\Models\FormTemplate;

class PagesController extends Controller
{
    
    private $pageService;
    private $bannerService;

    public function __construct(PageService $pageService, BannerService $bannerService)
    { 
        $this->pageService = $pageService;
        $this->bannerService = $bannerService;
    }

    public function pages($id)
    {
        // $data['page_info']=CustomPage::find($id);/
        $data['page_info'] = $this->pageService->getByID($id);
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        return view('frontend.pages', $data);
    }
    
    public function userPages($page_name, $id)
    {
      // $data['page_info']=CustomPage::find($id);/
      $data['page_info']= $this->pageService->getByID($id);
      $data['banner'] = $this->bannerService->bannerByRefId(1);

        // dd($data['page_info']['image']);

        $form_template = $data['page_info']['form_template'];
        $formTemplate  = FormTemplate::find($form_template);
       
        if(!empty(@$formTemplate->form_data)){
            $formTemplate->form_data = json_decode($formTemplate->form_data, true);
        }

        return view('frontend.user_pages', $data, compact('formTemplate'));
    }
}
