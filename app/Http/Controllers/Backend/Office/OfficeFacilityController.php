<?php

namespace App\Http\Controllers\Backend\Office;

use App\Http\Controllers\Controller;
use App\Services\OfficeService;
use Illuminate\Http\Request;

class OfficeFacilityController extends Controller
{
    private $officeService;

    public function __construct(OfficeService $officeService)
    {
        $this->officeService = $officeService;
    }

    public function index($office_id)
    {
    	$data['office'] = $this->officeService->getByID($office_id);
    	$data['facilities'] = $this->officeService->getAllFacility($office_id);
        
        return view('backend.manage_office_facility.view', $data);
    }
    
    public function Add($office_id)
    {
        $data['office'] = $this->officeService->getByID($office_id);
    	return view('backend.manage_office_facility.add', $data);
    }

    public function Store(Request $request, $office_id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'sort_order' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);
        $this->officeService->createFacility($request);
    	
    	return redirect()->route('setup.office.facility', $office_id)->with('success','Data Saved Successfully!');
    }

    public function Edit($id, $office_id)
    {
    	$data['office'] = $this->officeService->getByID($office_id);
    	$data['editData'] = $this->officeService->getFacilityByID($id);

        return view('backend.manage_office_facility.add', $data);
    }

    public function Update(Request $request, $id, $office_id)
    {
        $request->validate(['title' => 'required',
            'sort_order' => 'required|numeric',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);
        $this->officeService->updateFacility($request, $id);
    	
    	return redirect()->route('setup.office.facility', $office_id)->with('success','Data Saved Successfully!');
    }
}
