<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobCategoryController extends Controller
{
    public function index()
    {
        $data['jobCategories'] = JobCategory::all();
        return view('backend.career.job-category.index',$data);
    }

    public function Add()
    {
        return view('backend.career.job-category.add');
    }

    public function Store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'title' => 'required|string|max:255',
            'status' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $jobPost = new JobCategory();
        $jobPost->title = $request->title;
        $jobPost->slug = Str::slug($request->title);
        $jobPost->status = $request->status;
        $jobPost->save();
    	
    	return redirect()->route('setup.job-categories.view')->with('success','Data Saved successfully');
    }

    public function edit($id)
    {
        $data['editData'] = JobCategory::find($id);
    	return view('backend.career.job-category.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);
        $data = JobCategory::find($id);
        $data->title = $request->title;
        $data->status = $request->status;
        $data->update();
    	return redirect()->route('setup.job-categories.view')->with('success','Data Updated successfully');
    }

    
    public function destroy(Request $request)
    {
        $id = $request->id;
        $jobCategory = JobCategory::findOrFail($id);
        $jobCategory->delete();

        return redirect()->route('setup.job-categories.index')
                         ->with('success', 'Job Category deleted successfully.');
    }


}
