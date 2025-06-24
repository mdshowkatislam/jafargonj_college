<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeOrder;
use App\Services\NocService;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToOffice;
use App\Models\Profile;
use App\Models\Office;
use App\Models\Department;
use App\Models\PersonnelsToFacultyOfficer;

class NocController extends Controller
{

    private $nocService;

    public function __construct(NocService $nocService)
    {
        $this->nocService = $nocService;
    }
    public function index()
    {
        $allData = $this->nocService->getAll();
        // dd($allData->toArray());
        return view('backend.noc.index', compact('allData'));
    }
    public function add_noc()
    {
        $data = [];
        return view('backend.noc.add', $data);
    }

    public function categoryWiseDeptOrOffice(Request $request)
    {
        if ($request->category_type_value == 1 || $request->category_type_value == 3) {
            $data['categories'] = Department::get();
        } elseif ($request->category_type_value == 2) {
            $data['categories'] = Office::get();
        }
        // dd( $data['categories']);
        if (isset($data['categories'])) {
            return response()->json($data['categories']);
        } else {
            return response()->json('fail');
        }
    }
    public function departmentWiseMember(Request $request)
    {
        //dd($request->category_id);
        if ($request->category_type == 1) {

            $data['member'] = PersonnelsToFaculty::with('profile')->where('department_id', $request->category_id)->get();
            // $data['member'] = PersonnelsToFaculty::join('profiles', 'personnels_to_faculties.faculty_id', 'profiles.faculty_id')
            // ->select('profiles.id','profiles.nameEn as name')
            // ->where('profiles.department_id', $request->category_id)
            // ->orderBy('personnels_to_faculties.id', 'DESC')
            // ->get();
        } elseif ($request->category_type == 2) {
            $data['member'] = PersonnelsToOffice::with('profile')->where('office_id', $request->category_id)->get();
            // $data['member'] = PersonnelsToOffice::join('profiles', 'personnels_to_offices.office_id', 'profiles.office_id')
            // ->select('profiles.id','profiles.nameEn as name')
            // ->where('profiles.office_id', $request->category_id)
            // ->orderBy('personnels_to_offices.id', 'DESC')
            // ->get();

        } elseif ($request->category_type == 3) {
            $data['member'] = PersonnelsToFacultyOfficer::with('profile')->where('department_id', $request->category_id)->get();
            // $data['member'] = PersonnelsToOffice::join('profiles', 'personnels_to_offices.office_id', 'profiles.office_id')
            // ->select('profiles.id','profiles.nameEn as name')
            // ->where('profiles.office_id', $request->category_id)
            // ->orderBy('personnels_to_offices.id', 'DESC')
            // ->get();

        }

        if (isset($data['member'])) {
            return response()->json($data['member']);
        } else {
            return response()->json('fail');
        }
    }

    public function MemberWiseDesignation(Request $request)
    {

        //dd($request->member_id);
        $member = Profile::where('id', $request->member_id)->first();
        if (isset($member)) {
            return response()->json($member->designation);
        } else {
            return response()->json('fail');
        }
    }

    public function store(Request $request, NocService $OfficeOrder)
    {
        $request->validate([
            'title' => 'required|regex:/.*[a-zA-Z].*/',
            'attachment' => 'mimes:jpg,png,jpeg,PNG,gif,pdf,doc,docx|max:20000'
        ], [
            'title.regex' => 'Title field should contain character',
        ]);
       // dd($request->all());
        $OfficeOrder->saveEvent($request);

        return redirect()->route('noc.list')->with('success', 'NOC/Office Order Added Successfully!');
    }

    public function edit($id)
    {
        $data['editData'] = $this->nocService->SingleData($id);
        return view('backend.noc.add')->with($data);
    }

    public function update(Request $request, $id, NocService $OfficeOrder)
    {
       // dd($request->all());
        $request->validate([
            'title' => 'required|regex:/.*[a-zA-Z].*/',
            'attachment' => 'mimes:jpg,png,jpeg,PNG,gif,pdf,doc,docx|max:20000'
        ], [
            'title.regex' => 'Title field should contain character',
        ]);
        //dd($request->all());
        $OfficeOrder->updateEvent($request, $id);

        return redirect()->route('noc.list')->with('info', 'NOC/ Office Order Update Successfully');
    }

    public function status_change(Request $request, NocService $OfficeOrder)
    {
        $status_info = $OfficeOrder->statusChangeEvent($request);

        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }
    }
}
