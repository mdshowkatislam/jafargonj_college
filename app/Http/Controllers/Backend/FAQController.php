<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppConfig;
use App\Models\AssignToClub;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;
use App\Models\Faq;
use App\Models\Office;
use App\Models\UserRole;
use App\Services\TypeService;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    private $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    public function index()
    {

        $user = Auth::user();

        if ($user->id == 1) {
            // Admin
            $data['faq_lists'] =  Faq::latest()->get();
        } else {
            $user_role = UserRole::where('user_id', $user->id)->first();

            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & FAQ Type is 8
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_club) {
                        $club_ids = $assign_club->pluck('club_id')->toArray();
                        $data['faq_lists'] =  Faq::where('faq_type', 8)->whereIn('ref_id', $club_ids)->latest()->get();
                    }else{
                        $data['faq_lists'] =  collect();
                    }

                    break;
                case '8':
                    // CPC Role = 8 & FAQ Type is 7
                    $office = Office::where('name', 'like', '%cpc%')->first();
                    $data['faq_lists'] =  Faq::where('faq_type', 7)->where('ref_id', $office->id)->latest()->get();
                    break;

                case '10':
                    // IQAC Role = 10 & FAQ Type is 7
                    $office = Office::where('name', 'like', '%iqac%')->first();
                    $data['faq_lists'] =  Faq::where('faq_type', 7)->where('ref_id', $office->id)->latest()->get();
                    break;

                case '11':
                    // OEFCD Role = 11 & FAQ Type is 7
                    $office = Office::where('name', 'like', '%oefcd%')->first();
                    $data['faq_lists'] =  Faq::where('faq_type', 7)->where('ref_id', $office->id)->latest()->get();
                    break;

                default:
                    $data['faq_lists'] = collect();
                    break;
            }
        }

        return view('backend.faq.view', $data);
    }

    public function Add()
    {
        $user = Auth::user();

        $clubs   = Club::where('status', 1);
        $offices = Office::where('status', 1);

        if ($user->id == 1) {
            // Admin
            $data['faq_types'] = $this->typeService->typeList('category');
        } else {
            $user_role = UserRole::where('user_id', $user->id)->first();

            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & FAQ Type is 8
                    $data['faq_types'] = $this->typeService->single('category', 8);
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_club) {
                        $club_ids = $assign_club->pluck('club_id')->toArray();
                        $data['clubs'] = $clubs->whereIn('id', $club_ids);
                    }
                    break;
                case '8':
                    // CPC Role = 10 & FAQ Type is 5
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $office = Office::where('name', 'like', '%cpc%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;
                case '10':
                    // IQAC Role = 10 & FAQ Type is 7
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $office = Office::where('name', 'like', '%iqac%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;

                case '11':
                    // OEFCD Role = 11 & FAQ Type is 8
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $office = Office::where('name', 'like', '%oefcd%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;

                default:
                    $data['faq_types'] = collect();
                    break;
            }
        }

        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);
        $data['clubs']          = $clubs->get(['id', 'name']);
        $data['offices']        = $offices->get(['id', 'name']);
        $data['programs']       = Program::where('status', 1)->get(['id', 'program_title']);

        return view('backend.faq.add')->with($data);
    }

    public function Store(Request $request)
    {

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);


        $faq = new Faq();
        $faq->faq_type = $request->faq_type;
        switch ($request->faq_type) {
            case '1':
                $faq->ref_id = $request->faculty_id;
                break;
            case '2':
                $faq->ref_id = $request->dept_id;
                break;
            case '3':
                $faq->ref_id = $request->program_id;
                break;
            case '7':
                $faq->ref_id = $request->office_id;
                break;
            case '8':
                $faq->ref_id = $request->club_id;
                break;
            default:
                $faq->ref_id = null;
                break;
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status ?? 0;

        $faq->save();

        return redirect()->route('setup.faq')->with('success', 'FAQ added successfully!');
    }

    public function Edit($id)
    {
        $user = Auth::user();

        $clubs   = Club::where('status', 1);
        $offices = Office::where('status', 1);

        if ($user->id == 1) {
            // Admin
            $data['editData'] = Faq::find($id);
            $data['faq_types'] = $this->typeService->typeList('category');
        } else {
            $user_role = UserRole::where('user_id', $user->id)->first();

            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & FAQ Type is 8
                    $data['faq_types'] = $this->typeService->single('category', 8);
                    $data['editData'] = Faq::where('id', $id)->where('faq_type', 8)->firstOrFail();
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_club) {
                        $club_ids = $assign_club->pluck('club_id')->toArray();
                        $data['clubs'] = $clubs->whereIn('id', $club_ids);
                    }
                    break;
                case '8':
                    // CPC Role = 10 & FAQ Type is 7
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $data['editData'] = Faq::where('id', $id)->where('faq_type', 7)->firstOrFail();
                    $office = Office::where('name', 'like', '%cpc%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;
                case '10':
                    // IQAC Role = 10 & FAQ Type is 7
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $data['editData'] = Faq::where('id', $id)->where('faq_type', 7)->firstOrFail();
                    $office = Office::where('name', 'like', '%iqac%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;

                case '11':
                    // OEFCD Role = 11 & FAQ Type is 7
                    $data['faq_types'] = $this->typeService->single('category', 7);
                    $data['editData'] = Faq::where('id', $id)->where('faq_type', 7)->firstOrFail();
                    $office = Office::where('name', 'like', '%oefcd%')->first();
                    $data['offices'] = $offices->where('id', $office->id);
                    break;

                default:
                    $data['faq_types'] = collect();
                    break;
            }
        }


        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);
        $data['clubs']          = $clubs->get(['id', 'name']);
        $data['offices']        = $offices->get(['id', 'name']);
        $data['programs']       = Program::where('status', 1)->get(['id', 'program_title']);

        return view('backend.faq.add', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::find($id);
        $faq->faq_type = $request->faq_type;

        switch ($request->faq_type) {
            case '1':
                $faq->ref_id = $request->faculty_id;
                break;
            case '2':
                $faq->ref_id = $request->dept_id;
                break;
            case '3':
                $faq->ref_id = $request->program_id;
                break;
            case '7':
                $faq->ref_id = $request->office_id;
                break;
            case '8':
                $faq->ref_id = $request->club_id;
                break;
            default:
                $faq->ref_id = null;
                break;
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status ?? 0;

        $faq->save();
        return redirect()->route('setup.faq')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Faq::find($request->id);
        $data->delete();

        return redirect()->route('setup.faq')->with('success', 'Data Deleted successfully');
    }

    //ajax
    public function multipleFacultyWiseDepartment(Request $request)
    {
        if (!$request->faculty_id) {
            $request->faculty_id = [];
        }
        $facultyWiseDepartment = Department::whereIn('faculty_id', $request->faculty_id)->get();
        return response()->json($facultyWiseDepartment);
    }

    //ajax
    public function multipleDepartmentWiseProgram(Request $request)
    {
        if (!$request->department_id) {
            $request->department_id = [];
        }
        $departmentWiseProgram = Program::whereIn('department_id', $request->department_id)->get();
        return response()->json($departmentWiseProgram);
    }
}
