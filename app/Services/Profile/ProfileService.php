<?php

namespace App\Services\Profile;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Page;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class ProfileService implements IService
{

    public function getAll()
    {
        try {
            $data = Profile::all();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function create(Request $request)
    {
    }
    public function getByID($id)
    {
        $data = Page::find($id);

        return $data;
    }
    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }

    public static function headList($type, $id)
    {
        if ($type == 1) {
            return Faculty::with('profile')->where('id', $id)->first();
        } else if ($type == 2) {
            $newData = Department::join('profiles', 'profiles.id', 'departments.profile_id')->where('departments.id', $id)
                ->select('departments.name as dept_name', 'profiles.*')->first();

            return $newData;
        } else if ($type == 3) {
            $newData = Office::join('profiles', 'profiles.id', 'offices.profile_id')->where('offices.id', $id)
                ->select('offices.name as ref_name', 'profiles.*')->first();
            return $newData;
        } else if ($type == 4) {
            $newData = Hall::join('profiles', 'profiles.id', 'halls.provost')->where('halls.id', $id)
                ->select('halls.name as ref_name', 'profiles.*')->first();
            return $newData;
        }
    }

    public function getFacultyPersonnel()
    {
        try {
            $data = Profile::where('personnel_type', 1)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function facultyMemberDetails($id)
    {
        try {
            $data['profile'] = PersonnelsToFaculty::with(['profile', 'faculty', 'department'])->where('profile_id', $id)->where('status', 1)->first();
       
        if(!$data['profile']){
            $data['profile'] = PersonnelsToFacultyOfficer::with(['profile', 'faculty', 'department'])->where('profile_id', $id)->where('status', 1)->first();
        }
        
        // $data['profile'] = Profile::findOrFail($id);
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
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getFacultyHead($id)
    {
        try {
            $data = Faculty::where('profile_id', $id)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getDepartmentHead($id)
    {
        try {
            $data = Department::where('profile_id', $id)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
