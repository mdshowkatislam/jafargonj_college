<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Career;
use App\Models\CareerAttachment;

class CareerController extends Controller
{
    public function index()
    {
        $data['careers'] = Career::orderBy('date','desc')->get();

        return view('backend.career.view',$data);
    }

    public function Add()
    {
        // $data['categories'] = ProgramCategory::all();
    	// return view('backend.program.add',$data);
    	return view('backend.career.add');
    }

    public function Store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'title' => 'required|string|max:255',
            'status' => 'required|integer',
            'attachment' => 'required|file|mimes:pdf,doc,docx|max:4096',
        ];
        
        if ($request->submit_type != 2) {
            $additional_rules = [
                'deadline' => 'required|date|after:date',
                // 'payscale' => 'required|string|max:255',
                'job_type' => 'required|string|max:255',
                'category' => 'required|string',
                'type' => 'required|integer',
            ];
            $rules = array_merge($rules, $additional_rules);
        }
        

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $uploadPath = public_path('upload/career');

        $attachmentName = time() . '_' . $request->file('attachment')->getClientOriginalName();
        //$attachment2Name = time() . '_' . $request->file('attachment2')->getClientOriginalName();

        // Move the attachments to the specified path
        $request->file('attachment')->move($uploadPath, $attachmentName);
        //$request->file('attachment2')->move($uploadPath, $attachment2Name);

        $jobPost = new Career();
        $jobPost->title = $request->title;
        if ($request->submit_type == 2) {
            $jobPost->date = NULL;
            $jobPost->deadline = NULL;
        }else{
            $jobPost->date = date('Y-m-d',strtotime($request->date)) ?? date('Y-m-d');
            $jobPost->deadline = date('Y-m-d',strtotime($request->deadline)) ?? date('Y-m-d');
        }

        
        $jobPost->payscale = $request->payscale;
        $jobPost->location = $request->location;
        $jobPost->job_categorie_id = $request->category;

        $jobPost->hall_id = $request->hall_id;
        $jobPost->club_id = $request->club_id;
        $jobPost->office_id = $request->office_id;
        $jobPost->department_id = $request->department_id;
        $jobPost->faculty_id = $request->faculty_id;

        $jobPost->job_type = $request->job_type;
        $jobPost->mode_status = $request->mode_status;
        $jobPost->type = $request->type;
        $jobPost->status = $request->status;
        $jobPost->attachment = $attachmentName;
        //$jobPost->attachment2 = $attachment2Name;

        $jobPost->responsibilities_context = $request->responsibilities_context;
        $jobPost->additional_requirements = $request->additional_requirements;
        $jobPost->job_details = $request->job_details;
        $jobPost->compensation_benefits = $request->compensation_benefits;
        $jobPost->experience = $request->experience;
        $jobPost->education = $request->education;

        // Save the job post
        $jobPost->save();

    	return redirect()->route('setup.career.view')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Career::find($id);
    	return view('backend.career.job_post',$data);
    }

    public function Update(Request $request,$id)
    {

        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date',
            'date' => 'required|date',
        ]);

        $career = Career::findOrFail($id);


        $career->title = $request->title;
        $career->job_categorie_id = $request->category;
        $career->date = date('Y-m-d',strtotime($request->date)) ?? date('Y-m-d');
        $career->deadline = date('Y-m-d',strtotime($request->deadline)) ?? date('Y-m-d');
        $career->payscale = $request->payscale;
        $career->job_type = $request->job_type;

        // if ($request->hasFile('attachment')) {
        //     $path = $request->file('attachment')->store('attachments');
        //     $career->attachment = $path;
        // }

        // if ($request->hasFile('attachment2')) {
        //     $path2 = $request->file('attachment2')->store('attachments');
        //     $career->attachment2 = $path2;
        // }

        $career->type = $request->type;
        $career->status = $request->status;
        $career->mode_status = $request->mode_status;
        $career->responsibilities_context = $request->responsibilities_context;
        $career->additional_requirements = $request->additional_requirements;
        $career->job_details = $request->job_details;
        $career->experience = $request->experience;
        $career->education = $request->education;
        $career->location = $request->location;
        $career->save();
    	return redirect()->route('setup.career.view')->with('success','Data Updated successfully');
    }




    public function jobCircular()
    {
        return view('backend.career.job_post');
    }

    public function jobForm()
    {
        return view('backend.career.job_form');
    }
   
    public function destroy(Request $request)
    {
    	$data = Career::find($request->id);
        $data->delete();

        return redirect()->route('setup.career.view')->with('success','Data Deleted successfully');
    }

    public function careerAttachmentRemove(Request $request)
    {
        $data = CareerAttachment::find($request->id);
        @unlink(public_path('upload/career/'.$data->attachment));
        $data->delete();
        return redirect()->back()->with('info','Attachment Deleted Successfully');
    }
}
