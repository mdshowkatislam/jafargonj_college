<?php

namespace App\Http\Controllers\Backend;

use App\Services\DeanStaffListService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeanInformation;
use App\Services\Profile\ProfileService;

class DeanStaffListController extends Controller
{
    private $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index($id)
    {
        $data['faculty_id'] = $id;
        // $data['dean_info'] = DeanInformation::where('id',$id)->first();
        $data['allData'] = DeanStaffListService::List($id);
        return view('backend.dean_office.dean_staff_list.index')->with($data);
    }

    public function add($id)
    {
        $data = [];
        $data['faculty_id'] = $id;
        $data['members'] = $this->profileService->getAll();
        return view('backend.dean_office.dean_staff_list.add',$data);
    }
    public function store(Request $request, DeanStaffListService $DeanInformation)
    {
        // dd($request->all());
        $request->validate([
        ]);
        $DeanInformation->saveEvent($request);
        return redirect()->route('dean-office.staff_list', $request->faculty_id)->with('success', 'add Successfully');
    }
    public function edit($id,$faculty_id)
    {
        $data['faculty_id'] = $faculty_id;
        $data['members'] = $this->profileService->getAll();
        $data['editData'] = DeanStaffListService::SingleData($id);
    	return view('backend.dean_office.dean_staff_list.add')->with($data);
    }

    public function update(Request $request, $id, DeanStaffListService $DeanInformation)
    {
        $request->validate([
        ]);
        //  dd($request->all());
        $DeanInformation->updateEvent($request, $id);

        return redirect()->route('dean-office.staff_list', $request->faculty_id)->with('info','Update Successfully');
    }
    public function status_change(Request $request, DeanStaffListService $DeanInformation)
    {

        $DeanInformation->statusChangeEvent($request);
        return redirect()->route('dean-office.information')->with('success', 'Status Update Successfully');
    }
}
