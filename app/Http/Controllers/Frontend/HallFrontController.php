<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HallHome;

use App\Models\News;
use App\Models\Hall;
use App\Models\HallMember;
use App\Models\Slider;
use App\Models\Member;
use App\Models\MemberAdministrativeExperience;
use App\Models\MemberAreaOfInterest;
use App\Models\MemberCertificationAccomplishment;
use App\Models\MemberConference;
use App\Models\MemberEducation;
use App\Models\MemberExperience;
use App\Models\MemberHonorAward;
use App\Models\MemberMembership;
use App\Models\MemberPublicationBook;
use App\Models\MemberPublicationJournal;
use App\Models\MemberScholarship;
use App\Models\MemberSocialMediaLink;
use App\Models\Message;
use App\Services\LandingModalService;
use App\Services\NewsEventNoticeServices;
use Illuminate\Http\Request;
use App\Services\Slider\SliderService;

class HallFrontController extends Controller
{
    private $slider;
    private $NewsEventNoticeServices;
    private $landingModalService;

    public function __construct(
        SliderService $slider,
        NewsEventNoticeServices $NewsEventNoticeServices,
        LandingModalService $landingModalService

    ) {

        $this->slider = $slider;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->landingModalService = $landingModalService;
    }

    public function allHalls()
    {
        $data['halls'] = Hall::where(['status' => 1])->orderBy('sort_order', 'ASC')->get();
        return view('frontend.hall.all-hall', $data);
    }

    public function hallHistory($id)
    {
        // dd($id);
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
        $data['halls'] = Hall::where('id', $id)->first();
        return view('frontend.hall.hall-history', $data);
    }


    public function allHallProvost($id)
    {
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
        $data['halls'] = Hall::where('id', $id)->first();

        $data['hallProvost'] = Hall::with('provostProfile')
            ->where('id', $id)
            ->get();
        return view('frontend.hall.all-hall-provost', $data);
    }

    public function provostMessage($id)
    {
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
      
        $data['halls'] = Hall::with('provostProfile')->where('id', $id)->first();
        // $data['hallProvost']=Hall::with('member')
        // ->where('id', $id)
        // ->get();
        $data['message'] = Message::with('profile')->where('type_id', 4)->where('category_id', $id)->first();

        // dd($data['halls']->provostProfile->nameEn);
        return view('frontend.hall.provost-message', $data);
    }

