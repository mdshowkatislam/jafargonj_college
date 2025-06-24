<?php

namespace App\Services;

use App\Models\LabCenter;

use Illuminate\Http\Request;
/**
 * Class LabCenterService
 * @package App\Services
 */
class LabCenterService
{
	// This function shows list of LabCenter
	
	public static function LabCenterList()
	{
		try{
			$data = LabCenter::all(); 
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}

	public static function LabCenterSingleData($id)
	{ 
        $data = LabCenter::find($id);  
        return $data; 
	}

    //Annual calendar event add
    public function saveEvent(Request $request)
    {            
        
        // dd($request->all());

        try{
            $params = $request->all();
            $params['status'] = 1;
            
            if ($file = $request->file('image')){
                $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/lab'), $filename);
                $params['image']= $filename;
            }
            // dd($params);
            LabCenter::create($params);

            return true;

        }catch(\Exception $e){
            return $e;
        }
    }    
    //Annual calendar event edit
    public function updateEvent(Request $request, $id)
    {
        $data = LabCenter::find($id);        
        $params = $request->all();
            if ($file = $request->file('image'))
            {
                @unlink(public_path('upload/lab/'.$data->image));
                $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/lab'), $filename);
                $params['image']= $filename;

            }
            
            try{
            $data->update($params);
            return true;

        }catch(\Exception $e){
            return $e;
        }
    }
    //Annual calendar event edit
    public function statusChangeEvent(Request $request)
    {
        $data = LabCenter::find($request->id);  
        $data->status = $request->status;
            $data->update();
            return true;

    }
    public function labByFaculty($ref_id)
    {
        try{
            $data = LabCenter::where('faculty_id', $ref_id)->where('status',1)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
    }
    public function labByDepartment($ref_id)
    {
        try{
            $data = LabCenter::where('department_id', $ref_id)->where('status',1)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
    }



}
