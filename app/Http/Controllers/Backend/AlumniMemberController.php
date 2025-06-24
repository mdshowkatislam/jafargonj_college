<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AssignToAlumni;
use App\Models\Alumni;
use App\Models\AlumniDesignation;
use App\Models\AlumniMember;
use App\Models\AlumniMemberMapping;
use App\Models\News;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniMemberController extends Controller
{
    private function fetchAlumniByRole()
    {
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();
        //dd($user);
        if ($role) {
            switch ($role->role_id) {
                case '1':
                    return Alumni::all();
                case '3':
                    $assign_alumni = AssignToAlumni::where('alumni_member_id', $user->profile_id)->pluck('alumni_id')->toArray();
                    if ($assign_alumni) {
                        return Alumni::whereIn('id', $assign_alumni)->get();
                    } else {
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
        $data['alumni_members'] = AlumniMember::latest()->get();
        return view('backend.alumni.member.list', $data);
    }

    public function member_list()
    {
        $alumni_members = AlumniMember::all();
        return view('backend.alumni.member.member_list', compact('alumni_members'));
    }

    public function create()
    {
        return view('backend.alumni.member.add');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'                  => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'student_id'            => 'required | unique:alumni_members,student_id',
            'email'                 => 'required | unique:alumni_members,email',
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
            $new_member = new AlumniMember;
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
                    'path'      => 'upload/alumni/member/image',
                    'width'     => 70,
                    'height'    => 70
                );
                $images = ImageHelper::uploadImage($config);
                $new_member['image'] = $images['filename'];
            }

            $new_member->save();

            logData($primary_id = $new_member->id, $url = url()->previous(), $old_data = null, $new_data = $new_member, $action = 'Add alumni Member', $created_by =  Auth::id(), $updated_by = null);
            DB::commit();
            return redirect()->route('alumni.member.list')->with('success', 'Alumni Member Added Successfully!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return redirect()->route('alumni.member.add')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        // dd($id);
        $editData = AlumniMember::with(['faculty', 'department', 'member_detail' => function ($q) {
            $q->leftJoin('alumnis', 'alumnis.id', 'assign_to_alumnis.alumni_id');
            $q->leftJoin('alumni_designations', 'alumni_designations.id', 'assign_to_alumnis.alumni_designation_id');
            $q->select('alumnis.name as c_name', 'alumni_designations.name as d_name', 'assign_to_alumnis.*');
        }])->find($id);

        return view('backend.alumni.member.add', compact('editData'));
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
            $new_member                     = AlumniMember::find($id);
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
                    'path'      => 'upload/alumni/member/image',
                    'width'     => 70,
                    'height'    => 70
                );
                $images = ImageHelper::uploadImage($config);
                // dd($images);
                $new_member['image'] = $images['filename'];
            }
            // return $new_member;
            $new_member->save();
            logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $new_member, $action = 'Update alumni Member', $created_by =  null, $updated_by = Auth::id());
            DB::commit();
            return redirect()->route('alumni.member.list')->with('success', 'alumni Member Update Successfully!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return redirect()->route('alumni.member.add')->with('error', $th->getMessage());
        }
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = AlumniMember::find($request->id);
            $data->delete();

            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Delete alumni Member', $created_by = null, $updated_by = null, $deleted_by = Auth::id());

            DB::commit();
            return redirect()->route('alumni.member.list')->with('success', 'Data Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.member.list')->with('warning', $th->getMessage());
        }
    }
    public function deletePhoto(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = AlumniMember::find($request->id);
            @unlink(public_path('upload/alumni/member/image/' . $data->image));
            $data->image = null;
            $data->update();

            DB::commit();
            return redirect()->route('alumni.member.list')->with('success', 'Member Photo Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.member.list')->with('warning', $th->getMessage());
        }
    }

    public function assignToAlumniList()
    {
        $data['alumnis'] = $this->fetchAlumniByRole();
        return view('backend.alumni.assign-to.alumni-list', $data);
    }
    public function assignMemberByAlumni(Request $request)
    {
        if ($request->alumni_id != "") {
            $data['alumnis'] = Alumni::where('id', $request->alumni_id)->get();
            return view('backend.alumni.assign-to.members-by-alumni', $data);
        } else {
            $data['alumnis'] = $this->fetchAlumniByRole();
            return view('backend.alumni.assign-to.members-by-alumni', $data);
        }
    }


    public function assignToAlumni()
    {
        $alumnis = $this->fetchAlumniByRole();
        $students = AlumniMember::where('status', 1)->latest()->get();
        $alumni_designations = AlumniDesignation::where('is_moderator', '!=', 1)->get();
        return view('backend.alumni.assign-to.alumni', compact('students', 'alumnis', 'alumni_designations'));
    }

    public function memberAssignToAlumni(Request $request)
    {
       
        $request->validate([
            'alumni_member_id' => 'required',
            'alumni_id' => 'required',
            'alumni_designation_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required'
            'status' => 'required'
        ]);

        $is_person_has_alumni = AssignToAlumni::where('alumni_member_id', $request->alumni_member_id)
            ->where('alumni_id', $request->alumni_id)
            ->first();

        if ($is_person_has_alumni) {
            return redirect()->back()->with('error', 'This Person already registerd for this alumni!');
        }
        // $is_assign_alumni = AssignToalumni::where('alumni_id', $request->alumni_id)->get()->toArray();

        // if ($is_assign_alumni) {
        //     $has_alumni_president = in_array(1, array_column($is_assign_alumni, 'alumni_designation_id'));
        //     $has_alumni_v_president = in_array(2, array_column($is_assign_alumni, 'alumni_designation_id'));
        //     $has_alumni_secretary = in_array(3, array_column($is_assign_alumni, 'alumni_designation_id'));

        //     if ($has_alumni_president && $request->alumni_designation_id == 1) {
        //         return redirect()->back()->with('error', 'President has already been registered for this alumni!');
        //     }
        //     if ($has_alumni_v_president && $request->alumni_designation_id == 2) {
        //         return redirect()->back()->with('error', 'Vice President already been registered for this alumni!');
        //     }
        //     if ($has_alumni_secretary && $request->alumni_designation_id == 3) {
        //         return redirect()->back()->with('error', 'Secretary has already been registered for this alumni!');
        //     }
        // }
        $is_assign_alumni = AssignToAlumni::where('alumni_id', $request->alumni_id)->where('alumni_designation_id', $request->alumni_designation_id)->first();

        if (@$is_assign_alumni->alumni_designation_id == 1 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'President has already been registered for this alumni!');
        }
        if (@$is_assign_alumni->alumni_designation_id == 2 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'Vice President already been registered for this alumni!');
        }
        if (@$is_assign_alumni->alumni_designation_id == 3 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'Secretary has already been registered for this alumni!');
        }

        $new_alumni_assign = new AssignToAlumni();
        $new_alumni_assign->alumni_member_id = $request->alumni_member_id;
        $new_alumni_assign->alumni_id = $request->alumni_id;
        $new_alumni_assign->alumni_designation_id = $request->alumni_designation_id;
        $new_alumni_assign->status = $request->status;
        $new_alumni_assign->join_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $new_alumni_assign->expire_date = date('Y-m-d H:i:s', strtotime($request->end_date));
        $new_alumni_assign->save();
        logData($primary_id = $new_alumni_assign->id, $url = url()->previous(), $old_data = null, $new_data = $new_alumni_assign, $action = 'A new member is assigned to the alumni', $created_by = Auth::id(), $updated_by = null, $deleted_by = null);
        return redirect()->route('alumni.assign.to.alumni.list')->with('success', 'Alumni Member Added Successfully!');
    }

    public function assignToAlumniEdit($id)
    {

        $user = Auth::user();
        $allowed_alumni_ids = [];

        if ($user->id == 1) {
            // User with ID 1 (admin/super admin) has access to all alumnis
            $allowed_alumni_ids = AssignToAlumni::distinct()->pluck('alumni_id')->toArray();
        } else {
            $role = UserRole::where('user_id', $user->id)->first();

            if ($role && $role->role_id == 3) {
                // User has role ID 3 - alumni Admin , retrieve the allowed alumni IDs based on alumni Member
                $allowed_alumni_ids = AssignToAlumni::where('alumni_member_id', $user->profile_id)->distinct()->pluck('alumni_id')->toArray();
            } else {
                abort(403, 'You do not have permission to access this category.');
            }
        }

        // Retrieve all alumni members associated with allowed alumni IDs
        $allowed_alumni_members = AssignToAlumni::whereIn('alumni_id', $allowed_alumni_ids)->distinct()->pluck('id')->toArray();

        // Check if the requested $id is in the list of allowed_alumni_members
        if (in_array($id, $allowed_alumni_members)) {
            $data['editData'] = AssignToAlumni::find($id);
        } else {
            abort(403, 'You do not have permission to access this category.');
        }

        $data['alumnis'] = $this->fetchalumniByRole();
        $data['students'] = AlumniMember::where('status', 1)->latest()->get();
        $data['alumni_designations'] = AlumniDesignation::where('is_moderator', '!=', 1)->get();
        return view('backend.alumni.assign-to.alumni', $data);
    }
    public function assignToAlumniUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'alumni_member_id' => 'required',
            'alumni_id' => 'required',
            'alumni_designation_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required'
            'status' => 'required'
        ]);

        $is_assign_alumni = AssignToAlumni::where('alumni_id', $request->alumni_id)->where('alumni_designation_id', $request->alumni_designation_id)->first();

        if (@$is_assign_alumni->alumni_designation_id == 1 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'President has already been registered for this alumni!');
        }
        if (@$is_assign_alumni->alumni_designation_id == 2 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'Vice President already been registered for this alumni!');
        }
        if (@$is_assign_alumni->alumni_designation_id == 3 && $is_assign_alumni->alumni_member_id != $request->alumni_member_id) {
            return redirect()->back()->with('error', 'Secretary has already been registered for this alumni!');
        }

        $update_alumni_assign                         = AssignToAlumni::find($id);
        $update_alumni_assign->alumni_id                = $request->alumni_id;
        $update_alumni_assign->alumni_designation_id    = $request->alumni_designation_id;
        $update_alumni_assign->status                 = $request->status;
        $update_alumni_assign->join_date              = date('Y-m-d H:i:s', strtotime($request->start_date));
        $update_alumni_assign->expire_date            = date('Y-m-d H:i:s', strtotime($request->end_date));
        $update_alumni_assign->save();
        logData($primary_id = $update_alumni_assign->id, $url = url()->previous(), $old_data = null, $new_data = $update_alumni_assign, $action = "An assigned member's data is updated", $created_by = null, $updated_by = Auth::id(), $deleted_by = null);
        return redirect()->route('alumni.assign.to.alumni.list')->with('success', 'Alumni Member Updated Successfully!');

        // return  $members;
        // return view('backend.alumni.assign-to.alumni', compact('students', 'alumnis', 'alumni_designations'));
    }

    public function assignToAlumniDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = AssignToAlumni::find($request->id);
            $data->delete();

            DB::commit();
            return redirect()->route('alumni.assign.to.alumni.list')->with('success', 'Alumni Member Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.assign.to.alumni.list')->with('warning', $th->getMessage());
        }
    }
}
