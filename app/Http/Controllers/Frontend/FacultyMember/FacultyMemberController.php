<?php

namespace App\Http\Controllers\Frontend\FacultyMember;

use App\Http\Controllers\Controller;
use App\Models\DeanStaffList;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Office;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToFacultyOfficer;
use App\Models\Profile;
use App\Models\ProfileAchievement;
use App\Models\ProfileAwardHonor;
use App\Models\ProfileBiography;
use App\Models\ProfileBook;
use App\Models\ProfileConference;
use App\Models\ProfileCourseTaught;
use App\Models\ProfileJournal;
use App\Models\ProfileMembership;
use App\Models\ProfileProfessionalActivity;
use App\Models\ProfileResearchAreaInterest;
use App\Models\ProfileTraining;
use App\Models\SocialMediaLink;
use App\Services\BannerService;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class FacultyMemberController extends Controller
{
    private $profileService;
    private $bannerService;

    public function __construct(ProfileService $profileService, BannerService $bannerService) {
        $this->profileService = $profileService;
        $this->bannerService = $bannerService;
    }

    public function FacultyMember()
    {
        $data['departments'] = Department::where('status', 1)->get();
        // $data['profiles'] = PersonnelsToFaculty::with(['profile','faculty', 'department'])->whereHas('department')->select('department_id')->distinct()->get();
        // return ($data['departments']);
        return view('frontend.faculty_member.faculty_member', $data);
    }
    public function FacultyOfficer()
    {
        $data['profiles'] = PersonnelsToFacultyOfficer::select('faculty_id')->where('status', 1)->distinct()->get();
        // $data['profiles'] = DeanStaffList::with(['profile','faculty'])->select('faculty_id')->distinct()->get();
        // return ($data['profiles']);
        return view('frontend.faculty_member.faculty_officer', $data);
    }

    public function departmentOfficer()
    {
        $data['profiles'] = PersonnelsToFacultyOfficer::select('department_id')->where('status',1)->distinct()->get();

        return view('frontend.faculty_member.department_officer', $data);
    }

    public function FacultyMemberDetails($id)
    {

        $data = $this->profileService->facultyMemberDetails($id);
        // dd($data['journals']);
        return view('frontend.faculty_member.people_details', $data);
    }
    
    public function FacultyMemberHeadDetails($id)
    {
        // dd($id);
        $data['profile'] = PersonnelsToFaculty::with(['profile', 'faculty', 'department'])->where('profile_id', $id)->latest()->first();
        if (!$data['profile']) {
            $data['profile'] = PersonnelsToFacultyOfficer::with(['profile', 'faculty', 'department'])->where('profile_id', $id)->latest()->first();
        }
        // $data['profile'] = Profile::findOrFail($id);
        $data['faculty'] = Faculty::where('profile_id', $id)->first();
        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->profile_id)->get();
        $data['journals'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->get();
        $data['conferences'] = ProfileConference::where('profile_id', $data['profile']->profile_id)->get();
        $data['books'] = ProfileBook::where('profile_id', $data['profile']->profile_id)->get();
        $data['researchs'] = ProfileResearchAreaInterest::where('profile_id', $data['profile']->profile_id)->get();
        $data['awards'] = ProfileAwardHonor::where('profile_id', $data['profile']->profile_id)->get();
        $data['courses'] = ProfileCourseTaught::where('profile_id', $data['profile']->profile_id)->get();
        $data['training'] = ProfileTraining::where('profile_id', $data['profile']->profile_id)->get();
        $data['memberShip'] = ProfileMembership::where('profile_id', $data['profile']->profile_id)->get();
        $data['achievement'] = ProfileAchievement::where('profile_id', $data['profile']->profile_id)->get();
        $data['professionalActivity'] = ProfileProfessionalActivity::where('profile_id', $data['profile']->profile_id)->get();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->profile_id)->first();
        return view('frontend.faculty_member.people_head_details', $data);
    }

    public function facultyOfficerDetails($id)
    {
        $data['profile'] = PersonnelsToFacultyOfficer::where('profile_id', $id)->latest()->first();

        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->profile_id )->get();
        $data['publication'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->first();
        $data['training'] = ProfileTraining::where('profile_id', $data['profile']->profile_id)->first();
        $data['achievement'] = ProfileAchievement::where('profile_id', $data['profile']->profile_id)->first();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->profile_id)->first();
        $data['journals'] = ProfileJournal::where('profile_id', $data['profile']->profile_id)->get();
        $data['conferences'] = ProfileConference::where('profile_id', $data['profile']->profile_id)->get();
        $data['books'] = ProfileBook::where('profile_id', $data['profile']->profile_id)->get();
        return view('frontend.office.people_details', $data);
    }

    public function allDeans()
    {
        $data['faculties'] = Faculty::with('profile')->whereHas('profile')->orderBy('sort_order')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['profiles']);
        return view('frontend.faculty_member.all_deans', $data);
    }
    public function allChairman()
    {
        $data['departments'] = Department::with('profile')->whereHas('profile')->orderBy('sort_order')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // return ($data['profiles']);
        return view('frontend.faculty_member.all_chairman', $data);
    }
    public function allOfficeHead()
    {
        $data['offices'] = Office::with('profile')->whereHas('profile')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // return ($data['profiles']);
        return view('frontend.faculty_member.all_office_head', $data);
    }
    public function allHallProvosts()
    {
        $data['provosts'] = Hall::with('provostProfile')->whereHas('provostProfile')->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['provosts']);
        return view('frontend.faculty_member.all_hall_provosts', $data);
    }
}
