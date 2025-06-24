<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AssignToAlumni;
use App\Models\Banner;
use App\Models\Alumni;
use App\Models\AlumniMember;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\MenuType;
use App\Models\News;
use App\Models\SliderMaster;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function alumniView()
    {
        return view('backend.alumni.index');
    }

    public function index()
    {
       
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();

        $alumnis = Alumni::with('faculty', 'department', 'events');

        if ($role) {
            switch ($role->role_id) {
                case '1':
                    // No need to make a separate query, continue to next case
                case '13':
                    $faculty_id = Faculty::where('profile_id', $user->profile_id)->pluck('id')->first();
                    $alumnis->where('faculty_id', $faculty_id);
                    break;
                case '17':
                    $department_id = Department::where('profile_id', $user->profile_id)->pluck('id')->first();
                    $alumnis->where('department_id', $department_id);
                    break;
                case '3':
                    $assign_alumnis = AssignToAlumni::where('alumni_member_id', $user->profile_id)->get();
                    if ($assign_alumnis) {
                        $alumni_ids = $assign_alumnis->pluck('alumni_id')->toArray();
                        $alumnis->whereIn('id', $alumni_ids);
                    }
                    break;
                default:
                    return collect();
            }
        }
        
        $alumnis = $alumnis->latest()->get();

        return view('backend.alumni.view', compact('alumnis', 'role', 'user'));
    }

    public function alumni_event_list($id)
    {
        try {
            $user = Auth::user();
            $user_role = UserRole::where('user_id', $user->id)->first();
            $data['role_id'] = $user_role->role_id ?? null;
            $data['news'] = News::where('alumni_id', $id)->get();
            return view('backend.news.news-view')->with($data);

            // return view('backend.alumni.view',compact('alumnis'));
        } catch (\Exception $e) {
            return redirect()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $data['alumni_members'] = AlumniMember::where('status', 1)->latest()->get(['id', 'name', 'student_id']);
        $data['slider_categories'] = SliderMaster::latest()->get();
        $data['banners'] = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        return view('backend.alumni.add', $data);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name'                  => 'required|unique:alumnis,name|regex:/^[a-zA-Z\s.\-()]+$/',
            'email'                 => 'nullable|email',
            'banner'                => 'mimes:jpg,png,jpeg | max:512'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        // Generate the slug based on the title
        $slug = (new Alumni())->generateSlug($request->name);

        DB::beginTransaction();
        try {

            $data                   = new Alumni();
            $data->name             = $request->name;
            $data->slug             = $slug;
            $data->faculty_id       = $request->faculty_id;
            $data->department_id    = $request->department_id;
            $data->slider_id        = $request->slider_id;
            $data->banner_id        = $request->banner_id;
            $data->description      = $request->description;
            $data->mission          = $request->mission;
            $data->vision           = $request->vision;
            $data->motto            = $request->motto;
            $data->url              = $request->url_address;
            $data->status           = $request->status;
            $data->top_menu = $request->top_menu;
            $data->nav_menu = $request->nav_menu;
            $data->facebook         = $request->facebook;
            $data->youtube          = $request->youtube;
            $data->instagram        = $request->instagram;
            $data->linkedin         = $request->linkedin;
            $data->email            = $request->email;
            $data->twitter          = $request->twitter;
            $data->establish_date   = date('Y-m-d H:i:s', strtotime($request->establish_date));

            $config = array(
                'name'      => "banner",
                'path'      => 'upload/banner',
                'width'     => 750,
                'height'    => 450
            );
            $images = ImageHelper::uploadImage($config);
            $data->banner           = $images['filename'];


            $data->save();
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' alumni added !', $created_by =  Auth::id(), $updated_by = null);

            DB::commit();
            return redirect()->route('alumni.list')->with('success', 'Alumni Added');
        } catch (\Exception $th) {
            DB::rollback();
           // dd($th->getMessage());
            return redirect()->route('alumni.list')->with('warning', $th->getMessage());
        }
    }

    public function getDepartment($id)
    {
        $dept = Department::where('faculty_id', $id)->get();
        return $dept;
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->id == 1) {
            $data['editData'] = Alumni::find($id);
        } else {
            $role = UserRole::where('user_id', $user->id)->first();
            if ($role) {
                if ($role->role_id == 3) {
                    $assign_alumnis = AssignToAlumni::where('alumni_member_id', $user->profile_id)->get()->toArray();
                    if ($assign_alumnis) {
                        $has_alumni_access = in_array($id, array_column($assign_alumnis, 'alumni_id'));
                        if ($has_alumni_access) {
                            $data['editData'] = Alumni::find($id);
                        } else {
                            abort(403, 'You do not have permission to access this category.');
                        }
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                } elseif ($role->role_id == 13 || $role->role_id == 17) {
                    $data['editData'] = Alumni::find($id);
                } else {
                    abort(403, 'You do not have permission to access this category.');
                }
            } else {
                $data['editData'] = Alumni::find($id);
            }
        }
        // $editData =  alumni::find($id);
        $data['alumni_members']               = AlumniMember::where('status', 1)->latest()->get(['id', 'name', 'student_id']);
        $data['assign_alumni_president']      = AssignToAlumni::where('alumni_id', $id)->where('alumni_designation_id', 1)->where('status', 1)->first();
        $data['assign_alumni_secretary']      = AssignToAlumni::where('alumni_id', $id)->where('alumni_designation_id', 3)->where('status', 1)->first();
        $data['slider_categories']          = SliderMaster::latest()->get();
        $data['banners']                    = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        return view('backend.alumni.add', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'banner'                => 'mimes:jpg,png,jpeg | max:512'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);


        DB::beginTransaction();
        try {

            $data                   = alumni::find($id);

            // Check if the name has changed
            if ($data->name != $request->name) {
                // Generate the new slug based on the updated title
                $slug = (new alumni())->generateSlug($request->name, $data->name);

                // Update the slug 
                $data->slug         = $slug;
            }
            
            $data->name             = $request->name;
            $data->faculty_id       = $request->faculty_id;
            $data->department_id    = $request->department_id;
            $data->slider_id        = $request->slider_id;
            $data->banner_id        = $request->banner_id;
            $data->description      = $request->description;
            $data->mission          = $request->mission;
            $data->vision           = $request->vision;
            $data->motto            = $request->motto;
            $data->url              = $request->url_address;
            $data->status           = $request->status;
            $data->top_menu = $request->top_menu;
            $data->nav_menu = $request->nav_menu;
            $data->facebook         = $request->facebook;
            $data->youtube          = $request->youtube;
            $data->instagram        = $request->instagram;
            $data->linkedin         = $request->linkedin;
            $data->email            = $request->email;
            $data->twitter          = $request->twitter;
            $data->establish_date   = date('Y-m-d H:i:s', strtotime($request->establish_date));

            if ($request->file('banner')) {
                @unlink(public_path('upload/banner/' . $data->banner));
                $config = array(
                    'name'      => "banner",
                    'path'      => 'upload/banner',
                    'width'     => 750,
                    'height'    => 450
                );
                $images = ImageHelper::uploadImage($config);
                $data->banner       = $images['filename'];
            }

            $data->save();

            logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' alumni updated !', $created_by =  null, $updated_by = Auth::id());

            DB::commit();
            return redirect()->route('alumni.list')->with('success', 'Alumni Updated Successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.list')->with('warning', $th->getMessage());
        }

    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = Alumni::find($request->id);
            @unlink(public_path('upload/banner/' . $data->banner));
            $data->delete();

            AssignToAlumni::where('alumni_id', $request->id)->delete();

            logData($primary_id = $request->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' alumni deleted !', $created_by =  null, $updated_by = null, $deleted_by = Auth::id());

            DB::commit();
            return redirect()->route('alumni.list')->with('success', 'Data Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('alumni.list')->with('warning', $th->getMessage());
        }
    }
}
