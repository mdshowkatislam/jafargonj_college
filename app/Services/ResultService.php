<?php

namespace App\Services;

use App\Models\AcademicResult;
use Illuminate\Http\Request;

/**
 * Class ResultService
 * @package App\Services
 */
class ResultService
{
    public static function List()
	{
		try{
			$data = AcademicResult::where('status', 1)->latest()->get(); 
 
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
	public static function SingleData($id)
	{ 
			$data = AcademicResult::find($id);  
			
			return $data; 
	}
    public function getByYear($year)
    {
         $data =  AcademicResult::where('status', 1)->where('year' , $year)->latest()->get();
         return $data;
    }

    public function getBySession($session)
    {
         $data =  AcademicResult::where('status', 1)->where('session', 'like', '%' . $session . '%')->latest()->get();
         return $data;
    }
    public function getByProgramCategory($ref_id)
    {
        $data = AcademicResult::where('status', 1)->whereHas('program', function ($query) use ($ref_id) {
            $query->where('program_category_id', $ref_id);
        })->latest()->get();
         return $data;
    }

}
