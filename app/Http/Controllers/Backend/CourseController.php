<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseObjective;
use App\Models\CourseOutcome;
use App\Models\CourseReference;
use App\Services\Course\CourseService;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $programService;
    private $courseService;

    public function __construct(ProgramService $programService, CourseService $courseService)
    {
        $this->programService = $programService;
        $this->courseService = $courseService;
    }
    public function courseFromApi()
    {
        $clientdata = $this->courseService->getApiCourseData();
        // dd($clientdata);
        return view('backend.course.from_api.view', compact('clientdata'));
    }

    public function storeCourseFromApi()
    {
        Course::truncate();
        CourseObjective::truncate();
        CourseOutcome::truncate();
        CourseReference::truncate();

        $this->courseService->storeApiCourseData();
        return redirect()->back()->with('success','Data Inserted Successfully');
    }

    public function index()
    {
        $data['courses'] = $this->courseService->getAll();
        
        return view('backend.course.view', $data);
    }
}
