<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonnelsToFaculty;
use App\Services\PersonnelsToFacultyService;
use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\Auth;

class PersonnelsToFacultyController extends Controller
{
    private $ProfileService;
    public function __construct(ProfileService $ProfileService) {
        $this->ProfileService = $ProfileService; 
    }
    public function index()
    {
        $data['is_faculty_head'] = false;
        $data['is_department_head'] = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        $data['department_head'] = $this->ProfileService->getDepartmentHead(Auth::user()->profile_id);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0){
            $data['profiles'] = PersonnelsToFaculty::with('profile')->where('faculty_id', $data['faculty_head'][0]->id)->get();
        } elseif (isset($data['department_head']) && count($data['department_head']) > 0) {
            $data['profiles'] = PersonnelsToFaculty::with('profile')->where('department_id', $data['department_head'][0]->id)->get();
        } else {
            $data['profiles'] = PersonnelsToFaculty::with('profile')->get();
        }

        // return $data['profiles'];

        return view('backend.manage_profile.personnels_to_faculty.view',$data);
    }

    public function Add()
    {
    	return view('backend.manage_profile.personnels_to_faculty.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'faculty_id' => 'required',     
            'sort_order' => 'required|numeric'
        ]);
        $params = $request->all();
        PersonnelsToFaculty::create($params);

    	return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = PersonnelsToFaculty::find($id);
    	return view('backend.manage_profile.personnels_to_faculty.add',$data);
    }

    public function Update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'profile_id' => 'required',
            'faculty_id' => 'required',
            'sort_order' => 'required|numeric'
        ]);
        $params = $request->all();
        $data = PersonnelsToFaculty::find($id);
        $data->update($params);

    	return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Saved successfully');
    }

    public function Delete(Request $request)
    {
    	$data = PersonnelsToFaculty::find($request->id);
    	// if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Deleted successfully');
    }

    public function status_change(Request $request, PersonnelsToFacultyService $PersonnelsToFaculty)
    {
        $status_info = $PersonnelsToFaculty->statusChangeEvent($request);
        
        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }

        // $PersonnelsToFaculty->statusChangeEvent($request);

        // return redirect()->route('manage_profile.personnels_to_faculty')->with('success', 'Status Update Successfully');
    }
}
