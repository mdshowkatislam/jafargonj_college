<?php

namespace App\Http\Controllers\Frontend\Procurement;

use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Procurement;
use App\Services\ProcurementService\ProcurementService;
use App\Services\BannerService;

class ProcurementController extends Controller
{

    private $procurementService;
    private $bannerService;
    
    public function __construct(ProcurementService $ProcurementService, BannerService $bannerService)
    {
        $this->procurementService = $ProcurementService;
        $this->bannerService      = $bannerService;
    }

    public function procurement()
    {
        $data['procurement'] = $this->procurementService->getAll();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.procurement.procurement', $data);
    }

    public function procurementSingle($id)
    {
        $data['procurementSingle'] = $this->procurementService->getSingle($id);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.procurement.procurementSingle', $data);
    }
}
