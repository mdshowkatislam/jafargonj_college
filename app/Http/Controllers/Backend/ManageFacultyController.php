<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\MenuType;
use App\Models\Message;
use App\Models\CmsButexTheme;
use App\Models\PersonnelsToFaculty;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ManageFacultyController extends Controller
{
    private $ProfileService;
    public function __construct(ProfileService $ProfileService) {
        $this->ProfileService = $ProfileService;
    }

    public function index()
    {
        $faculty_head = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        // dd($data['faculty_head']);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0) {
            $data = $data['faculty_head'];
            $faculty_head = true;
        } else {
            $data = Faculty::latest()->get();
        }

        return view('backend.manage_faculty.view_faculty', compact('data', 'faculty_head'));
    }

    public function Add()
    {
        $data['isFacultyHead'] = false;
        $data['banners'] = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
      
        return view('backend.manage_faculty.add_faculty', $data);
    }

    public function Store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            //'ucam_faculty_id' => 'required',
            //'contact' => 'required|numeric',
            'email' => 'required|email',
            //'sort_order' => 'numeric|integer',
            'status' => 'required',
            //'image' => 'mimes:jpg,png,jpeg'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        $data = new Faculty();
        $data->name = $request->name;
        $data->ucam_faculty_id = 0;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->room_no = $request->room_no;
        $data->sort_order = $request->sort_order;
        $data->top_menu = $request->top_menu;
        $data->nav_menu = $request->nav_menu;
        $data->banner_id = $request->banner_id;
        $data->status = $request->status;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/faculty/', $imgName);
            $image = Image::make(public_path('upload/faculty/') . $imgName);
            $image->save(public_path('upload/faculty/') . $imgName);
            $data['image'] = $imgName;
        }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Faculty Created', $created_by = Auth::id());
        }

        $message = new Message();
        $message->type_id = 1;
        $message->category_id = $data->id;
        $message->profile_id = $data->profile_id;
        $message->status = 0;
        $message->title_first_part = 'Message From Dean';
        $message->short_description = 'Message From Dean';
        $message->save();

        return redirect()->route('setup.manage_faculty')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['isFacultyHead'] = false;
        $data['faculty_head'] = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
        // dd($data['faculty_head']);
        if (isset($data['faculty_head']) && count($data['faculty_head']) > 0) {
            $data['isFacultyHead'] = true;
        }
        $data['editData']   = Faculty::find($id);
        $data['banners']    = Banner::where('status', 1)->latest()->get();
        $data['menu_types'] = MenuType::all();
        $data['themes']     = CmsButexTheme::where('page_id', '2')->first();

        return view('backend.manage_faculty.add_faculty', $data);
    }

    public function Update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            //'ucam_faculty_id' => 'required',
            //'contact' => 'required|numeric',
            'email' => 'required',
            //'sort_order' => 'numeric|integer',
            'status' => 'required',
            //'image' => 'mimes:jpg,png,jpeg'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        $data = Faculty::find($id);
        $data->name = $request->name;
        $data->ucam_faculty_id = 0;//$request->ucam_faculty_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->room_no = $request->room_no;
        $data->sort_order = $request->sort_order;
        $data->top_menu = $request->top_menu;
        $data->nav_menu = $request->nav_menu;
        $data->banner_id = $request->banner_id;
        $data->status = $request->status;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/faculty/' . $data->image));
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/faculty/', $imgName);
            $image = Image::make(public_path('upload/faculty/') . $imgName);
            $image->save(public_path('upload/faculty/') . $imgName);
            $data['image'] = $imgName;
        }
        // $data->updated_by = Auth::user()->id;
        // dd($data);
        $data->save();

    
        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Faculty Updated', $created_by = Auth::id());
        }


        $profile_exists = PersonnelsToFaculty::where('profile_id', $data->profile_id)->first();

        if (!$profile_exists) {
            $params = [
                'profile_id' => $data->profile_id,
                'faculty_id' =>  $data->faculty_id,
                // 'department_id' => $id,
                'sort_order' =>  1
            ];

            PersonnelsToFaculty::create($params);
        }

        $message = Message::where('type_id', 1)->where('category_id', $data->id)->first();
        if ($message) {
            $message->profile_id = $data->profile_id;
        } else {
            $message = new Message();
            $message->type_id = 1;
            $message->category_id = $data->id;
            $message->profile_id = $data->profile_id;
            $message->status = 0;
            $message->title_first_part = 'Message From Dean';
            $message->short_description = 'Message From Dean';
        }
        $message->save();

        return redirect()->route('setup.manage_faculty')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Faculty::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        // if ($data) {
        //     logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Faculty Deleted', $created_by = Auth::id());
        // }

        return redirect()->route('setup.manage_faculty')->with('success', 'Data Deleted successfully');
    }

    public function newFacultyFromApi()
    {
        $ucam_faculty_ids = Faculty::pluck('ucam_faculty_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', '');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueFacultyIds = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['FacultyId'], $ucam_faculty_ids) && $apiData['FacultyId'] != NULL) {
                if (!in_array($apiData['FacultyId'], $uniqueFacultyIds)) {
                    $uniqueFacultyIds[] = $apiData['FacultyId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        return view('backend.manage_faculty.for_api.new_faculty_from_api', compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_faculty_ids = Faculty::pluck('ucam_faculty_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', '');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueFacultyIds = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['FacultyId'], $ucam_faculty_ids) && $apiData['FacultyId'] != NULL) {
                if (!in_array($apiData['FacultyId'], $uniqueFacultyIds)) {
                    $uniqueFacultyIds[] = $apiData['FacultyId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        foreach ($clientdatas as $clientdata) {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $faculty = new Faculty;
            $faculty->name = $clientdata['Faculty'] ?? NULL;
            $faculty->ucam_faculty_id = $clientdata['FacultyId'] ?? NULL;
            $faculty->save();
        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }
}
