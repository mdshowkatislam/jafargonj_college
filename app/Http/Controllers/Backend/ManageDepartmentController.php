<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\FrontendMenu;
use App\Models\MenuType;
use App\Models\Message;
use App\Models\CmsButexTheme;
use App\Models\PersonnelsToFaculty;
use App\Services\DepartmentService;
use App\Services\FacultyService;
use Illuminate\Http\Request;

use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\Auth;

class ManageDepartmentController extends Controller
{
    private $ProfileService;
    public function __construct(ProfileService $ProfileService) {
        $this->ProfileService = $ProfileService;
    }
    public function index()
    {
        $department_head = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        $data['department_head'] = $this->ProfileService->getDepartmentHead(Auth::user()->profile_id);
        // dd($data['department_head']);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0) {
            $faculties = Faculty::where('id', $data['faculty_head'][0]->id)->get();
        } elseif (isset($data['department_head']) && count($data['department_head']) > 0) {
            $faculties = Faculty::where('id', $data['department_head'][0]->faculty_id)->get();
            $department_head = true;
        } else {
            //$data = Department::with('faculty')->oldest()->get();
            $faculties = FacultyService::All();
            // dd($faculties);
        }

        return view('backend.manage_department.view', compact('faculties', 'department_head'));
    }

    public function Add()
    {
        $data['isFacultyHead'] = false;
        $data['isDepartmentHead'] = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        // dd($data['faculty_head']);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0) {
            $data['isFacultyHead'] = true;
            foreach($data['faculty_head'] as $item) {
                $data['admin_faculty_id'] = $item->id;
            }
            // dd($faculty_id);
        }
      
        // $menus = FrontendMenu::whereIn('menu_type_id', [2, 10])->get()->toArray();
        // $data['top_menus'] = [];
        // $data['nav_menus '] = [];

        // foreach ($menus as $item) {
        //     if ($item['menu_type_id'] == 2) {
        //         array_push($data['top_menus'], $item);
        //     }
        //     if ($item['menu_type_id'] == 10) {
        //         array_push($data['nav_menus '], $item);
        //     }
        // }

        // $menu_type_name = MenuType::find(10);

        $data['banners'] = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        // dd($data['menu_types']);
        return view('backend.manage_department.add', $data);
    }

    public function Store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|unique:faculties|regex:/^[a-zA-Z\s]+$/',
            'contact' => 'required|numeric',
            'email' => 'email',
            'sort_order' => 'required|integer',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg'

        ], [
            'faculty_id.required' => 'You have to choose Faculty',
            'name.regex' => 'name field must contain characters only',
        ]);

        $data = new Department();
        $data->faculty_id = $request->faculty_id;
        $data->name = $request->name;
        $data->ucam_department_id = $request->ucam_department_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->banner_id = $request->banner_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->top_menu = $request->top_menu;
        $data->nav_menu = $request->nav_menu;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;

        // $img = $request->file('image');
        if ($file = $request->file('image')) {
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/department'), $filename);
            $data['image'] = $filename;
        }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Department Created', $created_by = Auth::id());
        }

        $message = new Message();
        $message->type_id = 2;
        $message->category_id = $data->id;
        $message->profile_id = $data->profile_id;
        $message->status = 0;
        $message->title_first_part = 'Message From Chairman';
        $message->short_description = 'Message From Chairman';
        $message->save();

        return redirect()->route('setup.manage_department')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['isFacultyHead'] = false;
        $data['isDepartmentHead'] = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        $data['department_head'] = $this->ProfileService->getDepartmentHead(Auth::user()->profile_id);
        // dd($data['faculty_head']);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0) {
            $data['isFacultyHead'] = true;
        }
        if (isset($data['department_head']) && count($data['department_head']) > 0) {
            $data['isDepartmentHead'] = true;
        }
        $data['editData'] = Department::find($id);
        $data['banners'] = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        // dd($data['editData']);
        $data['themes']     = CmsButexTheme::where('page_id', '3')->first();
        return view('backend.manage_department.add', $data);
    }

    public function Update(Request $request, $id)
    {
        
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            //'ucam_department_id' => 'required',
            'contact' => 'required|numeric',
            'sort_order' => 'required|numeric',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg'
        ], [
            'faculty_id.required' => 'You have to choose Faculty',
            'name.regex' => 'name field must contain characters only',
        ]);
        $data = Department::find($id);
        $data->faculty_id = $request->faculty_id;
        $data->name = $request->name;
        $data->ucam_department_id = $request->ucam_department_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->banner_id = $request->banner_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->top_menu = $request->top_menu;
        $data->nav_menu = $request->nav_menu;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
        if ($file = $request->file('image')) {
            @unlink(public_path('upload/department/' . $data->image));
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/department'), $filename);
            $data['image'] = $filename;
        }
      
      
        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Department Updated', $created_by = Auth::id());
        }

        $profile_exists = PersonnelsToFaculty::where('profile_id', $data->profile_id)->first();

        if (!$profile_exists) {
            $params = [
                'profile_id' => $data->profile_id,
                'faculty_id' =>  $data->faculty_id,
                'department_id' => $id,
                'sort_order' =>  1
            ];

            PersonnelsToFaculty::create($params);
        }

        $message = Message::where('type_id', 2)->where('category_id', $data->id)->first();
        if ($message) {
            $message->profile_id = $data->profile_id;
        } else {
            $message = new Message();
            $message->type_id = 2;
            $message->category_id = $data->id;
            $message->profile_id = $data->profile_id;
            $message->status = 0;
            $message->title_first_part = 'Message From Chairman';
            $message->short_description = 'Message From Chairman';
        }
        $message->save();

        return redirect()->route('setup.manage_department')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Department::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_department')->with('success', 'Data Deleted successfully');
    }

    public function newDepartmentFromApi()
    {
        $ucam_department_ids = Department::pluck('ucam_department_id')->toArray();

        //dd($profile_bup_nos);
        // $client = new \GuzzleHttp\Client();
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', '');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueDepartmentIds = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['DepartmentId'], $ucam_department_ids) && $apiData['FacultyId'] != NULL  && $apiData['DepartmentId'] != NULL) {
                if (!in_array($apiData['DepartmentId'], $uniqueDepartmentIds)) {
                    $uniqueDepartmentIds[] = $apiData['DepartmentId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        return view('backend.manage_department.for_api.new_department_from_api', compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_department_ids = Department::pluck('ucam_department_id')->toArray();

        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', '');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueDepartmentIds = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['DepartmentId'], $ucam_department_ids) && $apiData['FacultyId'] != NULL  && $apiData['DepartmentId'] != NULL) {
                if (!in_array($apiData['DepartmentId'], $uniqueDepartmentIds)) {
                    $uniqueDepartmentIds[] = $apiData['DepartmentId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        foreach ($clientdatas as $clientdata) {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $department = new Department;
            $department->name = $clientdata['Department'] ?? NULL;
            $department->ucam_department_id = $clientdata['DepartmentId'] ?? NULL;
            $department->faculty_id = FacultyService::ExistCheck($clientdata['FacultyId'], $clientdata['Department']) ?? NULL;
            $department->save();
        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }
}
