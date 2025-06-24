<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

use App\Models\LabCenter;
use App\Services\LabCenterService;

class LabCenterController extends Controller
{
    

    public function index()
    {
        $allData = LabCenterService::LabCenterList();
        // dd($allData);
        return view('backend.lab_center.index', compact('allData'));
    }
    public function addlab()
    {
        $data = [];
        $data['gallery_categories'] = GalleryCategory::all();
        // dd($data['gallery_categories']);
        return view('backend.lab_center.add',$data);
    }
    public function store(Request $request, LabCenterService $LabCenter)
    {
    // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'faculty_id' => 'required',
            'department_id' => 'required',
            'gallery_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $LabCenter->saveEvent($request);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center add Successfully');
    }
    public function edit($id)
    {
        
        $editData = LabCenterService::LabCenterSingleData($id);
        // dd($editData->gallery_id);
        $gallery_categories = GalleryCategory::all();

        return view('backend.lab_center.add', compact('editData', 'gallery_categories'));
    }

    public function update(Request $request, $id, LabCenterService $LabCenter)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'faculty_id' => 'required',
            'department_id' => 'required',
            'gallery_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        $LabCenter->updateEvent($request, $id);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center edit Successfully');
    }

    public function status_change(Request $request, LabCenterService $LabCenter)
    {

        $LabCenter->statusChangeEvent($request);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center Status Update Successfully');
    }
}
