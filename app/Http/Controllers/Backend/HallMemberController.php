<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\HallMember;
use App\Models\Hall;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HallMemberController extends Controller
{

    public function index($id)
    {
        $data['hall_id']=$id;
        $data['hallName']= Hall::get();
        $data['members_list'] = HallMember::with('member')->where('hall_id', $id)->orderBy('sort_order', 'asc')->get();
        //dd($data);
    	return view('backend.manage_hall_member.list', $data);
    }


    public function memberWiseHall(Request $request)
    {
        $profile = Profile::where('personnel_type',$request->type_id)->get();
        return $profile;
        if(isset($profile)){
            return response()->json($profile);
        }
        else
        {
            return response()->json('fail');
        }

    }



    public function Store(Request $request)
    {
    	$data = new HallMember();
        $data->hall_id = $request->hall_id;
        $data->type_id = $request->type_id;
        $data->sort_order = $request->sort_order;
        $data->member_id = $request->member_id;
        $data->status = $request->status;
        $data->designations            = $request->designations;
        $data->additional_charge       = $request->additional_charge;
        $data->additional_designation  = $request->additional_charge;
        $data->save();
        //return back()->with('success','Data Saved successfully');
    	return redirect()->route('setup.manage_hall_member',$data->hall_id)->with('success','Data Saved successfully');
    	//return redirect()->route('setup.manage_hall_member.add')->with('success','Data Saved successfully');
    }

   

    public function add(Request $request, $id)
    {

        $data['hall_id'] = $id;
        return view('backend.manage_hall_member.add', $data);
    }

    public function Edit($id)
    {
        $data['hall_id'] = $id;
        $data['profiles']= Profile::get();
        $data['hallEdit']= HallMember::find($id);

        return view('backend.manage_hall_member.edit', $data);
    }

    public function Update(Request $request,$id)
    {
    	$data = HallMember::find($id);

        $data->hall_id = $request->hall_edit_id;
        $data->type_id = $request->type_id;
        $data->sort_order = $request->sort_order;
        $data->member_id = $request->member_id;
        $data->status = $request->status;
        $data->designations            = $request->designations;
        $data->additional_charge       = $request->additional_charge;
        $data->additional_designation  = $request->additional_designation;

        $data->update();
        return redirect()->route('setup.manage_hall_member',$request->hall_edit_id)->with('success','Data Saved successfully');
    	//return redirect()->route('setup.manage_hall')->with('success','Data Updated successfully');
       // return redirect()->route('setup.manage_hall_member.edit',$data->hall_id)->with('success','Data Updated successfully');
        //return back()->with('success','Data Updated successfully');
    }
    
    public function memberDelete(Request $request)
    {

        $data = HallMember::findOrFail($request->id);
        $result = $data->delete();
        if($result){
            return back()->with('success','Data Updated successfully');
        }else{
            return back()->with('error','Data Updated Failed');
        }
        
    }


 




}
