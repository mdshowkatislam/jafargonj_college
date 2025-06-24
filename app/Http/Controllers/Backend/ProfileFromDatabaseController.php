<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Profile;

use App\Models\ProfileConference;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ProfileFromDatabaseController extends Controller
{
    public function index()
    {
        // $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        // $client = new \GuzzleHttp\Client();
        // $res = $client->request('GET','');
        // $apiDatas = json_decode($res->getBody()->getContents(), true);

        // $clientdatas = [];
        // foreach($apiDatas as $key=>$apiData) {
        //     if(in_array($apiData['BupNo'], $profile_bup_nos))
        //     $clientdatas[] = $apiData;
        // }
        $data['profiles'] = Profile::all();
        return view('backend.manage_profile.from_database.view',$data);
    }

    public function updatedListInfacultyApi()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','');
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach($apiDatas as $key=>$apiData) {
            if(in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
    	//$data['profiles'] = Profile::all();
        return view('backend.manage_profile.from_database.updated_list_in_faculty_api',compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach($apiDatas as $key=>$apiData) {
            #$desing->desing_id return me for example: hc1wXBL7zCsdfMu
            if(!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
        //dd($clientdatas);
        foreach($clientdatas as $clientdata)
        {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $profile = new Profile;
            // $profile->faculty_id = $clientdata['FacultyId'] ?? NULL;
            // $profile->department_id = $clientdata['DepartmentId'] ?? NULL;
            // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
            $profile->bup_no = $clientdata['BupNo'] ?? NULL;
            $profile->nameEn = $clientdata['NameEng'] ?? NULL;
            $profile->nameBn = $clientdata['NameBng'] ?? NULL;
            $profile->email = $clientdata['Email'] ?? NULL;
            $profile->designation = $clientdata['Designation'] ?? NULL;
            $profile->phone = $clientdata['Phone'] ?? NULL;
            $profile->mobile = $clientdata['Mobile'] ?? NULL;
            $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
            $profile->rank = $clientdata['Rank'] ?? NULL;
            $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
            $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
            $profile->experience = $clientdata['Experience'] ?? NULL;
            $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;
            $profile->save();
        }
        return redirect()->back()->with('success','Data Inserted Successfully');
    }

    public function Add()
    {
    	return view('backend.manage_profile.from_database.add_profile');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            // 'bup_no' => 'unique:profiles',
            'nameEn' => 'required',
            'personnel_type' => 'required',
            'email' => 'required|email|unique:profiles',

            "phone" => 'required|numeric|min:11',
            // "phone" => 'required|numeric|digits:11',

            'photo' => 'mimes:jpg,jpeg,png'
        ]);

    	$profile = new Profile;
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;
        $profile->personnel_type = $request->personnel_type;

    	$img = $request->file('photo');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
    	return redirect()->route('manage_profile.from_database')->with('success','Data Saved successfully');
    }

    public function viewSingleProfile($BupNo)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',''.$BupNo);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile',compact('clientdatas'));
    }

    public function Edit($request_id)
    {
        $user = Auth::user();
        $userId = User::where('profile_id', $request_id)->select('id')->first();
        $auth_user_profile_id = Auth::user()->profile_id;
        $user_role = UserRole::where('user_id', Auth::user()->id)->first();
        if (empty($user_role->role_id)) {
            $role_id = 1;
        } else {
            $role_id = $user_role->role_id;
        }
        if ($userId) {
            if ($role_id == 15) {
                if ($request_id !=  $auth_user_profile_id) {
                    return redirect()->route('dashboard');
                }
                // $data['profile_id'] = $request_id;
                $data['editData'] = Profile::find($request_id);
                return view('backend.manage_profile.from_database.add_profile', $data);
            }
        } else {
            if ($role_id == 15) {
                return redirect()->route('dashboard');
            }
        }
        // $data['profile_id'] = $request_id;
        $data['editData'] = Profile::find($request_id);
    	return view('backend.manage_profile.from_database.add_profile',$data);

    	
    }

    public function Update(Request $request,$id)
    {
        // dd('dd1');
        $request->validate([
            'nameEn' => 'required',
            'photo' => 'mimes:jpeg,jpg,png'
            // 'name' => 'required',
        ]);
    	$profile = Profile::find($id);
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;  
        $profile->mobile = $request->mobile;
        $profile->office_telephone = $request->office_telephone;
        $profile->office_extension = $request->office_extension;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;
    	$img = $request->file('photo');
        if ($img) {
            if($profile->photo)
            {
                @unlink(public_path('upload/profiles/'.$profile->photo));
            }
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        if($role && $role->role_id != 1) {
            return redirect()->route('profile-management.change.profile')->with('success','Data Updated successfully');
        } else {
            return redirect()->route('manage_profile.from_database')->with('success','Data Updated successfully');
        }
    }

    public function Delete(Request $request)
    {
    	$data = Profile::find($request->id);
    	// if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.from_database')->with('success','Data Deleted successfully');
    }

    public function editModifiedPersonnels($BupNo)
    {
        //dd($BupNo);
        $data['editData'] = Profile::where('bup_no',$BupNo)->first();

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',''.$BupNo);
        $data['apiDatas'] = json_decode($res->getBody()->getContents(), true);
        //dd($data['apiDatas']);
    	return view('backend.manage_profile.from_database.edit_modified_personnels',$data);
    }

    public function updateModifiedPersonnels($BupNo, Request $request)
    {
        $request->validate([
            'nameEn' => 'required',
            'photo' => 'mimes:jpeg,jpg,png'
            // 'name' => 'required',
        ]);
    	$profile = Profile::where('bup_no',$BupNo)->first();
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;
    	$img = $request->file('photo');
        if($img) {
            if($profile->photo)
            {
                @unlink(public_path('upload/profiles/'.$profile->photo));
            }
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
    	return redirect()->route('manage_profile.from_database.updated_list_in_faculty_api')->with('success','Data Updated successfully');
    }
}
