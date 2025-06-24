<?php

namespace App\Http\Controllers\Backend\Iqac;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\IqacWorkshop;
use Illuminate\Http\Request;

class IqacWorkShopController extends Controller
{

    public function index()
    {
        $data['traningList'] = IqacWorkshop::get();
        return view('backend.iqac_workshop.list', $data);
    }
    public function add()
    {

        $data['members'] = Profile::all();
        return view('backend.iqac_workshop.add', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'type_id' => 'required',
            'title' => 'required',
            'schedule' => 'required',
            'facilator' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg,doc,docx,pdf',
        ]);

        $data           = new IqacWorkshop();
        $data->type_id     = $request->type_id;
        $data->title     = $request->title;
        $data->schedule     = $request->schedule;
        $data->facilator     = $request->facilator;
        $data->status     = $request->status;
        $data->description     = $request->description;
        // dd($request->all());
        if ($file = $request->file('image')) {
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/workshop'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('manage_workshop_seminar')->with('success', 'Data Saved successfully');
    }


    public function edit($id)
    {
        $data['editData'] = IqacWorkshop::find($id);
        $data['members'] = Profile::all();
        return view('backend.iqac_workshop.add', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required',
            'title' => 'required',
            'schedule' => 'required',
            'facilator' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,png,jpeg,doc,docx,pdf',
        ]);

        $data           = IqacWorkshop::find($id);
        $data->type_id     = $request->type_id;
        $data->title     = $request->title;
        $data->schedule     = $request->schedule;
        $data->facilator     = $request->facilator;
        $data->status     = $request->status;
        $data->description     = $request->description;
        if ($file = $request->file('image')) {
            @unlink(public_path('upload/workshop/' . $data->image));
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/workshop'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        return redirect()->route('manage_workshop_seminar')->with('success', 'Data Updated successfully');
    }

    public function delete(Request $request)
    {
        $data = IqacWorkshop::find($request->id);
        $data->delete();
        return redirect()->route('manage_workshop_seminar')->with('success', 'Data Deleted successfully');
    }
}
