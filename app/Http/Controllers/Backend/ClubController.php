<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Banner;
use App\Models\Club;
use App\Models\ClubMember;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\MenuType;
use App\Models\News;
use App\Models\SliderMaster;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    public function clubView()
    {
        
        return view('backend.club.index');
    }
    public function index()
    {
       
        $user = Auth::user();
        $role = UserRole::where('user_id', $user->id)->first();

        $clubs = Club::with('faculty', 'department', 'events');

        if ($role) {
            switch ($role->role_id) {
                case '1':
                    break;
                case '13':
                    $faculty_id = Faculty::where('profile_id', $user->profile_id)->pluck('id')->first();
                    $clubs->where('faculty_id', $faculty_id);
                    break;
                case '17':
                    $department_id = Department::where('profile_id', $user->profile_id)->pluck('id')->first();
                    $clubs->where('department_id', $department_id);
                    break;
                case '3':
                    $assign_clubs = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_clubs) {
                        $club_ids = $assign_clubs->pluck('club_id')->toArray();
                        $clubs->whereIn('id', $club_ids);
                    }
                    break;
                default:
                    return collect();
            }
        }
        
        $clubs = $clubs->latest()->get();

        return view('backend.club.view', compact('clubs', 'role', 'user'));
    }

    public function club_event_list($id)
    {
        try {
            $user = Auth::user();
            $user_role = UserRole::where('user_id', $user->id)->first();
            $data['role_id'] = $user_role->role_id ?? null;
            $data['news'] = News::where('club_id', $id)->get();
            return view('backend.news.news-view')->with($data);

            // return view('backend.club.view',compact('clubs'));
        } catch (\Exception $e) {
            return redirect()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $data['club_members'] = ClubMember::where('status', 1)->latest()->get(['id', 'name', 'student_id']);
        $data['slider_categories'] = SliderMaster::latest()->get();
        $data['banners'] = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        return view('backend.club.add', $data);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name'                  => 'required|unique:clubs,name|regex:/^[a-zA-Z\s.\-()]+$/',
            'email'                  => 'nullable|email',
            // 'president_id'          => 'required',
            // 'secretary_id'          => 'required',
            // 'president_start_date'  => 'required',
            // 'president_end_date'    => 'required',
            // 'secretary_start_date'  => 'required',
            // 'secretary_end_date'    => 'required',
            'banner'                => 'mimes:jpg,png,jpeg | max:512'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        // $president_id = $request->president_id;
        // $secretary_id = $request->secretary_id;

        // Compare the president_id and secretary_id to check if they are the same
        // if ($president_id == $secretary_id) {
        //     return redirect()->route('club.list')->with('warning', 'Cannot assign the same member as both President and Secretary!');
        // }

        // Generate the slug based on the title
        $slug = (new Club())->generateSlug($request->name);

        DB::beginTransaction();
        try {

            $data                   = new Club();
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
            // if ($request->filled('president_id')) {
            //     $member_assign_to_club                      = new AssignToClub();
            //     $member_assign_to_club->club_member_id      = $request->president_id;
            //     $member_assign_to_club->club_id             = $data->id;
            //     $member_assign_to_club->club_designation_id = 1;
            //     $member_assign_to_club->status              = 1;
            //     $member_assign_to_club->join_date           = date('Y-m-d H:i:s', strtotime($request->president_start_date));
            //     $member_assign_to_club->expire_date         = date('Y-m-d H:i:s', strtotime($request->president_end_date));
            //     $member_assign_to_club->save();
            // }
            // if ($request->filled('secretary_id')) {
            //     $member_assign_to_club                      = new AssignToClub();
            //     $member_assign_to_club->club_member_id      = $request->secretary_id;
            //     $member_assign_to_club->club_id             = $data->id;
            //     $member_assign_to_club->club_designation_id = 3;
            //     $member_assign_to_club->status              = 1;
            //     $member_assign_to_club->join_date           = date('Y-m-d H:i:s', strtotime($request->secretary_start_date));
            //     $member_assign_to_club->expire_date         = date('Y-m-d H:i:s', strtotime($request->secretary_end_date));
            //     $member_assign_to_club->save();
            // }
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' club added !', $created_by =  Auth::id(), $updated_by = null);

            DB::commit();
            return redirect()->route('club.list')->with('success', 'Club Added');
        } catch (\Exception $th) {
            DB::rollback();
            //dd($th->getMessage());
            return redirect()->route('club.list')->with('warning', $th->getMessage());
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
            $data['editData'] = Club::find($id);
        } else {
            $role = UserRole::where('user_id', $user->id)->first();
            if ($role) {
                if ($role->role_id == 1) {
                    $data['editData'] = Club::find($id);
                }
                elseif ($role->role_id == 3) {
                    $assign_clubs = AssignToClub::where('club_member_id', $user->profile_id)->get()->toArray();
                    if ($assign_clubs) {
                        $has_club_access = in_array($id, array_column($assign_clubs, 'club_id'));
                        if ($has_club_access) {
                            $data['editData'] = Club::find($id);
                        } else {
                            abort(403, 'You do not have permission to access this category.');
                        }
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                } elseif ($role->role_id == 13 || $role->role_id == 17) {
                    $data['editData'] = Club::find($id);
                } else {
                    abort(403, 'You do not have permission to access this category.');
                }
            } else {
                $data['editData'] = Club::find($id);
            }
        }
        // $editData =  Club::find($id);
        $data['club_members']               = ClubMember::where('status', 1)->latest()->get(['id', 'name', 'student_id']);
        $data['assign_club_president']      = AssignToClub::where('club_id', $id)->where('club_designation_id', 1)->where('status', 1)->first();
        $data['assign_club_secretary']      = AssignToClub::where('club_id', $id)->where('club_designation_id', 3)->where('status', 1)->first();
        $data['slider_categories']          = SliderMaster::latest()->get();
        $data['banners']                    = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        return view('backend.club.add', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            // 'president_id'          => 'required',
            // 'secretary_id'          => 'required',
            // 'president_start_date'  => 'required',
            // 'president_end_date'    => 'required',
            // 'secretary_start_date'  => 'required',
            // 'secretary_end_date'    => 'required',
            'banner'                => 'mimes:jpg,png,jpeg | max:512'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        // $president_id = $request->president_id;
        // $secretary_id = $request->secretary_id;

        // Compare the president_id and secretary_id to check if they are the same
        // if ($president_id == $secretary_id) {
        //     return redirect()->route('club.list')->with('warning', 'Cannot assign the same member as both President and Secretary!');
        // }


        DB::beginTransaction();
        try {

            $data                   = Club::find($id);

            // Check if the name has changed
            if ($data->name != $request->name) {
                // Generate the new slug based on the updated title
                $slug = (new Club())->generateSlug($request->name, $data->name);

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
            // if ($request->filled('president_id')) {

            //     $has_president_id = AssignToClub::where('club_id', $id)->where('club_designation_id', 1)->first();

            //     if ($has_president_id) {
            //         $member_assign_to_club                  = $has_president_id;
            //     } else {
            //         $member_assign_to_club                  = new AssignToClub();
            //     }

            //     $member_assign_to_club->club_member_id      = $request->president_id;
            //     $member_assign_to_club->club_id             = $data->id;
            //     $member_assign_to_club->club_designation_id = 1;
            //     $member_assign_to_club->status              = 1;
            //     $member_assign_to_club->join_date           = date('Y-m-d H:i:s', strtotime($request->president_start_date));
            //     $member_assign_to_club->expire_date         = date('Y-m-d H:i:s', strtotime($request->president_end_date));
            //     $member_assign_to_club->save();
            // }
            // if ($request->filled('secretary_id')) {
            //     $has_secretary_id = AssignToClub::where('club_id', $id)->where('club_designation_id', 3)->first();

            //     if ($has_secretary_id) {
            //         $member_assign_to_club                  = $has_secretary_id;
            //     } else {
            //         $member_assign_to_club                  = new AssignToClub();
            //     }

            //     $member_assign_to_club->club_member_id      = $request->secretary_id;
            //     $member_assign_to_club->club_id             = $data->id;
            //     $member_assign_to_club->club_designation_id = 3;
            //     $member_assign_to_club->status              = 1;
            //     $member_assign_to_club->join_date           = date('Y-m-d H:i:s', strtotime($request->secretary_start_date));
            //     $member_assign_to_club->expire_date         = date('Y-m-d H:i:s', strtotime($request->secretary_end_date));
            //     $member_assign_to_club->save();
            // }

            logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' club updated !', $created_by =  null, $updated_by = Auth::id());

            DB::commit();
            return redirect()->route('club.list')->with('success', 'Club Updated Successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.list')->with('warning', $th->getMessage());
        }

        // $data = $request->all();
        // $data['establish_date'] = date('Y-m-d H:i:s', strtotime($request->establish_date));
        // $request->validate([
        //     'name' => 'required'
        // ]);
        // $club = Club::find($id);
        // if ($request->file('banner')) {
        //     @unlink(public_path('upload/banner/' . $club->banner));
        //     $config = array(
        //         'name'      => "banner",
        //         'path'      => 'upload/banner',
        //         'width'     => 750,
        //         'height'    => 450
        //     );
        //     $images = ImageHelper::uploadImage($config);
        //     $data['banner'] = $images['filename'];
        // }

        // dd($data);
        // $club->update($data);
        // return redirect()->route('club.list')->with('success', 'Club Updated Successfully');
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data  = Club::find($request->id);
            @unlink(public_path('upload/banner/' . $data->banner));
            $data->delete();

            AssignToClub::where('club_id', $request->id)->delete();

            logData($primary_id = $request->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = $data->name . ' club deleted !', $created_by =  null, $updated_by = null, $deleted_by = Auth::id());

            DB::commit();
            return redirect()->route('club.list')->with('success', 'Data Deleted successfully');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->route('club.list')->with('warning', $th->getMessage());
        }
    }
}
