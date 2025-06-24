<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\ClubDesignation;
use App\Models\ClubModerator;
use App\Models\PersonnelsToFaculty;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClubModeratorController extends Controller
{
    private function fetchClubByRole()
    {
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        if ($role) {
            switch ($role->role_id) {
                case '1':
                    return Club::all();
                case '3':
                    $assign_club_ids = AssignToClub::where('club_member_id', $user->profile_id)->distinct()->pluck('club_id');
                    if ($assign_club_ids) {
                        return Club::whereIn('id', $assign_club_ids)->get();
                    }else{
                        return collect();
                    }
                    
                default:
                    return collect(); // Return an empty collection
            }
        } elseif (!$role && $user->id == 1) {
            return Club::all();
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
                $profiles = ClubModerator::all();
            } elseif ($role->role_id == 3) {
                $assign_club_ids = AssignToClub::where('club_member_id', $user->profile_id)->distinct()->pluck('club_id');
                if ($assign_club_ids) {
                    $profiles = ClubModerator::whereIn('club_id', $assign_club_ids)->latest()->get();
                }else{
                    $profiles = collect();
                }
                
            }
        }elseif (!$role && $user->id == 1) {
            $profiles = ClubModerator::latest()->get();
        }else{
            $profiles = collect(); 
        }
        // $profiles = ClubModerator::all();
        return view('backend.club.moderator-assign-to.index', compact('profiles'));
    }
    public function assignToClub()
    {
        $clubs = $this->fetchClubByRole();
        // $clubs = Club::latest()->get();
        $profiles = PersonnelsToFaculty::all();
        $club_designations = ClubDesignation::where('is_moderator', 1)->get();

        // return  $members;
        return view('backend.club.moderator-assign-to.club', compact('profiles', 'clubs', 'club_designations'));
    }

    public function moderatorAssignToClubStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'club_id' => 'required',
            'club_designation_id' => 'required',
            'status' => 'required',
        ]);

        $is_already_has = ClubModerator::where('profile_id', $request->profile_id)
            ->where('club_id', $request->club_id)
            ->first();
        if ($is_already_has) {
            return redirect()->back()->with('error', 'Member already register for this club!');
        }

        $is_already_has_designation = ClubModerator::where('club_id', $request->club_id)
            ->where('club_designation_id', $request->club_designation_id != 5)
            ->first();

        if ($is_already_has_designation) {
            return redirect()->back()->with('error', 'this designation already register for this club!');
        }

        $new_club_assign = new ClubModerator();
        $new_club_assign->profile_id = $request->profile_id;
        $new_club_assign->club_id = $request->club_id;
        $new_club_assign->club_designation_id = $request->club_designation_id;
        $new_club_assign->status = $request->status;
        $new_club_assign->join_date = $request->start_date ? date('Y-m-d H:i:s', strtotime($request->start_date)) : null;
        $new_club_assign->expire_date = $request->end_date ? date('Y-m-d H:i:s', strtotime($request->end_date)) : null;
        $new_club_assign->save();
        logData($primary_id = $new_club_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_club_assign, $action='A new committee member is assigned to the club', $created_by = Auth::id(), $updated_by = null, $deleted_by = null); 
        return redirect()->route('club.moderator.list')->with('success', 'Club Moderator Added Successfully!');

        // return  $members;
        // return route('club.moderator.list');
    }

    public function assignToClubEdit($id)
    {
        $user = Auth::user();
        $allowed_club_ids = [];

        if ($user->id == 1) {
            // User with ID 1 (admin/super admin) has access to all assign clubs
            $allowed_club_ids = AssignToClub::distinct()->pluck('club_id')->toArray();
        } else {
            $role = UserRole::where('user_id', $user->id)->first();

            if ($role && $role->role_id == 3) {
                // User has role ID 3 - Club Admin , retrieve the allowed club IDs based on Club Member
                $allowed_club_ids = AssignToClub::where('club_member_id', $user->profile_id)->distinct()->pluck('club_id')->toArray();
            }else{
                abort(403, 'You do not have permission to access this category.');
            }
        }

        // Retrieve all Club Moderator associated with allowed club IDs
        $allowed_club_modarator = ClubModerator::whereIn('club_id', $allowed_club_ids)->distinct()->pluck('id')->toArray();
        if (in_array($id, $allowed_club_modarator)) {
            $data['editData'] = ClubModerator::findOrFail($id);
        } else {
            abort(403, 'You do not have permission to access this category.');
        }
        $data['clubs'] = $this->fetchClubByRole();

        $data['profiles'] = PersonnelsToFaculty::all();
        $data['club_designations'] = ClubDesignation::where('is_moderator', 1)->get();

        return view('backend.club.moderator-assign-to.club', $data);
    }

    public function moderatorAssignToClubUpdate(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'club_id' => 'required',
            'club_designation_id' => 'required',
            'status' => 'required',
        ]);



        // $is_already_has = ClubModerator::where('profile_id', $request->profile_id)
        //     ->where('club_id', $request->club_id)
        //     ->first();
        // if ($is_already_has) {
        //     return redirect()->back()->with('error', 'Moderator already register for this club!');
        // }

        // $is_already_has_designation = ClubModerator::where('club_id', $request->club_id)
        //     ->where('club_designation_id', $request->club_designation_id != 5)
        //     ->first();

        // if ($is_already_has_designation) {
        //     return redirect()->back()->with('error', 'this designation already register for this club!');
        // }

        $new_club_assign = ClubModerator::findOrFail($id);
        $new_club_assign->profile_id = $request->profile_id;
        $new_club_assign->club_id = $request->club_id;
        $new_club_assign->club_designation_id = $request->club_designation_id;
        $new_club_assign->status = $request->status;
        $new_club_assign->join_date = $request->start_date ? date('Y-m-d H:i:s', strtotime($request->start_date)) : null;
        $new_club_assign->expire_date = $request->end_date ? date('Y-m-d H:i:s', strtotime($request->end_date)) : null;
        $new_club_assign->save();
        logData($primary_id = $new_club_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_club_assign, $action="An assigned committee member's data is updated", $created_by = Auth::id(), $updated_by = null, $deleted_by = null); 
        return redirect()->route('club.moderator.list')->with('success', 'Club Moderator Updated Successfully!');

        // return  $members;
        // return route('club.moderator.list');
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = ClubModerator::find($request->id);
            $data->delete();

            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action='An existing committee member is deleted from the club.', $created_by = null, $updated_by = null, $deleted_by = Auth::id()); 

            DB::commit();
            return redirect()->route('club.moderator.list')->with('success','Data Deleted successfully');

        }catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.moderator.list')->with('warning', $th->getMessage());
        }
    }

}
