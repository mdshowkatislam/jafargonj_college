<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\Cpc;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Office;
use App\Models\Hall;
use App\Models\Faculty;
use App\Models\PersonnelsToFaculty;
use App\Models\ProgramCategory;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Convocation;
use App\Services\Profile\ProfileService;
use App\Services\SmsService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    private $smsService;
    private $ProfileService;

    public function __construct(SmsService $smsService, ProfileService $ProfileService)
    {
        $this->smsService = $smsService;
        $this->ProfileService = $ProfileService;
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id == 1) { // Admin
                $data['news'] = News::orderBy('id', 'desc')->get();
            } else {
                $user_role = UserRole::where('user_id', $user->id)->first();
                switch ($user_role->role_id) {
                    case '1':
                        $data['news'] = News::latest()->get();
                        if(count($data['news']) < 1){
                            $data['news'] = collect();
                        }
                        break;
                    case '13':
                        $faculty = $this->ProfileService->getFacultyHead(Auth::user()->profile_id);
                        $data['news'] = News::where('faculty_id', $faculty[0]->id)->orderBy('id', 'desc')->get();
                        if(count($data['news']) < 1){
                            $data['news'] = collect();
                        }
                        break;
                    case '17':
                        $department = $this->ProfileService->getDepartmentHead(Auth::user()->profile_id);
                        $data['news'] = News::where('department_id', $department[0]->id)->orderBy('id', 'desc')->get();
                        if(count($data['news']) < 1){
                            $data['news'] = collect();
                        }
                        break;

                    case '3':
                        // Club Role = 3
                        $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                        if ($assign_club->isNotEmpty()) {
                            $club_ids = $assign_club->pluck('club_id')->toArray();
                            $data['news'] = News::whereIn('club_id', $club_ids)->get();
                        } else {
                            $data['news'] = collect();
                        }
                        break;

                    case '8':
                        // CPC Role = 8
                        $cpc_ids = Cpc::where('status', 1)->pluck('id');

                        if ($cpc_ids) {
                            $data['news'] = News::orderBy('id', 'desc')->whereIn('cpc_id', $cpc_ids)->get();
                        } else {
                            $data['news'] = collect();
                        }
                        break;

                    case '10':
                        // IQAC Role = 10
                        $office = Office::where('name', 'like', '%iqac%')->first();
                        if ($office) {
                            $data['news'] = News::orderBy('id', 'desc')->where(function ($query) use ($office) {
                                $query->where('office_id', $office->id)
                                    ->orWhere('office_id', 0); // Include all office
                            })->get();
                        } else {
                            $data['news'] = collect();
                        }
                        break;
                    case '11':
                        // OEFCD Role = 11
                        $office = Office::where('name', 'like', '%oefcd%')->first();
                        if ($office) {
                            $data['news'] = News::orderBy('id', 'desc')->where(function ($query) use ($office) {
                                $query->where('office_id', $office->id)
                                    ->orWhere('office_id', 0); // Include all office
                            })->get();
                        } else {
                            $data['news'] = collect();
                        }
                        break;

                    // case '6':
                    //     // Department = 6
                    //     $data['news'] = News::where('created_by', $user->id)->latest()->get();
                    //     if(count($data['news'])<1){
                    //         $data['news'] = collect();
                    //     }
                    //     break;
                    // case '13':
                    //     // faculty = 13
                    //     $data['news'] = News::where('created_by', $user->id)->latest()->get();
                    //     if(count($data['news'])<1){
                    //         $data['news'] = collect();
                    //     }
                    //     break;

                    default:
                        // $data['news'] = collect();
                        // break;
                        $data['news'] = News::where('created_by', $user->id)->latest()->get();
                        if(count($data['news'])<1){
                            $data['news'] = collect();
                        }
                        break;
                }
            }
        } else {
            $data['news'] = collect();
        }

        // dd($data['news']->toArray());
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();

        return view('backend.news.news-view')->with($data);
    }

    public function filterNews()
    {
       
        $data['news'] = News::orderBy('id', 'desc')->where('type', 1)->get();
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterEvent()
    {
        $data['news'] = News::orderBy('id', 'desc')->where('type', 2)->get();
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterNotice()
    {

        $data['type']    = 'notice';
        $data['news'] = News::orderBy('id', 'desc')->where('type', 3)->get();
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterNotice_category(Request $request)
    {
        $data['type']    = 'notice';
        $Id = $request->id;
        $data['type_id'] = $Id;
        $data['news'] = News::orderBy('id', 'desc')->where('type', 3)->where('category', $Id)->get();
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterFaculty(Request $request)
    {
       $Id = $request->id;
       $data['type']    = 'faculty';
       $data['type_id'] = $Id;

        if($Id == '0'){
            $data['news']    = News::orderBy('id', 'desc')->whereNotNull('faculty_id')->get();
        }else{
            $data['news']    = News::orderBy('id', 'desc')->where('faculty_id', $Id)->orderBy('id', 'desc')->get();
        }

        $data['faculty'] = Faculty::get();
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();

        return view('backend.news.news-view')->with($data);
    }

    public function filterDepartment(Request $request)
    {
        $Id = $request->id;
        $data['type']    = 'department';
        $data['type_id'] = $Id;

        if($Id == '0'){
            $data['news'] = News::orderBy('id', 'desc')->whereNotNull('department_id')->get();
        }else{
            $data['news'] = News::orderBy('id', 'desc')->where('department_id', $Id)->orderBy('id', 'desc')->get();
        }
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        $data['department'] = Department::get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterOffice(Request $request)
    {
        $Id = $request->id;
        $data['type']    = 'office';
        $data['type_id'] = $Id;

        if($Id == '0'){
            $data['news'] = News::orderBy('id', 'desc')->whereNotNull('office_id')->get();
        }else{
            $data['news'] = News::orderBy('id', 'desc')->where('office_id', $Id)->orderBy('id', 'desc')->get();
        }
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        $data['office'] = Office::get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterClub(Request $request)
    {
        $Id = $request->id;
        $data['type']    = 'club';
        $data['type_id'] = $Id;

        if($Id == '0'){
            $data['news'] = News::orderBy('id', 'desc')->whereNotNull('club_id')->get();
        }else{
            $data['news'] = News::orderBy('id', 'desc')->where('club_id', $Id)->orderBy('id', 'desc')->get();
        }
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        $data['club'] = Club::get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterHall(Request $request)
    {
        $Id = $request->id;
        $data['type']    = 'hall';
        $data['type_id'] = $Id;

        if($Id == '0'){
            $data['news'] = News::orderBy('id', 'desc')->whereNotNull('hall_id')->get();
        }else{
            $data['news'] = News::orderBy('id', 'desc')->where('hall_id', $Id)->orderBy('id', 'desc')->get();
        }
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        $data['hall'] = Hall::get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterGeneralNotice()
    {
        $data['news'] = News::orderBy('id', 'desc')->where('type', 4)->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterSpecialNotice()
    {
        $data['news'] = News::orderBy('id', 'desc')->where('type', 5)->get();
        return view('backend.news.news-view')->with($data);
    }

    public function filterTenderNotice()
    {
        $data['news'] = News::orderBy('id', 'desc')->where('type', 6)->get();
        return view('backend.news.news-view')->with($data);
    }

    public function add()
    {
        $user = Auth::user();


        $user_role = UserRole::where('user_id', $user->id)->first();

        $clubs = Club::with('faculty', 'department', 'events');
        $offices = Office::latest();

        if ($user->id != 1) {
            switch ($user_role->role_id) {
                case '3':
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_club) {
                        $club_ids = $assign_club->pluck('club_id')->toArray();
                        $data['club_infos'] = $clubs->whereIn('id', $club_ids);
                    }
                    break;
                case '10':
                    // IQAC Role = 10
                    $data['office_infos'] = $offices->where('name', 'like', '%iqac%');
                    break;

                case '11':
                    // OEFCD Role = 11
                    $data['office_infos'] = $offices->where('name', 'like', '%oefcd%');
                    break;
                default:
                    break;
            }
        }
        $data['categories'] = ProgramCategory::all();
        $data['club_infos'] = $clubs->get(['id', 'name']);
        $data['office_infos'] = $offices->get();
        $data['role_id'] = $user_role->role_id ?? null;
        $data['convocations'] = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-add', $data);
    }

    public function store(Request $request)
    {
       //  dd($request->all());
        $request->validate([
            'title' => 'required',
            // 'date' => 'required',
            'type' => 'required',
            // 'image' => 'mimes:jpg,jpeg,png | max:2048',
            'file' => 'mimes:pdf,docx | max:10240',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date ?: Carbon::now()));
        $params['hall_id'] = $request->hall_id;
        // Check if start_date is provided
        if (!empty($request->start_date)) {
            $params['start_date'] = date('Y-m-d', strtotime($request->start_date));
        }
        // Check if end_date is provided
        if (!empty($request->end_date)) {
            $params['end_date'] = date('Y-m-d', strtotime($request->end_date));
        }
        // $params['start_date'] = date('Y-m-d', strtotime($request->start_date));
        // $params['end_date'] = date('Y-m-d', strtotime($request->end_date));
        $params['display_on_scrollbar'] = $request->display_on_scrollbar ?? 0;
        $params['is_featured'] = $request->is_featured ?? 0;

        // dd($params);
        if ($file = $request->file('image')) {
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/news'), $filename);
            //$image=Image::make(public_path('upload/news/').$filename);
            //$image->resize(643,360)->save(public_path('upload/news/').$filename);
            $params['image'] = $filename;
        }

        if ($file = $request->file('file')) {
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/news'), $filename);
            $params['file'] = $filename;
        }

        $params['created_by'] = Auth::id();
        // dd($params);
        $data = News::create($params);
        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'News Created', $created_by = Auth::id());
        }

        $news_type ='';
        if($data->type == 1){
            $news_type = 'News';
        }
        elseif($data->type == 2){
            $news_type = 'Event';
        }
        else{
            $news_type = 'Notice';
        }
        return redirect()->route('news.list')->with('success', "$news_type Added Successfully!");

    
        //for message option off

        // dd(Auth::user()->name);
        // $admin = User::find(1);
        // $phone = $admin->mobile;

        // $admin2 = User::find(46);
        // dd($admin2);
        // $phone2 = $admin2->mobile;

        // $message = $news_type . " has been uploaded by ". Auth::user()->name .". Please click on the below link to approve it. ". route('news.list') ."  - Bup Support";
        // $sms = $this->smsService->sendSms($phone, $message);
        // $sms2 = $this->smsService->sendSms($phone2, $message);
      
       
    }

    public function edit($id)
    {
        $user = Auth::user();

        $user_role = UserRole::where('user_id', $user->id)->first();

        $clubs = Club::with('faculty', 'department', 'events');
        $offices = Office::latest();
        $news = News::where('id', $id);

        if ($user->id != 1) {
            switch ($user_role->role_id) {
                case '3':
                    $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                    if ($assign_club) {
                        $club_ids = $assign_club->pluck('club_id')->toArray();
                        $data['club_infos'] = $clubs->whereIn('id', $club_ids);
                        $data['editData'] = $news->whereIn('club_id', $club_ids);
                    }
                    break;

                case '8':
                    // CPC Role = 8
                    $cpc_ids = Cpc::where('status', 1)->pluck('id');
                    $data['editData'] = $news->whereIn('cpc_id', $cpc_ids);
                    break;

                case '10':
                    // IQAC Role = 10
                    $data['office_infos'] = $offices->where('name', 'like', '%iqac%');
                    $office = Office::where('name', 'like', '%iqac%')->first();
                    $data['editData'] = $news->where(function ($query) use ($office) {
                        $query->where('office_id', $office->id)
                            ->orWhere('office_id', 0); // Include all office
                    });
                    break;

                case '11':
                    // OEFCD Role = 11
                    $data['office_infos'] = $offices->where('name', 'like', '%oefcd%');
                    $office = Office::where('name', 'like', '%oefcd%')->first();
                    $data['editData'] = $news->where(function ($query) use ($office) {
                        $query->where('office_id', $office->id)
                            ->orWhere('office_id', 0); // Include all office
                    });
                    break;
            }
        } else {
            $data['editData'] = News::find($id);
        }

        $data['club_infos']   = $clubs->get(['id', 'name']);
        $data['office_infos'] = $offices->get();
        $data['editData']     = $news->firstOrFail();
        $data['role_id']      = $user_role->role_id ?? null;
        $data['categories']   = ProgramCategory::all();
        $data['convocations']  = Convocation::orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.news.news-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            // 'date' => 'required',
            'type' => 'required',
            'image' => 'mimes:jpg,jpeg,png | max:1024',
            'file' => 'mimes:pdf,docx | max:10240',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date));
        // Check if start_date is provided
        if (!empty($request->start_date)) {
            $params['start_date'] = date('Y-m-d', strtotime($request->start_date));
        }
        // Check if end_date is provided
        if (!empty($request->end_date)) {
            $params['end_date'] = date('Y-m-d', strtotime($request->end_date));
        }
        // $params['start_date'] = date('Y-m-d', strtotime($request->start_date));
        // $params['end_date'] = date('Y-m-d', strtotime($request->end_date));
        $params['display_on_scrollbar'] = $request->display_on_scrollbar ?? 0;
        $params['is_featured'] = $request->is_featured ?? 0;
        $data = News::find($id);

        if ($file = $request->file('image')) {
            if (file_exists(public_path('upload/news/' . $data->image))) {
                @unlink(public_path('upload/news/' . $data->image));
            }
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/news'), $filename);
            //$image=Image::make(public_path('upload/news/').$filename);
            //$image->resize(643,360)->save(public_path('upload/news/').$filename);
            $params['image'] = $filename;
        }
        if ($file = $request->file('file')) {
            if (file_exists(public_path('upload/news/' . $data->file))) {
                @unlink(public_path('upload/news/' . $data->file));
            }
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/news'), $filename);
            //$image=Image::make(public_path('upload/news/').$filename);
            //$image->resize(643,360)->save(public_path('upload/news/').$filename);
            $params['file'] = $filename;
        }
        $params['updated_by'] = Auth::id();
        $data->update($params);
        logData($primary_id = $data->id, $url = url()->previous(), $old_data = $params, $new_data = $data, $action = 'News Updated', $created_by = $data->created_by, $updated_by = $data->updated_by);

        return redirect()->route('news.list')->with('info', 'News Updated Successfully!');
    }

    public function delete(Request $request)
    {
        // dd($id);
        $id = $request->id;
        $deleteData = News::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('news.list');
    }

    public function approve($id)
    {
        News::where('id', $id)->update(['is_approved' => 1]);
        return redirect()->route('news.list')->with('info', 'News Approve Successfully !');
    }
    public function reject($id)
    {
        News::where('id', $id)->update(['is_approved' => 0]);
        return redirect()->route('news.list')->with('warning', 'News Rejected !');
    }
}
