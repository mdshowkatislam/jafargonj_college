<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\Department;
use App\Models\Faculty;
use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\Auth;
use Image;

class ProgramController extends Controller
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
        // dd($data['department_head'][0]->id);
        if(isset($data['faculty_head']) && count($data['faculty_head']) > 0){
            $data['programs'] = Program::with(['program_category', 'department', 'faculty'])->where('faculty_id', $data['faculty_head'][0]->id)->get();
        }elseif(isset($data['department_head']) && count($data['department_head']) > 0) {
            $data['programs'] = Program::with(['program_category', 'department', 'faculty'])->where('department_id', $data['department_head'][0]->id)->get();
        } else {
            $data['programs'] = Program::with(['program_category', 'department', 'faculty'])->get();
        }

        return view('backend.program.view', $data);
    }

    public function Add()
    {

        $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        return view('backend.program.add', $data);
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'program_category_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'program_title' => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            // 'ucam_program_id' => 'required|numeric',
            'image' => 'mimes:jpg,jpeg,png'
        ], [
            'program_title.regex' => 'title field should not contain special character or number',
        ]);

        $params = $request->all();
        if ($file = $request->file('image')) {
            $config = [
                'name'      => "image",
                'path'      => 'upload/program',
            ];
            $image_file = ImageHelper::uploadImage($config);
            // return$image_file['filename'];
            $params['image'] = $image_file['filename'];
        }
        if ($file = $request->file('image_icon')) {
            $config = [
                'name'      => "image_icon",
                'path'      => 'upload/program_icon',
            ];
            $image_file = ImageHelper::uploadImage($config);
            // return$image_file['filename'];
            $params['image_icon'] = $image_file['filename'];
        }
        Program::create($params);
        return redirect()->route('setup.program')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Program::find($id);
        $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        // return $data;
        return view('backend.program.add', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate(['program_category_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'program_title' => 'required',
            // 'ucam_program_id' => 'required|numeric',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $data = Program::find($id);
        $params = $request->all();
        if ($file = $request->file('image')) {
            if (file_exists(public_path('upload/program/' . $data->image))) {
                @unlink(public_path('upload/program/' . $data->image));
            }
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/program'), $filename);
            $image = Image::make(public_path('upload/program/') . $filename);
            $image->save(public_path('upload/program/') . $filename);
            $params['image'] = $filename;
        }
        if ($file = $request->file('image_icon')) {
            if (file_exists(public_path('upload/program_icon/' . $data->image))) {
                @unlink(public_path('upload/program_icon/' . $data->image));
            }
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/program_icon'), $filename);
            $image = Image::make(public_path('upload/program_icon/') . $filename);
            $image->save(public_path('upload/program_icon/') . $filename);
            $params['image_icon'] = $filename;
        }
        $data->update($params);
        return redirect()->route('setup.program')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Program::find($request->id);
        $data->delete();

        return redirect()->route('homepages.event')->with('success', 'Data Deleted successfully');
    }

    //ajax
    public function facultyWiseDepartment(Request $request)
    {
        if ($request->faculty_id != "") {
            $data['facultyWiseDepartment'] = Department::where('faculty_id', $request->faculty_id)->where('status', 1)->get();
        } else {
            $data['facultyWiseDepartment'] = Department::where('status', 1)->get();
        }


        if ($request->faculty_id != "") {
            $data['countFacultyWiseAllProgram'] = Program::where('program_category_id', $request->program_category_id)->where('faculty_id', $request->faculty_id)->where('status', 1)->count();
        } else {
            $data['countFacultyWiseAllProgram'] = Program::where('program_category_id', $request->program_category_id)->where('status', 1)->count();
        }

        //return $facultyWiseDepartment;
        ///dd($facultyWiseDepartment);
        if (isset($data)) {
            return response()->json($data);
        } else {
            return response()->json('fail');
        }
    }

    public function department_wise_program_count(Request $request)
    {
        $data['countDepartment'] = Program::where('program_category_id', $request->program_category_id)->where('department_id', $request->department_id)->where('status', 1)->count();
        //return $facultyWiseDepartment;
        ///dd($facultyWiseDepartment);
        if (isset($data)) {
            return response()->json($data);
        } else {
            return response()->json('fail');
        }
    }

    public function programApprove(Request $request, $id)
    {
        // return $request->all();
        $data = Program::where('id', $id)->first();
        $data->is_admission = $request->is_admission;
        $data->save();
        if ($request->is_admission == 1) {
            return redirect()->back()->with('success', 'Admission ON Successfully');
        } else {
            return redirect()->back()->with('success', 'Admission OFF Successfully');
        }
    }
    public function programActive(Request $request, $id)
    {
        // return $request->all();
        $data = Program::where('id', $id)->first();
        $data->status = $request->status;
        $data->save();
        if ($request->status == 1) {
            return redirect()->back()->with('success', 'Program Active Successfully');
        } else {
            return redirect()->back()->with('success', 'Program Inactive Successfully');
        }
    }
}
