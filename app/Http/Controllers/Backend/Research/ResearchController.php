<?php

namespace App\Http\Controllers\Backend\Research;

use app\Http\Controllers\Controller;
use App\Models\Designation;
use App\Services\DepartmentService;
use App\Services\FacultyService;
use App\Services\Profile\ProfileService;
use App\Services\PublicationStatusService;
use App\Services\Research\ResearchService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ResearchController extends Controller
{
    private $researchService;
    private $DepartmentService;
    private $facultyService;
    private $profileService;
    private $publicationStatusService;

    public function __construct(ResearchService $researchService, DepartmentService $DepartmentService, FacultyService $facultyService, ProfileService $profileService, PublicationStatusService $publicationStatusService)
    {
        $this->researchService = $researchService;
        $this->DepartmentService = $DepartmentService;
        $this->facultyService = $facultyService;
        $this->profileService = $profileService;
        $this->publicationStatusService = $publicationStatusService;
    }
    public function index()
    {
        $data['researches'] = $this->researchService->getAll();
        return view('backend.research.list')->with($data);
    }

    public function add()
    {
        $data['faculties'] = $this->facultyService->getAll();
        $data['departments'] = $this->DepartmentService->getAll();
        $data['profiles'] = $this->profileService->getAll();
        $data['statuses'] = $this->publicationStatusService->getAll();
        return view('backend.research.add', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'max:2048|mimes:jpg,png,jpeg',
            'file.*' => 'max:20000|mimes:pdf,doc,docx',
            'attachment' => 'max:2048|mimes:pdf,doc,docx',
            'year' => 'required',
            'research_type' => 'required',
            'research_for' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);
        
        if ($request->has('date') && is_null($request->input('date'))) {
            $request->merge(['date' => Carbon::now()->format('d-m-Y')]);
        }

        $this->researchService->create($request);

        return redirect()->route('news.research')->with('success', 'Stored successfully!');
    }

    public function edit($id)
    {
        $data['editData'] = $this->researchService->getByID($id);
        $data['files'] = $this->researchService->filesByResearch($data['editData']->id);
        $data['faculties'] = $this->facultyService->getAll();
        $data['departments'] = $this->DepartmentService->getAll();
        $data['profiles'] = $this->profileService->getAll();
        $data['statuses'] = $this->publicationStatusService->getAll();
        return view('backend.research.add')->with($data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'max:2048|mimes:jpg,png,jpeg',
            'file.*' => 'max:20000|mimes:pdf,doc,docx',
            'attachment' => 'max:2048|mimes:pdf,doc,docx',
            'year' => 'required',
            'research_type' => 'required',
            'research_for' => 'required',
            'title' => 'required',
            'status' => 'required'
        ]);
        // dd($request->all());
        if ($request->has('date') && is_null($request->input('date'))) {
            $request->merge(['date' => Carbon::now()->format('d-m-Y')]);
        }
        $this->researchService->update($request, $id);

        return redirect()->route('news.research')->with('info', 'Updated successfully!');
    }
}
