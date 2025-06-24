<?php

namespace App\Services;

use App\Models\CpcSection;
use App\Models\Office;
use Illuminate\Http\Request;

/**
 * Class CpcServices
 * @package App\Services
 */
class CpcServices
{
    public function saveData(Request $data)
    {
        return $data;
    }
    public function cpcSection($id)
    {
        $data = CpcSection::where('cpc_id', $id)->where('status', 1)->orderBy('sort_order', 'asc')->get();
        return $data;
    }

    public function getCpcFromOffice()
    {
        $data = Office::where('name', 'like', '%cpc%')->first();
        return $data;
    }





}
