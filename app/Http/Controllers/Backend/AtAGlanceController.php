<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AtAGlanceNumber;
use App\Services\AtAGlanceService;

class AtAGlanceController extends Controller
{
    private $atAGlanceService;

    public function __construct(AtAGlanceService $atAGlanceService)
    {
        $this->atAGlanceService = $atAGlanceService;
    }
    public function index()
    {
        $data['editData'] = $this->atAGlanceService->getFirst();
        return view('backend.at_a_glance.view',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|numeric',
            'faculty_member_number' => 'required|numeric',
            'officer_number' => 'required|numeric',
            'staff_number' => 'required|numeric',
            'phd_number' => 'required|numeric',
        ]);
        $this->atAGlanceService->create($request);

        return redirect()->route('site-setting.at_a_glance')->with('success','Data Saved successfully');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'student_number' => 'required|numeric',
            'faculty_member_number' => 'required|numeric',
            'officer_number' => 'required|numeric',
            'staff_number' => 'required|numeric',
            'phd_number' => 'required|numeric',
        ]);

        $this->atAGlanceService->update($request,$id);

        return redirect()->route('site-setting.at_a_glance')->with('success','Data Update successfully');
    }
}
