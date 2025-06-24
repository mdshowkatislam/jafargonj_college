<?php

namespace App\Services;

use App\Models\PersonnelsToOffice;
use Illuminate\Http\Request;

/**
 * Class DeanHonorBoardService
 * @package App\Services
 */
class PersonnelsToOfficeService
{

    public function statusChangeEvent($request)
    {
        $data = PersonnelsToOffice::find($request->id);
        $data->status = $request->status;
        $data->save();
        return $data;
    }
}
