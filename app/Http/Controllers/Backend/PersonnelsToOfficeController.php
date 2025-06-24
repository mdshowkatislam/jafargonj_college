<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonnelsToOffice;
use App\Models\Profile;
use App\Services\PersonnelsToOfficeService;

class PersonnelsToOfficeController extends Controller
{
    public function index()
    {
        $data['profiles'] = PersonnelsToOffice::with('profile')->get();

        return view('backend.manage_profile.personnels_to_office.view', $data);
    }

    public function Add()
    {
        return view('backend.manage_profile.personnels_to_office.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'office_id' => 'required',
            'sort_order' => 'required|numeric',
            // 'photo_path' => 'mimes:jpg,jpeg,png'
        ]);
        $params = $request->all();

        $params['designations']             = $request->designations;
        $params['additional_charge']        = $request->additional_charge;
        $params['additional_designation']   = $request->additional_designation;

        PersonnelsToOffice::create($params);

        return redirect()->route('manage_profile.personnels_to_office')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = PersonnelsToOffice::find($id);
        return view('backend.manage_profile.personnels_to_office.add', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'profile_id' => 'required',
            'office_id' => 'required',
            'sort_order' => 'required|numeric',
        ]);
        $params = $request->all();

        $params['designations']             = $request->designations;
        $params['additional_charge']        = $request->additional_charge;
        $params['additional_designation']   = $request->additional_designation;
        
        $data = PersonnelsToOffice::find($id);
        $data->update($params);

        return redirect()->route('manage_profile.personnels_to_office')->with('success', 'Data Saved successfully');
    }

    public function Delete(Request $request)
    {
        $data = PersonnelsToOffice::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.personnels_to_office')->with('success', 'Data Deleted successfully');
    }

    public function status_change(Request $request, PersonnelsToOfficeService $PersonnelsToOffice)
    {
        $status_info = $PersonnelsToOffice->statusChangeEvent($request);
        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }
    }

    public function MemberWiseDesignation(Request $request)
    {
        $member = Profile::where('id', $request->profile_id)->first();
        if(isset($member))
		{
			return response()->json($member->designation);
		}
		else
		{
			return response()->json('fail');
		}
    }
}
