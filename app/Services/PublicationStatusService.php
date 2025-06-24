<?php

namespace App\Services;

use App\Models\PublicationStatus;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class PublicationStatusService
 * @package App\Services
 */
class PublicationStatusService implements IService
{

    public function getAll()
    {
        $data = PublicationStatus::where('status',1)->orderBy('sort_order', 'asc')->get();
        return $data;
    }

    public function getByID($id)
    {
        $data = PublicationStatus::find($id);
        return $data;
    }
    
    public function create(Request $request)
    {
    }

    // 
    public function update( Request $request,$id)
    {
        try{

        }catch(Exception $e){
            return $e;
        }
    }

    public function delete($id)
    {
    }

}
