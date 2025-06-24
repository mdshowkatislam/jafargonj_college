<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MenuType;
use App\Models\Message;
use App\Models\CmsButexTheme;
use App\Models\Office;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Provider\Dsn;
use Illuminate\Support\Facades\Auth;

class ManageOfficeController extends Controller
{
    private $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $data = Office::all();
        return view('backend.manage_office.view_office', compact('data'));
    }

    public function Add()
    {

        $data['banners'] = $this->bannerService->getAll();
        $data['menu_types'] = MenuType::all();
        return view('backend.manage_office.add_office', $data);
    }

    public function Store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:offices|regex:/^[a-zA-Z\s.\-]+$/',
            'sort_order' => 'required|numeric',
            'status' => 'required'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        $data = new Office();
        $data->name = $request->name;
        $data->ucam_office_id = $request->ucam_office_id;
        $data->about = $request->about;
        $data->contact_info = $request->contact_info;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->banner_id = $request->banner_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->top_menu = $request->top_menu;
        $data->nav_menu = $request->nav_menu;
        $data->email = $request->email;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;

        if ($request->has('is_designation')) {
            $data->is_designation = 1;
            $data->designation_name = $request->designation_name;
        } else {
            $data->is_designation = 0;
        }

        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Office Created', $created_by = Auth::id());
        }

        $message = new Message();
        $message->type_id = 3;
        $message->category_id = $data->id;
        $message->profile_id = $data->profile_id;
        $message->status = 0;
        $message->title_first_part = 'Message From Office Head';
        $message->short_description = 'Message From Office Head';
        $message->save();

        return redirect()->route('setup.manage_office')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['banners']   = $this->bannerService->getAll();
        $data['editData']   = Office::find($id);
        $data['menu_types'] = MenuType::all();
        $data['themes']     = CmsButexTheme::where('page_id', '4')->first();
        return view('backend.manage_office.add_office', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s.\-]+$/',
            'sort_order' => 'required|numeric',
            'status' => 'required'
        ], [
            'name.regex' => 'name field must contain characters only',
        ]);

        $data = Office::find($id);
        $data->name = $request->name;
        $data->ucam_office_id = $request->ucam_office_id;
        $data->about        = $request->about;
        $data->contact_info = $request->contact_info;
        $data->profile_id   = $request->profile_id;
        $data->slider_id    = $request->slider_id;
        $data->banner_id    = $request->banner_id;
        $data->location     = $request->location;
        $data->contact      = $request->contact;
        $data->top_menu =   $request->top_menu;
        $data->nav_menu =   $request->nav_menu;
        $data->email        = $request->email;
        $data->sort_order   = $request->sort_order;
        $data->status       = $request->status;

        if ($request->has('is_designation')) {
            $data->is_designation = 1;
            $data->designation_name = $request->designation_name;
        } else {
            $data->is_designation = 0;
            $data->designation_name = null;
        }

        $data->save();

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Office Updated', $created_by = Auth::id());
        }

        $message = Message::where('type_id', 3)->where('category_id', $data->id)->first();

        if ($message) {
            $message->profile_id = $data->profile_id;
        } else {
            $message = new Message();
            $message->type_id = 3;
            $message->category_id = $data->id;
            $message->profile_id = $data->profile_id;
            $message->status = 0;
            $message->title_first_part = 'Message From Office Head';
            $message->short_description = 'Message From Office Head';
        }
        $message->save();

        return redirect()->route('setup.manage_office')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Office::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_office')->with('success', 'Data Deleted successfully');
    }

    public function newOfficeFromApi()
    {
        $ucam_office_ids = Office::pluck('ucam_office_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'http://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueOfficeIDs = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['OfficeID'], $ucam_office_ids) && $apiData['OfficeID'] != NULL) {
                if (!in_array($apiData['OfficeID'], $uniqueOfficeIDs)) {
                    $uniqueOfficeIDs[] = $apiData['OfficeID'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueOfficeIDs);
        return view('backend.manage_office.for_api.new_office_from_api', compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_office_ids = Office::pluck('ucam_office_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueOfficeIDs = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['OfficeID'], $ucam_office_ids) && $apiData['OfficeID'] != NULL) {
                if (!in_array($apiData['OfficeID'], $uniqueOfficeIDs)) {
                    $uniqueOfficeIDs[] = $apiData['OfficeID'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        foreach ($clientdatas as $clientdata) {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $office = new Office;
            $office->name = $clientdata['Office'] ?? NULL;
            $office->ucam_office_id = $clientdata['OfficeID'] ?? NULL;
            $office->save();
        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }
}
