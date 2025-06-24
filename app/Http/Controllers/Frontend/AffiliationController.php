<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Affiliation\AffiliateInstituteService;
use App\Services\BannerService;
use App\Services\NewsEventNoticeServices;
use Illuminate\Http\Request;

class AffiliationController extends Controller
{
    private $affiliation;
    private $bannerService;
    private $NewsEventNoticeServices;
    public function __construct(AffiliateInstituteService $affiliation, BannerService $bannerService, NewsEventNoticeServices $NewsEventNoticeServices)
    {
        $this->affiliation = $affiliation;
        $this->bannerService = $bannerService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
    }
    public function index($id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['info'] = $this->affiliation->getByID($id);
        return view('frontend.affiliation.affiliate_details', $data);
    }
    public function allAffiliation()
    {
        $data['infos'] = $this->affiliation->getAllOrderBy();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['notices'] = $this->NewsEventNoticeServices->getAffiliationNotice(3, 10);

        //dd($data['infos']);
        return view('frontend.affiliation.all_affiliate_institute', $data);
    }
    public function affiliationByType(Request $request)
    {
        if($request->affiliate_type == 'All'){
            $data['infos'] = $this->affiliation->getAllOrderBy();
        }
        else{
            $data['infos'] = $this->affiliation->getByType($request->affiliate_type);
        }
        return view('frontend.affiliation.affiliate_institute_by_type', $data);
    }
}
