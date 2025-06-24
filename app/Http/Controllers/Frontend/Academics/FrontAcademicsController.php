<?php

namespace App\Http\Controllers\Frontend\Academics;

use App\Models\Faculty;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\ProgramCategory;
use App\Services\BannerService;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Services\Course\CourseService;
use App\Services\NewsEventNoticeServices;
use App\Services\Program\ProgramService;

class FrontAcademicsController extends Controller
{
    private $programService;
    private $courseService;
    private $bannerService;
    private $NewsEventNoticeServices;

    public function __construct(ProgramService $programService, CourseService $courseService, BannerService $bannerService, NewsEventNoticeServices $NewsEventNoticeServices)
    {
        $this->programService = $programService;
        $this->courseService = $courseService;
        $this->bannerService = $bannerService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
    }

    public function index()
    {
        $data['programs'] = $this->programsInfo();
        $data['program_categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['banner']  = $this->bannerService->bannerByRefId(1);
        $data['notices'] = $this->NewsEventNoticeServices->getProgramsNotice(3, 15);
        //dd($data);
        return view('frontend.academics.index', $data);
    }

    public function academics_details($id)
    {
        $data['info'] = Program::join('program_categories','program_categories.id','program_category_id')
        ->join('faculties','faculties.id','faculty_id')
        ->join('departments','departments.id','department_id')
        ->select('programs.*','faculties.name as fname','departments.name as dname','program_categories.program_category as pcname')
        ->where('programs.id', $id)->first();

        $data['program_categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();

        $data['courses'] = $this->courseService->programWiseCourse($data['info']->id);
        $data['news'] = News::where('program_id', $data['info']->id)->where('type', 1)->where('is_approved', 1)->orderBy('date', 'DESC')->get();
        $data['events'] = News::where('program_id', $data['info']->id)->where('type', 2)->where('is_approved', 1)->orderBy('date', 'DESC')->get();
        $data['notices'] = News::where('program_id', $data['info']->id)->where('type', 3)->where('is_approved', 1)->orderBy('date', 'DESC')->paginate(10);
        $data['faqs'] = Faq::where('faq_type', 3)->where('ref_id', $data['info']->id)->get();

        $data['banner'] = $this->bannerService->bannerByRefId(1);
        session(['deprt_id' => $data['info']->department_id]);
        return view('frontend.academics.academics_details_new', $data);
    }
    public function filterProgramNotices(Request $request)
    {
        $type = $request->get('type', 'all');  // Get the selected filter value or default to 'all'
        $programId = $request->get('program_id');
        // Filter notices based on the selected type
        if ($type == '') {
            $notices = News::where('program_id', $programId)->where('type', 3)->where('is_approved', 1)->orderBy('date', 'DESC')->paginate(10);  // Default to 'All' notices
        } else {
            $notices = News::where('program_id', $programId)->where('type', 3)->where('category', $type)->where('is_approved', 1)->orderBy('date', 'DESC')->paginate(10);
        }
        
        // Return the rendered HTML for the updated notices list
        return view('frontend.academics.partials.academics_notices', compact('notices'));
    }


    public function academics_admission_details($id)
    {
        $data['info'] = Program::join('program_categories','program_categories.id','program_category_id')
        ->join('faculties','faculties.id','faculty_id')
        ->join('departments','departments.id','department_id')
        ->select('programs.*','faculties.name as fname','departments.name as dname','program_categories.program_category as pcname')
        ->where('programs.id', $id)->first();
        $data['program_categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['courses'] = $this->courseService->programWiseCourse($data['info']->id);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.academics.admission_details', $data);
    }

    public function academics_srch(Request $request)
    {
        $query = Program::leftJoin('program_categories', 'program_categories.id', 'programs.program_category_id')
            ->leftJoin('faculties', 'faculties.id', 'programs.faculty_id')
            ->leftJoin('departments', 'departments.id', 'programs.department_id')
            ->select('programs.*', 'program_categories.program_category', 'departments.name');

        // Apply filters
        if ($request->program != null) {
            $query->where('programs.program_category_id', $request->program);
        }

        if ($request->faculty != null) {
            $query->where('programs.faculty_id', $request->faculty);
        }

        // Get paginated results
        $data['programs'] = $query->paginate(9); // 9 items per page
        
        if($request->program != null) {
            $data['notices'] = News::where('type', 3)->where('category', 4)->where('program_category_id', $request->program)->where('is_approved', 1)->orderBy('date', 'DESC')->take(10)->get();
        } else {
            $data['notices'] = News::where('type', 3)->where('category', 4)->where('is_approved', 1)->orderBy('date', 'DESC')->take(10)->get();
        }
        // if($request->program != null) {
        //     if($request->faculty != null){
        //         $data['faq'] = Faq::where('faq_type', 1)->orWhere('faq_type', 2)->orWhere('faq_type', 3)->where('status', 1)->latest()->get();
        //     }
        //     $data['faq'] = Faq::where('faq_type', 3)->where('status', 1)->latest()->get();
        // }
        $data['faq'] = Faq::where('faq_type', 3)->where('status', 1)->get();
        //dd($request->faculty);
        return response()->json($data);

    }
    public function academicsId_srch(Request $request)
    {
        // if($request->faculty != null && $request->department != null)
        // {
            $data['programs'] = Program::leftJoin('program_categories','program_categories.id', 'programs.program_category_id')
                ->leftJoin('faculties', 'faculties.id', 'programs.faculty_id')
                ->leftJoin('departments', 'departments.id', 'programs.department_id')
            ->select('programs.*', 'program_categories.program_category')
                ->where('program_category_id', $request->program_category_id)
                ->where('programs.status', 1)
                ->when($request,function($query,$request){
                    if($request->faculty != null){
                        $query->where('programs.faculty_id', $request->faculty);
                    }
                })
                ->when($request,function($query,$request){
                    if($request->department != null){
                        $query->where('programs.department_id', $request->department);
                    }
                })
        ->get();
        // }
        // if($request->department != null)
        // {
        //     $data['programs'] = Program::leftJoin('program_categories','program_categories.id', 'programs.program_category_id')
        //         ->leftJoin('faculties', 'faculties.id', 'programs.faculty_id')
        //         ->leftJoin('departments', 'departments.id', 'programs.department_id')
        //         ->select('programs.*', 'program_categories.program_category')
        //         ->where('program_category_id', $request->program_category_id)
        //         ->when($request,function($query,$request){
        //             if($request->faculty != null){
        //                 $query->where('programs.faculty_id', $request->faculty);
        //             }
        //         })
        //         ->get();
        // }
        // else
        // {
        //     $data['programs'] = Program::leftJoin('program_categories','program_categories.id', 'programs.program_category_id')
        //         ->leftJoin('faculties', 'faculties.id', 'programs.faculty_id')
        //         ->leftJoin('departments', 'departments.id', 'programs.department_id')
        //         ->select('programs.*', 'program_categories.program_category')
        //         ->where('program_category_id', $request->program_category_id)
        //         ->get();
        // }

        //dd($request->faculty);
        return response()->json($data['programs']);

    }

    private function programsInfo()
    {
        $details = Program::join('program_categories','program_categories.id','program_category_id')
        ->select('programs.*','program_categories.program_category')
        ->get();
        return $details;
    }

    public function programCategoryWiseProgram($id)
    {
        $data['category'] = ProgramCategory::findOrFail($id);
        $data['programs'] = Program::join('program_categories','program_categories.id','program_category_id')
        ->select('programs.*','program_categories.program_category')
        ->where('program_category_id', $id)
        ->where('status', 1)
        ->whereHas('faculty', function ($query){
            $query->orderBy('faculty_id', 'asc');
        })
        ->get();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.academics.single_program', $data);
    }
    public function programCategoryWiseProgramAdmission($id)
    {
        $data['category'] = ProgramCategory::findOrFail($id);
        $data['programs'] = Program::join('program_categories','program_categories.id','program_category_id')
        ->select('programs.*','program_categories.program_category')
        ->where('program_category_id', $id)
        ->where('status', 1)
        ->whereHas('faculty', function ($query){
            $query->orderBy('faculty_id', 'asc');
        })
        ->get();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.academics.admission_single_program', $data);
    }

}