    public function houseTutor($id)
    {
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
        $data['halls'] = Hall::where('id', $id)->first();
        $data['houseTutor'] = HallMember::with('member')
            ->where('type_id', 1)
            ->where('hall_id', $id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        //dd($data);    
        return view('frontend.hall.house-tutor', $data);
    }

    public function administrativeStaff($id)

    {
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
        $data['halls'] = Hall::where('id', $id)->first();
        $data['addministrationStuff'] = HallMember::with('member')
            ->where('type_id', 2)
            ->where('hall_id', $id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();
        return view('frontend.hall.administrative-staff', $data);
    }


    public function hallContact($id)
    {
        $ids = Hall::where('id', $id)->first();
        $id = $ids->id;
        $data['halls'] = Hall::where('id', $id)->first();
        $data['contactNumber'] = Hall::get();
        return view('frontend.hall.hall-contact', $data);
    }


    public function studentActivity()

    {
        return view('frontend.hall.student-activity');
    }

    public function archivement()
    {
        return view('frontend.hall.archivement');
    }


    public function scholarshipFinancial()

    {
        return view('frontend.hall.scholarship-financial');
    }

    public function HallMemberDetails($encypt_id)
    {
        $id = ($encypt_id);

        $data['halls'] = HallMember::with('hall')->where('member_id', $id)->first();

        // $data['facultyMember'] = Member::findOrFail($id);

        // $data['MemberExperiences'] = MemberExperience::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberEduaction'] = MemberEducation::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberPublishBooks'] = MemberPublicationBook::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['administrativeExperiences'] = MemberAdministrativeExperience::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberPublicationJournal'] = MemberPublicationJournal::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['memberConference'] = MemberConference::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['awards'] = MemberHonorAward::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['certifications'] = MemberCertificationAccomplishment::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['scholarships'] = MemberScholarship::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberships'] = MemberMembership::where('member_id', $data['facultyMember']->id)
        //     ->get();

        // $data['researchs'] = MemberAreaOfInterest::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['socialMediaLink'] = MemberSocialMediaLink::where('member_id', $data['facultyMember']->id)->first();

        // dd($data);

        return view('frontend.hall.hall_member_details', $data);
    }
    public function ProvostDetails($encypt_id)
    {
        $id = ($encypt_id);

        $data['halls'] = Hall::with('member')->where('provost', $id)->first();

        // $data['facultyMember'] = Member::findOrFail($id);

        // $data['MemberExperiences'] = MemberExperience::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberEduaction'] = MemberEducation::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberPublishBooks'] = MemberPublicationBook::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['administrativeExperiences'] = MemberAdministrativeExperience::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberPublicationJournal'] = MemberPublicationJournal::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['memberConference'] = MemberConference::where('member_id', $data['facultyMember']->id)
        //     ->first();
        // $data['awards'] = MemberHonorAward::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['certifications'] = MemberCertificationAccomplishment::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['scholarships'] = MemberScholarship::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['memberships'] = MemberMembership::where('member_id', $data['facultyMember']->id)
        //     ->get();

        // $data['researchs'] = MemberAreaOfInterest::where('member_id', $data['facultyMember']->id)
        //     ->get();
        // $data['socialMediaLink'] = MemberSocialMediaLink::where('member_id', $data['facultyMember']->id)->first();

        return view('frontend.single_page.hall.provost_details', $data);
    }



    public function butexHalls()
    {
        $data['halls'] = Hall::all();
        return view('frontend.halls.list', $data);
    }

    public function hallProvost()
    {
        $data['hallProvost'] = Hall::with('member')
            ->orderBy('sort_order', 'ASC')
            ->get();
        return view('frontend.pages.hall_provost', $data);
    }

    public function hallProvostDetails($id)
    {

        return "hallProvostDetails";
        exit;
        // $data['provostDetails'] = Hall::with('member')->where('provost', $id)->first();
        // $data['MemberExperiences'] = MemberExperience::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['memberEduaction'] = MemberEducation::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['memberPublishBooks'] = MemberPublicationBook::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['administrativeExperiences'] = MemberAdministrativeExperience::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['memberPublicationJournal'] = MemberPublicationJournal::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['memberConference'] = MemberConference::where('member_id', $data['provostDetails']->id)->get();

        // $data['memberships'] = MemberMembership::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['awards'] = MemberHonorAward::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['certifications'] = MemberCertificationAccomplishment::where('member_id', $data['provostDetails']->id)
        //     ->get();
        // $data['scholarships'] = MemberScholarship::where('member_id', $data['provostDetails']->id)
        //     ->get();

        // $data['researchs'] = MemberAreaOfInterest::where('member_id', $data['provostDetails']->id)
        //     ->get();

        return view('frontend.pages.about-hall-provost', $data);
    }

    public function allHallDetail($id)
    {
        $hall = Hall::where('id', $id)->first();
        $id = $hall->id;

        $data['halls'] = Hall::with(['provostProfile','member'])
            ->orderBy('sort_order', 'DESC')
            ->findOrFail($id);

        $data['slider_images'] = $this->slider->getByMasterId($data['halls']->slider_id);
        $data['hallImage'] = Hall::orderBy('sort_order', 'DESC')->get();

        //$data['hallHomes'] = HallHome::where(['hall_id' => $id])->get();
        $data['message'] = Message::where('type_id', 4)->where('category_id', $id)->first();

        // $data['events'] = News::where('hall_id', $id)
        //     ->orWhere('hall_id', -1)
        //     ->where('type', 1)->take(5)->orWhere('type', 2)
        //     ->orderBy('start_date', 'desc')
        //     ->get();
        // $data['notices'] = News::where('type', 3)
        //     ->where(function ($query) use ($id) {
        //         $query->where('hall_id', $id)->orWhere('hall_id', -1);
        //     })
        //     ->orderBy('start_date', 'desc')
        //     ->get();

        $data['news']    = $this->NewsEventNoticeServices->getHallNewsEventsNotice(1, 3, $hall->id);
        $data['events']  = $this->NewsEventNoticeServices->getHallNewsEventsNotice(2, 2, $hall->id, 1);
        $data['notices'] = $this->NewsEventNoticeServices->getHallNewsEventsNotice(3, 5, $hall->id);
        $data['modal']   = $this->landingModalService->getModalByTypeId(6, $id);

        // session(['hall_id' => $id]);
        //dd($data);
        return view('frontend.hall.hall-details', $data);
    }
}
