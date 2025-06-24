<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignToAlumni;
use App\Models\Alumni;
use App\Models\AlumniDesignation;
use App\Models\AlumniModerator;
use App\Models\PersonnelsToFaculty;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniModeratorController extends Controller
{
    private function fetchAlumniByRole()
    {
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        if ($role) {
            switch ($role->role_id) {
                case '1':
                    return Alumni::all();
                case '3':
                    $assign_alumni_ids = AssignToAlumni::where('alumni_member_id', $user->profile_id)->distinct()->pluck('alumni_id');
                    if ($assign_alumni_ids) {
                        return Alumni::whereIn('id', $assign_alumni_ids)->get();
                    }else{
                        return collect();
                    }
                    
                default:
                    return collect(); // Return an empty collection
            }
        } elseif (!$role && $user->id == 1) {
            return Alumni::all();
        } else {
            return collect();
        }
    }
    public function index()
    {
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        if ($role) {
            if ($role->role_id == 1) {
                $profiles = AlumniModerator::all();
            } elseif ($role->role_id == 3) {
                $assign_alumni_ids = AssignToAlumni::where('alumni_member_id', $user->profile_id)->distinct()->pluck('alumni_id');
                if ($assign_alumni_ids) {
                    $profiles = AlumniModerator::whereIn('alumni_id', $assign_alumni_ids)->latest()->get();
                }else{
                    $profiles = collect();
                }
                
            }
        }elseif (!$role && $user->id == 1) {
            $profiles = AlumniModerator::latest()->get();
        }else{
            $profiles = collect(); 
        }
        // $profiles = AlumniModerator::all();
        return view('backend.alumni.moderator-assign-to.index', compact('profiles'));
    }
    public function assignToAlumni()
    {
        $alumnis = $this->fetchAlumniByRole();
        // $alumnis = alumni::latest()->get();
        $profiles = PersonnelsToFaculty::all();
        $alumni_designations = AlumniDesignation::where('is_moderator', 1)->get();

        // return  $members;
        return view('backend.alumni.moderator-assign-to.alumni', compact('profiles', 'alumnis', 'alumni_designations'));
    }

    public function moderatorAssignToAlumniStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'alumni_id' => 'required',
            'alumni_designation_id' => 'required',
            'status' => 'required',
        ]);

        $is_already_has = AlumniModerator::where('profile_id', $request->profile_id)
            ->where('alumni_id', $request->alumni_id)
            ->first();
        if ($is_already_has) {
            return redirect()->back()->with('error', 'Member already register for this alumni!');
        }

        $is_already_has_designation = AlumniModerator::where('alumni_id', $request->alumni_id)
            ->where('alumni_designation_id', $request->alumni_designation_id != 5)
            ->first();

        if ($is_already_has_designation) {
            return redirect()->back()->with('error', 'this designation already register for this alumni!');
        }

        $new_alumni_assign = new AlumniModerator();
        $new_alumni_assign->profile_id = $request->profile_id;
        $new_alumni_assign->alumni_id = $request->alumni_id;
        $new_alumni_assign->alumni_designation_id = $request->alumni_designation_id;
        $new_alumni_assign->status = $request->status;
        $new_alumni_assign->join_date = $request->start_date ? date('Y-m-d H:i:s', strtotime($request->start_date)) : null;
        $new_alumni_assign->expire_date = $request->end_date ? date('Y-m-d H:i:s', strtotime($request->end_date)) : null;
        $new_alumni_assign->save();
        logData($primary_id = $new_alumni_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_alumni_assign, $action='A new committee member is assigned to the alumni', $created_by = Auth::id(), $updated_by = null, $deleted_by = null); 
        return redirect()->route('alumni.moderator.list')->with('success', 'Alumni Moderator Added Successfully!');

        // return  $members;
        // return route('alumni.moderator.list');
    }

    public function assignToAlumniEdit($id)
    {
        $user = Auth::user();
        $allowed_alumni_ids = [];

        if ($user->id == 1) {
            // User with ID 1 (admin/super admin) has access to all assign alumnis
            $allowed_alumni_ids = AssignToAlumni::distinct()->pluck('alumni_id')->toArray();
        } else {
            $role = UserRole::where('user_id', $user->id)->first();

            if ($role && $role->role_id == 3) {
                // User has role ID 3 - alumni Admin , retrieve the allowed alumni IDs based on alumni Member
                $allowed_alumni_ids = AssignToAlumni::where('alumni_member_id', $user->profile_id)->distinct()->pluck('alumni_id')->toArray();
            }else{
                abort(403, 'You do not have permission to access this category.');
            }
        }

        // Retrieve all alumni Moderator associated with allowed alumni IDs
        $allowed_alumni_modarator = AlumniModerator::whereIn('alumni_id', $allowed_alumni_ids)->distinct()->pluck('id')->toArray();
        if (in_array($id, $allowed_alumni_modarator)) {
            $data['editData'] = AlumniModerator::findOrFail($id);
        } else {
            abort(403, 'You do not have permission to access this category.');
        }
        $data['alumnis'] = $this->fetchAlumniByRole();

        $data['profiles'] = PersonnelsToFaculty::all();
        $data['alumni_designations'] = AlumniDesignation::where('is_moderator', 1)->get();

        return view('backend.alumni.moderator-assign-to.alumni', $data);
    }

    public function moderatorAssignToAlumniUpdate(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'alumni_id' => 'required',
            'alumni_designation_id' => 'required',
            'status' => 'required',
        ]);

        $new_alumni_assign = AlumniModerator::findOrFail($id);
        $new_alumni_assign->profile_id = $request->profile_id;
        $new_alumni_assign->alumni_id = $request->alumni_id;
        $new_alumni_assign->alumni_designation_id = $request->alumni_designation_id;
        $new_alumni_assign->status = $request->status;
        $new_alumni_assign->join_date = $request->start_date ? date('Y-m-d H:i:s', strtotime($request->start_date)) : null;
        $new_alumni_assign->expire_date = $request->end_date ? date('Y-m-d H:i:s', strtotime($request->end_date)) : null;
        $new_alumni_assign->save();
        logData($primary_id = $new_alumni_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_alumni_assign, $action="An assigned committee member's data is updated", $created_by = Auth::id(), $updated_by = null, $deleted_by = null); 
        return redirect()->route('alumni.moderator.list')->with('success', 'Alumni Moderator Updated Successfully!');

    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = AlumniModerator::find($request->id);
            $data->delete();

            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action='An existing committee member is deleted from the alumni.', $created_by = null, $updated_by = null, $deleted_by = Auth::id()); 

            DB::commit();
            return redirect()->route('alumni.moderator.list')->with('success','Data Deleted successfully');

        }catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.moderator.list')->with('warning', $th->getMessage());
        }
    }

}
