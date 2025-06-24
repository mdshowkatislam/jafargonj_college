<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\AcademicResult;
use App\Models\Department;
use App\Models\Program;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AcademicResultController extends Controller
{

    public function index()
    {
        $data['academics'] = AcademicResult::with(['program','department'])->latest()->get();
        //   dd($data['academics']);
        return view('backend.academic_result.view', $data);
    }


    public function Add()
    {
        $data['editData'] = NULL;
        $data['departments'] = Department::get();
        $data['programs'] = Program::get();
        $data['faculties'] = Faculty::get();
        // $data['designations'] = Designation::where('purpose',3)->get();
        return view('backend.academic_result.add')->with($data);
    }


    public function Store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'session' => 'required',
            'title' => 'required',
            'status' => 'required',
            'date' => 'required|date',
            'file' => 'mimes:pdf,doc,docx,xlsx|max:20000'
        ]);

        $data           = new AcademicResult();
        $data->type_id     = $request->type_id;
        $data->faculty_id     = $request->faculty_id;
        $data->department_id     = $request->department_id;
        $data->program_id     = $request->program_id;
        if($data->type_id == 1){
            $data->session     = $request->session;
        }
        else{
            $data->session     = 'Affiliate Institute';
        }
        $data->date     = $request->date ?? date('Y-m-d');
        $data->title     = $request->title;
        $data->status     = $request->status;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/academic/', $file_name);
            $data->file = $file_name;
            // dd($file_name);
        }
        $data->save();

        return redirect()->route('setup.academic_result')->with('success', 'Academic added Successfully.');
    }


    public function Edit($id)
    {
        $data['departments'] = Department::get();
        $data['programs'] = Program::get();
        $data['faculties'] = Faculty::get();
        $data['editData'] = AcademicResult::find($id);
        return view('backend.academic_result.edit')->with($data);
    }


    public function Update(Request $request, $id)
    {
        $request->validate([
            // 'session' => 'required',
            'title' => 'required',
            'status' => 'required',
            'date' => 'required|date',
            'file' => 'mimes:pdf,doc,docx,xlsx|max:20000'
        ]);

        $data           = AcademicResult::find($id);
        $data->type_id     = $request->type_id;
        $data->faculty_id     = $request->faculty_id;
        $data->department_id     = $request->department_id;
        $data->program_id     = $request->program_id;
        if($data->type_id == 1){
            $data->session     = $request->session;
        }
        else{
            $data->session     = 'Affiliate Institute';
        }
        $data->date     = $request->date ?? date('Y-m-d');
        $data->title     = $request->title;
        $data->status     = $request->status;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/academic/', $file_name);
            $data->file = $file_name;

        }
        $data->save();

        return redirect()->route('setup.academic_result')->with('info', 'Academic updated Successfully.');
    }

    public function DepartmentWiseProgram(Request $request)
    {
        $program = Program::where('department_id', $request->department_id)->get();
        // dd($program->toArray());

        if (isset($program)) {
            return response()->json($program);
        } else {
            return response()->json('fail');
        }
    }


}
