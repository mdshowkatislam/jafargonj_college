<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\OefcdCurriculum;
use Illuminate\Http\Request;

class OEFCDCurriculumController extends Controller
{
    //
    public function index()
    {
        $data['curriculums'] = OefcdCurriculum::all();
        return view('backend.oefcd.oefcd_curriculumn.list', $data);
    }

    public function create()
    {
        $data['departments'] = Department::where('status', 1)->get();
        return view('backend.oefcd.oefcd_curriculumn.add', $data);
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'department_id' => 'required',
            'program_id' => 'required',
        ],[
            'department_id.required' => 'Department is required',
            'program_id.required' => 'Program is required'
        ]);

        $data = new OefcdCurriculum();
        $data->department_id = $request->department_id;
        $data->program_id = $request->program_id;
        $data->date = date('Y-m-d', strtotime($request->date)) ?? date('Y-m-d');
        $data->status = $request->status ?? 0;

        $data->save();

    	return redirect()->route('oefcd.curriculum.list')->with('success','Curriculumn Added Successfully');

    }

    public function edit($id)
    {
        $data['editData'] = OefcdCurriculum::findOrFail($id);
        $data['departments'] = Department::where('status', 1)->get();

        return view('backend.oefcd.oefcd_curriculumn.add', $data);
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'department_id' => 'required',
            'program_id' => 'required',
        ],[
            'department_id.required' => 'Department is required',
            'program_id.required' => 'Program is required'
        ]);

        $data = OefcdCurriculum::find($id);
        $data->department_id = $request->department_id;
        $data->program_id = $request->program_id;
        $data->date = date('Y-m-d', strtotime($request->date)) ?? date('Y-m-d');
        $data->status = $request->status ?? 0;

        $data->save();

    	return redirect()->route('oefcd.curriculum.list')->with('info','Curriculum Updated Successfully!');
    }
}
