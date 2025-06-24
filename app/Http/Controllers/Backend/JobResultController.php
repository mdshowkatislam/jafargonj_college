<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobResult;
use App\Models\Career;
use Illuminate\Support\Facades\File;

class JobResultController extends Controller
{
    public function index()
    {

        $data['jobResults'] = JobResult::all();
        return view('backend.career.result-view', $data);
    }

    public function Add()
    {
    }
    public function jobResult()
    {
        $data['job_titles'] = Career::select('id', 'title', 'status')->where('type', 1)
            ->orderBy('date', 'desc')
            ->get();
        return view('backend.career.job_result', $data);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'career_id' => 'required',
            'publish_date' => 'required|date',
            'status' => 'required|integer',
            'attachment' => 'required|file|mimes:pdf,doc,docx|max:4096',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $uploadPath = public_path('upload/career');
        $attachmentName = time() . '_' . $request->file('attachment')->getClientOriginalName();
        $request->file('attachment')->move($uploadPath, $attachmentName);

        $jobResult = new JobResult();
        $jobResult->career_id = $request->career_id;
        $jobResult->status = $request->status;
        $jobResult->publish_date = date('Y-m-d', strtotime($request->publish_date)) ?? date('Y-m-d');
        $jobResult->attachment = $attachmentName;
        $jobResult->save();

        return redirect()->route('setup.career.job_result.view')->with('success', 'Data Saved successfully');
    }

    
    public function edit($id){
        $data['editData'] = JobResult::with('career')->findOrFail($id);
        return view('backend.career.job_result', $data);
    }

    public function Update(Request $request, $id){
        $rules = [
            'career_id' => 'required',
            'publish_date' => 'required|date',
            'status' => 'required|integer',
            'attachment' => 'file|mimes:pdf,doc,docx|max:4096',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($id) {
            $jobResult = JobResult::findOrFail($id);
            if ($request->hasFile('attachment')) {
                // Delete the old file if it exists
                if ($jobResult->attachment && File::exists(public_path('upload/career/' . $jobResult->attachment))) {
                    File::delete(public_path('upload/career/' . $jobResult->attachment));
                }

                $uploadPath = public_path('upload/career');
                $attachmentName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                $request->file('attachment')->move($uploadPath, $attachmentName);
                $jobResult->attachment = $attachmentName;
            }
        } else {

            $jobResult = new JobResult();
            if ($request->hasFile('attachment')) {
                $uploadPath = public_path('upload/career');
                $attachmentName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                $request->file('attachment')->move($uploadPath, $attachmentName);
                $jobResult->attachment = $attachmentName;
            } else {
                return redirect()->back()->withErrors(['attachment' => 'The attachment field is required.'])->withInput();
            }
        }

        $jobResult->career_id = $request->career_id;
        $jobResult->status = $request->status;
        $jobResult->publish_date = date('Y-m-d', strtotime($request->publish_date));

        $jobResult->save();
        return redirect()->route('setup.career.job_result.view')->with('success', 'Job Result saved successfully.');
    }






    public function destroy(Request $request)
    {
    }
}
