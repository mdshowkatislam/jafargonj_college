<?php

namespace App\Http\Controllers\Backend\Admission;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['admissions'] = Admission::orderBy('created_at', 'desc')->get();
        return view('backend.admission.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['editData'] = NULL;
        $data['faculties'] = Faculty::where('status', 1)->get();
        $data['program_categories'] = ProgramCategory::all();

        return view('backend.admission.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'program_category_id' => 'required',
            'file' => 'mimes:pdf,doc,docx|max:20000'

        ]);

        $data           = new Admission();
        $data->faculty_id     = -1;
        $data->department_id     = -1;
        $data->program_category_id     = $request->program_category_id;
        $data->type_id     = $request->type_id??1;
        $data->session     = $request->session;
        $data->title     = $request->title;
        $data->status     = $request->status;
        $data->start_date     = $request->start_date;
        $data->end_date     = $request->end_date;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/admission/', $file_name);
            $data->file = $file_name;
        }
        $data->save();

        return redirect()->route('admission.list')->with('success', 'Admission added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['faculties'] = Faculty::where('status', 1)->get();
        $data['program_categories'] = ProgramCategory::all();
        $data['editData'] = Admission::findOrFail($id);
        return view('backend.admission.add')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
    		'title' => 'required',
    		'program_category_id' => 'required',
            'file' => 'mimes:pdf,doc,docx|max:20000'
        ]);

        $data           = Admission::find($id);
        $data->faculty_id     = -1;
        $data->department_id     = -1;
        $data->program_category_id     = $request->program_category_id;
        $data->type_id     = $request->type_id;
        $data->session     = $request->session;
        $data->title     = $request->title;
        $data->status     = $request->status;
        $data->start_date     = $request->start_date;
        $data->end_date     = $request->end_date;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/admission/', $file_name);
            $data->file = $file_name;
        }
        $data->save();

        return redirect()->route('admission.list')->with('info', 'Academic Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Admission::find($request->id);
        $data->delete();
        return redirect()->route('admission.list')->with('success', 'Admission Deleted Successfully.');
    }
}
