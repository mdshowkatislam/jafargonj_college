<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FormType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormTypeController extends Controller
{
    public function index()
    {
        $data['formType'] = FormType::get();

        return view('backend.form_type.view', $data);
    }

    public function add()
    {
    	return view('backend.form_type.add');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'status' => 'required',
        ], [
            'title.regex' => 'Title field should only contain character',
        ]);

        DB::beginTransaction();
        try {
            $formType = new FormType();
            $formType->title = $request->title;
            $formType->status = $request->status;
            $formType->description = $request->description;
            $formType->save();
            DB::commit();
            return redirect()->route('setup.form_type')->with('success', 'Form Type Added Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('setup.form_type')->with('success', 'Something Went Wrong!');
        }
    }

    public function edit($id)
    {
        $data['editData'] = FormType::find($id);
        // dd($data['editData']);
        return view('backend.form_type.edit', $data);

    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s.\-()]+$/',
            'status' => 'required',
        ], [
            'title.regex' => 'Title field should only contain character',
        ]);

        DB::beginTransaction();
        try {
            $formType = FormType::findOrFail($id);
            $formType->title = $request->title;
            $formType->status = $request->status;
            $formType->description = $request->description;
            $formType->update();
            DB::commit();
            return redirect()->route('setup.form_type')->with('success', 'Form Type Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('setup.form_type')->with('success', 'Something Went Wrong !');
        }

    }
}
