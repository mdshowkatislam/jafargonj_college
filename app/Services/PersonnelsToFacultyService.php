<?php
namespace App\Services;

use App\Models\PersonnelsToFaculty;
use Illuminate\Http\Request;
/**
 * Class DeanHonorBoardService
 * @package App\Services
 */
class PersonnelsToFacultyService
{

    public function statusChangeEvent(Request $request)
    {
        $data = PersonnelsToFaculty::find($request->id);
        //DD('HERE') ;
        $data->status = $request->status;
        $data->save();
        return $data;
    }

    public  function faculty_members($data = ['faculty_id'=>null])
	{
        $where = [];
        if(@$data['faculty_id']){
            $where[] = ['faculty_id','=',$data['faculty_id']];
        }
       $faculty_members = PersonnelsToFaculty::with('profile', 'faculty')->where($where)->where('status', 1)->orderBy('sort_order', 'asc')->get();
       return $faculty_members;
	}
    public function departmentMembers($department_id)
	{
        // dd($department_id);
        $where = [];
        if(@$department_id){
            $where[] = ['department_id','=', $department_id];
        }
       $department_members = PersonnelsToFaculty::with('profile', 'department')->where($where)->where('status', 1)->orderBy('sort_order', 'asc')->get();
       return $department_members;
	}


}
