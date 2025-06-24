<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\ClubDesignation;
use App\Models\ClubMember;
use App\Models\ClubMemberMapping;
use App\Models\News;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClubMemberController extends Controller
{
    private function fetchClubByRole()
    {
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        //dd($user);
        if ($role) {
            switch ($role->role_id) {
                case '1':
                    return Club::all();
                case '3':
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->pluck('club_id')->toArray();
                    if ($assign_club) {
                        return Club::whereIn('id', $assign_club)->get();
                    } else {
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
        $data['club_members'] = ClubMember::latest()->get();

        // $data['club_members'] = ClubMember::with(['faculty', 'department', 'member_detail' => function ($q) {
        //     $q->leftJoin('clubs', 'clubs.id', 'assign_to_clubs.club_id');
        //     $q->leftJoin('club_designations', 'club_designations.id', 'assign_to_clubs.club_designation_id');
        //     $q->select('clubs.name as c_name', 'club_designations.name as d_name', 'assign_to_clubs.*');
        // }])->get();
        ///$data['clubs'] = Club::with('faculty','department','events')->first(); 
        // return $club_members;

        //         foreach ($club_members as $key => $member) {
        //             if(count($member->member_detail) > 0 ) {
        //                 foreach ($member->member_detail as $key => $value) {
        //                      echo $member->name." ".$value->c_name."<br>";
        //                 }
        //             }
        //         }
        //    die();
        //    dd($club_members);

        //  $club_members = DB::table('club_member_mappings')
        //               ->join('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        //               ->join('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        //               ->join('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        //               ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_designations.name as designation_name','club_member_mappings.id as cmm_id')
        //               ->get();
        //  $club_members = DB::table('club_member_mappings')
        //               ->leftJoin('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        //               ->leftJoin('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        //               ->leftJoin('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        //               ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_member_mappings.id as cmm_id','club_designations.name as d_name')
        //               ->get();
        // return $club_members;
        //  $club_members = DB::table('assign_to_clubs')
        //               ->leftJoin('clubs','assign_to_clubs.club_id', '=', 'clubs.id')
        //               ->leftJoin('club_designations','assign_to_clubs.club_designation_id', '=', 'club_designations.id')
        //               ->leftJoin('club_members','assign_to_clubs.club_member_id', '=', 'club_members.id')
        //               ->select('assign_to_clubs.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','assign_to_clubs.id as cmm_id','club_designations.name as d_name')
        //               ->get();
        // return $club_members->member_detail;
        return view('backend.club.member.list', $data);
    }

    public function member_list()
    {
        $club_members = ClubMember::all();
        return view('backend.club.member.member_list', compact('club_members'));
    }

    public function create()
    {
        return view('backend.club.member.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'                  => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'student_id'            => 'required | unique:club_members,student_id',
            'email'                 => 'required | unique:club_members,email',
            'image'                 => 'mimes:jpg,jpeg,png| max:312',
            'phone'                 => 'required | digits:11',
            'faculty_id'            => 'required',
            'department_id'         => 'required',
            'status'                => 'required',
        ], [
            'name.required'         => 'Please Enter Student Name',
            'name.regex'            => 'name field must contain characters only',
            'student_id.required'   => 'Please Enter Student ID',
            'email.required'        => 'Please Enter Student Email',
            'phone.required'        => 'Please Enter Valid Phone Number (01XXXXXXXXX)',
            'email.required'        => 'Please Enter Student Email',
            'image.max'             => 'Image Size Must be Less Than 300KB',
        ], [
            'student_id'            => 'Student ID',
            'email'                 => 'Student Email',
            'phone'                 => 'Phone Number',
        ]);

        DB::beginTransaction();

        try {
            $new_member = new ClubMember;
            $new_member->student_id         = $request->student_id;
            $new_member->name               = $request->name;
            $new_member->email              = $request->email;
            $new_member->phone              = $request->phone;
            $new_member->faculty_id         = $request->faculty_id;
            $new_member->department_id      = $request->department_id;
            $new_member->image              = $request->image;
            $new_member->short_description  = $request->short_description;
            $new_member->status             = $request->status;
            $new_member->created_by         = Auth::id();

            if ($request->file('image')) {
                $config = array(
                    'name'      => "image",
                    'path'      => 'upload/club/member/image',
                    'width'     => 70,
                    'height'    => 70
                );
                $images = ImageHelper::uploadImage($config);
                $new_member['image'] = $images['filename'];
            }

            $new_member->save();

            // $new_member_map = new ClubMemberMapping;
            // $new_member_map->club_member_id      = $new_member->id;
            // $new_member_map->faculty_id          = $request->faculty_id;
            // $new_member_map->department_id          = $request->department_id;
            // $new_member_map->club_id             = $request->club_id;
            // $new_member_map->club_designation_id = $request->club_designation_id;
            // $new_member_map->join_date           = date('Y-m-d H:i:s',strtotime($request->join_date));
            // $new_member_map->save();
            // dd($new_member_map);

            logData($primary_id = $new_member->id, $url = url()->previous(), $old_data = null, $new_data = $new_member, $action = 'Add Club Member', $created_by =  Auth::id(), $updated_by = null);
            DB::commit();
            return redirect()->route('club.member.list')->with('success', 'Club Member Added Successfully!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return redirect()->route('club.member.add')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        // dd($id);
        $editData = ClubMember::with(['faculty', 'department', 'member_detail' => function ($q) {
            $q->leftJoin('clubs', 'clubs.id', 'assign_to_clubs.club_id');
            $q->leftJoin('club_designations', 'club_designations.id', 'assign_to_clubs.club_designation_id');
            $q->select('clubs.name as c_name', 'club_designations.name as d_name', 'assign_to_clubs.*');
        }])->find($id);

        // return ClubMemberMapping::findOrFail($id);
        // $club_members = DB::table('club_member_mappings')
        // ->leftJoin('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        // ->leftJoin('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        // ->leftJoin('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        // ->where('club_member_mappings.id',$id)
        // ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_member_mappings.id as cmm_id','club_designations.name as d_name')
        // ->first();
        // ->get();

        //return  $club_members;
        return view('backend.club.member.add', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'student_id'            => 'required',
            'email'                 => 'required',
            'image'                 => 'mimes:jpg,jpeg,png| max:312',
            'phone'                 => 'required | digits:11',
            'faculty_id'            => 'required',
            'department_id'         => 'required',
            'status'                => 'required',
        ], [
            'name.required'         => 'Please Enter Student Name',
            'name.regex' => 'name field must contain characters only',
            'student_id.required'   => 'Please Enter Student ID',
            'email.required'        => 'Please Enter Student Email',
            'phone.required'        => 'Please Enter Valid Phone Number (01XXXXXXXXX)',
            'email.required'        => 'Please Enter Student Email',
            'image.max'             => 'Image Size Must be Less Than 300KB',
        ], [
            'student_id'            => 'Student ID',
            'email'                 => 'Student Email',
            'phone'                 => 'Phone Number',
        ]);

        DB::beginTransaction();

        try {
            $new_member                     = ClubMember::find($id);
            $new_member->student_id         = $request->student_id;
            $new_member->name               = $request->name;
            $new_member->email              = $request->email;
            $new_member->phone              = $request->phone;
            $new_member->faculty_id         = $request->faculty_id;
            $new_member->department_id      = $request->department_id;
            //$new_member->image             = $request->image;
            $new_member->short_description  = $request->short_description;
            $new_member->status             = $request->status;
            $new_member->updated_by         = Auth::id();

            if ($request->hasfile('image')) {
                $config = array(
                    'name'      => "image",
                    'path'      => 'upload/club/member/image',
                    'width'     => 70,
                    'height'    => 70
                );
                $images = ImageHelper::uploadImage($config);
                // dd($images);
                $new_member['image'] = $images['filename'];
            }
            // return $new_member;
            $new_member->save();
            logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $new_member, $action = 'Update Club Member', $created_by =  null, $updated_by = Auth::id());
            DB::commit();
            return redirect()->route('club.member.list')->with('success', 'Club Member Update Successfully!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return redirect()->route('club.member.add')->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = ClubMember::find($request->id);
            $data->delete();

            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Delete Club Member', $created_by = null, $updated_by = null, $deleted_by = Auth::id());

            DB::commit();
            return redirect()->route('club.member.list')->with('success', 'Data Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.member.list')->with('warning', $th->getMessage());
        }
    }
    public function deletePhoto(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = ClubMember::find($request->id);
            @unlink(public_path('upload/club/member/image/' . $data->image));
            $data->image = null;
            $data->update();

            DB::commit();
            return redirect()->route('club.member.list')->with('success', 'Member Photo Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.member.list')->with('warning', $th->getMessage());
        }
    }

    public function assignToClubList()
    {
        $data['clubs'] = $this->fetchClubByRole();
        return view('backend.club.assign-to.club-list', $data);
    }
    public function assignMemberByClub(Request $request)
    {
        if ($request->club_id != "") {
            $data['clubs'] = Club::where('id', $request->club_id)->get();
            return view('backend.club.assign-to.members-by-club', $data);
        } else {
            $data['clubs'] = $this->fetchClubByRole();
            return view('backend.club.assign-to.members-by-club', $data);
        }
    }


    public function assignToClub()
    {
        $clubs = $this->fetchClubByRole();
        $students = ClubMember::where('status', 1)->latest()->get();
        $club_designations = ClubDesignation::where('is_moderator', '!=', 1)->get();
        return view('backend.club.assign-to.club', compact('students', 'clubs', 'club_designations'));
    }

    public function memberAssignToClub(Request $request)
    {
       
        $request->validate([
            'club_member_id' => 'required',
            'club_id' => 'required',
            'club_designation_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required'
            'status' => 'required'
        ]);

        $is_person_has_club = AssignToClub::where('club_member_id', $request->club_member_id)
            ->where('club_id', $request->club_id)
            ->first();

        if ($is_person_has_club) {
            return redirect()->back()->with('error', 'This Person already registerd for this club!');
        }
        // $is_assign_club = AssignToClub::where('club_id', $request->club_id)->get()->toArray();

        // if ($is_assign_club) {
        //     $has_club_president = in_array(1, array_column($is_assign_club, 'club_designation_id'));
        //     $has_club_v_president = in_array(2, array_column($is_assign_club, 'club_designation_id'));
        //     $has_club_secretary = in_array(3, array_column($is_assign_club, 'club_designation_id'));

        //     if ($has_club_president && $request->club_designation_id == 1) {
        //         return redirect()->back()->with('error', 'President has already been registered for this club!');
        //     }
        //     if ($has_club_v_president && $request->club_designation_id == 2) {
        //         return redirect()->back()->with('error', 'Vice President already been registered for this club!');
        //     }
        //     if ($has_club_secretary && $request->club_designation_id == 3) {
        //         return redirect()->back()->with('error', 'Secretary has already been registered for this club!');
        //     }
        // }
        $is_assign_club = AssignToClub::where('club_id', $request->club_id)->where('club_designation_id', $request->club_designation_id)->first();

        if (@$is_assign_club->club_designation_id == 1 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'President has already been registered for this club!');
        }
        if (@$is_assign_club->club_designation_id == 2 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'Vice President already been registered for this club!');
        }
        if (@$is_assign_club->club_designation_id == 3 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'Secretary has already been registered for this club!');
        }

        $new_club_assign = new AssignToClub();
        $new_club_assign->club_member_id = $request->club_member_id;
        $new_club_assign->club_id = $request->club_id;
        $new_club_assign->club_designation_id = $request->club_designation_id;
        $new_club_assign->status = $request->status;
        $new_club_assign->join_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $new_club_assign->expire_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $new_club_assign->save();
        logData($primary_id = $new_club_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_club_assign, $action = 'A new member is assigned to the club', $created_by = Auth::id(), $updated_by = null, $deleted_by = null);
        return redirect()->route('club.assign.to.club.list')->with('success', 'Club Member Added Successfully!');
    }

    public function assignToClubEdit($id)
    {

        $user = Auth::user();
        $allowed_club_ids = [];

        if ($user->id == 1) {
            // User with ID 1 (admin/super admin) has access to all clubs
            $allowed_club_ids = AssignToClub::distinct()->pluck('club_id')->toArray();
        } else {
            $role = UserRole::where('user_id', $user->id)->first();

            if ($role && $role->role_id == 3) {
                // User has role ID 3 - Club Admin , retrieve the allowed club IDs based on Club Member
                $allowed_club_ids = AssignToClub::where('club_member_id', $user->profile_id)->distinct()->pluck('club_id')->toArray();
            } else {
                abort(403, 'You do not have permission to access this category.');
            }
        }

        // Retrieve all club members associated with allowed club IDs
        $allowed_club_members = AssignToClub::whereIn('club_id', $allowed_club_ids)->distinct()->pluck('id')->toArray();

        // Check if the requested $id is in the list of allowed_club_members
        if (in_array($id, $allowed_club_members)) {
            $data['editData'] = AssignToClub::find($id);
        } else {
            abort(403, 'You do not have permission to access this category.');
        }

        $data['clubs'] = $this->fetchClubByRole();
        $data['students'] = ClubMember::where('status', 1)->latest()->get();
        $data['club_designations'] = ClubDesignation::where('is_moderator', '!=', 1)->get();
        return view('backend.club.assign-to.club', $data);
    }
    public function assignToClubUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'club_member_id' => 'required',
            'club_id' => 'required',
            'club_designation_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required'
            'status' => 'required'
        ]);

        $is_assign_club = AssignToClub::where('club_id', $request->club_id)->where('club_designation_id', $request->club_designation_id)->first();

        if (@$is_assign_club->club_designation_id == 1 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'President has already been registered for this club!');
        }
        if (@$is_assign_club->club_designation_id == 2 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'Vice President already been registered for this club!');
        }
        if (@$is_assign_club->club_designation_id == 3 && $is_assign_club->club_member_id != $request->club_member_id) {
            return redirect()->back()->with('error', 'Secretary has already been registered for this club!');
        }

        $update_club_assign                         = AssignToClub::find($id);
        $update_club_assign->club_id                = $request->club_id;
        $update_club_assign->club_designation_id    = $request->club_designation_id;
        $update_club_assign->status                 = $request->status;
        $update_club_assign->join_date              = date('Y-m-d H:i:s', strtotime($request->start_date));
        $update_club_assign->expire_date            = date('Y-m-d H:i:s', strtotime($request->end_date));
        $update_club_assign->save();
        logData($primary_id = $update_club_assign->id, $url = url()->previous(), $old_data = null, $new_data = $update_club_assign, $action = "An assigned member's data is updated", $created_by = null, $updated_by = Auth::id(), $deleted_by = null);
        return redirect()->route('club.assign.to.club.list')->with('success', 'Club Member Updated Successfully!');

        // return  $members;
        // return view('backend.club.assign-to.club', compact('students', 'clubs', 'club_designations'));
    }

    public function assignToClubDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = AssignToClub::find($request->id);
            $data->delete();

            DB::commit();
            return redirect()->route('club.assign.to.club.list')->with('success', 'Club Member Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.assign.to.club.list')->with('warning', $th->getMessage());
        }
    }
}
