<?php

namespace App\Services;

use App\Models\Office;
use App\Models\OfficeFacility;
use Illuminate\Http\Request;
/**
 * Class OfficeService
 * @package App\Services
 */
class OfficeService implements IService
{
	/**
     * Get all data
     * @return mixed
     */
    public function getAll()
	{
        $data = Office::where('status', 1)->get(); 
        return $data;
	}
	
    /**
     * Create a new data
     * @param Request $data 
     * @return mixed
     */
    public function create(Request $data)
	{

	}

    /**
     * Update a data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    public function update(Request $data,$id)
	{

	}

    /**
     * Delete a data
     * @param $id
     * @return mixed
     */
    public function delete($id)
	{}
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
	{
		$data = Office::findOrFail($id);
        
        return $data; 
	}

	public static function ExistCheck($id, $name)
	{
			$data = Office::where('ucam_office_id', $id)->first();
			if(!is_null($data)){
			    return $data->id;
            }else{

                $data = new Office();
                $data->ucam_office_id = $id;
                $data->name = $name;
                $data->save();
                
			    return $data->id;
            }
	}


    // Facility

    /**
     * Get all facility data
     * @return mixed
     */
    public function getAllFacility($office_id)
	{
        $data = OfficeFacility::where('status', 1)->where('office_id', $office_id)->orderBy('sort_order', 'asc')->get(); 
        return $data;

	}

        /**
     * Create a new facility data
     * @param Request $data 
     * @return mixed
     */
    public function createFacility(Request $request)
	{
        $data = new OfficeFacility();
        $data->office_id = $request->office_id;
        $data->title = $request->title;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
        $data->description = $request->description;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/office_facility'), $imageName);
            $data->image = $imageName;
        }
        $data->save();

        return true;
	}
    /**
     * Get a facility data by id
     * @param $id
     * @return mixed
     */
    public function getFacilityByID($id)
	{
		$data = OfficeFacility::findOrFail($id);
        
        return $data; 
	}

        /**
     * Update a facility  data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    public function updateFacility(Request $request,$id)
	{
        $data = OfficeFacility::findOrFail($id);
        $data->office_id = $request->office_id;
        $data->title = $request->title;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
        $data->description = $request->description;

        if ($request->image) {
            @unlink(public_path('upload/office_facility/' . $data->image));
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/office_facility'), $imageName);
            $data->image = $imageName;
        }

        $data->save();

        return true;
	}
}
