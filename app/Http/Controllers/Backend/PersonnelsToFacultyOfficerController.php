<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelsToFacultyOfficer;
use App\Services\PersonnelsToFacultyOfficerService;

class PersonnelsToFacultyOfficerController extends Controller
{
    public function index()
    {
        $data['profiles'] = PersonnelsToFacultyOfficer::with('profile')->get();

        // return $data['profiles'];
        //dd($data['profiles']);

        return view('backend.manage_profile.personnels_to_faculty_officer.view', $data);
    }

    public function Add()
    {
        return view('backend.manage_profile.personnels_to_faculty_officer.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'sort_order' => 'required|numeric'
        ]);
        $params = $request->all();
        PersonnelsToFacultyOfficer::create($params);

        return redirect()->route('manage_profile.personnels_to_faculty_officer')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = PersonnelsToFacultyOfficer::find($id);
        return view('backend.manage_profile.personnels_to_faculty_officer.add', $data);
    }

    public function Update(Request $request, $id)
    {

        $request->validate(['profile_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'sort_order' => 'required|numeric'
        ]);
        $params = $request->all();
        $data = PersonnelsToFacultyOfficer::find($id);
        $data->update($params);

        return redirect()->route('manage_profile.personnels_to_faculty_officer')->with('success', 'Data Saved successfully');
    }

    public function Delete(Request $request)
    {
        $data = PersonnelsToFacultyOfficer::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.personnels_to_faculty_officer')->with('success', 'Data Deleted successfully');
    }

    public function status_change(Request $request, PersonnelsToFacultyOfficerService $PersonnelsToFacultyOfficerService)
    {
        $status_info = $PersonnelsToFacultyOfficerService->statusChangeEvent($request);

        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }
    }
}
