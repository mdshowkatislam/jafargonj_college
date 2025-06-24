<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\ConferenceMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceMemberController extends Controller
{
    public function index()
    {
    	$data['allData'] = ConferenceMember::all();
    	return view('backend.homepage.conference.index',$data);
    }

    public function Add()
    {
    	return view('backend.homepage.conference.add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

    	$data = new ConferenceMember();
        $data->member_type = $request->member_type;
        $data->member_name = $request->member_name;
        $data->designation_1 = $request->designation_1;
        $data->designation_2 = $request->designation_2;
        $data->designation_3 = $request->designation_3;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->description = $request->description;

    	$img = $request->file('image');

        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('uploads/conference/', $imgName);
            // $img = Image::make(public_path('upload/slider_images/').$imgName);
            // $img->resize(1140,292)->save(public_path('upload/slider_images/').$imgName);
            $data['image'] = $imgName;
        }

       // $data->created_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('conferences.member')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = ConferenceMember::find($id);
    	return view('backend.homepage.conference.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png'
        ]);

    	$data = ConferenceMember::find($id);
        $data->member_type = $request->member_type;
        $data->member_name = $request->member_name;
        $data->designation_1 = $request->designation_1;
        $data->designation_2 = $request->designation_2;
        $data->designation_3 = $request->designation_3;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->description = $request->description;

    	$img = $request->file('image');

        if ($img) {
            @unlink(public_path('upload/slider_images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('uploads/conference/', $imgName);
            // $img = Image::make(public_path('upload/slider_images/').$imgName);
            // $img->resize(1600,900)->save(public_path('upload/slider_images/').$imgName);
            $data['image'] = $imgName;
        }

        //$data->updated_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('conferences.member')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = ConferenceMember::find($request->id);

    	if (file_exists('uploads/conference/' . $data->image) AND ! empty($data->image)) {
            unlink('uploads/conference/' . $data->image);
        }
        
        $data->delete();

        return redirect()->route('conferences.member')->with('success','Data Deleted successfully');
    }
}
