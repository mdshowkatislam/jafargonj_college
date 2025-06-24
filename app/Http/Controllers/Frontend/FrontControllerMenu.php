<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BannerService;
use App\Models\Profile;
use App\Models\ShortStorie;

class FrontControllerMenu extends Controller
{
    private $bannerService;

    public function __construct(BannerService $bannerService){
      
        $this->bannerService = $bannerService;
    } 
    

    public function syndicateMemberList(){
    $data['banner'] = $this->bannerService->bannerByRefId(1);
    $membersList['profiles'] = Profile::all();
      return view('frontend.about.syndicateMembers.list',compact('membersList')); 
    }
    public function butexShortStory(){
    
    $data['banner'] = $this->bannerService->bannerByRefId(1);
    $shortStories = ShortStorie::first();
      return view('frontend.about.butexShortStory.page',compact('shortStories')); 
    }
}
