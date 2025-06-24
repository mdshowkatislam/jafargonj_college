<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mou;
use Illuminate\Http\Request;

class MouController extends Controller
{
    //
    public function index()
    {
        $data['mous'] = Mou::all();
        return view('backend.oefcd.mou.list', $data);
    }

    public function create()
    {
       
        return view('backend.oefcd.mou.add');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'institute_type' => 'required',
            'name' => 'required',
            'country' => 'required'
        ], [
            'name.required' => 'Name is required',
        ]);

        $data = new Mou();
        $data->institute_type = $request->institute_type;
        $data->name = $request->name;
        $data->country = $request->country;
        $data->signature = $request->signature;
        $data->date = date('Y-m-d', strtotime($request->date)) ?? date('Y-m-d');
        $data->status = $request->status ?? 0;

        $data->save();

        return redirect()->route('oefcd.mou.list')->with('success', 'MoU Added Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Mou::findOrFail($id);
    
        return view('backend.oefcd.mou.add', $data);
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
         
        $request->validate([
            'institute_type' => 'required',
            'name' => 'required',
            'country' => 'required'
        ], [
            'name.required' => 'Name is required',
        ]);

        $data = Mou::find($id);
        $data->name = $request->name;
        $data->institute_type = $request->institute_type;
        $data->country = $request->country;
        $data->signature = $request->signature;
        $data->date = date('Y-m-d', strtotime($request->date)) ?? date('Y-m-d');
        $data->status = $request->status ?? 0;

        $data->save();

        return redirect()->route('oefcd.mou.list')->with('info', 'MoU Updated Successfully!');
    }
}
