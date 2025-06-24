<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\ChsrResearchArea;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Faculty;
use App\Services\FacultyService;

class ChsrResearchAreaController extends Controller
{

    private $facultyService;
    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        $data['chsrResearchAreaList'] = ChsrResearchArea::with('faculty')->get();
        //dd($data['chsrResearchAreaList']);
        return view('backend.chsr-research-area.list', $data);
    }

    public function add()
    {

        $data['faculties'] = $this->facultyService->allActiveFaculty();
        // $data['faculties'] = Faculty::whereNotIn('id', [5,8,9])->get();
        return view('backend.chsr-research-area.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data                       = new ChsrResearchArea();
        $data->faculty_id           = $request->faculty_id;
        $data->description          = $request->description;
        $data->status               = $request->status;
        $data->save();
        return redirect()->route('chsr.manage_research_area')->with('success', 'Data Saved successfully');
    }


    public function edit($id)
    {
        $data['editData'] = ChsrResearchArea::find($id);
        $data['faculties'] = Faculty::get();
        return view('backend.chsr-research-area.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data                       = ChsrResearchArea::find($id);
        $data->faculty_id           = $request->faculty_id;
        $data->description          = $request->description;
        $data->status               = $request->status;
        $data->save();
        return redirect()->route('chsr.manage_research_area')->with('success', 'Data Updated successfully');
    }

    public function delete(Request $request)
    {
        $data = ChsrResearchArea::find($request->id);
        $data->delete();
        return redirect()->route('chsr.manage_research_area')->with('success', 'Data Deleted successfully');
    }
}
