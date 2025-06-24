<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\SliderMaster;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HallController extends Controller
{

    public function index()
    {
    	$data['hall']= Hall::with('provostProfile')->get();
        return view('backend.manage_hall.view',$data);
    }


    public function Add()
    {
        $data['sliderMaster'] = SliderMaster::get();
        $data['provost']=Profile::get();
    	return view('backend.manage_hall.add', $data);
    }

    public function Store(Request $request)
    {

        $request->validate([
          'hall_name'=>'required',
          'provost'=>'required',
        //   'location'=>'required',
          'slider_id'=>'required',

        ]);

    	$data = new Hall();
        $data->name = $request->hall_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->location = $request->location;
        $data->slider_id = $request->slider_id;
        $data->sort_order = $request->sort_order;
        $data->provost = $request->provost;
        $data->status = $request->status;
        $data->short_url = $request->short_url;
        $data->about_text = $request->about_text;

        if ($file = $request->file('image')) {
            $filename = 'Hall_'.date('Ymd'). time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/hall'), $filename);
            $data->image = $filename;
        }
        if ($file = $request->file('disciplinary_image')) {
            $filename = 'Act_'.date('Ymd'). time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/hall'), $filename);
            $data->disciplinary_image = $filename;
        }

        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Hall Created', $created_by = Auth::id());
        }

    	return redirect()->route('setup.manage_hall')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = Hall::find($id);
        $data['slider_master'] = SliderMaster::get();
        $data['provost']= Profile::get();
        //dd($data);
    	return view('backend.manage_hall.edit',$data);
    }

    public function Update(Request $request,$id)
    {
        //dd($request->all());
    	$data = Hall::find($id);
        $data->name = $request->hall_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->location = $request->location;
        $data->slider_id = $request->slider_id;
        $data->sort_order = $request->sort_order;
        $data->provost = $request->provost;
        $data->status = $request->status;
        $data->short_url = $request->short_url;
        $data->about_text = $request->about_text;

        if ($file = $request->file('image')) {
            if ($data->image && file_exists(public_path('upload/hall/' . $data->image))) {
                unlink(public_path('upload/hall/' . $data->image));
            }
            // Save the new image
            $filename = 'Hall_'.date('Ymd'). time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/hall'), $filename);
            $data->image = $filename;
        }
    
        if ($file = $request->file('disciplinary_image')) {
            // Delete the old disciplinary image if it exists
            if ($data->disciplinary_image && file_exists(public_path('upload/hall/' . $data->disciplinary_image))) {
                unlink(public_path('upload/hall/' . $data->disciplinary_image));
            }
            // Save the new disciplinary image
            $filename = 'Act_'.date('Ymd'). time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/hall'), $filename);
            $data->disciplinary_image = $filename;
        }

        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Hall Updated', $created_by = Auth::id());
        }

    	return redirect()->route('setup.manage_hall')->with('success','Data Updated successfully');
    }




}
